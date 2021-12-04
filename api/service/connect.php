<?php
    //กำหนดตัวแปร
    $servername = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'users_database';
    //ใช้ Try Catch กำหนดการทำงานหลังเกิดข้อผิดพลาด
    try {
        $conn = new PDO("mysql:host={$servername};dbname={$dbname};", $user, $pass); //สร้าง instant ของ PDO ให้สามารถเรียก Mysql ได้
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //กำหนดโหมดการแสดง Error ของ PDO ให้เป็น ERRMODE_EXCEPTION
    } catch (PDOException $err) {
        echo 'เกิดข้อผิดพลาด Error !! : '. $err->getMessage();
    }
?>