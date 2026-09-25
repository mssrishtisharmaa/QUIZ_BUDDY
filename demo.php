<?php
$link = new mysqli('127.0.0.1', 'Project', 'Sujal@123', 'project');
 
if ($link->connect_error) {
    die('Connection failed: ' . $link->connect_error);
}
echo 'Connected successfully';
$link->close();
?>
 