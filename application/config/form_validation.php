<?php
$config = array(
		'usercreate_form' => array(
				array(
						'field' => 'nickname',
						'label' => 'Nickname',
						'rules' => 'required|min_length[7]|max_length[15]|alpha_numeric'
				),
				array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required|alpha_numeric|min_length[7]'
				),
				array(
						'field' => 'confpassword',
						'label' => 'PasswordConfirmation',
						'rules' => 'required|alpha_numeric|min_length[7]|matches[password]'
				),
				array(
						'field' => 'email',
						'label' => 'Email',
						'rules' => 'required|valid_email'
				)
		),
		'userupdate_form' => array(
				array(
						'field' => 'nickname',
						'label' => 'Nickname',
						'rules' => 'required|min_length[7]|max_length[15]|alpha_numeric'
				),
				array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'alpha_numeric|min_length[7]'
				),
				array(
						'field' => 'confpassword',
						'label' => 'PasswordConfirmation',
						'rules' => 'alpha_numeric|min_length[7]|matches[password]'
				),
				array(
						'field' => 'email',
						'label' => 'Email',
						'rules' => 'required|valid_email'
				)
		),
		'email' => array(
				array(
						'field' => 'emailaddress',
						'label' => 'EmailAddress',
						'rules' => 'required|valid_email'
				),
				array(
						'field' => 'name',
						'label' => 'Name',
						'rules' => 'required|alpha'
				),
				array(
						'field' => 'title',
						'label' => 'Title',
						'rules' => 'required'
				),
				array(
						'field' => 'message',
						'label' => 'MessageBody',
						'rules' => 'required'
				)
		)
);