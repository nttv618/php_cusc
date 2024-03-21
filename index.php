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
    // 1. Mở kết nối
    include_once __DIR__ . '/dbconnect.php';
    //2. chuẩn bị câu lệnh
    $sql = "SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota_ngan, 
        MAX(hsp.hsp_tentaptin) AS hsp_tentaptin
    FROM sanpham sp
    LEFT JOIN hinhsanpham hsp ON hsp.sp_ma = sp.sp_ma
    GROUP BY sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota_ngan";
    //3. Thực thi
    $result = mysqli_query($conn, $sql);
    //4. Phân tách dl
    $dataSanPham = [];
    while ($row = mysqli_fetch_array($result , MYSQLI_ASSOC)){
        $dataSanPham[] = array(
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
            'sp_giacu' => $row['sp_giacu'],
            'sp_mota_ngan' => $row['sp_mota_ngan'],
            'hsp_tentaptin' => $row['hsp_tentaptin'],
            
        );
    }
    //var_dump($dataSanPham);
    ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="/muaban.com/assets/img/Artboard_13.png" class="carousel-img" alt="...">
        </div>
        <div class="carousel-item">
        <img src="/muaban.com/assets/img/1200-400-max-eximbank.webp" class="carousel-img" alt="...">
        </div>
        <div class="carousel-item">
        <img src="/muaban.com/assets/img/oppo-a18_mobi_71_1200.png.webp" class="carousel-img" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="content-title">SẢN PHẨM NỔI BẬT</h3>
            </div>
            
        </div>
        <div class="row">
            <?php foreach($dataSanPham as $sp): ?>
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                <?php if(!empty($sp['hsp_tentaptin'])): ?>
                    <img src="/muaban.com/assets/uploads/<?= $sp['hsp_tentaptin'] ?>" class="card-img-top" alt="...">
                <?php else: ?>
                    <img src="/muaban.com/assets/img/default-thumbnail.jpg" class="card-img-top" alt="...">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $sp['sp_ten'] ?></h5>
                    <p class="card-text"><?= $sp['sp_mota_ngan'] ?></p>
                    <p>
                        <?php if($sp['sp_giacu'] != $sp['sp_gia']):  ?>
                            <del><span class="text-muted" style="font-size: 0.8rem;">
                                <?= number_format($sp['sp_giacu'], 0, ',', '.') ?></span>
                            </del>
                            <?php endif; ?>
                        <b><?= number_format($sp['sp_gia'], 0, ',', '.') ?></b>
                    </p>
                    <a href="chitietsanpham.php?sp_ma=<?= $sp['sp_ma'] ?>" class="btn btn-primary">Xem chi tiết</a>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
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