<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thêm mới HTTT</h1>
    <form name= "frmThemMoi" method ="POST" action="">
        <laleb>Mã HTTT:</laleb>
        <input type ="text" name ="httt_ten" /> <br />
        <button name="btnLuu">Luu</button>
    </form>

    <?php
    if(isset($_POST['btnLuu'])){
        $httt_ten = $_POST['httt_ten'];
        //1.Mở kết nối đến db
        include_once __DIR__ . '/dbconnect.php';
        //2.
        $sql = "INSERT INTO hinhthucthanhtoan (httt_ten)
        VALUE ('$httt_ten');";
        mysqli_query($conn,$sql);
        echo'<script>location.href = "danhsach-httt.php";</script>';
    }
    ?>
</body>
</html>