<?php include("../includes/products.php");

		if(isset($_REQUEST['term'])) 
		{
			$queryString = escape_specials($mysqli,$_REQUEST['term']);
			if(strlen($queryString) >0)
			{
				
				if($_REQUEST['t']=='en')
				{ 
					$query = $mysqli->query("SELECT product_name FROM product_master WHERE product_name LIKE '%$queryString%' LIMIT 5");
					$a=1;
				}
					
				if($query) 
				{
					$data2 = array();
					while ($result = $query->fetch_array())
					 {
						
	         			$data2[] = array(
								'label' => $result[0] ,
								'value' => addslashes($result[0])
							);
						
	         		} // while
					echo json_encode($data2);
					flush();

				} //if($query) 
				
			} //if(strlen($queryString) >0) 
			
			
		}//if(isset($_POST['term']))  
		else
		{
			echo 'There should be no direct access to this script!';
		}
		
		
?>