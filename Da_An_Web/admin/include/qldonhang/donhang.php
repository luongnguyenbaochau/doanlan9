
<?php
$donhang = new donhang();
$data = $donhang->getAlldonhang();
?>

<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        <h2>Đơn đặt hàng</h2>
        	<th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Mã đơn đặt hàng</th>
            <th scope="col" class="rounded">Ngày đặt hàng</th>
			<th scope="col" class="rounded">Tổng tiền</th>
			<th scope="col" class="rounded">Id user</th>
			<th scope="col" class="rounded">Tên người nhận</th>
			<th scope="col" class="rounded">SĐT</th>
			<th scope="col" class="rounded">Địa chỉ người nhận</th>
			<th scope="col" class="rounded">Trạng thái(1:ĐG;!1:XL)</th>
			<th scope="col" class="rounded">Chi tiết</th> 
			<th scope="col" class="rounded">Chuyển trạng thái</th>			
        </tr>
    </thead>
        
    <tbody>
    <?php 
    foreach($data as $row)
    {?>
    	<tr>
        	<td><input type="checkbox" name="" /></td>
            <td><?php echo $row["madondathang"];?></td>
            <td><?php echo $row["ngaydathang"];?></td>
            <td><?php echo $row["tongtien"];?></td>
			<td><?php echo $row["iduser"];?></td>
			<td><?php echo $row["tennguoinhan"];?></td>
			<td><?php echo $row["sdt"];?></td>
			<td><?php echo $row["diachinhan"];?></td>
			<td><?php if($row["trangthai"]==1)echo "Đã giao"; else echo "Đang xử lý";?></td>
			<td><a href="index.php?act=chitietdonhang&madondathang=<?php echo $row["madondathang"];?>">Chi tiết</a></td>
			<td><a href="index.php?act=edit_donhangdagiao&madondathang=<?php echo $row["madondathang"];?>"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
        </tr>
        
    	<?php
}
        ?>  
        
    </tbody>
</table>
      
     
     
      
    
    
           
     
      
     
     