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

			$this->add([
				"type" => "text",
				"name" => "mainPageText",
				"options" => [
					"label" => "Main page text",
				],
				"attributes" => [
					"id" => "mpt",
					"required" => false
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "trusted",
				"options" => [
					"label" => "Trusted title",
				],
				"attributes" => [
					"id" => "trusted",
					"required" => false
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "trustedText",
				"options" => [
					"label" => "Trusted text",
				],
				"attributes" => [
					"id" => "trusted_text",
					"required" => false
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "email",
				"options" => [
					"label" => "Email",
				],
				"attributes" => [
					"id" => "email",
					"required" => false
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "email2",
				"options" => [
					"label" => "Email2",
				],
				"attributes" => [
					"id" => "email2",
					"required" => false
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "email3",
				"options" => [
					"label" => "Email3 ",
				],
				"attributes" => [
					"id" => "email3",
					"required" => false
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "email4",
				"options" => [
					"label" => "Email4",
				],
				"attributes" => [
					"id" => "email4",
					"required" => false
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "phone1",
				"options" => [
					"label" => "Phone1",
				],
				"attributes" => [
					"id" => "phone1",
					"required" => false
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "phone2",
				"options" => [
					"label" => "Phone2",
				],
				"attributes" => [
					"id" => "phone2",
					"required" => false
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "phone3",
				"options" => [
					"label" => "Phone3",
				],
				"attributes" => [
					"id" => "phone3",
					"required" => false
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "phone4",
				"options" => [
					"label" => "Phone4",
				],
				"attributes" => [
					"id" => "phone4",
					"required" => false
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "phone5",
				"options" => [
					"label" => "Phone5",
				],
				"attributes" => [
					"id" => "phone5",
					"required" => false
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "address",
				"options" => [
					"label" => "Address",
				],
				"attributes" => [
					"id" => "address",
					"required" => false
				]
			]); 
		}
	}
 ?>