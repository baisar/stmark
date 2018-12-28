<?php 
	namespace Main\Filter; 

	use Zend\InputFilter\InputFilter,
		Zend\Validator\File\Size, 
		Zend\Validator\File\Extension ; 

	/**
	* ApplyFilter
	*/
	class ApplyFilter extends InputFilter
	{		
		function __construct()
		{
			$this->add([
				"name" => "cv",
				"required" => false,
				"validators" => [
					[
						"name" => Size::class,
						"options" => [
							"max" => "4MB"
						]
					],
					[
						"name" => Extension::class,
						"options" => [
							"extension" => ["PDF","pdf"]
 						]
					]
				]
			]); 
		}
	}

 ?>