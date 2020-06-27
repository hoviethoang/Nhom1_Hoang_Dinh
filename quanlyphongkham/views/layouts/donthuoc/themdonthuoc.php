<div class="col-12">
	<div class="row">
		<div class="col-md-12 col-12">
			<h6><b>THÊM ĐƠN THUỐC</b></h6>
<small>Thêm đơn thuốc cho bệnh nhân</small> 
		</div>
		
	</div>
</div>
<form method="POST" action="kqtaodonthuoc">
<div class="col-12 mt-5">
	<div class="row">
		<div class="col-4 pl-0" style="z-index: 1000">
			<div style="background-color: #fff" class="">
				<h6 class="px-2 py-2">Bệnh nhân</h6>
			<input type="text" id="searchbenhnhan" name="" placeholder="Nhập sdt/cmnd" class="btn btn-light border mx-auto d-block col-8" autocomplete="off">
			<div class="col-12 mt-2 px-0" id="tenbenhnhan">
				
			</div>
			<input type="hidden" name="id_benhnhan" id="mabenhnhan">
			</div>

			<div style="background-color: #fff" class="pt-2 px-2 mt-2">
				<h6>Chuẩn đoán</h6>
				<textarea class="col-10 d-block mx-auto btn border bg-light" name="name" id="nhapchuandoan"></textarea>
				<h6 class="pt-3">Ghi chú</h6>
				<textarea class="col-10 d-block mx-auto btn border bg-light" name="ghichu"></textarea>
				<p class="py-3">
					<input type="checkbox" name="taikham"> Tái khám
				</p>
			</div>


			


		</div>

		
		<div class="col-4 pl-0">
			
<div style="background-color: #fff" class="py-3 px-3">
				<h6>Loại dịch vụ</h6>
				<select name="loaidichvu" class="btn btn-light border">
					<?php 
						foreach ($loaidichvu as $value) {
							echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
						}
					 ?>
				</select>
			</div>
			

			<div style="background-color: #fff" class="py-3 px-3 mt-1">
				<h6>Ưu đải % tổng đơn</h6>
				<input type="number" class="d-block mx-auto btn btn-light border" placeholder="" name="uudaitongdon" autocomplete="off" value="0">
			</div>

			<div style="background-color: #fff" class="mt-1">
				
				  <div class="" id="showdonmau" style="background-color: #EAFAF1">
				    
				  </div>
			</div>


		</div>

		<div class="col-4 pr-1 px-0">

			<div style="background-color: #fff" class="py-3 px-3">
				<h6>Nhập tên thuốc</h6>
				<input type="text" class="d-block mx-auto btn btn-light border" placeholder="Tên thuốc/ tên kính" id="nhaptenthuoc" autocomplete="off">
				<p id="tenthuoc" class="py-2"></p>
			</div>

			

			<div style="background-color: #FEF9E7" class="py-3 mt-1 px-3">
				<h5>Đơn thuốc</h5>
				<p class="py-2" id="listdonthuoc"></p>

				<p>
					<input type="checkbox" name="donmau"> Đặt làm đơn thuốc mẩu
				</p>
			</div>
			<p class="mt-2">
				<button class="btn btn-success">Tạo đơn thuốc</button>
				

			</p>
		</div>


	</div>
</div>
</form>



<script type="text/javascript">
	$("#searchbenhnhan").on('input',function(){
		$.ajax({
			url: "kqsearchbnadddonthuoc",
			type: "post",
			datetype: "text",
			data:{
				name:$("#searchbenhnhan").val()
			},
			success : function(result){
				$('#tenbenhnhan').html(result);
			}
		});
	});

	$("#nhaptenthuoc").on('input',function(){
		$.ajax({
			url: "kqnhaptenthuoc",
			type: "post",
			datetype: "text",
			data:{
				name:$("#nhaptenthuoc").val()
			},
			success : function(result){
				$('#tenthuoc').html(result);
			}
		});
	});

	$("#nhapchuandoan").on('input',function(){
		$.ajax({
			url: "kqnhapdonmau",
			type: "post",
			datetype: "text",
			data:{
				name:$("#nhapchuandoan").val()
			},
			success : function(result){
				$('#showdonmau').html(result);
			}
		});
	});
</script>