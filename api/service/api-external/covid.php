<?php

    $get_data = file_get_contents('https://covid19.ddc.moph.go.th/api/Cases/today-cases-all');
    $json_data = json_decode($get_data);
    // echo '<pre>';
    // print_r($json_data);
    // echo '</pre>';
?>