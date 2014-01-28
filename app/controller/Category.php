<?php
class Category extends BaseController
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
		$cats = $this->model->getAllCategories();
	
		//$this->render();
		
		//Load a twig template
		$twig = parent::getViewLoader();
		$template = $twig->loadTemplate('categories.phtml');
		
		$template->display(array("cats" => $cats));		
	}
	
	public function showCategory()
	{
		$cat = $this->model->getCategory($_GET['cid']);
		
		//Load a twig template
		$twig = parent::getViewLoader();
		$template = $twig->loadTemplate('category.phtml');
		
		$template->display(array("cat" => $cat));
	}
}



?>