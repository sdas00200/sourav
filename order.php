<?php
	
	include "lib/connection.php";

	include "header.php";
?>
<?php
	if(isset($_POST['sub'])){
		$date = date("Y-m-d H:i sa");
		$cust_id = $_SESSION['id'];
		$cust_name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];

		$swlo = "INSERT INTO `orders`(`order_id`, `cust_id`, `date`, `payment_info`, `delivery_name`, `delivery_phone`, `delivery_address`, `status`) VALUES (NULL,'$cust_id','$date','COD','$cust_name','$phone','$address','NEW')";
		$db->query($swlo);
		$oid = $db->insert_id;

		foreach ($_SESSION['cart'] as $pid => $qty) {

			$sql = "SELECT * FROM `products` WHERE `id`='$pid'";
					$res = $db->query($sql);
					$row = $res->fetch_array();

			$sqlcart = "INSERT INTO `cartitems`(`id`, `order_id`, `pid`, `quantity`, `product_name`, `product_price`) VALUES (NULL,'$oid','$pid','$qty','$row[name]','$row[price]')";
			$db->query($sqlcart);
		}
	}
?>
<?php
	include "footer.php";
?>