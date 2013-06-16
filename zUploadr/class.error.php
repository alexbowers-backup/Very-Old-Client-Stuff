<?php
	class error {

		public $body;
		public $id;
		public $dateSent;
		public $page;
		public $user;
		public $headers;
		public $traceback;
		public $rawBody;

		public function __construct(){
			date_default_timezone_set('Europe/London');
			$this->page = $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
			$this->user = (isset($_SESSION['username']))?$_SERVER['username']:'Guest';
			$this->headers = $_SERVER;
			$this->dataSent = date('D, d M Y H:i:s O T');
			$dbuser = 'root';
			$dbpass = 'PPZXZkKazTG8e4qf';
			$dbh = new PDO('mysql:host=localhost;dbname=zuploadr',$dbuser,$dbpass);
		}
		public static function send($recipient) {
			mail($recipient, '','');
		}
		public static function errorBody($body) {
			$this->body = "Error Date: $this->dateSent \n\r\n\r Page of Occurance: $this->page \n\r\n\r User: $this->user \n\r\n\r Headers: $this->headers \n\r\n\r Traceback: $this->traceback \n\r\n\r \n\r\n\r Body: $body";
		}
		public static function errorRawBody($body) {
			$this->rawBody = $body;
		}
		public static function db(){
			
			$sth = $dbh->prepare('INSERT INTO `errors` (`errorId`,`rawBody`, `body`, `page`,`user`,`headers`,`dateSent`,`traceback`) VALUES (?,?,?,?,?,?,?,?)');
			$sth->bindParam(1, $this->id);
			$sth->bindParam(2, $this->rawBody);
			$sth->bindParam(3, $this->body);
			$sth->bindParam(4, $this->page);
			$sth->bindParam(5, $this->user);
			$sth->bindParam(6, $this->headers);
			$sth->bindParam(7, $this->dateSent);
			$sth->bindParam(8, $this->traceback);
			$sth->execute();
		}
		public static function generateID($prefix = ''){
			$this->id = uniqid($prefix);
		}
		public static function traceback(){
			$this->traceback = debug_backtrace();
		}
		public static function returnAddress($address) {
			header('Location: ' . $address . '?errorId=' . $this->id);
		}
		public static function returnPrefix($errorId){
			return substr($errorId,0,1);
		}
		public static function returnBody($errorId){
			$errorId = $dbh->quote($errorId);
			$sth = $dbh->prepare('SELECT body FROM errors WHERE errorId = "$errorId"');
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			if($sth->fetchColumn() > 0){
				return $sth->fetch();
			} else {
				return 'Stop trying to hack us. That\'s just uncool.';
			}
		}
		public static function returnRawBody($errorId){
			$errorId = $dbh->quote($errorId);
			$sth = $dbh->prepare('SELECT rawBody FROM errors WHERE errorId = "$errorId"');
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			if($sth->fetchColumn() > 0){
				return $sth->fetch();
			} else {
				return 'Stop trying to hack us. That\'s just uncool.';
			}
		}
	}
?>