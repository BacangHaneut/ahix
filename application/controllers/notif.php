<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notif extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$data['web-title']='ahix - just for fun';
		$data['head-title']='Ahix - Sign In User';
		$data['mainContent']='ahix/signin';
	
		$this->parser->parse('template_dialog',$data);
		//die('cek');
	}
	
	public function maintenance(){
		$data['web-title']='ahix - just for fun';
		$data['head-title']='Ahix - Maintenance';
		$data['mainContent']='maintenance';
	
		$this->parser->parse('template_mobile',$data);
		//die('cek');
	}
}