<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Customer_model extends Single_model{
	
	/**
	 * [$table description]
	 * @var string
	 */
	public $table = 'customer';

	function __construct(){
		parent::__construct();
	}
}