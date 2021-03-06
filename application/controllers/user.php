<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
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
		$this->load->view('welcome_message');
	}
	
	public function createform($id = null){
		$data['web-title']='ahix - just for fun';
		$data['mainContent']='user/form_user';
		if($id!=null){
			$this->session->unset_userdata('form');
			$user = $this->user_model->getUser($id);
			//print_r($user);die();
			$newdata = array(
					'id' => $user->id,
					'nickname'  => $user->nickname,
					'email' => $user->email,
					'regdate' => $user->regdate,
					'status' => $user->status,
					'savepassword' => $user->password
			);
			
			$this->session->set_userdata('form',$newdata);
		}
		
		$this->parser->parse('template_default',$data);
	}
	
	public function form_handler(){
		$this->load->library('form_validation');
		$newdata = array(
				'nickname'  => $this->input->post('nickname'),
				'email' => $this->input->post('email')
		);
		
		$this->session->set_userdata('form',$newdata);
		//print_r($_POST);
		//die();
		$validation = ($this->input->post('id'))?'userupdate_form':'usercreate_form';
		if ($this->form_validation->run($validation) == FALSE)
		{
   			$this->createform($this->input->post('id'));
		}
		else
		{
			$this->session->unset_userdata('form');
			$_POST['password']=(strlen($this->input->post('password'))>0)?
				md5($this->input->post('password')):$this->input->post('savepassword');
			//print_r($_POST);
			
			$curl_handle = curl_init();
			if($this->input->post('id')){
				//die($this->input->post('id'));
				curl_setopt($curl_handle, CURLOPT_URL, REST_SERVICE.'user/id/'. $this->input->post('id') .'/format/json');
			}
			else{
				//die($this->input->post('id').'xxx');
				curl_setopt($curl_handle, CURLOPT_URL, REST_SERVICE.'user/format/json');
			}
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_handle, CURLOPT_POST, 1);
			curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $_POST);
			
			// Optional, delete this line if your API is open
			//curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
			
			$buffer = curl_exec($curl_handle);
			curl_close($curl_handle);
			
			$result = json_decode($buffer);
			
			print_r($result);
		}
	}
	
	/*
	public function update(){
		$this->load->library('form_validation');
		$newdata = array(
				'nickname'  => $this->input->post('nickname'),
				'email' => $this->input->post('email')
		);
		
		$this->session->set_userdata('form',$newdata);
		//print_r($this->session->userdata('form'));
		
		if ($this->form_validation->run('usercreate_form') == FALSE)
		{
   			$this->createform();
		}
		else
		{
			$this->session->unset_userdata('form');
			$_POST['password']=md5($this->input->post('password'));
			print_r($_POST);
			
			$curl_handle = curl_init();
			curl_setopt($curl_handle, CURLOPT_URL, 'http://192.168.1.39/ahix.service/api/user/format/json');
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_handle, CURLOPT_POST, 1);
			curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $_POST);
			
			// Optional, delete this line if your API is open
			//curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
			
			$buffer = curl_exec($curl_handle);
			curl_close($curl_handle);
			
			$result = json_decode($buffer);
			
			print_r($result);
		}
	}*/
	
	public function listUser(){
		$data['web-title']='ahix - just for fun';
		$data['head-title']='Ahix - List User';
		$data['mainContent']='user/list_user';

		$this->load->model('user_model');
		$users = $this->user_model->getUsers(3);
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
		}
		//my_dump_exit($users->result);
		$data['users']=$users->result;
		$this->parser->parse('template_mobile',$data);
		//die('cek');
	}
}
