<?php
$db['host'] = "121.78.124.233";
$db['db'] = "arte365";
$db['user'] = "arte365";
$db['pass'] = "arte0530!(";
$db['port'] = "3306";

// Create connection
$conn = new mysqli($db['host'], $db['user'], $db['pass'], $db['db']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$_POST['p'] = '2815';

if($_POST['p'] == '') {
    echo "post id 가 존재 하지 않습니다.";
    exit;
}

$result = $conn->query("SELECT COUNT(*) FROM wp_ulike_meta WHERE item_id='{$_POST['p']}'");
while ($row = mysqli_fetch_array($result)){
    $in_check = $row[0];
}

if($in_check >= 1){
    $query = "update wp_ulike_meta SET meta_value = meta_value+1 where item_id ='{$_POST['p']}'";
}else{
    $query = "INSERT INTO wp_ulike_meta (item_id, meta_group, meta_key, meta_value) VALUES ('{$_POST['p']}', 'post', 'count_distinct_like', '1')";
}

if ($conn->query($query) === TRUE) {
    echo "successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
