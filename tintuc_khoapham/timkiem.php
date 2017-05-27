<?php 

require_once __DIR__ . '/vendor/autoload.php';

use controller\C_Index;


$c_index = new C_Index();

if(isset($_POST['tukhoa']))
{
	$key = $_POST['tukhoa'];

	$tins = $c_index->c_search($key);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div> <b>Tìm thấy <?php echo count($tins) ?></b> tin tức chứa từ khóa  <b><?php echo $key ?></b></div>

	<div class="panel panel-default">

        <?php foreach ($tins as $tin): ?>
        
        <div class="row-item row">
        
            <div class="col-md-3">
            
                <a href="chitiet.php?idTin=<?php echo $tin['id'] ?>&loaitin=<?php echo $tin['TenKhongDau']?>">
                    <br>
                    <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?php echo $tin['Hinh'] ?>" alt="">
                </a>
            </div>
             

            <div class="col-md-9" id="dataSearch">
                <h3><?php echo $tin['TieuDe'] ?></h3>
                <p><?php echo $tin['TomTat'] ?></p>
                <a class="btn btn-primary" href="chitiet.php?idTin=<?php echo $tin['id'] ?>&loaitin=<?php echo $tin['TenKhongDau']?>">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>

          
            <div class="break"></div>
        </div>

        <?php endforeach ?>

        <div class="row text-center">
            <?php //echo $paperHTML ?> 
        </div>
    </div>

</body>
</html>