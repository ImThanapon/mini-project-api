<?php
    require_once '../connect.php'; //เรียกไฟล์ connect
    
    $sql = "SELECT * FROM employees"; 

    $statement = $conn->query($sql); //query ประมวลผลข้อมูลจาก conn ด้วย sql
    $statement->execute(); //ทำการดึงข้อมูล

    $result = $statement->fetchAll(PDO::FETCH_ASSOC); //ดึงข้อมูลออกไปใช้งานด้วย fetchAll

    echo '<pre>';
    print_r($result);
    echo '</pre>';
?>