<?php
$tbl_tmpl = array (
		'table_open'          => '<table border="1" cellpadding="4" cellspacing="0">',

		'heading_row_start'   => '<tr>',
		'heading_row_end'     => '</tr>',
		'heading_cell_start'  => '<th>',
		'heading_cell_end'    => '</th>',

		'row_start'           => '<tr>',
		'row_end'             => '</tr>',
		'cell_start'          => '<td>',
		'cell_end'            => '</td>',

		'row_alt_start'       => '<tr>',
		'row_alt_end'         => '</tr>',
		'cell_alt_start'      => '<td>',
		'cell_alt_end'        => '</td>',

		'table_close'         => '</table>'
);

$input = array('nickname','password','confpassword','email');
$input2 = array('regdate','status');

$attr = array(
			'method'=>'POST',
			'name'=>'usercreate_form',
			'id'=>'usercreate_form'
		);

/*
$attr1a = array(
		'name'=>'idlabel',
		'id'=>'idlabel',
		'class'=>'label labelid'
);
$attr1b = array(
		'name'=>'id',
		'id'=>'id',
		'class'=>'inputtext inputid'
);
$form[0]['label']=form_label('User Id','',$attr1a);
$form[0]['input']=form_input($attr1b);
*/
//print_r($this->session->userdata('form'));
$sess = $this->session->userdata('form');

$attr2a = array(
		'name'=>'nicknamelabel',
		'id'=>'nicknamelabel',
		'class'=>'label labelnickname'
);
$attr2b = array(
		'name'=>'nickname',
		'id'=>'nickname',
		'class'=>'inputtext inputnickname',
		'value'=>$sess['nickname']
);

$form[1]['label']=form_label('Nickname','',$attr2a);
$form[1]['input']=form_input($attr2b);


$attr3a = array(
		'name'=>'passwordlabel',
		'id'=>'passwordlabel',
		'class'=>'label labelpassword'
);
$attr3b = array(
		'name'=>'password',
		'id'=>'password',
		'class'=>'inputpass inputpassword'
);
$form[2]['label']=form_label('Password','',$attr3a);
$form[2]['input']=form_password($attr3b);


$attr4a = array(
		'name'=>'confpasswordlabel',
		'id'=>'confpasswordlabel',
		'class'=>'label labelconfpassword'
);
$attr4b = array(
		'name'=>'confpassword',
		'id'=>'confpassword',
		'class'=>'inputpass inputconfpassword'
);
$form[3]['label']=form_label('Confirm Password','',$attr4a);
$form[3]['input']=form_password($attr4b);


$attr5a = array(
		'name'=>'emaillabel',
		'id'=>'emaillabel',
		'class'=>'label labelemail'
);
$attr5b = array(
		'name'=>'email',
		'id'=>'email',
		'class'=>'inputtext inputemail',
		'value'=>$sess['email']
);
$form[4]['label']=form_label('Email','',$attr5a);
$form[4]['input']=form_input($attr5b);


$attr5 = array(
		'name'=>'submitbtn',
		'id'=>'submitbtn',
		'class'=>'button buttonsubmit',
		'value'=>(isset($sess['id']) && $sess['id']!=null)?'Update':'Create'
);