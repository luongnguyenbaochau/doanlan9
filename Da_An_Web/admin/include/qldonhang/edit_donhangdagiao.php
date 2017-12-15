<script type="text/javascript" src="../../jquery.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $('#hsx').submit(function()
	{
		var flag= true;
		var tt= $.trim($('#tt').val());
		
		if(tt=='')
		{
			$('#tt_error').text('Trạng thái không được để trống');
			flag=false;
		}
		else
			$('#tt_error').text('');
		
		return flag;
	
	});
});
</script>
<?php
$act=getIndex("act");
$madondathang =getIndex("madondathang");



$donhang = new donhang();

if ($act=="edit_donhangdagiao") 
{
	$data = $donhang->getDetail($madondathang);
		//print_r($data);
		if (Count($data)==0) {exit;}

			if ($madondathang =="") exit;
		?>            
		 
			<h2>Quản lý đơn hàng</h2> 
				<form action="index.php?act=edit_donhangdagiao2" method="post" id="hsx">
					Mã đơn đặt hàng &nbsp; <input type="hidden" name="madonhang" value="<?php echo $data["madondathang"];?>" id="mh" ><?php echo $data["madondathang"];?><br>
					Trạng thái &nbsp;<input type="text" name="trangthai" value="<?php echo $data["trangthai"];?>" id="tt"><label id="tt_error" class="error" style="color:#F00;"></label><br><br>
					<input type="submit" name="them" value="Save"><br><br>
				</form>
		<?php
		}

if ($act=="edit_donhangdagiao2") //update
{

  $donhang->editdonhang($_POST["madonhang"],$_POST["trangthai"]);
 // header("location: index.php?act=hangsanxuat");?
 ?>
<script type="text/javascript" >
    alert("Da thuc hien");
    window.location='index.php?act=donhang';
</script>
<?php 
}
?>

