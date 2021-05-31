<?php include("includes/function.php");
ob_start();
sessiondata_reset();

?>
<table width="100%" border="0" cellspacing="6" cellpadding="6">
  <tbody>
    <tr>
      <td><a href="src/import.php">File Upload</a></td>
    </tr>
    <tr>
      <td><a href="src/listings.php">View Listing</a></td>
    </tr>
  </tbody>
</table>

<?php
$content=ob_get_contents();
ob_end_clean();
require("content.php");
?>