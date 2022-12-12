<?php
include("permission.php");
include("connection.php");

function get_user($username)
{
    $sql = "SELECT * FROM `accounts` where `username` = \"$username\"";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return (object) array(
                'id' => $row['id'],
                'username' => $row['username'],
                'password' => $row['password']
            );
        }
    } else {
        return (object) array(
            'id' => null,
            'username' => null,
            'password' => null
        );
    }
}

function add_user($username, $password)
{
    $sql = "INSERT INTO `accounts` (`username`,`password`) VALUES ('$username','$password');";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}

function update_user_by_id($id, $username = null, $password = null)
{
    if ($username === null) {
        $sql = "UPDATE `accounts` SET `password` = '$password' WHERE id=$id";
    } else if ($password === null) {
        $sql = "UPDATE `accounts` SET `username` = '$username' WHERE id=$id";
    } else {
        $sql = "UPDATE `accounts` SET `username` = '$username', `password` = '$password' WHERE id=$id";
    }

    if ($GLOBALS['conn']->query($sql) === TRUE) {
    } else {
        echo "Error updating record: " . $GLOBALS['conn']->error;
    }
}

function delete_user_by_id($id)
{
    $sql = "DELETE FROM `accounts` WHERE id=$id";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
    } else {
        echo "Error deleting record: " . $GLOBALS['conn']->error;
    }
}

function get_notes_by_user_id($user_id)
{
    $sql = "SELECT * FROM `notes` where `user_id` = $user_id";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $notes = array();
        while ($row = $result->fetch_assoc()) {
            array_push(
                $notes,
                (object) array(
                    'id' => $row['id'],
                    'user_id' => $row['user_id'],
                    'message' => $row['message'],
                    'timestamp' => $row['timestamp']
                )
            );
        }
    } else {
        $notes = array(
            (object) array(
                'id' => null,
                'user_id' => null,
                'message' => null,
                'timestamp' => null
            )
        );
    }

    return $notes;
}

function get_notes_by_id($id)
{
    $sql = "SELECT * FROM `notes` where `id` = \"$id\"";
    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $notes = array();
        while ($row = $result->fetch_assoc()) {
            array_push(
                $notes,
                (object) array(
                    'id' => $row['id'],
                    'user_id' => $row['user_id'],
                    'message' => $row['message'],
                    'timestamp' => $row['timestamp']
                )
            );
        }
    } else {
        $notes = array(
            (object) array(
                'id' => null,
                'user_id' => null,
                'message' => null,
                'timestamp' => null
            )
        );
    }

    return $notes;
}

function add_note($user_id, $message)
{
    $time = time();
    $sql = "INSERT INTO `notes` (`user_id`,`message`, `timestamp`) VALUES ('$user_id','$message', $time);";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}

function update_note_by_id($id, $message)
{
    $time = time();
    $sql = "UPDATE `notes` SET `message` = '$message', timestamp = '$time' WHERE id=$id";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
    } else {
        echo "Error updating record: " . $GLOBALS['conn']->error;
    }
}


function delete_note_by_id($id)
{
    $sql = "DELETE FROM `notes` WHERE `id`=$id";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
    } else {
        echo "Error deleting record: " . $GLOBALS['conn']->error;
    }
}


?>