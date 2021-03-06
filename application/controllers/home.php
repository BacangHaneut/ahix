<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();	
		//just initial
		$this->session->set_userdata('login',TRUE);
	}
	
	public function index(){
		$data['web-title']='ahix - just for fun';
		$data['head-title']='Ahix - Home';
		$data['mainContent']='user/home';
		$this->parser->parse('template_mobile',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
