<div class="col-12">
	<div class="row">
		<div class="col-md-12 col-12 pb-3">
			<h6><b>THỐNG KÊ</b></h6>
<small>Xem thống kế dành cho bạn</small> 
		</div>

		<div class="col-12 mt-2 mb-1" >
			<div class="row">
				<form method="get" class="col-12">
					<div class="row">
				<div class="col px-3 py-4 "  style="background-color: #EAFAF1">
					<p><b>Ngày bắt đầu</b></p>
					<input type="date" name="ngaybatdau" value="<?php echo $date_begin; ?>" CLASS="btn border">
				</div>
				<div class="col px-3 py-4" style="background-color: #EAFAF1">
					<p><b>Ngày kết thúc</b></p>
					<input type="date" name="ngayketthuc" value="<?php echo $date_end; ?>" CLASS="btn border">
					<button style="width:40px;height: 40px;border-radius:50%" class="btn btn-info shadow ml-4"><i class="fas fa-sync-alt"></i></button>

				</div>
			</div>
			</form>
				<div class="col-12 px-0 py-1">
					<table width="100%">
	<tr>
		
		<td class="py-3" width="10%">
			<small>Mã THuốc</small>
		</td>
		<td class="py-3" width="20%">
			<small>Tên thuốc</small>
		</td>
		<td class="py-3">
			
		</td>
		<td class="py-3" width="10%">
			<small>Tiêu thụ</small>
		</td>

	</tr>

<?php 
	if($data!=0){
		$max = 0;
		foreach ($data as $value) {
			$max  = $max<$value['soluong'] ? $value['soluong'] : $max;
		}

		foreach ($data as $value) {
			echo '<tr style="background:#fff" class="border-bottom border-light">';
			echo '<td class="px-2 py-2">'.$value['id_thuoc'].'</td>';
			echo '<td class="px-2 py-2">'.$value['name'].'</td>';
			echo '<td  class=" px-2 py-2">
			<div class="progress">
				  <div class="progress-bar rounded" style="width:'.(100/$max)*$value['soluong'].'%"></div></div>
				</td>';
			echo '<td class="px-2 py-2">'.$value['soluong'].'</td>';

			echo '</tr>';
		}
	}

 ?>

	</table>
				</div>

				
			</div>
		</div>
		
	</div>
</div>
