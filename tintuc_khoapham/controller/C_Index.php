<?php 

namespace controller;

use model\M_Index;
use model\Pagination;
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
		
		$danhMucTin = $mIndex->getTinTucByIdLoaiTin($idLoaiTin);//array
		//var_dump(count($danhMucTin));die;

		$titleLoaiTin = $mIndex->getTitleById($idLoaiTin);

		// Phan trang
		$pageCurrent = isset($_GET['page']) ? $_GET['page'] : 1;

		$paper = new Pagination( count($danhMucTin), $pageCurrent, 4, 4 );

		// call thanh paper
		$paperHTML = $paper->showPagination(); 

		$limit = $paper->_nItemOnPage;
		$vitri = ($pageCurrent -1 )*$limit;

		$danhMucTin = $mIndex->getTinTucByIdLoaiTin($idLoaiTin, $vitri, $limit );

		return array('danhmuctin' => $danhMucTin, 
					 'titleLoaiTin' => $titleLoaiTin, 
					 'paperHTML' => $paperHTML );
	}


	function tinChiTiet()
	{
		$idTin = $_GET['idTin'];
		$mIndex = new M_Index();

		$tinChiTiet = $mIndex->getTinChiTiet($idTin);

		$comment = $mIndex->getComment($idTin);

		return array('tinChiTiet' => $tinChiTiet, 'comment' => $comment );
	}

	function relatedNews()
	{
		$loaitin = $_GET['loaitin'];
		$mIndex = new M_Index();

		$relatedNews = $mIndex->getRelatedNews($loaitin);

		return array('relatedNews' => $relatedNews);
	}

	function tinNoiBat()
	{
		$mIndex = new M_Index();

		$tinNoiBat = $mIndex->getTinNoiBat();

		return array('tinNoiBat' => $tinNoiBat);
	}

	function comment($id_user, $id_tin, $noidung)
	{
		$mIndex = new M_Index();

		$comment = $mIndex->addComment($id_user, $id_tin, $noidung);

		var_dump($comment);

		header('Location:'.$_SERVER['HTTP_REFERER']);
	}

	function c_search($key)
	{
		$mIndex = new M_Index();

		$tin = $mIndex->search($key);

		return $tin;
	}

	

	function run()
	{
		$this->index();
		$this->loaiTin();
	}

}
