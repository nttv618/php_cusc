<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sữa HTTT</h1>
    <?php
    $httt_ma = $_GET['httt_ma'];
     //1.Mở kết nối đến db
     include_once __DIR__ . '/dbconnect.php';
     //2.
     $sql = "SELECT * FROM hinhthucthanhtoan
     WHERE httt_ma = $httt_ma";
     //3.
     $result = mysqli_query($conn,$sql);
     $dataDuLieuCu = [];
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $dataDuLieuCu = array(
                'httt_ma' => $row['httt_ma'],
                'httt_ten' => $row['httt_ten'],
            );
        }
        //echo'<script>location.href = "danhsach-httt.php";</script>';
     ?>
    

    <form name= "frmThemMoi" method ="POST" action="">
        <laleb>Mã HTTT:</laleb>

        <input type ="text" name ="httt_ten" value ="<?= $dataDuLieuCu['httt_ten'] ?>" /> 
        <br />
        <button name="btnLuu">Luu</button>
    </form>

    <?php
    if(isset($_POST['btnLuu'])){
        $httt_ten = $_POST['httt_ten'];
        //1.Mở kết nối đến db
     include_once __DIR__ . '/dbconnect.php';
     //2.
     $sql = "UPDATE hinhthucthanhtoan
     SET 
         httt_ten='$httt_ten'
     WHERE httt_ma = $httt_ma;";
     //3.
     mysqli_query($conn,$sql);
     //4.
     echo'<script>location.href = "danhsach-httt.php";</script>';
    }
    ?>
</body>
</html>