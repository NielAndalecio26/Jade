<?php
include 'database.php';
if (isset($_POST['addnote'])) {
    $mess = str_replace("'", "\\'", $_POST['message']);
    add_note($_SESSION['user_id'], $mess);
    header("location: /jade/web/notes.php");
}

if (isset($_GET['delete'])) {
    delete_note_by_id($_GET['delete']);
    header("location: /jade/web/notes.php");
}

if (isset($_GET['update'])) {
    $mess = str_replace("'", "\\'", $_POST['message']);
    update_note_by_id($_GET['update'], $mess);
    header("location: /jade/web/notes.php");
}
?>