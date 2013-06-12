<?php
return array(
	'version' => 
	array(
		'app' => 
		array(
			'default' => 
			array(
				0 => '001_create_users',
				1 => '002_create_access_rights',
				2 => '003_create_customers',
				3 => '004_create_panels',
				4 => '005_create_disorders',
				5 => '006_create_global_panel_prices',
				6 => '007_create_monthly_customers',
				7 => '008_create_invoices',
				8 => '009_create_local_panel_prices',
				9 => '011_create_states',
				10 => '012_create_cities',
			),
		),
		'module' => 
		array(
		),
		'package' => 
		array(
			'auth' => 
			array(
				0 => '001_auth_create_usertables',
				1 => '002_auth_create_grouptables',
				2 => '003_auth_create_roletables',
				3 => '004_auth_create_permissiontables',
				4 => '005_auth_create_authdefaults',
				5 => '006_auth_add_authactions',
				6 => '007_auth_add_permissionsfilter',
			),
		),
	),
	'folder' => 'migrations/',
	'table' => 'migration',
);
