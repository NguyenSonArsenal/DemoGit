<?php 

require_once __DIR__ . '/vendor/autoload.php';

use controller\C_Index;

$c_index = new C_Index();
$menuContent = $c_index->index();

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once('public/includes/header.php'); ?> 

    <title> Khoa Pham</title>

</head>

<body>

   
    <?php require_once('public/includes/navbar.php'); ?>

    <!-- Page Content -->
    <div class="container">

    	<?php require_once('public/includes/slide.php'); ?>

        <div class="space20"></div>

        <div class="row main-left">
            
            <?php require_once('public/includes/menuLeft.php'); ?>

            <div class="col-md-9">
	            <div class="panel panel-default">
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
					    <div class="row-item row">
                            <?php foreach ($menuContent as $mn): ?>
    		                	<h3>
                                    <?php //var_dump($mn);die; ?>
                                    <a href="#"><?php echo $mn['Ten'] ?></a> |
    		                		
                                    <?php $loaitin = explode(',' , $mn['LOAITIN']); // array ?>

                                    <?php foreach ($loaitin as $lt): ?>
                                        <?php list($id, $Ten, $TenKhongDau) = explode(':', $lt); ?> 
                                        <small><a href="loaitin.php?idLoaiTin=<?php echo $id ?>"><i>
                                            <?php echo $Ten ?>         
                                        </i></a>/</small>
                                    <?php endforeach ?>            
    		                	</h3>

    		                	<div class="col-md-12 border-right">
    		                		<div class="col-md-3">
    			                        <a href="chitiet.html">
    			                            <img class="img-responsive" src="public/image/tintuc/<?php echo $mn['HinhTin'] ?>" alt="">
    			                        </a>
    			                    </div>
    			                    <div class="col-md-9">
    			                        <h3><?php echo $mn['TieuDeTin'] ?></h3>
    			                        <p><?php echo $mn['TomTatTin'] ?></p>
    			                        <a class="btn btn-primary" href="chitiet.html">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
    								</div>
    		                	</div>
							    <div class="break"></div>
                            <?php endforeach ?>
		                </div>
					</div>

	            </div> <!-- end div panel -->

        	</div><!-- end col-9 -->
        
        </div>
        <!-- end row -->
    </div>
    <!-- end Page Content -->


<?php require_once('public/includes/footer.php'); ?>