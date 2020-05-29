<?php 
class Donthuoc extends Database {
public function md_kqsearchbnadddonthuoc($name){
	$this->conn= parent::connect();
		$sql= "SELECT * from benhnhan WHERE phone like '%".$name."%' OR cmnd like '%".$name."%' ORDER BY id DESC LIMIT 5";
		parent::query($sql);
		return parent::selectall_cf();
}	

public function md_kqnhaptenthuoc($name){
	$this->conn= parent::connect();
		$sql= "SELECT * from dichvucon WHERE name like '%".$name."%' AND (id_dichvu = '4' OR id_dichvu='3') LIMIT 20";
		parent::query($sql);
		return parent::selectall_cf();
}	

public function md_selectdichvu($i){
	$this->conn= parent::connect();
		$sql= "SELECT * from dichvucon WHERE id_dichvu='".$i."'";
		parent::query($sql);
		return parent::selectall_cf();
}

public function md_adddonthuoc($name, $ghichu, $taikham, $id_benhnhan, $id_nhanvien, $date, $uudaitongdon, $dichvu, $donmau,$thuoc, $count){
	$this->conn= parent::connect();
	
	$sql = "INSERT INTO donkham (id, name, ghichu, taikham, id_benhnhan, id_nhanvien, ngaykedon, uudaitongdon, uudaidichvu, donmau, id_dichvucon, giadichvu)VALUES(NULL, '".$name."', '".$ghichu."', '".$taikham."', '".$id_benhnhan."', '".$id_nhanvien."', '".$date."', '".$uudaitongdon."',(SELECT A.uudai FROM dichvu A inner join dichvucon B on A.id = B.id_dichvu WHERE B.id='".$dichvu."'), '".$donmau."' ,'".$dichvu."',(SELECT (B.giacuoi*(100-A.uudai)/100) as kquddivhu FROM dichvu A inner join dichvucon B on A.id = B.id_dichvu WHERE B.id='".$dichvu."'));";
	parent::query($sql);

	if (count($thuoc)!=0) {
		foreach ($thuoc as $value) {
			$sql =" INSERT INTO thuoc_donkham (id, id_donkham, id_thuoc, soluong, dongia) VALUES (NULL, (SELECT A.id FROM donkham A WHERE A.id_benhnhan = '".$id_benhnhan."' AND A.ngaykedon = '".$date."'), '".$value."', '".$count[$value]."', (SELECT B.giacuoi FROM dichvucon B WHERE B.id = '".$value."'));";

			parent::query($sql);

			$sql = "UPDATE dichvucon SET soluong = (SELECT soluong FROM dichvucon WHERE id='".$value."')-'".$count[$value]."' WHERE id='".$value."'"; 
			parent::query($sql);
		}

		$sql = "UPDATE donkham SET 
			giatruocuudai = (SELECT SUM(soluong*dongia) FROM thuoc_donkham WHERE id_donkham = (SELECT A.id FROM donkham A WHERE A.id_benhnhan = '".$id_benhnhan."' AND A.ngaykedon = '".$date."')) + (SELECT B.giacuoi FROM dichvu A inner join dichvucon B on A.id = B.id_dichvu WHERE B.id='".$dichvu."'),
			giacuoi = 
			(
			(SELECT SUM(soluong*dongia) FROM thuoc_donkham WHERE id_donkham = (SELECT A.id FROM donkham A WHERE A.id_benhnhan = '".$id_benhnhan."' AND A.ngaykedon = '".$date."'))
			+
			(SELECT (B.giacuoi*(100-A.uudai)/100) as kquddivhu FROM dichvu A inner join dichvucon B on A.id = B.id_dichvu WHERE B.id='".$dichvu."')
			)
			*
			((100-(SELECT uudaitongdon FROM donkham WHERE id= (SELECT A.id FROM donkham A WHERE A.id_benhnhan = '".$id_benhnhan."' AND A.ngaykedon = '".$date."')))/100) 			

		WHERE id = (SELECT A.id FROM donkham A WHERE A.id_benhnhan = '".$id_benhnhan."' AND A.ngaykedon = '".$date."')";

		parent::query($sql);
	}

	$sql = "SELECT A.id FROM donkham A WHERE A.id_benhnhan = '".$id_benhnhan."' AND A.ngaykedon = '".$date."'";
	parent::query($sql);
	$kq = parent::select_cf();
	return $kq['id'];

}

public function md_showdonkham($id){

	$this->conn= parent::connect();
	$sql="SELECT ROW_NUMBER() over (order by A.id) as TT,  A.id, A.name as tenbenh, A.ghichu, A.taikham, A.ngaykedon, A.uudaitongdon, A.uudaidichvu, A.giatruocuudai,A.giacuoi , A.giadichvu,
		B.id as idnhanvien, B.name as tenhanvien, 
		C.id as idbenhnhan, C.name as tenbenhnhan, 
		E.name as tenthuoc, D.soluong, D.dongia , E.donvitinh 
		FROM donkham A 
		inner join nhanvien B on A.id_nhanvien = B.id 
		inner join benhnhan C on A.id_benhnhan = C.id 
		inner join thuoc_donkham D on D.id_donkham = A.id 
		inner join dichvucon E on E.id = D.id_thuoc 
		WHERE A.id='".$id."'";

		parent::query($sql);
		return parent::selectall_cf();
}

public function md_showdonmau($name){
	$this->conn= parent::connect();
	$sql = "SELECT * FROM donkham WHERE name like '%".$name."%' AND donmau ='1' ORDER BY id DESC LIMIT 5";
	parent::query($sql);
		return parent::selectall_cf();
}

public function md_chuyendoidonmau($id){
	$this->conn= parent::connect();
	$sql = "SELECT A.id, A.id_thuoc, A.soluong, B.name as tenthuoc, B.donvitinh FROM thuoc_donkham A inner join dichvucon B on A.id_thuoc = B.id WHERE id_donkham='".$id."'";
	parent::query($sql);
		return parent::selectall_cf();
}


public function md_selectkhothuoc($type,$page, $count){
	$this->conn= parent::connect();
	if($type=='little'){
		$sql = "SELECT * FROM dichvucon WHERE id_dichvu = '3' AND soluong <= 10 ORDER BY id DESC LIMIT $page, $count";
	}else{
		$sql = "SELECT * FROM dichvucon WHERE id_dichvu = '3' ORDER BY id DESC LIMIT $page, $count";
	}
	parent::query($sql);
		return parent::selectall_cf();
}
public function md_countallkhothuoc($type){
	$this->conn= parent::connect();
	if($type=='little'){
		$sql = "SELECT * FROM dichvucon WHERE id_dichvu = '3' AND soluong <= 10 ORDER BY id DESC";
	}else{
		$sql = "SELECT * FROM dichvucon WHERE id_dichvu = '3' ORDER BY id DESC";
	}
		parent::query($sql);
		parent::selectall_cf();
		return parent::numrow();
}

public function md_themsoluongthuoc($id, $count){
	$this->conn= parent::connect();
	$sql = "UPDATE dichvucon SET soluong = '".$count."' WHERE id = '".$id."'";
	return parent::query($sql);
		
}

public function md_addthuoc($name, $donvitinh, $giacuoi, $gianhap, $cachdung, $soluong){
	$this->conn= parent::connect();
	$sql = "INSERT INTO dichvucon (id, id_dichvu, name, donvitinh, giacuoi, gianhap, cachdung, soluong) VALUES (NULL, '3', '".$name."', '".$donvitinh."', '".$giacuoi."', '".$gianhap."', '".$cachdung."', '".$soluong."');";
	return parent::query($sql);
}

public function md_thongke($begin, $end){
	$this->conn= parent::connect();
	$sql = "SELECT B.id_thuoc, C.name, SUM(B.soluong) as soluong FROM donkham A 
		inner join thuoc_donkham B on A.id = B.id_donkham 
		inner join dichvucon C on C.id = B.id_thuoc 
		WHERE A.ngaykedon BETWEEN '".$begin."' AND '".$end."'  
		GROUP BY B.id_thuoc, C.name";
	
	parent::query($sql);
	return parent::selectall_cf();
}




}
?>
