<?php include("../includes/products.php");
ob_start();
?>
<?php
if(isset($_POST['upload_btn']))
{ 
			if($_FILES['csv_file']['error'] == 0)
			{
					
					$name=rand(1,20).$_FILES['csv_file']['name'];
					if ($_FILES["csv_file"]["size"] > 0) 
					{
						
						$pathto="/Applications/MAMP/htdocs/import_display/upload/".$name;
						if(move_uploaded_file($_FILES['csv_file']['tmp_name'],$pathto))
						{
							//ignore duplicates
							$upload=executeQuery($mysqli,"LOAD DATA LOCAL INFILE '".$pathto."' IGNORE INTO TABLE product_master FIELDS OPTIONALLY enclosed by '\"'  TERMINATED BY ',' LINES TERMINATED BY '\r' (product_name,product_brand,accomodation_number,product_price) SET created_date=now(), active_status=1");
							
						if(!$upload)
							print "<br>Upload error".$upload;
						else
							print "<br><strong>File Uploaded Successfully!</strong><br><br>";
						}
					}
					
			}else
			{
				print "<h2>File Upload Error</h2><br>";
			}
						
}// if form submitted
?>

<form action="" method="post" enctype="multipart/form-data" name="file_upload" id="file_upload">
    <table width="90%" border="0" cellpadding="5" cellspacing="5" align="center" >
      <tr>
        <td width="37%" align="left" valign="top" style="font-size:16px;">
          
          <br />
          <input type="file" name="csv_file" id="csv_file" required/><br />
       
          <br><br><br>
          &nbsp;<input type="submit"  value=" Import Data " name="upload_btn" id="upload_btn" style="font-size:16px;" /><br /><br />
          
</td>
      </tr> 
</table>
  </form>
<?php
$content=ob_get_contents();
ob_end_clean();
$page_title="Upload File";
require("../content.php");
?>