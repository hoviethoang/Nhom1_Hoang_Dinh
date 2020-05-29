<div class="col-12">
	<div class="row">
		<div class="col-8">
			<h6><b>KHO THUỐC</b></h6>
			<small>Kho Thuốc tại đây</small> 
		</div>
		<div class="col-4 text-right">
			<button id="btnthemthuocmoi" class="btn shadow text-light" style="background-color: #45B39D">THÊM THUỐC MỚI<i class="fas fa-plus-circle ml-2"></i></button>
		</div>
		<div class="col-12 text-right">
			<div class="btn-group btn-group-sm">
			  

			  <?php
			  	if($type=='new'){
			  		echo '<button type="button" class="btn border"  style="background:#DCEAE2"><a href="?type=new" class="text-dark">Mới nhất</a></button> <button type="button" class="btn border"  style="background:#EAFAF1"><a href="?type=little" class="text-dark">Sắp hết</a></button>';
			  	}else{
			  		echo '<button type="button" class="btn border"  style="background:#EAFAF1"><a href="?type=new" class="text-dark">Mới nhất</a></button> <button type="button" class="btn border"  style="background:#DCEAE2"><a href="?type=little" class="text-dark">Sắp hết</a></button>';
			  	}
			  ?>
			  
			  
			</div>
		</div>
		
	</div>
</div>
<table width="100%">
	<tr>
		<td class="py-3"><small>Stt</small></td>
		<td class="py-3">
			<small>Mã THuốc</small>
		</td>
		<td class="py-3">
			<small>Tên thuốc</small>
		</td>
		<td class="py-3">
			<small>Giá nhập</small>
		</td>
		<td class="py-3">
			<small>Giá bán</small>
		</td>
		<td>
			<small>Số lượng</small>
		</td>
		<td>
			<small>Đơn vị tính</small>
		</td>
		<td class="py-3"></td>
	</tr>
		<?php 

	if($data!=0)
	{
		$i = ($page-1)*$count;
		foreach ($data as $value) {
			if($value['soluong']<=10){
				echo '<tr style="background-color:#FADBD8" class="border-bottom border-light" id="tr_'.$value['id'].'">';
			}else{
				echo '<tr style="background-color:#fff" class="border-bottom border-light"  id="tr_'.$value['id'].'">';
			}
			echo '<td class="px-2 py-2">'.++$i.'</td>';
			echo '<td class="px-2 py-2">'.$value['id'].'</td>';
			echo '<td class="px-2 py-2">'.$value['name'].'</td>';
			
			echo '<td class="px-2 py-2">'.$value['gianhap'].'</td>';
			echo '<td class="px-2 py-2">'.$value['giacuoi'].'</td>';
			echo '<td class="px-2 py-2" id="soluongbandau_'.$value['id'].'">'.$value['soluong'].'</td>';
			echo '<td class="px-2 py-2">'.$value['donvitinh'].'</td>';
			echo '<td class="px-2 py-2">
			<button style="width:40px;height: 40px;border-radius:50%" class="bg-warning text-light border-0 shadow hienform" id="'.$value['id'].'"><i class="far fa-edit"></i></button>
			
			</td>';
			echo '</tr>';
		}
	}

?>

	</table>


<p class=" py-3 px-4">
<?php 
if($countall>$count)
{
	$trang = ceil($countall/$count);
	for($i=1;$i<=$trang; $i++)
	{
		if($i==$page)
		{
			echo '<span class="bg-info btn px-2 text-light">'.$i.'</span>';
		}else
		{
			echo '<span class="bg-light btn px-2"><a href="?page='.$i.'">'.$i.'</a></span>';
		}
	}

}

?>

<div style="width:340px;position: fixed;top: 50%;left: 50%;transform: translate(-25%,-50%);display: none" class="bg-light shadow px-3 py-3" id="form">
	<input type="text" name="soluong" placeholder="nhập số lượng muốn thêm" class="btn btn-light border" id="i_them">
	<input type="hidden" name="id" value="0" id="nhapid">
	<button class="btn btn-danger" id="okthem">THÊM</button>
</div>

<!-- form them thuoc moi -->
<div style="width:340px;height:80%;overflow:auto;position: fixed;top: 50%;left: 50%;transform: translate(-25%,-50%);display: none;" class="bg-light shadow px-3 py-3" id="formthemthuocmoi">
<form method="post" action="addthuoc">
	<p>Nhập tên thuốc</p>
	<input type="text" name="name" placeholder="Nhập tên thuốc" class="btn border d-block mx-auto">
	<p>Số lượng</p>
	<input type="text" name="count" placeholder="Nhập số lượng" class="btn border d-block mx-auto">
	<p>Giá nhập</p>
	<input type="text" name="gianhap" placeholder="Giá nhập" class="btn border d-block mx-auto">
	<p>Giá cuối</p>
	<input type="text" name="giacuoi" placeholder="Giá bán" class="btn border d-block mx-auto">
	<p>Đơn vị tính</p>
	<input type="text" name="donvitinh" placeholder="Đơn vị tính" class="btn border d-block mx-auto">
	<p>Cách dùng</p>
	<input type="text" name="cachdung" placeholder="Cách dùng" class="btn border d-block mx-auto">
	<p class="my-3">
		<button class="btn btn-success d-block mx-auto">THÊM MỚI</button>
	</p>
</form>

</div>


<script type="text/javascript">
	$('#btnthemthuocmoi').on('click',function(){
		$('#formthemthuocmoi').show();
	});

	$('.hienform').on('click',function(){
		$('#form').show();
		var i = $(this).attr('id');
		$('#nhapid').val(i);
	});



	$('#okthem').on('click',function(){

		

		var i_them = $('#i_them').val();
		var i_bandau = $('#soluongbandau_'+ $('#nhapid').val()).html();


		 var sothem = Number(i_them) + Number(i_bandau);

		$.ajax({
			url :'themsoluongthuoc',
			type :'post',
			datetype :  'text',
			data : {
				id : $('#nhapid').val(),
				count : sothem
			},
			success : function(result){
				$('#soluongbandau_'+ $('#nhapid').val()).html(sothem);
				if(sothem>10){
					$('#tr_'+$('#nhapid').val()).css('background','#fff');
					$('#i_them').val('');
				}
			}
		});

		 $('#form').hide();

	});

</script>