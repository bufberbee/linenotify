<?

define('LINE_API',"https://notify-api.line.me/api/notify");
 
$token = "Z43QK0SbolEw4jp1bV9WbjPnQmGTQZH7TfaqSQ1UxR5"; //ใส่Token ที่copy เอาไว้
$str     = 'คำขอรับหนังสืออนุญาตการขนย้าย ข้าวโพดเลี้ยงสัตว์ ได้รับการอนุมัติแล้ว';
$str     .= '1. ผู้ขออนุญาตขนย้ายข้าวโพดเลี้ยงสัตว์ : ทดสอบ ข้าวโพดเลี้ยงสัตว์_1 ';
$str     .= '2. ผู้รับปลายทางข้าวโพดเลี้ยงสัตว์ (ชื่อ/ที่อยู่/โทรศัพท์)  : ทดสอบ ข้าวโพดเลี้ยงสัตว์_5 ';
 
$res = notify_message($str,$token);
print_r($res);
function notify_message($message,$token){
 $queryData = array('message' => $message);
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array( 
         'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res = json_decode($result);
 //print_r($headerOptions);
 return $res;
}


?>