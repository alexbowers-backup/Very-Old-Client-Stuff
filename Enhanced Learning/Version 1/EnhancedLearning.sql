-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 01, 2013 at 01:10 AM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `EnhancedLearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(1) NOT NULL DEFAULT '1',
  `difficulty` int(1) NOT NULL,
  `title` varchar(64) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `active`, `difficulty`, `title`, `desc`) VALUES
(4, 1, 3, 'SQL - Get average cost of product', 'Assume the following table exists:<br /><br />\r\n\r\nProduct ID<br />\r\nProduct Name<br />\r\nProduct Cost<br /><br /><br/>\r\n\r\nGet the average cost of All products, using only SQL.\r\n<br /><br />\r\nYOU CANNOT USE THE BUILT IN AVERAGE FUNCTION OF MYSQL\r\n<br /><br />\r\nOnce done, just use PHP to output to test.\r\n<br /><br />\r\nThe uploaded Code should be your entire page, including opening tag; although you will only be marked on the SQL statement'),
(7, 1, 4, 'Only one Computer at a time', 'Your task is to ensure that if a user were to log into computer A, and then try to log into computer B, that computer A would automatically sign them out. <br /><br />You can achieve this with five little words in SQL. If you can tell me these words (In order) then you will get full marks.\r\n<br /><Br />\r\nmarks for this one are as such:\r\n<br /><br />\r\n10 - Completely Correct<br />\r\n8 - Correct words, wrong order<br />\r\n5 - Nearly correct words (typos)<br />\r\n3 - Two of these words<br />\r\n0 - Any less than two words (Or not attempted)'),
(8, 1, 4, 'Factorial | Procedural', 'Your task is to create a mathematical function, which is called Factorial.\r\n<br /><br />\r\nThe way this works is that a number is provided. Eg, 5. And the function multiplies it with every number below that (to 1).\r\n<br />\r\nEg. <br />\r\n<br />\r\n5! = 5 &times; 4 &times; 3 &times; 2 &times; 1 = 120.\r\n<br /><br />\r\nYou will have a user provide a number, and have it output the value.'),
(9, 1, 5, 'Factorial | Recursive', 'Your task is to create a mathematical function, which is called Factorial.\r\n<br /><br />\r\nThe way this works is that a number is provided. Eg, 5. And the function multiplies it with every number below that (to 1).\r\n<br />\r\nEg. <br />\r\n<br />\r\n5! = 5 &times; 4 &times; 3 &times; 2 &times; 1 = 120.\r\n<br /><br />\r\nYou will have a user provide a number, and have it output the value.'),
(10, 1, 1, '99 Bottles of beer', 'Your task is to create the lyrics to the song: 99 Bottles of beer on the wall.<br /><Br />\r\n\r\n<a href="http://99-bottles-of-beer.net/lyrics.html">Songs Lyrics</a>'),
(11, 1, 3, 'Fibonacci Sequence ', 'Your task is to create a function that will calculate the fibonacci sequence to the nth place.\r\n<br /><br />\r\nEg, to the 4th place it will be:\r\n<br /><br />\r\n1, 1, 2, 3<br /><Br />\r\n\r\nThe forumla to calculate the value is recursively given as:<br /><Br />\r\n<img src="http://upload.wikimedia.org/math/0/c/e/0cebc512d9a3ac497eda6f10203f792e.png" /><br /><br /><img src="http://upload.wikimedia.org/math/e/0/5/e05276e09ba8eb1077d51f142555870f.png" />'),
(12, 1, 4, 'Noughts and Crosses', 'Your task is to create a simple Noughts and Crosses game. The user will have an input box which submits two coordinates (x,y).<br /><br /> You will not need to create the front end. But your functions should take these coordinates. And work assuming that they are within the range.\r\n<br />\r\nThe range that we will work with is a 3x3 grid.<br /><br />This will assume that there are two players. No AI needs to be coded.');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE IF NOT EXISTS `enrolled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `grade` int(2) NOT NULL DEFAULT '-1',
  `code` text NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_2` (`user_id`,`assignment_id`),
  KEY `assignment_id` (`assignment_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`id`, `user_id`, `assignment_id`, `grade`, `code`, `comments`) VALUES
(33, 3, 4, 0, '', ''),
(34, 5, 4, 0, '<?php\r\n\r\nphpinfo();', '// MARKING EDIT\r\n//\r\n// No marks were awarded due to incorrect understanding of the assignment and / or inability to complete to a competent level'),
(35, 13, 4, -1, '', ''),
(36, 17, 4, -1, '', ''),
(37, 18, 4, -1, '', ''),
(38, 19, 4, 8, '<?php\r\n\r\n$connection = mysql_connect("localhost","root","");\r\n$db = mysql_select_db("test");\r\n\r\n$query = "SELECT SUM(product_cost)/COUNT(*) FROM product"; \r\n$result = mysql_query($query);\r\n\r\nwhile ($row = mysql_fetch_array($result)) {\r\n\r\n	echo $row[0];\r\n\r\n}\r\n\r\n', '// MARKING\r\n//\r\n// Whilst the syntax is all correct, A maximum of 8 marks was awarded. One mark lost for each of the following:\r\n//\r\n// - Not following MySQL Best Practices, and surrounding field and table names with back ticks (`)\r\n// - Unnecessary use of a while loop. Only one result will ever be returned from this particular query, rendering the loop useless as it will iterate once.'),
(39, 20, 4, -1, '', ''),
(40, 21, 4, -1, '', ''),
(41, 22, 4, -1, '', ''),
(42, 23, 4, -1, '', ''),
(43, 19, 7, 8, 'CREATE TRIGGER connection_limit_trigger\r\nON ALL SERVER\r\nFOR LOGON', 'Interesting method. This isn''t the method I was looking for. However, this appears to work, and so I have awarded 8 marks.'),
(45, 17, 10, 10, '<?php\r\n\r\n$beer	=	99;\r\n\r\nwhile ($beer >= 0) {\r\n	\r\n	$suffix = ($beer != 1) ? ''s'' : '''';\r\n	\r\n	if ($beer > 1) {\r\n		echo "<p>{$beer} bottle{$suffix} of beer on the wall, {$beer} bottle{$suffix} of beer.<br>\r\n				Take one down and pass it around, {$beer} bottle{$suffix} of beer on the wall.</p>";\r\n		$beer--;\r\n	} else {\r\n		echo "<p>No more bottles of beer on the wall, no more bottles of beer.<br />\r\n		Go to the store and buy some more, 99 bottles of beer on the wall.</p>";\r\n		break;\r\n}\r\n}\r\n\r\n\r\n?>\r\n', '// pretty much perfect code.\r\n// A for loop would have saved you from having to break; the code.'),
(46, 19, 8, 10, '<html>\r\n<head><title>Factorial Function (Recursive)</title></head>\r\n\r\n<body>\r\n\r\n	<form method="post" action="<?php echo $_SERVER[''PHP_SELF'']?>">\r\n		<input type="text" name="argument" placeholder="Type number here..." />\r\n		<input type="submit" />\r\n	<?php\r\n\r\n		function getFactorial($num){\r\n			$n=1;\r\n\r\n			for($i=2;$i<=$num; $i++){\r\n				$n *= $i;\r\n			}\r\n\r\n			return $n;\r\n		}\r\n\r\n		if(isset($_POST[''argument'']))\r\n		{\r\n			$var = (int)(abs($_POST[''argument'']));\r\n			echo $var . ''! = '' . getFactorial($var);\r\n		}\r\n	?>\r\n	</form>	\r\n\r\n</body>\r\n</html>', 'Perfectly coded. \r\nWell done.'),
(47, 19, 9, 10, '<html>\r\n<head><title>Factorial Function (Recursive)</title></head>\r\n\r\n<body>\r\n\r\n	<form method="post" action="<?php echo $_SERVER[''PHP_SELF'']?>">\r\n		<input type="text" name="argument" placeholder="Type number here..." />\r\n		<input type="submit" />\r\n	<?php\r\n\r\n		function getFactorial($num){\r\n			if ($num<=1)\r\n				return 1;\r\n			else\r\n				return $num*getFactorial($num-1);\r\n		}\r\n\r\n		if(isset($_POST[''argument''])){\r\n			$var = $_POST[''argument''];\r\n			echo $var . ''! = '' .getFactorial($var);\r\n		}\r\n	?>\r\n	</form>	\r\n\r\n</body>\r\n</html>', 'Perfectly coded.'),
(48, 26, 4, -1, '', ''),
(49, 27, 4, -1, '', ''),
(50, 28, 11, -1, '', ''),
(51, 29, 10, -1, '', ''),
(52, 5, 11, -1, '', ''),
(53, 33, 4, -1, '', ''),
(54, 34, 11, -1, '', ''),
(55, 15, 4, -1, '', ''),
(56, 15, 10, -1, '', ''),
(57, 7, 9, -1, '', ''),
(58, 39, 4, -1, '', ''),
(59, 40, 4, -2, '', ''),
(60, 41, 4, -1, '', ''),
(61, 44, 4, -1, '', ''),
(62, 44, 11, -1, '', ''),
(63, 3, 11, -2, 'Code', '');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `session_code` varchar(24) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `user_id`, `session_code`) VALUES
(12, 3, '510afa757fb58'),
(14, 5, '5096c3bc3c243'),
(18, 4, '508ec3403ef31'),
(24, 10, '507cd7a98ff0d'),
(26, 12, '509603a551e76'),
(27, 11, '509608b08fea7'),
(28, 14, '5086bd0a353ab'),
(30, 6, '5086a6ddbd217'),
(33, 15, '50aa5c4ee98eb'),
(36, 16, '507d8a10e0f6a'),
(37, 13, '5086d7e3e7550'),
(38, 17, '5096d3484ab63'),
(40, 18, '507dbf04c4ffb'),
(41, 19, '50b2684e463a4'),
(42, 20, '507e52a211b0b'),
(50, 21, '5096d2edd331d'),
(52, 22, '50814f95cee7b'),
(53, 23, '50817cef7fd1a'),
(66, 24, '5086ab7638729'),
(71, 25, '50b7966d0e03d'),
(83, 7, '50b0f7e0bd688'),
(84, 26, '50898d537294a'),
(88, 27, '508c08bba9da6'),
(91, 28, '508ce5c2b3591'),
(93, 29, '508eb4c01772e'),
(97, 31, '508fa6b971695'),
(98, 32, '50912b3a904f2'),
(104, 33, '509b93dd9b980'),
(105, 34, '509bc97cd5c3d'),
(107, 35, '509bf7e43cf35'),
(108, 36, '50a16320eb759'),
(109, 37, '50a2e2a9dcd64'),
(112, 39, '50b1f74e6f366'),
(114, 40, '50b56ea282631'),
(116, 41, '50bb1bda97eac'),
(117, 42, '50ca803aaf806'),
(118, 44, '50ce9e39a3c25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `acc_type` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `acc_type`) VALUES
(1, '', '', 1),
(3, 'bowersbros@gmail.com', 'a2c8a7268623b8b98d84cc739be2843b65960255b67aa0a33ddf4eee24d174836cc8a9463e5af5118f77c4d3c58f67d16b540a72d24bcd73feb7ba1221a5ba7c', 2),
(4, 'Gourlaykid@hotmail.com', '0e128bde0f652f0deb4cef3d84f29f2d45003f64fcecddaecbd686a760d72af77c02de90691907354cb1581f3d3a8e67e89e5c213312fd265516f6f70e507b38', 1),
(5, 'kamal@kamalnasser.net', 'ca5d1b63cad7f11551f10e9f06e0e59b3d9c19782fe2c7a5c821de808437b61b1fb8bef242c59652703493cc547b9fefe47768614080018f91566d74646edc71', 2),
(6, 'chad32@live.co.za', 'dafe7200bb9b5efbed097aa609d3a76a4a6032c29d1692f5325e840f6878e6ab447390c4c01d94719aa39037aa5c2c580bd77a1bdf5c8fc117611f53b4f898fe', 1),
(7, 'arg@msn.com', '27589c8ed313779a902575aad0c8fea2627db360c3bab1d64c6ea59d11b423b96cc8e95aa96d388c1d3aa2678c00e2f8bd2fce396f6da8be4a4517c50d5d82f1', 1),
(10, 'MatthewBrotz@gmail.com', '490323925257458bd869a9c3e524ab910b941542ca96b9c151d293e844eb312ce4dbebb727c24462ba7beeda57016c523c0fccba2a9fcebaa57c6d9d5bc84419', 1),
(11, 'ben97@tpg.com.au', '1ea8e4a4a0ef91fdae00f863dd6dffc3c41a8899012dae78a44a6745b53a40e4615511eb550eb550bb44c6ef544cf36e4693b0bf6622606150d9c6d6672eb8cd', 1),
(12, 'me@hugo.id.au', '1fca2e316503a7ca5b450cafdf262d60e08e4b5f7cd60cfd21cf066c7849ae4ec3b7e5118949e31cc9e799dd77eaf43556a30ef6dc8f583b6fc3a003a7a88702', 1),
(13, 'thomaspalmer@nasu.so', '851b974f256a945e45f28c9173f008cc6dd9ea84309b2e77df63a8b0e8e250a5023a4ff5de08a41f01e754b9da9235ce20389ca82844da890ec2b04ac500292c', 1),
(14, 'ecazs.net@gmail.com', 'c715b0901277f770d1d61767e3dd430333379e29f07eaf5d3b1ab1b35ad8b947df1f392cea3a7ed007b39d196b79cbe2a0a7b89cd65bb693ad67fa5ebbc8e775', 1),
(15, 'mlowe.space@gmail.com', '7c74968310f8e3684b388209238f7a9ba6dd124e5ff869e775df76edc519e60fe6a3a8fcdad13759508f641dd3f4034bc638c20391a475ba97af83457961722a', 1),
(16, 'mikedmartiny@gmail.com', 'f9ea1af28a132f4b7feb0288b760c4a51171037218fcbae8671c5885c5c09b499a319714b1760ce3961e33763bb28702391500671ce3f45e75ee8271b78ae190', 1),
(17, 'temporizer@gmail.com', '1db6a9df969fb2d0a1b3471a866d45688f6120b76bdd5557a0b4b425358e0e6d470b7473555c7969c0c80300dc25a9d693cc8f3daae74dc449d36f0ab0d5b53b', 1),
(18, 'FireDartOnline@gmail.com', '7cc750addcd2a40f715bd513c1c1a83d2f5036f5cb74ec0f7b9965bd1df45e0a28f9567d117c0ac16ca3e4db0fc8cbb821ea4b34133dc40bac0faa86cb3b9ab5', 1),
(19, 'emin.aliyev@gmail.com', '8b13826712a8d1412335cbd1b55a77ea5a1ab6c76936001eacdd6e41be7f530127b9dae8b6bc388ba6f0692e3f0c2154240e9122c3571df0f0d9de90c16c2a4c', 1),
(20, 'mj.matienzo@yahoo.com', '686dc4956a64abc56d8fe01759c75b839a7abf6cd95faf807f09aca2abb9c6400f17351ba26f770d98ecbdf55629bdab57d29c940c223d189bbf0a1a39cc43ef', 1),
(21, 'kim@thinkver.se', '2e5e8404271c70247cb9266ad8e05751a8e63ede95e91e0fb2716318f4a45fe3a3d71f79b342d8d7e3734876e8c0e8560a53e5758b2d72db35efeb57b94d7d1c', 1),
(22, 'rashid04@gmail.com', '47302352ffac798839bb290462dd70bf1b0a95a16fce036c1d3d878e4236db4bade9b8635096e95f46af15370c0c9268f8f1041e7216b7045cdaee5d6afa332a', 1),
(23, 'asdfadsfasdfasdfasdfasdfasdfadf@msn.com', '27589c8ed313779a902575aad0c8fea2627db360c3bab1d64c6ea59d11b423b96cc8e95aa96d388c1d3aa2678c00e2f8bd2fce396f6da8be4a4517c50d5d82f1', 1),
(24, 'tomwignall93@gmail.com', '8ac3c95418f8fc99d60d3177509a29b39f89a84295d735dae7ada583c59f5546338b612e8c86647b4367f854c3bd575d8606ead8b972ef7e676e18cad1ffe8de', 1),
(25, 'asasdfasdfasd@msn.com', '27589c8ed313779a902575aad0c8fea2627db360c3bab1d64c6ea59d11b423b96cc8e95aa96d388c1d3aa2678c00e2f8bd2fce396f6da8be4a4517c50d5d82f1', 1),
(26, 'waleedbaigvevo@gmail.com', '98d5e297394893115efc0972ce33f2222e043b13c012d403c9e624b5adc9f720fdd059a060822dbee41e84c4ee330a524fc8ffbf613129e044a905bf7d236076', 1),
(27, 'georgewallaspa@gmail.com', '546b90f0b03ef036a6fbd732145a615a049b775b93ee83c3d567f4a3b9d8c4d94e678c4e311a07ce6b22225f2b3a6cf680d96835aecafcf90e90edaa9faf8809', 1),
(28, 'casparwylie@gmail.com', '0b3caeb5b943630b317295fecb3fb431d90e63af3f9839a13267525a890a7a30f966f58af0eb82231aec89e2262f05d04e63ef6117b528fb95c8655d31f4a78d', 1),
(29, 'failtroll@live.dk', 'adc3262ba130e8b3dc3d9e89a48055ea5819d9def5a33606ca290678300f270a577a68b552553ff19d1858440571326bd57f57e2bf2139b25f7aac9325ae0b4d', 1),
(30, 'Masello@gmail.com', 'c2a85edeeee767864a2c96f7eca723fb01716842fc34d4495abb7c6c700a0faad27884cf5bcdf5f90667a9715cbbf2560f293922d206ff36a525351437280f93', 1),
(31, 'dabanggknight@hotmail.com', 'fe36b8512e836ad08bfcdff00321a4bf48c9ac229a9b095ec32bc35158930dbbfb7978f5a6065ac3a7f35f341bcaeba0686cfc263ae70a6f77fe30c6e2b5f51c', 1),
(32, 'tom_greeley@hotmail.com', '864cb65bda79a4134e881a101fe6ae80a28fd22dc4674856bab64cee0f58fb72e25d5b8b34c2e1131ecc72c8c5adff986e634bb9ec1a19ea72ed9c1751ab3176', 1),
(33, 'razakhan_87@hotmail.com', 'cd48a1a3064e5fefea16f5a41ed513236258347ffb50dde16eca3cb9a1b0197854b5da6d4554154712ac26095637442963fffbde9f50739035944c29460b235c', 1),
(34, 'djand3y_93@yahoo.com', '400b47f9509d2945677ddfa1cbee3fcbb7258f5afd9f3ea336a58ed5303e9464795026009379e6d43b2cad5595f9be63f4b26b8d3144d87c4f81e0568169020a', 1),
(35, 'pgilmor@gmail.com', 'a842d726ca7f79cf0901f7cd2fe53e534cc8192d4fea4c8ab33c9848f9a16ad7ee9d7faa17d3f7d2b60cb590a654c04829663f66e5555de46f35d57932752ccd', 1),
(36, 'vishtany@gmail.com', 'd464f8483a0d8a54145419f2943bc9545d0d990f90972de4d8e2410c2f287533105d1a7a7072eb33a8b442085095a632caf3e9819163d594462bb19c66aef453', 1),
(37, 'jacob.gustafson@hotmail.se', '436c7bb8558081cb1f865276ab2eb26ae90a031dc8efa86e2efaeb9152eab849af9e4740edbc36d22082df093b8baaec6543b6db8a36266401b0da4b867b0e5b', 1),
(38, 'sa@sa.com', '35671444de6db5b70464badb48364afc2945f5e5a934099b9255a2e28936ce8662775d593ec1ce10740f7f30dad19fd05df1d3056941de07b6abafa86126b208', 1),
(39, 'jenskvist@me.com', '0e5ace0b53339c1ef953ff6c49d43760ef2bf7e17139c0de4aef0bf394386c6245c21d1bde54b00cd50e14a9faf4b26c2bb3200de097c186aa92a99b09556382', 1),
(40, 'daljeetseni@gmail.com', 'd994efd40a625742d4e68e6101ec6d556ef56e973caaf41d8aef0ef7e21577bc03102d93df98599966a4ba5dd9e35177838274b8dc9bd94316596027a4565b1b', 1),
(41, 'ananthpranav20@gmail.com', 'f2f128652e89bcfd0c1c1040dfabc5099484aa50bd362770b285614c59f4ff8cdccfd155e008906fd9da7344ac6304f3e25de774dfb111c7b88b8d8a152668c2', 1),
(42, 'ethanswett@yahoo.com', '3257775e9fed7faba456dfffc93fdb417f22aa7f48ed60c3f4a912173fac1c54c3c4aa2a11d3bf3e64b7b53960785e4f3c3a7b8b98ae8703baa2e336955ad3c2', 1),
(43, 'angel_love_2298@yahoo.com', '3257775e9fed7faba456dfffc93fdb417f22aa7f48ed60c3f4a912173fac1c54c3c4aa2a11d3bf3e64b7b53960785e4f3c3a7b8b98ae8703baa2e336955ad3c2', 1),
(44, 'modelcars4me@yahoo.com', 'ed99df29c2db2bf7f511d6551ed9e51df895652e53fcd4d4811a712d3c9bd9381920ce529cbb6b4ae26a33134d28b0fea1053319b8b0f3587fefda02aec699e5', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `enrolled_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolled_ibfk_2` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
