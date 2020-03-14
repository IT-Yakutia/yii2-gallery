function deleteKindergartenPhoto(link){
	var csrfToken = $('meta[name="csrf-token"]').attr("content");
	var delete_url = $(link).attr('href');
	var reload_url = $("image_uload_pjax_success_url").data('href');
	if (confirm('Вы действительно хотите удалить этот элемент?')) {
		$.ajax({
		  	url: delete_url,
		  	method: "POST",
		  	data: {
	            _csrf : csrfToken
	        },
		  	beforeSend: function(xhr){xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');},
		  	success: function (data) {
		  		if(data['success']){
		  			$.pjax.reload({container: "#p0", url: reload_url});
		  			M.toast({html: '<span>'+data['toast']+'</span><i class=\"material-icons green-text small\">done</i>'})
		  		}else{
		  			M.toast({html: '<span>'+data['toast']+'</span><i class=\"material-icons red-text small\">error</i>'})
		  		}
	    	},
	    	dataType: 'json'
		});
	}
}

function editKindergartenPhoto(link){
	var csrfToken = $('meta[name="csrf-token"]').attr("content");
	var edit_url = $(link).attr('href');
	var reload_url = $("image_uload_pjax_success_url").data('href');
	var title = $("#" + $(link).data('id')).val();
	var description = $("#" + $(link).data('description')).val();

		$.ajax({
		  	url: edit_url,
		  	method: "POST",
		  	data: {
	            _csrf : csrfToken,
	            kindergartenPhotoTitle : title,
	            kindergartenPhotoDescription : description
	        },
		  	beforeSend: function(xhr){xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');},
		  	success: function (data) {
		  		if(data['success']){
		  			$.pjax.reload({container: "#p0", url: reload_url});
		  			M.toast({html: '<span>'+data['toast']+'</span><i class=\"material-icons green-text small\">done</i>'})
		  		}else{
		  			M.toast({html: '<span>'+data['toast']+'</span><i class=\"material-icons red-text small\">error</i>'})
		  		}
	    	},
	    	dataType: 'json'
		});
}

$('a.kindergartenPhotos-delete-button').click(function(event) { 
 	event.preventDefault();
 	deleteKindergartenPhoto(this);
});
$('a.kindergartenPhotos-edit-button').click(function(event) { 
 	event.preventDefault();
 	editKindergartenPhoto(this);
});

$(document).on('pjax:success', function() {
    $('a.kindergartenPhotos-delete-button').click(function(event) { 
	 	event.preventDefault();
	 	deleteKindergartenPhoto(this);
	});
	$('a.kindergartenPhotos-edit-button').click(function(event) { 
 		event.preventDefault();
 		editKindergartenPhoto(this);
	});
});

//$('input.kindergartenPhotos-edit-title').characterCounter();
