<?php 
	namespace Main\Form; 

	use Zend\Form\Form; 

	/**
	* Apply
	*/
	class Apply extends Form
	{
		protected $manager; 
		protected $val;
		function __construct($manager,$val)
		{
			parent::__construct("Apply"); 
			$this->manager = $manager;
			$this->val = $val;
			$this->setAttribute("class","apply"); 
			$this->createElements(); 
		}

		public function createElements()
		{
			$this->add([
				"type" => "text",
				"name" => "name",
				"options" => [
					"label" => "First name",
				],
				"attributes" => [
					"required" => 1,
					"id" => "name"
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "last_name",
				"options" => [
					"label" => "Last name",
				],
				"attributes" => [
					"required" => 1,
					"id" => "last_name"
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "cell",
				"options" => [
					"label" => "Cell phone",
				],
				"attributes" => [
					"required" => 1,
					"id" => "cell"
				]
			]); 

			$this->add([
				"type" => "text",
				"name" => "email",
				"options" => [
					"label" => "Email",
				],
				"attributes" => [
					"required" => false,
					"id" => "email"
				]
			]); 

			$this->add([
				"type" => "DoctrineModule\Form\Element\ObjectSelect",
				"name" => "cat",
				"options" => [
					'object_manager' => $this->manager,
	                'target_class' => 'Application\Entity\JobCategory',
	                'property' => 'title',
					"label" => "Job category",
				],
				"attributes" => [
					"id" => "cat",
					"required" => false,
					"value" => $this->val
				]
			]);

			$this->add([
				"type" => "file",
				"name" => "cv",
				"options" => [
					"label" => "Resume",
				],
				"attributes" => [
					"required" => false,
					"id" => "cv"
				]
			]); 
		}
	}

?>