<?php 
echo doctype();
?>
<html>
	<head>
		<title>
			{web-title}
		</title>
<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
	</head>
	<body>
<?= @flash_message(); ?>
		<div>
		
		</div>
		<div id="mainContent">
<?php 
$this->load->view($mainContent);
?>
		</div>
		<div id="result">
		
		</div>
	</body>
</html>
