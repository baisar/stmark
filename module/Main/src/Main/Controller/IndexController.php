<?php
	namespace Main\Controller; 

	use Zend\Mvc\Controller\AbstractActionController,
		Application\Entity\Apply as App,
		Zend\Session\Container,
		Zend\View\Model\ViewModel,
		DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator, 
		Main\Form\Apply,
		Main\Filter\ApplyFilter; 
		

	# IndexController
	class IndexController extends AbstractActionController{

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

			$query = $manager->createQuery("SELECT u FROM Application\Entity\Pages u WHERE u.category = 1")->setMaxResults(3);
			$result = $query->getResult();

			return [
				"services" => $result
			];
		}

		// Services
		public function servicesAction(){

			// Doctrine\ORM\EntityManager
			$manager = $this->manager; 

			$id = $this->params()->fromRoute("id");
			$id = ceil($id);
			if($id):
				$query = $manager->createQuery("SELECT u FROM Application\Entity\Pages u WHERE u.id = $id");
				$result = $query->getResult();
				if(!isset($result[0])){
					exit("not found");
				}
				$viewModel = new ViewModel();
				$viewModel->setVariables(["page" => $result[0]]);
				$viewModel->setTemplate("main/index/service");
				return $viewModel;
			endif;

			// get page info
			$query = $manager->createQuery("SELECT u FROM Application\Entity\Pages u WHERE u.id = 10 ");
			$result = $query->getResult()[0];

			// get services
			$query2 = $manager->createQuery("SELECT u FROM Application\Entity\Pages u WHERE u.category = 1 AND u.hidden IS NULL");
			$result2 = $query2->getResult();


			return [
				"page" => $result,
				"services" => $result2,
			];
		}

		// Apply for job
		public function applyForJobAction(){

			# Doctrine\ORM\EntityManager
			$manager = $this->manager;  

			$id = ceil($this->params()->fromRoute("id"));

			if($id):
				$query = $manager->createQuery("SELECT u FROM Application\Entity\Pages u WHERE u.id = $id");
				$result = $query->getResult();
				// if(!isset($result[0])) exit("not found");
				$request = $this->getRequest();

				$viewModel = new ViewModel();
				if($id == 12 || $id == 13):
					if($id == 13) $form = new Apply($manager,2);
					else $form = new Apply($manager,1);

					if($request->isPost()){
						$data = $request->getPost();
						$files = $request->getFiles();
						$apply = new App;
						$form
							->setHydrator(new DoctrineHydrator($manager,"Apply"))
							->setInputFilter(new ApplyFilter)
							->bind($apply);

						$data = $request->getPost();
						$files = $request->getFiles();
						if($files->cv) $data->cv = $files->cv;
						$form->setData($data);

						if($form->isValid()){
							# rename uploaded
							if(is_array($data->cv)){
								# save uploaded image
								$filter = new \Zend\Filter\File\RenameUpload([
									"target"=>"./public/docs",
									"use_upload_extension" => true,
			                    	"use_upload_name" => false,
			                    	"randomize" => 1
									]); 
								$ar = $filter->filter($data->cv); 
								$pos =  strpos($ar["tmp_name"], "php"); 
								$filename =  substr($ar["tmp_name"], $pos); 
								$apply->setResume($filename);
							}

							$manager->persist($apply);
							$manager->flush();

							echo json_encode(["status" => "ok"]);
							exit;
						}
						else{
							echo json_encode($form->getMessages());
							exit;
						}
					}
					$viewModel->setVariables(["form" => $form,"page" => $result[0]]);
				else:
					$viewModel->setVariables(["page" => $result[0]]);
				endif;
				$viewModel->setTemplate("main/index/apply");
				return $viewModel;
			endif;


			// get page info
			$query = $manager->createQuery("SELECT u FROM Application\Entity\Pages u WHERE u.id = 11 ");
			$result = $query->getResult()[0];

			$query2 = $manager->createQuery("SELECT u FROM Application\Entity\Pages u WHERE u.category = 2 AND u.hidden IS NULL");
			$result2 = $query2->getResult();

			return [
				"page" => $result,
				"result" => $result2
			];
		}

		// resources
		public function resourcesAction()
		{
			# code...
		}

		// about us
		public function aboutUsAction()
		{
			// Doctrine\ORM\EntityManager
			$manager = $this->manager; 

			// get page info
			$query = $manager->createQuery("SELECT u FROM Application\Entity\Pages u WHERE u.id = 14 ");
			$result = $query->getResult()[0];

			return [ "page" => $result ];
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