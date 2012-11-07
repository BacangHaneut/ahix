var rest_url = 'http://127.0.0.1/ahix.service/api/';
//var rest_url = 'http://10.2.16.24/ahix.service/api/';
var local_url = 'http://127.0.0.1/ahix/';
//var local_url = 'http://10.2.16.24/ahix/';

function findAll() {
    $.ajax({
        type: 'GET',
        url: rootURL,
        dataType: "json", // data type of response
        success: renderList
    });
}
 
function findUserByName(searchKey) {
    $.ajax({
        type: 'GET',
        url: rootURL + '/search/' + searchKey,
        dataType: "json",
        success: renderList
    });
}
 
function findById(id) {
    $.ajax({
        type: 'GET',
        url: rootURL + '/' + id,
        dataType: "json",
        success: function(data){
            $('#btnDelete').show();
            renderDetails(data);
        }
    });
}
 
function addWine() {
    console.log('addWine');
    $.ajax({
        type: 'POST',
        contentType: 'application/json',
        url: rootURL,
        dataType: "json",
        data: formToJSON(),
        success: function(data, textStatus, jqXHR){
            alert('Wine created successfully');
            $('#btnDelete').show();
            $('#wineId').val(data.id);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('addWine error: ' + textStatus);
        }
    });
}
 
function updateWine() {
    $.ajax({
        type: 'PUT',
        contentType: 'application/json',
        url: rootURL + '/' + $('#wineId').val(),
        dataType: "json",
        data: formToJSON(),
        success: function(data, textStatus, jqXHR){
            alert('Wine updated successfully');
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('updateWine error: ' + textStatus);
        }
    });
}
 
function deleteWine() {
    console.log('deleteWine');
    $.ajax({
        type: 'DELETE',
        url: rootURL + '/' + $('#wineId').val(),
        success: function(data, textStatus, jqXHR){
            alert('Wine deleted successfully');
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('deleteWine error');
        }
    });
}
 
// Helper function to serialize all the form fields into a JSON string
function formToJSON() {
    return JSON.stringify({
        "id": $('#id').val(),
        "name": $('#name').val(),
        "grapes": $('#grapes').val(),
        "country": $('#country').val(),
        "region": $('#region').val(),
        "year": $('#year').val(),
        "description": $('#description').val()
        });
}

$(document).ready(function(){
	$(".userbox").hide();

	/*
	$("#mylistview").listview({
	  autodividers: true,

	  // the selector function is passed a <li> element from the listview;
	  // it should return the appropriate divider text for that <li>
	  // element as a string
	  autodividersSelector: function ( li ) {
	    var out = li;/* generate a string based on the content of li */;/*
	    return out;
	  }
	});*/

	$(".userlist").click(function(){
		var rel = $(this).attr('rel');
		var totaluser = $(".userlist").length-1;
		//alert(rel);
		var host = 'http://'+window.location.hostname+'/';
		//alert(host);
		if(rel!='add'){
			$("#userbox"+rel).slideToggle();
		}else{			
			url = local_url+'ajax/users/10/'+totaluser+'/';
			$.ajax({
			type: 'GET',
			url: url,
			dataType: "json", // data type of response
			success: function(response){
				//alert(response);
		    		var div = '';
				$.each(response,function(i,result){
					div += '<li><a href="#" rel="'+result.id+'" class="userlist" >';
					div += '<img class="ui-li-thumb" src="'+host+'public/css/images/album-xx.jpg">';
					div += '<h3 class="ui-li-heading">'+ result.nickname +'</h3>';
					div += '<p class="ui-li-desc">'+ result.email +'</p>';				
					div += '</a><a href="/home/">'+ result.nickname +'</a></li>';
					
					div += '<li id="userbox'+result.id+'" class="userbox">TES</li>';
				});
		    		$('#loadmore').parent().parent().parent().before(div);
				$('#mylistview').listview('refresh');
				$(".userbox").hide();
			},
			error: function(jqXHR, textStatus, errorThrown){
			    alert('Error: ' + textStatus + jqXHR);
			}
		    });
		}
	});

	$("#flashmessage")
		.animate({top: "0px"}, 1000 )
		.show('fast')
		.fadeIn(200)
		.fadeOut(100)
		.fadeIn(100)
		.fadeOut(100)
		.fadeIn(100);	

	$('#getall').click(function(){
		url = local_url+'ajax/users';
		$('#result').empty();
	    $.ajax({
	        type: 'GET',
	        url: url,
	        dataType: "json", // data type of response
	        success: function(response){
	        	//alert(response);
	    		var div = '<table style="font-size:9pt;margin:auto" border=1 cellpadding=5>';
        		div += "<thead><tr>";
	        	$.each(response[0],function(j,data){
	        		div += "<th align=center style='background-color:red'>" + j + "</th>";
	        	});
        		div += "<th align=center style='background-color:red'>action</th>";
    			div += "</tr></thead><tbody>";
	        	$.each(response,function(i,result){
	        		div += "<tr>";
		        	$.each(result,function(j,data){
		        		//alert(j);
		        		div += "<td>" + data + "</td>";
		        	});
	        		div += "<td><a href='#' id='del"+result.id+"' rel='"+result.id+"' class='delbtn'>Delete</a></td>";
        			div += "</tr>";
	        	});
	    		div += '</tbody></table>';
	    		$('#result').append(div);
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            alert('Error: ' + textStatus + jqXHR);
	        }
	    });
	});
	
	$('.delbtn').click(function(){
		alert('cek');
		//id = $(this).attr('rel');
		//alert(id);
		/*url = 'http://127.0.0.1/ahix.service/api/user/id/'+id;/*
	    $.ajax({
	        type: 'DELETE',
	        url: url,
	        dataType: "json", // data type of response
	        success: function(response){
	    		$('#getall').click();
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            alert('Error: ' + textStatus + jqXHR);
	        }
	    });*/
	});
});
