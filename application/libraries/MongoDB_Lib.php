<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;
use MongoDB\Driver\Exception\Exception;

class MongoDB_Lib  {
	public $mongodb ;

	public function __construct(){
		try{
			$this->mongodb = new Manager("mongodb://localhost:27017");
			log_message('info', 'MongoDB connected successfully');
		}catch(Exception $e){
			log_message('error', $e->getMessage());
		}
	}

	public function initialize(){
		log_message('debug', 'MongoDB Initialize Successfully');
		return $this->mongodb;
	}
}
