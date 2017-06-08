<?php
    require_once 'utils/errors.php';
    require_once 'utils/functions.php';
    if($_GET["action"] == "user")
    {
        if($_GET["method"] == "login")
        {
            Login($_GET["username"], $_GET["password"]);
        }
        if($_GET["method"] == "logout")
        {
            Logout($_GET["sessionid"]);
        }
    }
    elseif($_GET["action"] == "data")
    {
        if($_GET["method"] == "get")
        {
            Get($_GET["sessionid"]);
        }
        if($_GET["method"] == "set")
        {
            Set($_GET["sessionid"], $_GET["text"]);
        }
    }
    else 
        Unk_Act($_GET["action"]);
?>