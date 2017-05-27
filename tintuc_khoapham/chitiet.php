<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once('public/includes/header.php'); ?> 
    <title> Chi Tiet Tin</title>

</head>



<?php 

//session_start();
require_once __DIR__ . '/vendor/autoload.php';

use controller\C_Index;

$c_index = new C_Index();
$tinChiTiet = $c_index->tinChiTiet();

$tin = $tinChiTiet['tinChiTiet'][0];


$comment = $tinChiTiet['comment'];

$relatedNews = $c_index->relatedNews();
$relatedNew  = $relatedNews['relatedNews'];

$tinNoiBats = $c_index->tinNoiBat();
$tinNoiBat = $tinNoiBats['tinNoiBat'];

if(isset($_POST['binhluan']))
{
    if(isset($_SESSION['id_user']))
    {
        echo 123;
        $id_user = $_SESSION['id_user'];
        echo $id_user ;
        $id_tin  = $_POST['id_tin'];
        $noidung = $_POST['noidung'];

        $comment = $c_index->comment($id_user, $id_tin, $noidung);
    } 
    else {
        $_SESSION['chua_dang_nhap'] = "Vui lòng đăng nhập để thêm bình luận";
    }
}


//var_dump($tinNoiBat);

?>




<body>

    <!-- Navigation -->
    <?php require_once('public/includes/navbar.php'); ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $tin['TieuDe'] ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Admin</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="public/image/tintuc/<?php echo $tin['Hinh'] ?>" alt="name img">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $tin['created_at'] ?></p>
                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $tin['TomTat'] ?></p>
                <p><?php echo $tin['NoiDung'] ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <?php if (isset($_SESSION['chua_dang_nhap'])): ?>
                    <div class="alert-danger alert"><?php echo $_SESSION['chua_dang_nhap']; ?></div>
                <?php endif ?>

                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" action="" method="POST">
                        <input type="hidden" name="id_tin" value="<?php echo $tin['id'] ?>">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="noidung"></textarea>
                        </div>
                        <button type="submit" name="binhluan" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php foreach ($comment as $cmt): ?>
                    <?php //var_dump($cmt);die; ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <small><?php echo $cmt['created_at'] ?></small>
                        </h4>
                        <?php echo $cmt['NoiDung'] ?>
                    </div>
                </div>
                <?php endforeach ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                        <?php foreach ($relatedNew as $rlt): ?>
                            <?php //var_dump($rlt);die; ?>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="chitiet.php?loaitin=<?php echo $rlt['TenKhongDau']?>&alias=<?php echo $rlt['TieuDeKhongDau'] ?>&idTin=<?php echo $rlt['id']?>">
                                        <img class="img-responsive" src="public/image/tintuc/<?php echo $rlt['Hinh'] ?>" alt="name image">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="chitiet.php?loaitin=<?php echo $rlt['TenKhongDau']?>&alias=<?php echo $rlt['TieuDeKhongDau'] ?>&idTin=<?php echo $rlt['id']?>"><b><?php echo $rlt['TieuDe'] ?></b></a>
                                </div>
                                <p><?php //echo $rlt['TomTat'] ?></p>
                                <div class="break"></div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">

                        <div class="row" style="margin-top: 10px;">
                        <?php foreach ($tinNoiBat as $tnb): ?>
                            <?php //foreach ($relatedNew as $rlt): ?>
                                
                            
                            <div class="col-md-5">
                                <a href="chitiet.php?loaitin=<?php echo $tnb['TenKhongDau'] ?>&alias=<?php echo $tnb['TieuDeKhongDau'] ?>&idTin=<?php echo $tnb['id']?>">
                                    <img class="img-responsive" src="public/image/tintuc/<?php echo $tnb['Hinh'] ?>" alt="name image">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="chitiet.php?loaitin=<?php echo $tnb['TenKhongDau'] ?>&alias=<?php echo $tnb['TieuDeKhongDau'] ?>&idTin=<?php echo $tnb['id']?>"><b><?php echo $tnb['TieuDe'] ?></b></a>
                            </div>
                            <div class="break"></div>
                            <?php //endforeach ?>
                        <?php endforeach ?>
                        </div>

                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

<?php require_once('public/includes/footer.php'); ?>
