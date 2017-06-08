<?php
    require_once ("./utils/errors.php");
    function isUser($name, $pass)
    {
        $user_arr = file('./internal/available-users.txt', FILE_IGNORE_NEW_LINES);
        foreach($user_arr as $id => $n)
        {
            $user = split("!", $n);
            if($user[0] == $name)
            {
                if($user[1] == $pass)
                {
                    return true;
                }
                Wrong_pass();
                return false;
            }
        }
        Unk_User($name);
        return false;
    }
?>