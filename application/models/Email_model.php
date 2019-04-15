<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Email_model extends Single_model{
	
	/**
	 * [$table description]
	 * @var string
	 */
	public $table = 'email';

	function __construct(){
		parent::__construct();
	}
}