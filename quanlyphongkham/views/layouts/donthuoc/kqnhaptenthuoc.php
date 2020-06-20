<?php 
if($kq==0)
{
  echo '<div class="alert alert-danger" role="alert">Không tìm thấy thông tin nào trùng khớp</div>';
}
else
{
  foreach ($kq as $value) {
    echo '<div class="col-12 mt-1 khungtimthuoc"><div class="row">
    <div class="col-6" id="tenthuoc_'.$value['id'].'">'.$value['name'].'</div><div class="col-2" id="donvitinh_'.$value['id'].'">('.$value['donvitinh'].')</div> <div class="col-4 text-right"><div style="width:40px;height: 40px;border-radius:50%;display: flex; justify-content: center;  align-items: center;" class="bg-warning text-light border-0 shadow chonthuoc" id="thuoc_'.$value['id'].'"><i class="fas fa-plus"></i></div></div>
    </div></div>';
  }
}

 ?>


 <script type="text/javascript">
   $('.chonthuoc').on('click',function(){
    $id = $(this).attr('id');
    $id = $id.substr(6);
    if($('#columthuoc_'+$id).length){
      alert('Thuốc này đã được thêm vào trước đó');
      exit();
    }
   
    $('#listdonthuoc').append('<div id="columthuoc_'+$id+'" class="col-12 mt-1 pb-1 border-bottom"><div class="row"><div class="col-6"><input type="hidden" value="'+$id+'" name="thuoc[]"> '+$('#tenthuoc_'+$id).html()+ '</div><div class="col-6 text-left"><input type="number" style="width:60px" class="btn btn-light border" value="1" name="count['+$id+']"> '+$('#donvitinh_'+$id).html()+ '</div></div></div>');
     $('.khungtimthuoc').hide();
     $('#nhaptenthuoc').val('');

   });
 </script>

