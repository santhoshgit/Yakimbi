/*==== Common.js ====*/

$(document).ready(function()
{
	$('.fancybox').fancybox();
});



function add_favorite(object)
{
	var id = object.id;
	var title = object.getAttribute('rel');
	var mode = 'add_fav';
	
	if(id != '')
	{
		$.post("ajax_process.php", { id: ''+id+'',title: ''+title+'',mode: ''+mode+''},
		function(data) 
		{
			$('#id_'+id).html(data);
		});
	}
	else	
	{
		alert('Sorry! Unable to process');
		return false;
	}
}


function remove_favorite(object)
{
	var id = object.id;
	var title = object.getAttribute('rel');
	var mode = 'remove_fav';
	
	if(id != '')
	{
		$.post("ajax_process.php", { id: ''+id+'',title: ''+title+'',mode: ''+mode+''},
		function(data) 
		{
			$('#id_'+id).html(data);
		});
	}
	else	
	{
		alert('Sorry! Unable to process');
		return false;
	}
}


function remove_favorite_complete(id)
{
	var mode = 'remove_my_fav';
	
	if(id != '')
	{
		$.post("ajax_process.php", { id: ''+id+'',mode: ''+mode+''},
		function(data) 
		{
			$('#photo_'+id).fadeOut('slow');
		});
	}
	else	
	{
		alert('Sorry! Unable to process');
		return false;
	}
}

function add_description(id)
{
	var mode = 'add_desc';
	
	if(id != '')
	{
		$.post("ajax_process.php", { id: ''+id+'',mode: ''+mode+''},
		function(data) 
		{
			$('#desc_field_'+id).html(data);
		});
	}
	else	
	{
		alert('Sorry! Unable to process');
		return false;
	}
}


function save_desc(id)
{
	var text = $('#text_'+id).val();
	var id = $('#favid_'+id).val();
	var mode = 'save_desc';
	$.post("ajax_process.php", { id: ''+id+'',text: ''+text+'',mode: ''+mode+''},
	function(data) 
	{
		$('#desc_field_'+id).html('');
		$('#desc_'+id).html(text);
		$('#desc_'+id).html(text);
	});
}


