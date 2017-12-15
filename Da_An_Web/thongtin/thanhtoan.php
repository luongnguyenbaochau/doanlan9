<script type="text/javascript" src="../../jquery.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $('#thanhtoan').submit(function()
	{
		var flag= true;
		var tennn= $.trim($('#tennnn').val());
		var sdt= $.trim($('#sdtt').val());
		var dc =$.trim($('#dcc').val());
		if(tennn=='')
		{
			$('#tennn_error').text('Tên người nhận không được để trống');
			flag=false;
		}
		else
			$('#tennn_error').text('');
		
		if(sdt=='')
		{
			$('#sdt_error').text('Số điện thoại không được để trống');
			flag=false;
		}
		else if(isNaN(sdt))
		{
			$('#sdt_error').text('Số điện thoại phải là số');
			flag=false;
		}
		else
			$('#sdt_error').text('');
		
		if(dc=='')
		{
			$('#dc_error').text('Địa chỉ không được để trống');
			flag=false;
		}
		else
		$('#dc_error').text('');
	
	
		return flag;
	
	});
});
</script>
<div style="margin: 100px 0px 0px 100px;">


<table width="50%" border="0" align="center">
	<tr>
    	<th height="37" colspan="2">Thanh toán</th>
    </tr>
    <tr>
    	<td height="37" colspan="2">Thông tin sản phẩm</td>
        <td></td>
    </tr>
    <tr>
    <td colspan="2">
    <?php
	$cart->showthanhtoan();
	
	
	?>

    </td>
    </tr>
	<form action="luudonhang.php" method="post" id="thanhtoan">
    <tr>
    	<td height="37" colspan="2">Thông tin người nhận</td>
        <td></td>
    </tr>
  <tr>
    <td width="30%" height="50">Tên người nhận</td>
    <td width="70%"><input type="text" id="tennnn" name="tennn" size="30" placeholder="nhập tên người nhận"/><label id="tennn_error" class="error" style="color:#F00;"></label></td>
  </tr>
  <tr>
    <td height="43">Số điện thoại</td>
    <td><input type="text" id="sdtt" name="sdt" size="30" placeholder="nhập số điện thoại"/><label id="sdt_error" class="error" style="color:#F00;"></label></td>
  </tr>
  <tr>
    <td height="58">Địa chỉ</td>
    <td><input type="text" id="dcc" name="dc" size="30" placeholder="nhập địa chỉ"/><label id="dc_error" class="error" style="color:#F00;"></label></td>
  </tr>
  
  <tr>
    <td ></td>
    <td align="left"> <input type="submit" name="submit" value="Mua hàng"></td>
  </tr>
  
</table>

</form>
</div>