<?php 

namespace includes;
use controller\C_Index;

$index = new C_Index();
$menuLeft = $index->getMenu();
//var_dump($menuLeft);

?>


<div class="col-md-3 ">
    <ul class="list-group" id="menu">

        <li href="#" class="list-group-item menu1 active">
        	Menu
        </li>

        <?php foreach ($menuLeft as $mn): ?>
            
            <li href="#" class="list-group-item menu1">
                <?php echo $mn['Ten'] ?>
            </li>

            <ul>
                <?php $loaitin = explode(',' , $mn['LOAITIN']); // array ?>
                <?php foreach ($loaitin as $lt): ?>
                    <?php list($id, $Ten, $TenKhongDau) = explode(':', $lt); ?>
                        <li class="list-group-item">
                            <a href="loaitin.php?idLoaiTin=<?php echo $id ?>"><?php echo $Ten ?></a>
                        </li>
                <?php endforeach ?>
            </ul>
            
        <?php endforeach ?>
    </ul>
</div>
