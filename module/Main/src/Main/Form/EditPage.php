<?php
	namespace Main\Form; 

	use Zend\Form\Form; 

	/**
	* EditPage
	*/
	class EditPage extends Form
	{
		private $manager;

		function __construct($manager)
		{
			parent::__construct("EditPage"); 
			$this->manager = $manager;
			$this->setAttribute("class","editForm"); 
			$this->createElements(); 
		}

		public function createElements()
		{
			$this->add([
				"type" => "text",
				"name" => "title",
				"options" => [
					"label" => "Title"
				],
				"attributes" => [
					"required" => 1, 
					"id" => "title"
				]
			]); 
			$this->add([
				"type" => "text",
				"name" => "short",
				"options" => [
					"label" => "Short description"
				],
				"attributes" => [
					"required" => false, 
					"id" => "short"
				]
			]); 

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
				"type" => "textarea",
				"name" => "content",
				"options" => [
					"label" => "Content"
				],
				"attributes" => [
					"required" => false, 
					"id" => "content"
				]
			]); 

			$this->add([
				"type" => "file",
				"name" => "thumbnail",
				"options" => [
					"label" => "Thumbnail"
				],
				"attributes" => [
					"required" => 0, 
					"id" => "thumbnail",
					"class" => "materialize-textarea"
				]
			]); 

			

			
		}
	}

?>