<?php 
	namespace Main\Form; 

	use Zend\Form\Form; 

	/**
	* Config
	*/
	class Config extends Form
	{

		// @var Doctrine\ORM\EntityManager
		private $manager; 

		// @param Doctrine\ORM\EntityManager
		function __construct($manager)
		{
			parent::__construct("config"); 
			$this->manager = $manager; 
			$this->setAttribute("class","config"); 
			$this->createElements(); 
		}

		public function createElements()
		{
			$this->add([
				"type" => "text",
				"name" => "title",
				"options" => [
					"label" => "Web site title",
				],
				"attributes" => [
					"id" => "title",
					"required" => false
				]
			]); 


			$this->add([
				"type" => "text",
				"name" => "description",
				"options" => [
					"label" => "Web site description",
				],
				"attributes" => [
					"id" => "description",
					"required" => false
				]
			]); 
		}
	}
 ?>