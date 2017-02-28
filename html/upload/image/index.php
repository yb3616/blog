<?php
$t=mktime();
set_time_limit(1000);
$arr = array(
    130,131,132,133,134,135,136,137,138,139,144,147,150,151,152,153,155,156,157,158,159,176,177,178,180,181,182,183,184,185,186,187,188,189
);

$myFile="insert2.sql";
$fhandler=fopen($myFile,'wb');
if($fhandler){
    $sql="INSERT INTO `user2` (`name`,`password`,`create_at`) VALUES ('";
    $i=0;
    while($i<5000000){ //1,000,000
        $tel = $arr[array_rand($arr)].mt_rand(1000,9999).mt_rand(1000,9999);
        $i++;
        fwrite($fhandler,$sql.$tel."','pwd123','".time()."');\n");
    } 
    echo"写入成功,耗时：",mktime()-$t;
}
