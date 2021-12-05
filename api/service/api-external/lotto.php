<?php
    $get_data = file_get_contents('https://lotto.api.rayriffy.com/latest');
    $json_data = json_decode($get_data);
    echo '<pre>';
    print_r($json_data);
    echo '</pre>';
?>