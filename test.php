<?php

$connect = pg_connect("host=localhost dbname=bot_user user=postgres password=root");
//phpinfo();

if ($connect == false) {
    echo "Подключение не сработало\n";
} else {
    echo "Подключение сработало\n";
}
$array = array(3, 'Name');
$query = "SELECT * FROM users";
$result = pg_fetch_all(pg_query($connect, $query));
// //var_dump($result);
// //print_r($result);
// while($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
//     foreach ($line as $value) {
//         echo $value . "\n";
//     }
// }
// while ($result) {
    foreach ($result as $value) {
        echo $value['id'] . "\n";
        echo $value['name'] . "\n";
    }
//}
