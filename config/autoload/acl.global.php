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
							"add-page" => "admin",
							"edit-page" => "admin",
							"remove-cat" => "admin",
							"config" => "admin"
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