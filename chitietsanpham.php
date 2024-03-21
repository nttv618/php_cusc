<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    include_once __DIR__ . '/layouts/styles.php';
    ?>

    <style>
        .hinh-bu {
            width: 100%;
            border: 5px soild #000;
            margin-bottom : 10px;
        }
        .hinh-nho{
            width: 150px ;
            border: 1px soild #000;

        }
        .gia-tien {
            font-size: 3em;
            color:red;
        }
        .nut-datmua {
            font-size:2em;
        }
    </style>
</head>
<body>
    <?php
    include_once __DIR__ . '/layouts/header.php';
    ?>
    
    <?php
    // 1. Mở kết nối
    include_once __DIR__ . '/dbconnect.php';
    //2. chuẩn bị câu lệnh
    $sp_ma = $_GET['sp_ma'];
    $sqlSanPham = "SELECT * FROM sanpham
                    WHERE sp_ma = $sp_ma;";
    //3. Thực thi
    $resultSanPham = mysqli_query($conn, $sqlSanPham);
    //4. Phân tách
    $dataSanPham = [];
    $dataSanPham = mysqli_fetch_array($resultSanPham, MYSQLI_ASSOC);
    //--------Tìm dữ liệu hình sp
    $sqlHinhSanPham = "SELECT * FROM hinhsanpham
                        WHERE sp_ma = $sp_ma;";
    //Thực thi
    $resultHinhSanPham = mysqli_query($conn, $sqlHinhSanPham);
    //Phân tách
    $dataHinhSanPham = [];
    while($row = mysqli_fetch_array($resultHinhSanPham , MYSQLI_ASSOC)){
        $dataHinhSanPham[] = array(
            'hsp_ma' => $row['hsp_ma'],
            'hsp_tentaptin' => $row['hsp_tentaptin'],
            'sp_ma' => $row['sp_ma'],
        );
    }
    //var_dump($dataSanPham);
    //var_dump($dataHinhSanPham);
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                Danh sách sản phẩm
            </div>
        <div class="row">
            <div class="col-md-8">
                <?php if(empty($dataHinhSanPham)): ?>
                    <img src="/muaban.com/assets/img/default-thumbnail.jpg" class="hinh-bu"/>
                <?php else: ?>
                    <?php foreach($dataHinhSanPham as $index => $hsp): ?>
                        <?php if($index == 0): ?>
                            <img src="/muaban.com/assets/uploads/<?= $hsp['hsp_tentaptin'] ?>" class="hinh-bu"/>
                        <?php else: ?>
                            <img src="/muaban.com/assets/uploads/<?= $hsp['hsp_tentaptin'] ?>" class="hinh-nho"/>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
            <div class="col-md-4">
                <form name="frmSanPham" method="post" action="luugiohang.php">
                    <input type="hidden" name="sp_ma" value="<?= $dataSanPham["sp_ma"] ?>"/>
                    <input type="hidden" name="sp_ten" value="<?= $dataSanPham["sp_ten"] ?>"/>
                    <input type="hidden" name="sp_gia" value="<?= $dataSanPham["sp_gia"] ?>"/>

                    <?php if(empty($dataHinhSanPham)): ?>
                        <input type="hidden" name="sp_hinhdaidien" value="/muaban.com/assets/img/default-thumbnail.jpg"/>
                    <?php else: ?>
                        <?php foreach($dataHinhSanPham as $index => $hsp): ?>
                            <?php if($index == 0): ?>
                                <input type="hidden" name="sp_hinhdaidien" value="/muaban.com/assets/uploads/<?= $hsp['hsp_tentaptin'] ?>"/>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <h1><?= $dataSanPham['sp_ten'] ?></h1>
                    <p>
                        <?= $dataSanPham['sp_mota_ngan'] ?>
                    </p>
                    <p>
                        <input type="number" name="sp_dh_soluong"/><br/>
                        <?php if($dataSanPham['sp_giacu'] != $dataSanPham['sp_gia']):  ?>
                            <del><span class="text-muted" style="font-size: 0.8rem;">
                                <?= number_format($dataSanPham['sp_giacu'], 0, ',', '.') ?></span>
                            </del>
                        <?php endif; ?>
                        
                        <span class="gia-tien"><b><?= number_format($dataSanPham['sp_gia'], 0, ',', '.') ?></b></span>
                        
                    </p>
                    <button name="btnDatMua"  class="btn btn-primary nut-datmua">Đặt mua</button>
                </form>
            </div>
        </div>    
        <div class="row">
            <div class="col-md-12">
                <h2>Mô tả chi tiết Sản Phẩm</h2>
                <p><?= $dataSanPham['sp_mota_chitiet'] ?></p>
            </div>
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