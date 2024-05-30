<?php
require 'libs/DataBase.php';

$db = new \Dependency\DataBase('localhost', 'bot_user', 'postgres', 'root');
// $result = $database->get('users',array(2));
$tableName = 'users';
$name = 'Grisha';
$password = 'root';
$db->set($tableName, array("name"=>$name, "password"=>$password, "color"=>"green"));

//var_dump($result);
// foreach ($result as $val) {
//     echo $val['name'] . "\n";
//     echo $val['id'] . "\n";
//     echo $val['color'] . "\n";
// }
// $connect = pg_connect("host=localhost dbname=bot_user user=postgres password=root");
// //phpinfo();

// if ($connect == false) {
//     echo "Подключение не сработало\n";
// } else {
//     echo "Подключение сработало\n";
// }
// $array = array(3, 'Name');
// $query = "SELECT * FROM users WHERE id = $1";
// $result = pg_fetch_all(pg_query_params($connect, $query, array(2)));

// //var_dump($result);
//      foreach ($result as $value) {
//          echo $value['id'] . "\n";
//          echo $value['name'] . "\n";
//      }
// //}
