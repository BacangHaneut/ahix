<?php
class Ajax extends CI_Controller{
	function __construct(){
		parent::__construct();
		
		$req = apache_request_headers();
		if($req['Host']!=$_SERVER['HTTP_HOST']){
			die("You can't access this page.");
		}
		//$this->load->helper('my');
		//$this->load->library('session');
	}
	
	public function users($limit=10,$offset=0,$order='id',$sort='ASC'){
		//$limit = (isset($_GET['limit']))?$_GET['limit']:10;
		//$offset = (isset($_GET['offset']))?$_GET['offset']:10;
		//$order = (isset($_GET['order']))?$_GET['order']:'id';
		//$sort = (isset($_GET['sort']))?$_GET['sort']:'ASC';
		$this->load->model('user_model');
		$users = $this->user_model->getUsers($limit,$offset,$order,$sort);
		//echo json_encode($users);
		//my_dump_exit($users);die();
		if($users->status==false){
			$this->session->set_flashdata('msg',array( 
							'title' => 'Service Error', 
							'content' => $users->error, 
							'type' => 'err' 
							)
						);
			redirect('/');
		}else{
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($users->result));
			//die();
		}
	}
}
