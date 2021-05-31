<?php 
require("function.php");


function executeQuery($mysqli,$sql)
{
	
	$result_report = $mysqli->query($sql);
	
	if($result_report)
	{
		return true;
	}else
		return false;
}

function getAllProducts($mysqli,$order_by="",$sql_search="")
{
	if($order_by=="")
		$orderBy="order by product_master.product_name asc";
	else
		$orderBy=$order_by;
	$sql="SELECT
product_master.tab_id,
product_master.product_name,
product_master.product_brand,
product_master.accomodation_number,
product_master.product_price,
product_master.active_status
FROM
product_master where product_master.active_status=1 $sql_search".$orderBy;
	
	$result_sql = $mysqli->query($sql) or die($mysqli->error);
	if($result_sql)
	{
		return $result_sql;
	}else
		return false;
	
}

function get_sort_field($sort_order="",$sort_column="")
{
	if($sort_order!="" && $sort_column!="")
	{
		if($sort_column=="name")
			$sort_field="product_master.product_name";
		elseif($sort_column=="brand")
			$sort_field="product_master.product_brand";
		elseif($sort_column=="accnum")
			$sort_field="product_master.accomodation_number";
		elseif($sort_column=="cost")
			$sort_field="product_master.product_price";
		else
			$sort_field="product_master.product_name";
			
		$order_by=" order by $sort_field $sort_order";
	}else
		$order_by=" order by product_master.product_name asc";
	
	return $order_by;
	
}

function escape_specials($mysqli,$string_value)
{
	if($string_value!="")
		return $mysqli->real_escape_string($string_value);
	else
		return "";
}
?>