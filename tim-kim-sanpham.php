<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/muaban.com/assets\vendors\bootstrap\css\bootstrap.min.css" type="text/css" rel="stylesheet" />
    <style>
        div{
            border:1px solid blue;
        }
    </style>
</head>
<body>
    <h1>Tìm kiếm sản phẩm</h1>
    <form name="frmTimkiem" method ="GET" action="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Kết quả tk</h1>
                <button type="submit" name="btnTimKiem" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                logo
            </div>
            <div class="col-md-9">
                cong ty
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Tên sản phẩm
                    </div>
                    <div class="card-body">
                        <input type="text" name="keywordTenSP"
                            placeholder="Tìm kiếm"
                            class ="form=control"
                        />
                    </div>
                </div>
            </div>
        
            <div class="col-md-7">
                <h5>Kết quả tìm kiếm</h5>
                <?php
                if(isset($_GET['btnTimKiem'])){
                    $keywordTenSP = $_GET['keywordTenSP'];
                    echo 'Tiêu chí tìm kiếm là:' . $keywordTenSP;
                }
                ?>
            </div>
        </div>
    </div>
    </form>
</body>
</html>