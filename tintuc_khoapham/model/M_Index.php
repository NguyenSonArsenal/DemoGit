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
				tt.Hinh as HinhTin  
				FROM theloai tl 
				INNER JOIN loaitin lt ON lt.idTheLoai = tl.id 
				INNER JOIN tintuc tt  ON lt.id = tt.idLoaiTin 
				GROUP BY tl.id" ;

		$result = $conn->query($sql);

		$arrayMenu = mysqli_fetch_all($result,MYSQLI_ASSOC);

		return $arrayMenu;

	}

	function getTinTucByIdLoaiTin($idLoaiTin) // $idLoaiTin truyen vao vdu from URL
	{
		$conn = self::connect();

		$sql = "SELECT * FROM tintuc WHERE idLoaiTin = $idLoaiTin";

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

}