<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('rest', array(  
        	'server' => REST_SERVICE,  
			//'http_user' => 'admin',  
			//'http_pass' => '1234',  
			//'http_auth' => 'digest'  
     	));  
		
		$this->load->model('user_model');
	}
	
	public function index()
	{
		$data['web-title']='ahix - just for fun';
		$data['head-title']='Ahix - Sign In User';
		$data['mainContent']='ahix/signin';
		
		$this->parser->parse('template_dialog',$data);
		//die('cek');
	}
}
