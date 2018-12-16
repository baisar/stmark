 <?php
 	/*
		Navigation
 	*/
	return [
		"navigation"=>[
			"default"=>[
				[
					"label" => "logistic services",
					"route" => "main",
					"action" => "logistic-services",
					"icon" => "sync"
				],
				[
					"label" => "Apply for job",
					"route" => "main",
					"action" => "apply-for-job",
					"icon" => "assignment_ind"
				],
				[
					"label" => "About us",
					"route" => "main",
					"action" => "about-us",
					"icon" => "photo_library"
				],
				[
					"label" => "Contacts",
					"route" => "main",
					"action" => "contacts",
					"icon" => "contacts"
				],
				[
					"label" => "News",
					"route" => "main",
					"action" => "contacts",
					"icon" => "contacts"
				],
			],

			"second_navigation" => [
				[
					"label" => "Магазины",
					"route" => "shops",
					"action" => "all",
					"icon" => "shop",
					"pages" => [
						["route" => "shops"],
						["route" => "kanzler"],
						["route" => "konditer"],
						["route" => "prod"],
						["route" => "clothes"],
						["route" => "dish"],
						["route" => "strmat"],
						["route" => "dishwash"],
						["route" => "boots"],
						["route" => "comp"],
						["route" => "hometech"],
						["route" => "furniture"],
						["route" => "oboi"]
					]
				],
			]
		],
		"service_manager"=>[
			"factories"=>[
				"navigation" => "Zend\Navigation\Service\DefaultNavigationFactory",
				"second_navigation" => "Main\Navigation\SecondaryNavigationFactory",
				"blocks" => "Main\Navigation\BlocksNavigationFactory",
			]
		]
	];
	