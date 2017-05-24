<?php 

namespace controller;

use model\M_Index;
use view\View;


class C_Index
{
	
	public function index()
	{
		$mIndex = new M_Index();

		$dbSlide = $mIndex->getSileToJson(); // Array
		$dbSlideToJson = json_encode($dbSlide, JSON_UNESCAPED_UNICODE); // Json

		$menuContent = $mIndex->getMenuFromDb();

		return $menuContent;

	}

	function getMenu()
	{
		$mIndex = new M_Index();
		$menu = $mIndex->getMenuFromDb();
		return $menu;
	}

	function getSlide()
	{
		$mIndex = new M_Index();
		$dbSlide = $mIndex->getSileToJson();
		return $dbSlide;
	}

	function loaiTin()
	{
		$idLoaiTin = $_GET['idLoaiTin'];
		$mIndex = new M_Index();
		
		$danhMucTin = $mIndex->getTinTucByIdLoaiTin($idLoaiTin);

		$titleLoaiTin = $mIndex->getTitleById($idLoaiTin);

		return array('danhmuctin' => $danhMucTin, 'titleLoaiTin' => $titleLoaiTin );
	}

	function run()
	{
		$this->index();
		$this->loaiTin();
	}

}
