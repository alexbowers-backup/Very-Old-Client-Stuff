<?php
$syntaxTree = array(
			'regex' => '/(.*)/',
			0 => array(
				'regex' => '/(.*)/',
				array(
					'regex' => '/(.*)/',
					'nested' => false,
					array(
						'regex' => 'equals',
						'token' => 'T_EQUALS'
					),
					array(
						'regex' => 'identical',
						'token' => 'T_IDENT'
					),
					array(
						'regex' => 'compare',
						'token' => 'T_COMP'
					),
					array(
						'regex' => '/(.*)/',
						'token' => 'T_TEST'
					)
				),
				array(
					'regex' => 'Variable Check',
					'nested' => false,
					array(
						'regex' => 'Variable Set',
						'token' => 'T_VAR_SET'
					),
					array(
						'regex' => 'Variable Get',
						'token' => 'T_VAR_GET'
					)
				),
				array(
					'regex' => 'iteration',
					'nested' => true,
					array(
						'regex' => 'For Loop Start',
						'token' => 'T_FOR_START'
					),
					array(
						'regex' => 'For Loop End',
						'token' => 'T_FOR_END'
					),
					array(
						'regex' => 'While Loop Start',
						'token' => 'T_WHILE_START'
					),
					array(
						'regex' => 'While Loop End',
						'token' => 'T_WHILE_END'
					)
				),
				array(
					'regex' => 'statement',
					'nested' => true,
					array(
						'regex' => 'If Start',
						'token' => 'T_IF_START'
					),
					array(
						'regex' => 'block open',
						'token' => 'T_OPEN_BLOCK'
					),
					array(
						'regex' => 'block close',
						'token' => 'T_CLOSE_BLOCK'
					),
					array(
						'regex' => 'Elif Start',
						'token' => 'T_ELIF_START'
					),
					array(
						'regex' => 'Else Start',
						'token' => 'T_ELSE_START'
					),
					array(
						'regex' => 'If End',
						'token' => 'T_IF_END'
					)
				),
				array(
					'regex' => 'basic',
					'nested' => false,
					array(
						'regex' => 'output',
						'nested' => false,
						array(
							'regex' => 'new line',
							'token' => 'T_NEW_LINE'
						),
						array(
							'regex' => 'inline',
							'token' => 'T_INLINE'
						)
					)
				)
			)
		);
	$string = 'String Here we go "Hello World"';
	$array = explode(PHP_EOL, $string);
	$q = new SplQueue();
	foreach($array as $k => $v){
		preg_match_all('/"(?:\\\\.|[^\\\\"])*"|\S+/',$v, $array2[$k]);
	}
	foreach($array2 as $k => $v){
		foreach($v as $j => $w){
			foreach($w as $l => $x){
				$q->enqueue(recursive($x, $syntaxTree));
			}
		}
		$q->enqueue('T_FILE_NEW_LINE');
	}
	print_r($q);
	function recursive($input, $tree) {
		foreach($tree as $k => $v){
			echo '<pre> ';
			print_r($v);
			echo '</pre>';
			if(preg_match($tree['regex'],$input) === true){
				unset($tree['regex']);
				if(is_array($tree)){
					return recursive($input, $tree);
				} else {
					return $tree['token'];
				}
			}
		}
		return false;
	}