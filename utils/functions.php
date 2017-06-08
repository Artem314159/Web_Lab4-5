<?php
    require_once ("./internal/available-users.php");
    require_once ("errors.php");
    function Login($name, $pass)
    {
        if(isUser($name, $pass))
        {
            $sesid = substr(uniqid(), 8)."-";
            usleep(50);
            $sesid .= substr(uniqid(), 8)."-";
            usleep(50);
            $sesid .= substr(uniqid(), 8);
            echo "Session_id: ".$sesid."";
            $new_file = fopen("./internal/sessions/".$sesid.".txt", "w");
            fwrite($new_file, $name);
            fclose($new_file);
        }
    }
    function Logout($session_id)
    {
        if(@!unlink("./internal/sessions/".$session_id.".txt"))
        {
            Unk_Ses_ID();
        }
        else echo "You logout successfully.";
    }
    function Get($sesid)
    {
        if(file_exists("./internal/sessions/".$sesid.".txt"))
        {
            $ses_file = file('./internal/sessions/'.$sesid.'.txt', FILE_IGNORE_NEW_LINES);
            $new_file = file("./internal/data/".$ses_file[0].".txt", FILE_IGNORE_NEW_LINES);
            echo $new_file[0];
        }
        else Unk_Ses_ID();
    }
    function Set($sesid, $text)
    {
        if(file_exists("./internal/sessions/".$sesid.".txt"))
        {
            
            $ses_file = file('./internal/sessions/'.$sesid.'.txt', FILE_IGNORE_NEW_LINES);
            $new_file = fopen("./internal/data/".$ses_file[0].".txt", "w");
            fwrite($new_file, $text);
            fclose($new_file);
            echo "You set text \"".$text."\" successfully.";
        }
        else Unk_Ses_ID();
    }
?>