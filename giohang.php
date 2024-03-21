<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    include_once __DIR__ . '/layouts/styles.php';
    ?>

       
</head>
<body>
    <?php
    include_once __DIR__ . '/layouts/header.php';
    ?>
    
    <?php
    $giohang = [];
    if(isset($_SESSION['giohangData'])) {
        $giohang = $_SESSION['giohangData'];
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Gio hang</h2>
                <?php if(empty($giohang)): ?>
                    <h3>Giỏ hàng rỗng</h3>
                    Vui lòng
                    <a href="index.php">Click vào đây</a> để mua sản phẩm.
                <?php else: ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; $tongthanhtien = 0; ?>
                            <?php foreach($giohang as $sp): ?>
                                <tr>
                                    <td><?= $stt ?></td>
                                    <td>
                                        <img src="<?= $sp['sp_hinhdaidien'] ?>" class="img-fluid" width ="200px" heigh="200px"/>
                                    </td>
                                    <td><?= $sp['sp_ten'] ?></td>
                                    <td style="text-align:right;"><?= $sp['sp_dh_soluong'] ?></td>
                                    <td style="text-align:right;"><?= number_format($sp['sp_gia'], 0, ',', '.') ?></td>
                                    <td style="text-align:right;"> <?= number_format($sp['sp_gia'] * $sp['sp_dh_soluong'], 0, ',', '.') ?></td>
                                </tr>
                                <?php
                                $stt++;
                                $tongthanhtien += ($sp['sp_gia'] * $sp['sp_dh_soluong'])
                                ?>
                                <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align:right;"><?= number_format($tongthanhtien, 0, ',', '.') ?></td>
                            </tr>
                        </tfoot>
                    </table>
                <?php endif; ?>
                <a href="index.php" class="btn btn-outline-primary">Tiếp tục mua sắm</a>
                <a href="thanhtoan.php" class="btn btn-primary">Tiến hành thanh toán (checkout)</a>
            </div>
          
        
    </div>
    <?php
    include_once __DIR__ . '/layouts/footer.php';
    ?>

    <?php
    include_once __DIR__ . '/layouts/scripts.php';
    ?>

</body>
</html>