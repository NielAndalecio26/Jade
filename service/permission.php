<?php
if (!isset($_SESSION)) {
    session_start();
}
$loc = $_SERVER['REQUEST_URI'];
$DIRECT_ACCESS = false;


if (!str_contains($loc, '/jade/service/note_handler.php')) {
    if (str_contains($loc, '/jade/service')) {
        die("Direct access is not allowed");
    }
}

?>