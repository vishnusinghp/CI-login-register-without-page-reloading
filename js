$(function () {
	$('#register_form').on('submit', function (e) {
	  e.preventDefault();
	  $.ajax({
	    type: 'post',
	    url: base_url+'/user_signup',
	    data: $('#register_form').serialize(),
	    success: function (response) {
	      	var res=$.parseJSON(response);
	      	if(res.status==true){
	      			Swal.fire({
  			          title: 'Success!',
          			  text: res.message,
            			type: 'success',
            			confirmButtonText: 'Okay' }).then(function() {
              				location.reload();
          			});
	      	}else{
	      		Swal.fire({
  			          	title: 'Error!',
          			  	text: res.message,
            			type: 'error',
            			confirmButtonText: 'Okay' });
	      	}
	    }
	  
	  });
	});
});


$(function () {
	$('#login_check').on('submit', function (e) {
	  e.preventDefault();
	  $.ajax({
	    type: 'post',
	    url: base_url+'/user_login',
	    data: $('#login_check').serialize(),
	    success: function (response) {
	      	var res=$.parseJSON(response);
	      	if(res.status==true){
	      			Swal.fire({
  			          title: 'Success!',
          			  text: res.message,
            			type: 'success',
            			confirmButtonText: 'Okay' }).then(function() {
              				location.reload();
          			});
	      	}else{
	      		Swal.fire({
  			          	title: 'Error!',
          			  	text: res.message,
            			type: 'error',
            			confirmButtonText: 'Okay' });
	      	}
	    }
	  
	  });
	});
});
