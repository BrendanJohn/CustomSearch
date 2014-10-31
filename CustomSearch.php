<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Search</title>
	<link rel="stylesheet" href="wp-admin/css/install.css?ver=20100228" type="text/css" />
</head>
<body>
	<center>
		
			
<hr>

<?php
@mysql_connect("localhost","m0262157701558","i,hZ3pcOK");
mysql_select_db("m0262157701558");

if(isset($_GET['search'])){
	
	$search_value = $_GET['value'];

	$query = "select * from wp_kjspcz4tfq_cf7dbplugin_submits where field_value like '%$search_value%'";

	$run = mysql_query($query);

	while ($row=mysql_fetch_array($run)){

		$title = $row['field_value'];
		$link = $row['field_value'];

		echo "<h1>$title</h1><a href='/ratings'>$link</a>";

	}


}

?>
	</center>
</body>
</html>
