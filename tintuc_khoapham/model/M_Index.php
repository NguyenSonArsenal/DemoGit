<?php 

namespace model;
use model\Database;

class M_Index extends Database
{

	public function getSileToJson()
	{
		$dbSlide = self::getDBToJson('slide');
		return $dbSlide;
	}

	function getMenuFromDb()
	{
		$conn = self::connect();

		$sql = "SELECT tl.*, GROUP_CONCAT(DISTINCT lt.id,':', lt.Ten,':', lt.TenKhongDau) as LOAITIN,
				tt.TieuDe as TieuDeTin, tt.TieuDeKhongDau as TieuDeTinKhongDau, tt.TomTat as TomTatTin, 
				tt.Hinh as HinhTin, tt.id as idTin  
				FROM theloai tl 
				INNER JOIN loaitin lt ON lt.idTheLoai = tl.id 
				INNER JOIN tintuc tt  ON lt.id = tt.idLoaiTin 
				GROUP BY tl.id" ;

		$result = $conn->query($sql);

		$arrayMenu = mysqli_fetch_all($result,MYSQLI_ASSOC);

		return $arrayMenu;

	}

	function getTinTucByIdLoaiTin($idLoaiTin, $vitri = -1, $limit = -1) // $idLoaiTin truyen vao vdu from URL
	{
		$conn = self::connect();

		//$sql = "SELECT * FROM tintuc WHERE idLoaiTin = $idLoaiTin";
		$sql = "SELECT tt.*, lt.TenKhongDau as TenKhongDau FROM tintuc tt INNER JOIN loaitin lt ON tt.idLoaiTin = lt.id WHERE idLoaiTin = $idLoaiTin";

		if($vitri>-1 && $limit>1)
		{
			$sql .= " limit $vitri,$limit";
		}

		$result = $conn->query($sql);

		$arrayLoaiTin = mysqli_fetch_all($result,MYSQLI_ASSOC);

		return $arrayLoaiTin;

	}

	function getTitleById($idLoaiTin)
	{
		$conn = self::connect();

		$sql = "SELECT Ten FROM loaitin WHERE id = $idLoaiTin";

		$result = $conn->query($sql);

		$arrayLoaiTin = mysqli_fetch_all($result,MYSQLI_ASSOC);

		return $arrayLoaiTin;
	}

	function getTinChiTiet($idTin)
	{
		$conn = self::connect();

		$sql = "SELECT * FROM tintuc WHERE id = $idTin";

		$result = $conn->query($sql);

		$arrayTinChiTiet = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $arrayTinChiTiet;
	}

	function getComment($idTin)
	{
		$conn = self::connect();

		$sql = "SELECT * FROM comment WHERE idTinTuc = $idTin ";

		$result = $conn->query($sql);

		$arrayComment = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $arrayComment;
	}

	function getRelatedNews($alias)
	{
		$conn = self::connect();

		$sql = "SELECT tt.*, lt.TenKhongDau as TenKhongDau, lt.id as idLoaiTin FROM tintuc tt INNER JOIN loaitin lt ON lt.id = tt.idLoaiTin
				WHERE lt.TenKhongDau = '$alias' limit 0,5";

		$result = $conn->query($sql);

		$arrayRelatedNews = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $arrayRelatedNews;
	}

	function getTinNoiBat()
	{
		$conn = self::connect();

		$sql = "SELECT tt.*, lt.TenKhongDau as TenKhongDau, lt.id as idLoaiTin FROM tintuc tt INNER JOIN loaitin lt ON lt.id = tt.idLoaiTin
				WHERE tt.NoiBat = 1 limit 0,5";

		$result = $conn->query($sql);

		$arrayTinNoiBat = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $arrayTinNoiBat;
	}



}