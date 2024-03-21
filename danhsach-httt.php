<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Các hình thức thanh toán hỗ trợ</h1>
    <?php
    //1.Mở kết nối đến db
    include_once __DIR__ . '/dbconnect.php';
    //2.Chuẩn bị câu lênh sql
    $sql = "SELECT * FROM hinhthucthanhtoan;";
    //3. Nhờ PHP thực hiện câu lệnh
    $result = mysqli_query($conn,$sql);
    //4. Bocs tách dl
    $data = [];
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[] = array(
            'httt_ma' => $row['httt_ma'],
            'httt_ten' => $row['httt_ten'],
        );
    }
    ?>
    <a href="themmoi-httt.php">Thêm mới</a>
    <table border="1">
        <tr>
            <th>Mã hình thức thanh toán</th>
            <th>Tên hình thức thanh toán</th>
            <th>Hành động</th>
        </tr>
        <?php foreach($data as $ht):?>
            <tr>
                <td><?= $ht['httt_ma'] ?></td>
                <td><?= $ht['httt_ten'] ?></td>
                <td>
                    <a href="sua-httt.php?httt_ma=<?=$ht['httt_ma']?>">Sửa</a>
                    <a href="xoa-httt.php?httt_ma=<?=$ht['httt_ma']?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>