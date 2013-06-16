<?php

	$config = array('payments' => array(
							'share' => 0.05,
							'credit_cost' => 2.00,
							'credit_currency' => 'USD',
							'currency_symbol' => '$'
						),
					'system' => array(
							'maintainence_mode' => TRUE,
							'beta' => array(
								'beta_mode' => FALSE,
								'beta_key' => 'zando_beta',
								'beta_places' => 500
							),
							'copyright_info' => '&copy; Alex Bowers 2012',
							'company_name' => 'Zando',
							'company_website' => 'zando.co.uk',
							'company_website_url' => 'http://zando.co.uk',
							'mysql_data' => array(
								'host' => 'localhost',
								'username' => 'zandoco',
								'password' => 'cricket123',
								'database' => 'general',
								'table_prefix' => '',
								'database_prefix' => 'zandocou_'
							)
						),
			  );

?>