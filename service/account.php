<?php
include("permission.php");
include("database.php");

function is_credentials_correct($username, $password)
{
    $tryUser = (object) get_user($username);
    if (strtoupper($tryUser->username) == strtoupper($username)) {
        if ($tryUser->password == $password) {
            $_SESSION['user_id'] = $tryUser->id;
            $_SESSION['username'] = $tryUser->username;
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function checkUsername($username, $password)
{
    $tryUser = (object) get_user($username);
    if (strtoupper($tryUser->username) == strtoupper($username)) {
        return false;
    } else {
        add_user($username, $password);
        $user = get_user($username);
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        return true;
    }
}


?>