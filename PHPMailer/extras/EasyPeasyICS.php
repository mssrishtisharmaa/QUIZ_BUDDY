<?php
class EasyPeasyICS
{
    /**
     * The name of the calendar
     * @var string
     */
    protected $calendarName;
    /**
     * The array of events to add to this calendar
     * @var array
     */
    protected $events = array();

    /**
     * Constructor
     * @param string $calendarName
     */
    public function __construct($calendarName = "")
    {
        $this->calendarName = $calendarName;
    }
    public function addEvent($start, $end, $summary = '', $description = '', $url = '', $uid = '')
    {
        if (empty($uid)) {
            $uid = md5(uniqid(mt_rand(), true)) . '@EasyPeasyICS';
        }
        $event = array(
            'start' => gmdate('Ymd', $start) . 'T' . gmdate('His', $start) . 'Z',
            'end' => gmdate('Ymd', $end) . 'T' . gmdate('His', $end) . 'Z',
            'summary' => $summary,
            'description' => $description,
            'url' => $url,
            'uid' => $uid
        );
        $this->events[] = $event;
        return $event;
    }

    /**
     * @return array Get the array of events.
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Clear all events.
     */
    public function clearEvents()
    {
        $this->events = array();
    }

    /**
     * Get the name of the calendar.
     * @return string
     */
    public function getName()
    {
        return $this->calendarName;
    }

    public function setName($name)
    {
        $this->calendarName = $name;
    }

   
    public function render($output = true)
    {
        //Add header
        $ics = 'BEGIN:VCALENDAR
METHOD:PUBLISH
VERSION:2.0
X-WR-CALNAME:' . $this->calendarName . '
PRODID:-//hacksw/handcal//NONSGML v1.0//EN';

        //Add events
        foreach ($this->events as $event) {
            $ics .= '
BEGIN:VEVENT
UID:' . $event['uid'] . '
DTSTAMP:' . gmdate('Ymd') . 'T' . gmdate('His') . 'Z
DTSTART:' . $event['start'] . '
DTEND:' . $event['end'] . '
SUMMARY:' . str_replace("\n", "\\n", $event['summary']) . '
DESCRIPTION:' . str_replace("\n", "\\n", $event['description']) . '
URL;VALUE=URI:' . $event['url'] . '
END:VEVENT';
        }

        //Add footer
        $ics .= '
END:VCALENDAR';

        if ($output) {
            //Output
            $filename = $this->calendarName;
            //Filename needs quoting if it contains spaces
            if (strpos($filename, ' ') !== false) {
                $filename = '"'.$filename.'"';
            }
            header('Content-type: text/calendar; charset=utf-8');
            header('Content-Disposition: inline; filename=' . $filename . '.ics');
            echo $ics;
        }
        return $ics;
    }
}
