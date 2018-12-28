<?php 
	return [
		"acl" => [
			"acl" => [
				"roles" => [
					"guest" => null,
					"member" => "guest",
					"admin" => "member"
				],
				"resources" => [
					"allow" => [
						"main" => [
							"index" => "guest",
							"services" => "guest",
							"apply-for-job" => "guest",
							"resources" => "guest",
							"contacts" => "guest",
							"about-us" => "guest"
						],
						"user" => [
							"index" => "member",
							"edit" => "member",
							"crop" => "member",
							"logout" => "member",
							"view-order" => "member",
							"signin" => "guest",
							"signup" => "guest",
							
						],
						"admin" => [
							"index" => "guest",
							"config" => "admin",
							"pages" => "admin",
							"add-cat" => "admin",
							"edit-cat" => "admin",
							"remove-cat" => "admin",
							"add-page" => "admin"
						]

					],
					"deny" => [
						"user" => [
							// "index" => "guest"
						]
					]	     
				]
			]
		]
	];

?>