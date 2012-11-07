<?php
//echo APPPATH.' - '.BASEPATH.' - ';
include_once APPPATH.'views/form/userform.inc';

echo form_open('user/form_handler',$attr);

$i=1;
foreach ($input as $input){
	$this->table->add_row($form[$i]['label'],' : ',$form[$i]['input']);
	if(form_error($input)){
		$this->table->add_row('','',form_error($input, '<div class="error" style="color:red;font-size:9pt;font-weight:bold">', '</div>')); 
	}
	$i++;
}
echo $this->table->set_template($tbl_tmpl);
echo $this->table->generate();

if(isset($sess['id']) && $sess['id']!=null){
	echo form_hidden('id',$sess['id']);
	echo form_hidden('savepassword',$sess['savepassword']);
	foreach ($input2 as $input){
		echo 'User ',$input,' : ',$sess[$input],'<br>';
		echo form_hidden($input,$sess[$input]);
	}
}

echo br(2);
echo form_submit($attr5);

echo form_close();


echo form_button(array(
					'name'=>'getall',
					'id'=>'getall',
				),'getAll');
