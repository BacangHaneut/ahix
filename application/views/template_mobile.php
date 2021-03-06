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
switch($ctrl){
	case 'home':
		$uri1['uri'] = site_url();
		$uri1['ico'] = 'star';
		$uri1['lbl'] = 'Welcome';
		$uri1['hint'] = 'Back to welcome page';
		break;
	default:
		
		$uri1['uri'] = site_url('home/');
		$uri1['ico'] = 'home';
		$uri1['lbl'] = 'Home';
		$uri1['hint'] = 'Go to home page';
		break;
}
?>
	<div data-role="header">
		<table width=100% border=0 cellpadding=0 style="text-align:center;">
		<tr style="padding:0px;">
		<td style="text-align:left;padding:5px;width:30%;">
		<a 
		data-iconpos="notext" 
		data-icon="<?=$uri1['ico']?>" 
		data-role="button" 
		href="<?=$uri1['uri']?>" 
		data-corners="true" 
		data-shadow="true" 
		data-iconshadow="true" 
		title="<?=$uri1['hint']?>"
		data-theme="b"
		style="margin-top:-15px;"
		class="" 
		data-transition="flow"
		data-inline="true"><?=$uri1['lbl']?></a>

		<a 
		data-iconpos="notext" 
		data-icon="grid" 
		data-role="button" 
		href=<?php echo site_url("notif/maintenance")?> 
		data-corners="true" 
		data-shadow="true" 
		data-iconshadow="true" 
		title="See Inbox Message"
		data-theme="b"
		style="margin-top:-15px;"
		class=""
		data-inline="true">Message</a>
		</td>	
		<td style="text-align:center;padding:5px;width:40%;">
		{head-title}
		</td>
		<td style="text-align:right;padding:5px;width:30%;">
		<a 
		data-iconpos="right" 
		data-icon="delete" 
		data-role="button" 
		data-rel="dialog" 
		data-transition="pop"
		href=<?php echo site_url("ahix/signin/")?> 
		data-corners="true" 
		data-shadow="true" 
		data-iconshadow="true" 
		title="<?php echo ($this->session->userdata('login'))?'Sign Out':'Sign In'; ?>"
		data-theme="b"
		data-mini="true"><?php echo ($this->session->userdata('login'))?'Sign Out':'Sign In'; ?></a>
		</td>
		</tr>
		</table>	
	</div><!-- /header -->

	<div data-role="content" >	
<?= @flash_message(); ?>
<?php 
$this->load->view($mainContent);
?>		
	</div><!-- /content -->

	<div data-role="footer" data-position="fixed">
		<table width=100% border=0 cellpadding=0 style="text-align:center;">
		<tr style="padding:0px;">
		<td style="text-align:left;padding:5px;width:30%;">
		
		</td>	
		<td style="text-align:center;padding:5px;width:40%;">
		<h1 style="font-size:9pt;border:0px;margin:-10px;">Created by <span style="color:red;">BacangHaneut</span></h1>
		</td>
		<td style="text-align:right;padding:5px;width:30%;font-size:6pt;">
			<p>
			Powered by
			</p>
		</td>
		</tr>
		</table>	
	</div><!-- /footer -->

</div><!-- /page -->
</body>
</html>
