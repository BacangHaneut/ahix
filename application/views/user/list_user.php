<ul id="mylistview" data-role="listview" data-autodividers="true" data-inset="true">
	<li data-role="list-divider" >
		Ahis User List
	</li>
<?php
foreach($users as $k=>$v){
?>
	<li>
		<a href="#" rel="<?= $v->id ?>" class="userlist" >
			<img class="ui-li-thumb" src="<?php echo base_url();?>public/css/images/album-xx.jpg">
			<h3 class="ui-li-heading"><?= $v->nickname ?></h3>
			<p class="ui-li-desc"><?= $v->email ?></p>			
		</a>
		<a href="/home/"><?= $v->nickname ?></a>
	</li>
	<li id="userbox<?= $v->id ?>" class="userbox">
		TES
	</li>
<?php
}
?>
	<li>
		<a href="#" rel="add" class="userlist" id="loadmore">
			Load More			
		</a>
	</li>	
</ul>
