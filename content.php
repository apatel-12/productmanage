<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php if($page_title==''){ $page_title = "Code Manage"; } echo $page_title; ?></title>

<style>
body{
	font-family: Arial;
	font-size:12px;
	font-weight:normal;}
</style>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td><a href="/import_display"><h2>Product Management</h2></a></td>
  </tr> 
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellpadding="20" cellspacing="1">
      <tr>
        <td><?php if($content!=''){echo $content;} else{echo "No data to display";}?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
