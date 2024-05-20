<?php
require 'libs/Validator.php';
header('Content-Type: application/json');


$data = json_decode($_POST['data'],true);
$name = $data['name'];
$color = $data['color'];
$password = $data['password'];
$password2 = $data['password2'];

$valid = new \Dependency\Validator();
$msg = '';

if (!$valid->validName($name)) {
    $msg = "Вы ввели некоректное имя\n";
}

if (!$valid->validPassword($password)){
    $msg.= "Вы ввели некоректный пароль\n";
}

if(!$valid->comparisonPassword($password, $password2) == 0) {
    $msg.= "Пароли не совпадают";
}

echo json_encode(['msg' => $msg]);
