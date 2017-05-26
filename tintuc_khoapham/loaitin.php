<?php 

require_once __DIR__ . '/vendor/autoload.php';

use controller\C_Index;

$c_index = new C_Index();

$menuContent = $c_index->index();

 // var_dump($menuContent);die;

$loaitins = $c_index->loaiTin(); // array

$tins = $loaitins['danhmuctin']; // array

//var_dump($tins);die;

$titleLoaiTin =  $loaitins['titleLoaiTin']; // array

$paperHTML = $loaitins['paperHTML']; // string

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once('public/includes/header.php'); ?> 
    <title> Loai Tin</title>

</head>

<body>

    <!-- Navigation -->
    <?php require_once('public/includes/navbar.php'); ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <?php require_once('public/includes/menuLeft.php'); ?>

            <div class="col-md-9">
                <div class="panel panel-default">

                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>
                            <?php foreach ($titleLoaiTin as $ttLoaiTin): ?>
                                <?php echo $ttLoaiTin['Ten'] ?>
                            <?php endforeach ?>
                        </b></h4>
                    </div>

                    <?php foreach ($tins as $tin): ?>
                    
                    <div class="row-item row">
                    
                        <div class="col-md-3">
                        
                            <a href="chitiet.php?idTin=<?php echo $tin['id'] ?>&loaitin=<?php echo $tin['TenKhongDau']?>">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?php echo $tin['Hinh'] ?>" alt="">
                            </a>
                        </div>
                         

                        <div class="col-md-9">
                            <h3><?php echo $tin['TieuDe'] ?></h3>
                            <p><?php echo $tin['TomTat'] ?></p>
                            <a class="btn btn-primary" href="chitiet.php?idTin=<?php echo $tin['id'] ?>&loaitin=<?php echo $tin['TenKhongDau']?>">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>

                      
                        <div class="break"></div>
                    </div>

                    <?php endforeach ?>

                    <div class="row text-center">
                        <?php echo $paperHTML ?> 
                    </div>

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->

<?php require_once('public/includes/footer.php'); ?>
