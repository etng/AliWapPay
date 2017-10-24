<?php
include_once 'AliWapPay.class.php';
$config = include(dirname(__file__) . '/config.php');
$wap_pay = new AliWapPay($config);
if(!empty($_GET['mock']) && file_exists('mock.php')){
    error_log('loaded mock data');
    $_GET = include('mock.php');
}
$s = $wap_pay->check($_GET);
file_put_contents('AliWapPay.log', 'return result is: '. var_export($s, true), FILE_APPEND|LOCK_EX);
if($s){
    echo '验证成功';
    //订单处理
}else{
    echo '验签失败';
}
