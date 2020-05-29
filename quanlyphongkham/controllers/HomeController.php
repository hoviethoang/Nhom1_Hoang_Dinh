<?php 
require("models/Home.php");
class HomeController extends Home {
	public function index()
	 {
	 	//slide

	 	if(isset($_SESSION['name']))
	 	{
	 		header("Location: quanly/index");
	 	}
	 	if(isset($_POST['login']))
	 	{
	 		$return = parent::login($_POST['name'], $_POST['password']);

	 		if($return!=0)
	 		{
	 			$_SESSION['name']=$_POST['name'];
	 			$_SESSION['id']=$return['id'];
	 			$_SESSION['level']=$return['quyen'];

	 			header("Location: quanly/index");
	 		}
	 	}


	 	include("views/layouts/home/index.php");
}

	


}

 ?>
