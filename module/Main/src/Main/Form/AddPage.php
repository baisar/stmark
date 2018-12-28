<?php 
	namespace Main\Form; 

	use Zend\Form\Form; 

	/**
	* AddPage
	*/
	class AddPage extends Form
	{

		// @var Doctrine\ORM\EntityManager
		private $manager; 

		// @param Doctrine\ORM\EntityManager
		function __construct($manager)
		{
			parent::__construct("AddPage"); 
			$this->manager = $manager; 
			$this->setAttribute("class","addPage"); 
			$this->createElements(); 
		}

		public function createElements()
		{
			$this->add([
				"type" => "text",
				"name" => "title",
				"options" => [
					"label" => "Page title",
				],
				"attributes" => [
					"id" => "title",
					"required" => 1
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "short",
				"options" => [
					"label" => "Short description",
				],
				"attributes" => [
					"id" => "short",
					"required" => false,
					
				]
			]); 

			$this->add([
				"type" => "textarea",
				"name" => "content",
				"options" => [
					"label" => "content",
				],
				"attributes" => [
					"id" => "content",
					"required" => false
					
				]
			]); 

			/*$this->add([
				"type" => "text",
				"name" => "price",
				"options" => [
					"label" => "Product price",
				],
				"attributes" => [
					"id" => "price",
					"required" => 1,
					
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "rest",
				"options" => [
					"label" => "Rest of products",
				],
				"attributes" => [
					"id" => "rest",
					"required" => 1,
					
				]
			]); */

			$this->add([
				"type" => "DoctrineModule\Form\Element\ObjectSelect",
				"name" => "category",
				"options" => [
					'object_manager' => $this->manager,
	                'target_class' => 'Application\Entity\Categories',
	                'property' => 'title',
					"label" => "Product category",
				],
				"attributes" => [
					"id" => "cat",
					"required" => false,
					"value" => 1
				]
			]); 

			$this->add([
				"type" => "file",
				"name" => "thumbnail",
				"options" => [
					"label" => "Thumbnail"
				],
				"attributes" => [
					"required" => false,
					"id" => "thumbnail"
				]
			]);  
		}
	}
 ?>