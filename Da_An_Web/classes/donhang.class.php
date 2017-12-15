<?php
class donhang extends Db{
	private $_page_size =50;//Một trang hiển hị 5 cuốn sách
	private $_page_count;
	public function getRand($n)
	{
		$sql="select masanpham, tensanpham, img from sanpham order by rand() limit 0, $n ";
		return $this->exeQuery($sql);	
	}
	
	public function getByPubliser($manhaxb)
	{
		
	}
	public function delete($masanpham)
	{
		$sql ="delete from hinh where masanpham = :masanpham";
		
		$arr =  Array(":masanpham"=>$masanpham);
		$this->exeNoneQuery($sql, $arr);	
		//echo $sql;
		//print_r($arr);exit;

		$sql="delete from sanpham where masanpham=:masanpham ";
		return $this->exeNoneQuery($sql, $arr);	
	}
	
	public function getDetail($madondathang)
	{
		$sql="SELECT
chitietdondathang.*,
dondathang.*
FROM
chitietdondathang
INNER JOIN dondathang ON chitietdondathang.madondathang = dondathang.madondathang
where dondathang.madondathang=:madondathang";

		$arr = array(":madondathang"=>$madondathang);

		$data = $this->exeQuery($sql, $arr);
		
		if (Count($data)>0) 
		return $data[0];
		else return array();
	}
	
	public function getAlldonhang($currPage=1)
	{
		$sql="SELECT
dondathang.*
FROM
dondathang
				 ";
		return $this->exeQuery($sql);
	}
	public function getAlldonhangmoi($currPage=1)
	{
		$sql="SELECT
dondathang.*
FROM
dondathang
where ngaydathang=CURDATE()";
		return $this->exeQuery($sql);
	}
	public function getAllchitietdonhang($madondathang,$currPage=1)
	{
		$sql="SELECT
chitietdondathang.*
FROM
chitietdondathang where madondathang='$madondathang' ";
		return $this->exeQuery($sql);
	}
	public function getAlldonhangdagiao($currPage=1)
	{
		$sql="SELECT
dondathang.*
FROM
dondathang
WHERE trangthai=1 ";
		return $this->exeQuery($sql);
	}
	public function getAlldonhangdangxl($currPage=1)
	{
		$sql="SELECT
dondathang.*
FROM
dondathang
where trangthai!=1";
		return $this->exeQuery($sql);
	}
	
	
	
	public function count($sql, $arr=array())
	{
		return $this->countItems($sql, $arr);
	}
	
	public function getPageCount()
	{
		return $this->_page_count;	
	}
	
	
	function editdonhang($madondathang,$trangthai){
		$sql="update dondathang set trangthai='$trangthai' where madondathang='$madondathang' ";
		$stm = $this->query($sql);
	}
	
}
?>