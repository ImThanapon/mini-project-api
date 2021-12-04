<?php
    require_once '../connect.php'; //เรียกไฟล์ connect
    
    $sql = "SELECT * FROM employees"; 

    $statement = $conn->query($sql); //query ประมวลผลข้อมูลจาก conn ด้วย sql
    3
    iooooook
    .

    // $result = $statement->fetchAll(PDO::FETCH_ASSOC); //ดึงข้อมูลออกไปใช้งานด้วย fetchAll

    // print_r($result);
?>