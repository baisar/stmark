<?php
	namespace Main; 

	use Zend\Session\Container,
		Main\Acl\Acl; 

	/**
	* Module
	*/
	class Module
	{
		
		public function getConfig()
		{
			return include __DIR__."/config/module.config.php";
		}

		public function getAutoloaderConfig()
		{
			return [
				"Zend\Loader\StandardAutoloader" => [
					"namespaces" => [
						__NAMESPACE__ => __DIR__."/src/".__NAMESPACE__
					]
				]
			];
		}

		public function getServiceConfig()
		{
			return [
				'factories' => [
	                'Zend\Authentication\AuthenticationService' => function ($serviceManager) {
	                    // If you are using DoctrineORMModule:
	                    return $serviceManager->get('doctrine.authenticationservice.orm_default');

	                    // If you are using DoctrineODMModule:
	                    return $serviceManager->get('doctrine.authenticationservice.odm_default');
	                },
            	],
			]; 
		}

		// 
		public function onBootstrap($e)
		{
			$application = $e->getParam('application'); 
			$sm = $application->getServiceManager(); 
	    	$viewModel = $application->getMvcEvent()->getViewModel();

	    	// ACL
			$eventManager = $application->getEventManager();
			$eventManager->attach(\Zend\Mvc\MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'));

		}

		public function onDispatch(\Zend\Mvc\MvcEvent $e)
			{
			    $routeMatch = $e->getRouteMatch();
			    $controller = $routeMatch->getMatchedRouteName(); 
			    $action = $routeMatch->getParam('action');
			    
			    // application
				$application = $e->getApplication();
				$sm = $application->getServiceManager();
		    	$vm = $application->getMvcEvent()->getViewModel();

				// identity 
				$identity = $sm->get("doctrine.authenticationservice.orm_default")->getIdentity();


		    	# set admin login layout
		    	if($controller == "admin" && !$identity)
		    		$vm->setTemplate("login");
		    	
				# set admin layout if it's admin
		    	if($controller == "admin" && $identity)
		    		$vm->setTemplate("admin");

				// ACL
				// @var Acl List Config
				$config = $sm->get("config")["acl"];
				$acl = new Acl($config);

				$role = Acl::DEFAULT_ROLE;

				//set Roles
				if($identity){
					switch ($identity->getRole()) {
						case 1:
							$role = Acl::DEFAULT_ROLE;
							break;
						
						case 2:
							$role = "member";
							break;

						case 3:
							$role = "admin";
							break;

						default:
							$role = Acl::DEFAULT_ROLE;
							break;
					}
				}
				// echo $role;
				if(!$acl->hasResource($controller)) throw new \Exception("Resource ".$controller." wasnt found in the Acl", 1);
				// if not allowed  - redirect setting error 302
				if(!$acl->isAllowed($role,$controller,$action)){
					// LOGIN PAGE
					if($controller == "admin"){
						$vm->setTemplate("login");
						return $vm;
					}
					$url = $e->getRouter()->assemble([],["name" => "home"]);
					$response = $e->getResponse();

					$response->getHeaders()->addHeaderLine("Location",$url);

					$response->setStatusCode(302);
					$response->sendHeaders();
					exit();
				}

				// print_r($config);
				// $acl = new Acl();
			}
	}