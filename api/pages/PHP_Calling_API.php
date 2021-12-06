<!-- แบบ cURL -->
<?php

    $url = 'http://localhost/DEENA/PDO-CRUD/service/category/'; 
    try{
        $ch = curl_init(); 
        // curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false); 
        // curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET'); // กำหนด Method เป็น GET
        curl_setopt( $ch, CURLOPT_URL, $url );  // กำหนด url ของ api
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true); // กำหนด True คือ response ค่ากลับมาเป็น String ซึ่งเราจะนำไปแปลงเป็น JSON อีกที
        $content = curl_exec( $ch );
        curl_close($ch);
        $data = json_decode($content);
        print_r($data);
        
    }catch(Exception $ex){
        echo $ex;
    }
    
?>
<!-- แบบ file_get_contents() -->
<?php
    $get_data = file_get_contents('https://lotto.api.rayriffy.com/latest');
    $json_data = json_decode($get_data);
    echo '<pre>';
    print_r($json_data);
    echo '</pre>';
?>


<!-- แบบ Guzzle อาศัย composer -->
<!-- แบบ SDKs เป็น Library PHP -->