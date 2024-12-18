<?php
	include("config.php");
	
	$c1 = new Config();
	
	$data = $c1->fetchImages();
	
	if(isset($_POST['button']))
	{
		$id = $_POST["id"];
		$c1->delete($id);
    header("Location: index.php");
	}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  
	<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Preview</th>
    </tr>
  </thead>
  <tbody>
	<?php while($rec = mysqli_fetch_array($data)){ ?>
    <tr>
      <th scope="row"><?php echo $rec["id"]?></th>
      <td><?php echo $rec["name"]?></td>
      <td><img src = "<?php echo $rec["path"]?>" height="200"></td>
      <td>
			<form method="POST">
			<input type="hidden" name="id" value="<?php echo $rec["id"]?>">
				<button type="submit" name="button">
				Delete
				</button>
			</form>
	  </td>
    </tr>
	<?php } ?>
  </tbody>
</table>
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>