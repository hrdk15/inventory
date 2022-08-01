<?php
include "connection.php";
$id=$_GET["id"];
mysqli_query($link,"delete from vendor_list where id=$id");
?>
<script type="text/javascript">
    window.location="vendor_list.php";
</script>
