<?php
	namespace Main\Controller; 

	use Zend\Mvc\Controller\AbstractActionController,
		Application\Entity\Orders,
		Zend\Session\Container,
		Zend\View\Model\ViewModel,
		DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator, 
		Main\Form\Checkout,
		Main\Filter\CheckoutFilter; 
		

	/**
	* IndexController
	*/
	class IndexController extends AbstractActionController
	{
		// @var Doctrine\ORM\EntityManager
		private $manager; 

		// @param Doctrine\ORM\EntityManager
		public function __construct($manager)
		{
			$this->manager = $manager;

		}
		public function indexAction()
		{
			// Doctrine\ORM\EntityManager
			$manager = $this->manager;  
			$this->layout()->setVariables(["hp" => 1]);
		}

		// Services
		public function logisticServicesAction()
		{
			// Doctrine\ORM\EntityManager
			$manager = $this->manager; 
		}

		// Apply for job
		public function applyForJobAction()
		{
			// Doctrine\ORM\EntityManager
			$manager = $this->manager; 
		}

		// resources
		public function resourcesAction()
		{
			# code...
		}

		// about us
		public function aboutUsAction()
		{
			# code...
		}
		
		// page action
		public function pageAction()
		{
			// Doctrine\ORM\EntityManager
			$manager = $this->manager; 
		}

		// operations
		public function opAction()
		{
			// Doctrine\ORM\EntityManager
			$manager = $this->manager; 

			# kick to hp if not AJAX/GET request
			if(!$this->getRequest()->isPost()) return $this->redirect()->toRoute("home");
		}

		public function contactsAction($value='')
		{
			# code...
		}
	}