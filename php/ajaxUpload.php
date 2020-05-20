<?php


$rawData = $_POST['imgBase64'];
print $rawData;
$filteredData = explode(',', $rawData);
$unencoded = base64_decode($filteredData[1]);
$datime = date("Y-m-d-H.i.s", time() ) ; # - 3600*7
$username  = $_POST['username'] ;
// name & save the image file
$fp = fopen('../img/snapshots/'.$datime.'-'.$user_id.'.png', 'w');
fwrite($fp, $unencoded);
fclose($fp);
// if(isset($_POST['data']))
// {
//     echo "hello " . $_GET['data'];
    
// };
// echo"test";
?>