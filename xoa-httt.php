<?php
    //Thu thập thông tin người dùng
    $httt_ma = $_GET['httt_ma'];
     //1.Mở kết nối đến db
     include_once __DIR__ . '/dbconnect.php';
     //2.
     $sql = "DELETE FROM hinhthucthanhtoan
     WHERE httt_ma = $httt_ma";
     $result = mysqli_query($conn,$sql);
     echo'<script>location.href = "danhsach-httt.php";</script>';
?>