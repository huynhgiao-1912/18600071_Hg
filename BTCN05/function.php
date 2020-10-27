<?php
function sum($a, $b )
{
    return $a +$b;
}



function findUserByUsername($username)
{
    $content = file_get_contents('./data');
    $users = unserialize($content);
    if(!empty($users))
    {
        for ($i = 0; $i < sizeof($users); $i++) {
            $user = $users[$i];
            if ($user['username'] == $username) {
                return $user;
            }
            return null;
        }
    }
   
        
    
}

function getCurentUser(){
    if(isset($_SESSION['username'])){
        return findUserByUsername($_SESSION['username']);
    }
    return null;
}