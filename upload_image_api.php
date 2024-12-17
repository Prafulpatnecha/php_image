<?php
	
	header("Access-Control-Allow-Method: POST");
	header("Content-Type: application/json");
	
	include("config.php");
	
	$c1 = new Config();
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$image = $_FILES['image'];
		$name = $image['name'];
		$tmp_name = $image['tmp_name'];
		
		$id = uniqid('pixabay');
		
		$isImageUpload = move_uploaded_file($tmp_name,"images/".$id.$name);
		
		if($isImageUpload)
		{
			$res = $c1->uploadImage($name,"images/".$id.$name);
			
			if($res)
			{
				$arr['msg'] = "Image uploaded successfully";
			}else{
				$arr['err'] = "Image Was Not uploaded in database!";
			}
		}else{
				$arr['err'] = "Image Was Not uploaded in Server!";
		}
		
	}else{
		$arr["err"] = "Only Post method is allow!";
	}
	
	
	echo json_encode($arr);
?>