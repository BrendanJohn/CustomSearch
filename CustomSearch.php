<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Search Brendan</title>
	<link rel="stylesheet" href="wp-admin/css/install.css?ver=20100228" type="text/css" />
</head>
<body>

		<h2>Search Engine<h2>
			<form action='./search.php' method='get'>
				<input type='text' name='k' size='50' value='<?php echo $_GET['k']; ?>' />
				<input type='submit' value='Search'>
			</form>
			<hr />
			<?php

			require_once('mysqli_connect.php');


				$k = $_GET['k'];
				$terms = explode(" ", $k);
				$query = "SELECT * FROM search WHERE ";

				foreach ($terms as $each) {
					$i++;
					if ($i ==1)
						$query.= "keywords LIKE '%$each%' ";
					else
						$query.= "OR keywords LIKE '%$each%' ";
				}


			$response = mysqli_query($dbc, $query);
			$numrows = mysqli_num_rows($response);
			if ($numrows > 0) {

				while ($row = mysqli_fetch_assoc($response)) {
					$id = $row['id'];
					$title = $row['title'];
					$description = $row['description'];
					$keywords = $row['keywords'];
					$link = $row['link'];

					echo "<h2><a href='$link'>$title</a></h2>
					$description<br /><br />";
				}

			}
			else
				echo "No results found for \"<b>$k</b>\"";


			?>

</body>
</html>
