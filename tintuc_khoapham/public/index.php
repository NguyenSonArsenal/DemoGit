<?php 

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/twig/twig/lib/Twig/Autoloader.php';

use controller\C_Index;
use model\M_Index;

// $xx = new M_Index();
// $xx->getTinTucByidLoaiTin(1);

$obj = new C_Index();
$obj->run();

?>


