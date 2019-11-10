 <?php
 	include "header.php";
 	include "lib/connection.php";
 ?>
 <script type="text/javascript">
 	function handleChange(checkbox) {
    if(checkbox.checked == true){

	 		document.getElementById("n2").value =  document.getElementById("n1").value;
	 		document.getElementById('e2').value =  document.getElementById('e1').value;
	 		document.getElementById('p2').value =  document.getElementById('p1').value;
	 		document.getElementById('a2').value =  document.getElementById('a1').value;
	 	}
	 	else{
	 		document.getElementById('n2').value =  '';
	 		document.getElementById('e2').value =  '';
	 		document.getElementById('p2').value =  '';
	 		document.getElementById('a2').value =  '';
	 	}
 }
 </script>
 <div style="height: 1000px; position: relative; padding:30px;">
  <div class="products">
	   		<h5 class="latest-product">Checkout Form</h5>	
   </div>	 
 <div class="clearfix"> </div>			 
	<?php
		if(isset($_SESSION['id'])){
			$sqld = "SELECT * FROM `customers` WHERE `cust_id` = '$_SESSION[id]'";
			$resd = $db->query($sqld);
			$rowd = $resd->fetch_array();
		}
	?>
  <form method = "post" action="order.php" style="width: 700px; padding: 40px; box-shadow: 3px 3px 3px #00000020; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-40%); border:1px solid #00000010;" name="frm" > 
	 <div class="  register-top-grid">
		<h3>BILLING INFORMATION</h3>
		<div class="mation">
			<span>Full Name<label>*</label></span>
			<input type="text"  value = "<?=$rowd['cust_name']?>" id = "n1">
			 <span>Email<label>*</label></span>
			 <input type="text" value = "<?=$rowd['cust_email']?>" id = "e1"> 
			 <span>Phone<label>*</label></span>
			 <input type="number" value = "<?=$rowd['cust_phone']?>" id = "p1"> 
			 <span>Address<label>*</label></span>
			 <textarea  style="width: 85%;" id = "a1"><?=$rowd['cust_address']?></textarea> 
		</div>
		<br>
		<h3>SHOPPING INFORMATION</h3>
		 <div class="clearfix"> </div>
		   <a class="news-letter" href="#">
			 <label class="checkbox"><input type="checkbox" name="checkbox" onchange="handleChange(this);"><i> </i>SAME AS ABOVE</label>
		   </a>
		 </div>
		<div class="  register-bottom-grid">
				
				<div class="mation">
					<span>Full Name<label>*</label></span>
					<input type="text" name="name" id = "n2">
					 <span>Email<label>*</label></span>
					 <input type="text" name="email" id = "e2"> 
					 <span>Phone<label>*</label></span>
					 <input type="number" name="phone" id = "p2"> 
					 <span>Address<label>*</label></span>
					 <textarea name = "address" style="width: 85%;" id = "a2"></textarea> 
				</div>
		 </div>

	<br>
	<input type="submit" name="sub" class = nikPinkButton value="submit">

	</form>
	<div class="clearfix"> </div>
</div>
	<?php
		include "footer.php";
	?>