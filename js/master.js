var loadingText="<center><span class=\'alert alert-info\'><i class=\'fa fa-spinner fa-spin fa-lg\'></i> Mengambil Data...</span></center>";
var processText="<center><span class=\'alert alert-info\'><i class=\'fa fa-spinner fa-spin fa-lg\'></i> Sedang Memproses...</span></center>";
var tableText="<center><div class=\'alert alert-info\'><i class=\'fa fa-spinner fa-spin fa-lg\'></i> Menyegarkan Data...</div></center>";
var loginGagal="<div class=\'col-sm-12 col-md-12\'><div class=\'alert alert-danger alert-dismissible\' role=\'alert\'><button type=\'button\' class=\'close\' data-dismiss=\'alert\' aria-label=\'Close\'><span aria-hidden=\'true\'>&times;</span></button><strong>Perhatian!</strong> Username atau password Anda salah!</div></div>";

function loginModal(){
	$('#globalModalConfirm').html('Login');
	$('#globalModalLabel').html('Login');
	$('#globalModalContent').html(loadingText);
	$('#globalModalContent').load('handler/master_modal.php?act=login');
	$('#globalModalConfirm').attr('class','btn btn-primary');
	$('#globalModalConfirm').attr('onclick','doLogin()');
	$('#globalModal').modal('toggle');
	
}

function doLogin(id){
	username=$('#globalModal').find( "input[name='username']" ).val();
	password=$('#globalModal').find("input[name='password']").val();
	error=$('#globalModal').find('.has-error').length;
	if(username!="" && error==0 && password!=""){
		//$('#globalModalContent').html(processText);
		$.ajax({    //create an ajax request to load_page.php
			type: "POST",
			url: "handler/login_handler.php",
			dataType: "html",
			data: { 'admin_username': username,
					'admin_password' : password },   //expect html to be returned
			success: function(response){
				if(response!=""){
					//alert(response);
					$('#errorLogin').html(loginGagal);
					//alert('Username atau password salah!');

				}
				else{
				$('#globalModal').html(processText);
				$('#globalModal').modal('toggle');
				$('#navbar').load('template/navbar.php');
			}
			}
		});
	}
}

function cartModal(){
	$('#cartModalLabel').html('Services Cart');
	$('#cartModalCancel').remove();
	$('#cartModalContent').html(loadingText);
	$('#cartModalContent').load('handler/master_modal.php?act=viewCart');
	$('#cartModalConfirm').remove();
	$('#cartModalConfirm').attr('class','btn btn-primary');
	$('#cartModalConfirm').attr('onclick','doLogin()');
	$('#cartModal').modal('toggle');
}


function addCart(id,size){
	$.ajax({    //create an ajax request to load_page.php
		type: "POST",
		url: "handler/add_cart.php?act=cart&id="+id,
		dataType: "html",
		data: { 'service_size': size },   //expect html to be returned
		success: function(response){
			if(response!=""){
				alert(response);
			}
			
		}

	});
$('#navbar').load('template/navbar.php');
}

function deleteCart(id,size){
	$.ajax({    //create an ajax request to load_page.php
		type: "POST",
		url: "handler/update_cart.php?act=delete&id="+id,
		dataType: "html",
		data: { 'service_size': size },   //expect html to be returned
		success: function(response){
			if(response!=""){
				alert(response);
			}
		}

	});
$('#cartModalContent').html(tableText);
$('#cartModalContent').load('handler/master_modal.php?act=viewCart');

}

function registerModal(){
	$('#globalModalLabel').html('Register');
	$('#globalModalContent').html(loadingText);
	$('#globalModalContent').load('handler/master_modal.php?act=register');
	$('#globalModalConfirm').html('Register');
	$('#globalModalConfirm').attr('class','btn btn-primary');
	$('#globalModalConfirm').attr('onclick','doRegister()');
	$('#globalModal').modal('toggle');
}