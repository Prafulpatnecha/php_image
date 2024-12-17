<?php 
	
class Config
{
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "test";
	private $connection;
	
	
	public function __construct()
	{
		$this->connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);
	}
	
	public function uploadImage($name,$path)
	{
		$query = "INSERT INTO `gallery`(`name`, `path`) VALUES('$name','$path')";
		$res = mysqli_query($this->connection,$query);
		
		return $res;
	}
	
	
	public function fetchImages()
	{
		$query = "SELECT * FROM gallery";
		$res= mysqli_query($this->connection,$query);
		return $res;
	}	
	public function fetchImage($id)
	{
		$query = "SELECT * FROM gallery WHERE id=$id";
		$res= mysqli_query($this->connection,$query);
		return $res;
	}
	
	public function delete($id)
	{
		$image = $this->fetchImage($id);
		$filename = mysqli_fetch_assoc($image);
		$status = unlink($filename['path']);
		if($status)
		{
			$query = "DELETE FROM gallery WHERE id = $id";
			mysqli_query($this->connection,$query);
		}else{
			
		}
	}
}
	
	
	
	
?>