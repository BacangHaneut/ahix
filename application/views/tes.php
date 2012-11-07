<html>
	<head>
		<title>
		</title>
<script type="text/javascript" src="<?php echo site_url()?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>/public/js/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
});
</script>
	</head>
	<body>
<div id="results">

</div>
<script type="text/javascript">
$(document).ready(function(){
		$.getJSON('http://127.0.0.1/ahix.service/api/users/format/json',function(json){
			$.each(json,function(i,tweets){
				//alert(tweets);
				$("#results").append('<p>');
				$.each(tweets,function(i,tweet){
				//alert(tweet);
				   $("#results").append(tweet + ' - ');
				});
				$("#results").append('</p>');
			});
		});
/*
		$.ajax({
		    type: "GET",
		    url: "http://127.0.0.1/ahix.service/api/users/format/json",
		    dataType: "json",
		    cache:false,
		    success: 
		      function(data){
		          alert(data);
		          }
		});*/
});
</script>
	</body>
</html>