<?php 

//require_once (dirname(__DIR__). '/../controller/C_Index.php');

namespace includes;
use controller\C_Index;

$index = new C_Index();
$slide = $index->getSlide();

?>

<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">

                        <?php 
                            for($i=0; $i<count($slide); $i++) {
                                if($i==0){
                                    ?>
                                    <div class="item active">
                                        <img class="slide-image" src="public/image/slide/<?php echo $slide[$i]['Hinh']?>" alt="">
                                    </div>
                                    <?php 
                                }
                                else {
                                    ?>
                                    <div class="item">
                                        <img class="slide-image" src="public/image/slide/<?php echo $slide[$i]['Hinh'] ?>" alt="">
                                    </div>
                                    <?php
                                }
                            }
                        ?>

                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end slide -->


