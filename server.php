<?php
require 'vendor/autoload.php';
use Workerman\Worker;

$worker = new Worker("websocket://localhost:8000");

$worker->onWorkerStart = function($connect) {
    echo "New Connection\n";
};


$worker->onMessage = function ($connection, $data) use ($worker) {
    //Перебираем всех подключенных клиентов
    foreach ($worker->connections as $client) {
        //Отправляем каждому подключенному пользователю полученные данные
        $client->send($data);
    }
};

$worker -> onClose = function () {
    echo "Connection close\n";
};

Worker::runAll();