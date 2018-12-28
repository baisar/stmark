<?php 
	namespace Main\Form; 

	use Zend\Form\Form; 

	/**
	* Upload
	*/
	class Upload extends Form
	{
		// @param Doctrine\ORM\EntityManager
		function __construct()
		{
			parent::__construct("Upload"); 
			$this->createElements(); 
		}

		public function createElements()
		{
			$this->add([
				"type" => "file",
				"name" => "thumbnail",
				"options" => [
					"label" => "Image"
				],
				"attributes" => [
					"required" => false,
					"id" => "image"
				]
			]);  
		}
	}
 ?>