<?php
//$file = file_get_contents('./data');
//var_dump($file);
$huynhgiao = array(
    'username' => 'hhg',
    'password' => '123456'
);

$nva = array(
    'username' => 'nva',
    'password' => '123456'
);
$users = array($huynhgiao,$nva);


file_put_contents('./data',serialize($users));
//var_dump(unserialize(file_get_contents('./data')));