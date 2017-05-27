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

            <div class="col-md-9" id="dataSearch">
                <div class="panel panel-default">

                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>
                            <?php foreach ($titleLoaiTin as $ttLoaiTin): ?>
                                <?php echo $ttLoaiTin['Ten'] ?>
                            <?php endforeach ?>
                        </b></h4>
                    </div>

                    <?php foreach ($tins as $tin): ?>
                    
                    <div class="row-item row" >
                    
                        <div class="col-md-3">
                        
                            <a href="chitiet.php?loaitin=<?php echo $tin['TenKhongDau']?>&alias=<?php echo $tin['TieuDeKhongDau']?>&idTin=<?php echo $tin['id'] ?>">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?php echo $tin['Hinh'] ?>" alt="name image">
                            </a>
                        </div>
                         

                        <div class="col-md-9" >
                            <h3><?php echo $tin['TieuDe'] ?></h3>
                            <p><?php echo $tin['TomTat'] ?></p>
                            <a class="btn btn-primary" href="chitiet.php?loaitin=<?php echo $tin['TenKhongDau']?>&alias=<?php echo $tin['TieuDeKhongDau']?>&idTin=<?php echo $tin['id'] ?>">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
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

    <!-- Footer -->
    <hr>
    <footer>
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; Your Website 5/2017 by Json </p>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/my.js"></script>

    <script>
    
        $(function() {
            $('.demo').click(function(){
                
                var keyword = $('#txtSearch').val();
                console.log(keyword);

                $.post(
                    'timkiem.php', 
                    {tukhoa:keyword}, 
                    function(data){
                        //alert('try aleart');
                        $('#dataSearch').html(data);
                    }
                );

            });
        });

    </script>

</body>

</html>

