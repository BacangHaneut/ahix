<!DOCTYPE html> 
<html> 
<head> 
	<title>{web-title}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/jquery.mobile-1.1.1.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css" />
	<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.mobile-1.1.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
</head> 
<body> 
<div data-role="page" >
<?php
$ctrl = $this->uri->segment(1);
?>
	<div data-role="header" style="padding:5px">
		<table width=100% border=0 cellpadding=0 style="text-align:center;">
		<tr style="padding:0px;">
		<td style="text-align:left;padding:5px;width:30%;">

		</td>	
		<td style="text-align:center;padding:5px;width:40%;">
		{head-title}
		</td>
		<td style="text-align:right;padding:5px;width:30%;">
		</tr>
		</table>	
	</div><!-- /header -->

	<div data-role="content" >	
<?= @flash_message(); ?>
<?php 
$this->load->view($mainContent);
?>		
	</div><!-- /content -->


</div><!-- /page -->
</body>
</html>
