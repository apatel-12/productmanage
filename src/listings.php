<?php include("../includes/products.php");
ob_start();
?>
<script type="text/javascript" src="../includes/jquery.js"></script>
<script type="text/javascript" src="../includes/jquery-ui-1.8.custom.min.js"></script>
 <link rel="stylesheet" type="text/css" href="../includes/autocomplete.css">
<script> 
 
		jQuery(document).ready(function(){ 
		
			$('#input_name').autocomplete({source:'../src/product_names.php?t=en', minLength:1});
		});
		
</script> 
<style>li.ui-menu-item { font-size:12px !important; }</style>
<?php

$sort_order="asc";
$sorder="desc";
$sort_column="product_name";
$sql_search="";


if(isset($_POST['btn_submit']))
{
	
	if(isset($_POST['input_name']) && $_POST['input_name']!='')
	{
		$productName=escape_specials($mysqli,$_POST['input_name']);
		$sql_search.=" and product_name='".$productName."'";
	}
	if(isset($_POST['brand_name']) && $_POST['brand_name']!='')
	{
		$brandName=escape_specials($mysqli,$_POST['brand_name']);
		$sql_search.=" and product_brand LIKE '%".$brandName."%'";
	}
	if(isset($_POST['price']) && $_POST['price']!='')
	{
		$prd_price=escape_specials($mysqli,$_POST['price']);
		$sql_search.=" and product_price=".$prd_price."";
	}
	if(isset($_POST['acc_num']) && $_POST['acc_num']!='')
	{
		$accomodation=escape_specials($mysqli,$_POST['acc_num']);
		$sql_search.=" and accomodation_number=".$accomodation."";
	}
	$_SESSION['sqlsearch']=$sql_search;
	
} // form submitted

if($_POST['btn_reset'])
{
	sessiondata_reset();
}

if(isset($_SESSION['sqlsearch']) && $_SESSION['sqlsearch']!="")
	$sql_search=$_SESSION['sqlsearch'];

if(isset($_GET['col']) && $_GET['col']!='')
{
	$sort_column=$_GET['col'];
}
if(isset($_GET['order']) && $_GET['order']!='')
{
	$sort_order=$_GET['order'];
	if($_GET['order']=="asc")
		$sorder="desc";
	else
		$sorder="asc";
}

$order_by=get_sort_field($sort_order,$sort_column);

$all_products = getAllProducts($mysqli,$order_by,$sql_search);


?>
<form action="listings.php"  method="post">
 <table width="100%" border="0" cellspacing="4" cellpadding="4">
  <tbody>
    <tr>
      <td width="8%">Name (Autosuggest)</td>
      <td width="21%"><input type="text" size="25" value="" id="input_name"  name="input_name" /></td>
      <td width="12%">Brand</td>
      <td width="59%"><input type="text" size="25" id="brand_name"  name="brand_name" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Price</td>
      <td><input type="number" size="25" id="price"  name="price" min="1" max="200000" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Sleep Number</td>
      <td><select name="acc_num" id="acc_num">
      	<option value="">-All-</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btn_submit" id="btn_submit" value=" Search " onClick="return validate_data();">&nbsp;<input type="submit" name="btn_reset" id="btn_reset" value=" Reset " onClick="location.href='listings.php'"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
 
 </form>
<?php
if($all_products->num_rows > 0)
{
?>
 
<br><br>
<table width="100%" border="0" cellspacing="4" cellpadding="4">
  <tbody>
    <tr style="font-size:16px; background-color:#C6C6C6">
      <td>No.</td>
      <td><a href="listings.php?col=name&order=<?php print $sorder;?>">Name</a></td>
      <td><a href="listings.php?col=brand&order=<?php print $sorder;?>">Brand</a></td>
      <td><a href="listings.php?col=accnum&order=<?php print $sorder;?>">Sleep Number</a></td>
      <td><a href="listings.php?col=cost&order=<?php print $sorder;?>">Price</a></td>
    </tr>
    <?php 
	$i=0;
	while($rows = $all_products->fetch_assoc())
	{
		$i++;
		$product_name=$rows['product_name'];
		$product_brand=$rows['product_brand'];
		$accomodation_number=$rows['accomodation_number'];
		$product_price=$rows['product_price'];
		?>
    <tr>
      <td><?php print $i;?></td>
      <td><?php print $product_name;?></td>
      <td><?php print $product_brand;?></td>
      <td><?php print $accomodation_number;?></td>
      <td><?php print "$".number_format($product_price,2);?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } // if data found
else{?>

<h1>No data</h1>

<?php }?>
<script>
function validate_data()
{
	if(document.getElementById('input_name').value=="" && document.getElementById('brand_name').value=="" && document.getElementById('price').value=="" && document.getElementById('acc_num').value=="")
	{
		alert("Please Enter valid value into any one of the search input.");
		return false;
	}
}

</script>
<?php
$content=ob_get_contents();
ob_end_clean();
$page_title="Products Listing";
require("../content.php");
?>
