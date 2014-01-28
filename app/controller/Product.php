<?php
class Product extends BaseController
{
	
	public function __construct()
	{
		parent::loadModel();
	}
	
	public function index()
	{
		$this->showAll();
	}
	
	public function showAll()
	{
		$products = $this->model->getAllProducts();
	
		//$this->render();
		
		//Load a twig template
		$twig = parent::getViewLoader();
		$template = $twig->loadTemplate('products.phtml');
		
		$template->display(array("products" => $products));
		
	}
	public function showAllByCatId()
	{
		$products = $this->model->getByCategory($_GET['cid']);
		//Load a twig template
		$twig = parent::getViewLoader();
		$template = $twig->loadTemplate('products.phtml');
		
		$template->display(array("products" => $products));
	}
	
	public function showProduct()
	{
		$product = $this->model->getProduct($_GET['pid']);
		
		//Load a twig template
		$twig = parent::getViewLoader();
		
		if(isset($_SESSION['usr']))
		{
			$template = $twig->loadTemplate('editproduct.phtml');
			$template->display(array("product" => $product, "session" => array("usr" => $_SESSION['usr'])));
		}
		else
		{
			$template = $twig->loadTemplate('product.phtml');
			$template->display(array("product" => $product));
		}
	}
		
	public function edit()
	{
		if(isset($_POST['pname']) && isset($_POST['pid']) && isset($_POST['price']))
			$this->model->edit($_POST['pid'], $_POST['pname'], $_POST['price']);
	}
	
	public function newProduct()
	{
		if(isset($_POST['pname']) && isset($_POST['price']) && isset($_POST['cid'])) {
			$this->model->newProduct($_POST['pname'], $_POST['price'], $_POST['cid']);
			header("Location: index.php?page=product");
		}
		if(isset($_SESSION['usr']))
		{
			$twig = parent::getViewLoader();
			$template = $twig->loadTemplate('newproduct.phtml');
			$template->display(array("product" => $product, "session" => array("usr" => $_SESSION['usr'])));
		}
	}
	
	public function delete()
	{
		if(isset($_GET['pid']))
			$this->model->delete($_GET['pid']);
		
		$this->showAll();
	}
}



?>