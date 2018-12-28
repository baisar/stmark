<?php
	namespace Main\Controller; 

	use Zend\Mvc\Controller\AbstractActionController; 
	use	Application\Entity\{Orders, Products,Pages}; 
	use	Zend\Session\Container,
		Zend\View\Model\ViewModel,
		DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator; 
	use	Main\Form\{Signin,EditPage,Config,AddPage}; 
	use	Main\Filter\{CheckoutFilter, ProductFilter, AddCatFilter}; 
		

	/**
	* AdminController
	*/
	class AdminController extends AbstractActionController
	{
		private $manager;		# @var Doctrine\ORM\EntityManager
		protected $auth; 		# Zend\Authentication\AuthenticationService

		# @param Doctrine\ORM\EntityManager
		public function __construct($manager,$auth)
		{
			$this->manager = $manager;
			$this->auth = $auth;
		}

		public function indexAction()
		{
			// Doctrine\ORM\EntityManager
			$manager = $this->manager; 


			// signin in
			$request = $this->getRequest();
			if($request->isPost()):
				$data = $request->getPost();

				# logout
				if($data->logout){
					$this->auth->clearIdentity();
					exit(json_encode(["status"=>"ok"]));
				}

				$adapter = $this->auth->getAdapter(); 
				$adapter
					->setIdentity($data->email)
					->setCredential($data->pass);

				$authRes = $this->auth->authenticate();				

				if ($authRes->isValid()) {
					$this->auth->getStorage()->write($this->identity());
					echo json_encode(["status" => "ok"]);
					exit;
				}
				else exit(json_encode(["status" => "wrong"]));

			endif;

			if(!$this->identity()){
				$form = new Signin;

				$view = new ViewModel;
				$view->setVariables(["form"=>$form]);
				$view->setTemplate("main/admin/login");
				return $view;
			}

		}

		// add prod
		public function pagesAction()
		{
			// Doctrine\ORM\EntityManager
			$manager = $this->manager; 

			# page id
			$id = ceil($this->params()->fromRoute("id"));

			$request = $this->getRequest();

			if($id && !$request->isPost()):
				$query = $manager->createQuery(" SELECT u FROM Application\Entity\Pages u WHERE u.id = $id");
				$result = $query->getResult();
				# 404 if repo not found
				if(!isset($result[0])){
					$this->getResponse()->setStatusCode(404);
					return;
				}

				# edit form
				$form = new EditPage($manager);
				$form->setHydrator(new DoctrineHydrator($manager,"Application\Entity\Pages"));
				$form->bind($result[0]);

				$vm = new ViewModel;
				$vm
					->setTemplate("main/admin/edit-page")
					->setVariables(["page" => $result[0], "form"=>$form ]);
				return $vm;
			endif;

			if($request->isPost()){
				$data = $request->getPost();

				# delete img
				if($data->pageId){
					$pageId = $data->pageId;
					$img = $data->delImg;
					
					$query = $manager->createQuery(" SELECT u FROM Application\Entity\Pages u WHERE u.id = $pageId");
					$result = $query->getResult();

					unlink("./public/img/{$img}");
					$result[0]->setThumbnail(null);

					$manager->persist($result[0]);
					$manager->flush();
					echo json_encode(["status" => "ok"]);
					exit;
				}

				# add img
				if($data->addImg){
					print_r($data);exit;
					$page = new Pages;
					$form = new EditPage;
					$form
						->setHydrator(new DoctrineHydrator($manager,"Pages"))
						->bind($page);
					$form->setData($data);
					if($form->isValid()){
						echo "OK";
					}
					else echo json_encode($form->getMessages());
					exit;

				}

				# edit page
				if($data->editpage):
					$files = $request->getFiles();
					if($files["thumbnail"]["tmp_name"]) $data->thumbnail = $files["thumbnail"];
					else $data->thumbnail = null;

					$query = $manager->createQuery(" SELECT u FROM Application\Entity\Pages u WHERE u.id = $id");
					$result = $query->getResult();
					
					# kick error if no repo
					if(!isset($result[0])) exit(json_encode(["status" => "error"]));

					$form = new EditPage($manager);
					$form->setHydrator(new DoctrineHydrator($manager,"Pages"));
					$form->bind($result[0]);

					# set old name
					$oldName = "";
					if(!$data->thumbnail)
						if($result[0]->getThumbnail()){
							$result[0]->setThumbnail($result[0]->getThumbnail());
							$oldName = $result[0]->getThumbnail();
							$data->thumbnail = $result[0]->getThumbnail();
						}
					$form->setData($data);
					if($form->isValid()){

						# save img
						if(is_array($data->thumbnail)){
							# save uploaded image
							$filter = new \Zend\Filter\File\RenameUpload([
								"target"=>"./public/img",
								"use_upload_extension" => true,
		                    	"use_upload_name" => false,
		                    	"randomize" => 1
								]); 
							$ar = $filter->filter($data->thumbnail); 
							$pos =  strpos($ar["tmp_name"], "php"); 
							$filename =  substr($ar["tmp_name"], $pos); 
							$result[0]->setThumbnail($filename);
						}

						$manager->persist($result[0]);
						$manager->flush();
						echo json_encode(["status" => "ok"]);
					}
					else print_r($form->getMessages());
					exit;
				endif;

				# hide page
				if($data->hidepage):
					$pageId = ceil($data->hidepage);;
					# kick error if not int id
					if(!$pageId) exit(json_encode(["status" => "error"]));
					# get repository
					$query = $manager->createQuery(" SELECT u FROM Application\Entity\Pages u WHERE u.id = $pageId");
					$result = $query->getResult();
					#kick error if no repo found
					if(!isset($result[0])) exit(["status" => "error"]);

					# set status
					if($result[0]->getHidden() == null)
						$result[0]->setHidden(1);
					else
						$result[0]->setHidden(null);

					$manager->persist($result[0]);
					$manager->flush();

					exit(json_encode(["status" => "ok"]));
				endif;

				# delete page
				if($data->deletepage):
					$pageId = ceil($data->deletepage);;
					# kick error if not int id
					if(!$pageId) exit(json_encode(["status" => "error"]));
					# get repository
					$query = $manager->createQuery(" SELECT u FROM Application\Entity\Pages u WHERE u.id = $pageId");
					$result = $query->getResult();
					#kick error if no repo found
					if(!isset($result[0])) exit(["status" => "error"]);

					$manager->remove($result[0]);
					$manager->flush();

					exit(json_encode(["status" => "ok"]));
				endif;
			}

			$query = $manager->createQuery(" SELECT u FROM Application\Entity\Pages u");
			$result = $query->getResult();

			return [
				"pages" => $result
			];
		}

		public function configAction($value='')
		{
			// Doctrine
			$manager = $this->manager; 

			$query = $manager->createQuery("SELECT u FROM Application\Entity\Config u WHERE u.id = 1");
			$result = $query->getResult(); 

			# config form
			$form = new Config($manager);
			$form
				->setHydrator(new DoctrineHydrator($manager,"Application\Entity\Config"))
				->bind($result[0]);

			# save data
			$request = $this->getRequest();
			if($request->isPost()):
				$data = $request->getPost();
				$form->setData($data);

				if($form->isValid()){
					$manager->persist($result[0]);
					$manager->flush();
					echo json_encode(["status" => "ok"]);
					exit;
				}
				else exit(json_encode([$form->getMessages]));
			endif;

			return [
				"form" => $form,
				"config" => $result
			];
		}

		# add page
		public function addPageAction()
		{
			// Doctrine
			$manager = $this->manager;

			$form = new AddPage($manager);

			$request = $this->getRequest();
			if($request->isPost()):
				$data = $request->getPost();
				$files = $request->getFiles();
				if($files["thumbnail"]["tmp_name"]) $data->thumbnail = $files["thumbnail"];
				else $data->thumbnail = null;

				$page = new Pages;

				$form = new EditPage($manager);
				$form->setHydrator(new DoctrineHydrator($manager,"Pages"));
				$form->bind($page);

				$form->setData($data);
				if($form->isValid()){
					# save img
					if(is_array($data->thumbnail)){
						# save uploaded image
						$filter = new \Zend\Filter\File\RenameUpload([
							"target"=>"./public/img",
							"use_upload_extension" => true,
	                    	"use_upload_name" => false,
	                    	"randomize" => 1
							]); 
						$ar = $filter->filter($data->thumbnail); 
						$pos =  strpos($ar["tmp_name"], "php"); 
						$filename =  substr($ar["tmp_name"], $pos); 
						$page->setThumbnail($filename);
					}

					$manager->persist($page);
					$manager->flush();
					echo json_encode(["status" => "ok"]);
				}
				else print_r($form->getMessages());
				exit;
			endif;

			return [
				"form" => $form
			];
		}

		public function uploadAction()
		{
			// Doctrine
			$manager = $this->manager;

			$request = $this->getRequest();
			if($request->isPost()):
				$files = $request->getFiles();
				if($files["image"]){
					$form = new \Main\Form\Upload;
					$page = new Pages;
					$form
						->setHydrator(new DoctrineHydrator($manager,"Pages"))
						->bind($page);
					if($form->isValid()){
						# save img
						if(is_array($files->image)){
							# save uploaded image
							$filter = new \Zend\Filter\File\RenameUpload([
								"target"=>"./public/img",
								"use_upload_extension" => true,
		                    	"use_upload_name" => false,
		                    	"randomize" => 1
								]); 
							$ar = $filter->filter($files->image); 
							$pos =  strpos($ar["tmp_name"], "php"); 
							$filename =  substr($ar["tmp_name"], $pos); 
							echo json_encode(["status" => "ok"]);
						}
					}
				}
				exit;
			else:
				return $this->redirect()->toUrl("home");
			endif;
		}

	}