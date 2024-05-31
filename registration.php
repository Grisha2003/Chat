<?php
require 'libs/Validator.php';
require 'libs/DataBase.php';
header('Content-Type: application/json');


$data = json_decode($_POST['data'],true);
$name = $data['name'];
$color = $data['color'];
$password1 = $data['password'];
$password2 = $data['password2'];

$valid = new \Dependency\Validator();
$msg = $valid->valid($name, $password1, $password2);

$password1 = $valid->cryptPassword($password1);

$result = 1;
if ($msg !== '') {
    $result = $msg;
}

$host = 'localhost';
$dbName = 'bot_user';
$user = 'postgres';
$passwordDb = 'root';
$tableName = 'users';
$token = md5(serialize(random_bytes(16)));

$db = new \Dependency\DataBase('localhost', 'bot_user', 'postgres', 'root');
$db->set($tableName, array($name, $password1, $color, $token));

echo json_encode(array('token'=>$token, 'result'=>$result));
