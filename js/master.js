var loadingText="<center><span class=\'alert alert-info\'><i class=\'fa fa-spinner fa-spin fa-lg\'></i> Mengambil Data...</span></center>";
var processText="<center><span class=\'alert alert-info\'><i class=\'fa fa-spinner fa-spin fa-lg\'></i> Sedang Memproses...</span></center>";
var tableText="<center><div class=\'alert alert-info\'><i class=\'fa fa-spinner fa-spin fa-lg\'></i> Menyegarkan Data...</div></center>";
var loginGagal="<div class=\'col-sm-12 col-md-12\'><div class=\'alert alert-danger alert-dismissible\' role=\'alert\'><button type=\'button\' class=\'close\' data-dismiss=\'alert\' aria-label=\'Close\'><span aria-hidden=\'true\'>&times;</span></button><strong>Perhatian!</strong> Username atau password Anda salah!</div></div>";

function loginModal(){
<<<<<<< HEAD
	$('#globalModalLabel').html('Login');
	$('#globalModalContent').html(loadingText);
	$('#globalModalContent').load('handler/master_modal.php?act=login');
	$('#globalModalConfirm').html('Login');
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
=======
	$('#loginModalLabel').html('Login');
	$('#loginModalContent').load('handler/master_modal.php?act=login');
	$('#loginModalConfirm').html('Login');
	$('#loginModalConfirm').attr('class','btn btn-primary');
	$('#loginModalConfirm').attr('onclick','doLogin()');
	$('#loginModal').modal('toggle');
}

function doLogin(id){
	username=$('#loginMember').find( "input[name='username']" ).val();
	password=$('#loginMember').find("input[name='password']").val();
	error=$('#loginMember').find('.has-error').length;
	if(username!="" && error==0 && password!=""){
		//$('#loginModalContent').html(processText);
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
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
<<<<<<< HEAD
				$('#globalModal').html(processText);
				$('#globalModal').modal('toggle');
=======
				$('#loginModal').html(processText);
				$('#loginModal').modal('toggle');
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
				$('#navbar').load('template/navbar.php');
			}
			}
		});
	}
}

function cartModal(){
<<<<<<< HEAD
	$('#globalModalLabel').html('Services Cart');
	$('#globalModalCancel').remove();
	$('#globalModalContent').html(loadingText);
	$('#globalModalContent').load('handler/master_modal.php?act=viewCart');
	$('#globalModalConfirm').html('Checkout');
	$('#globalModalConfirm').attr('class','btn btn-primary');
	$('#globalModalConfirm').attr('onclick','doLogin()');
	$('#globalModal').modal('toggle');
}



function registerModal(){
	$('#globalModalLabel').html('Register');
	$('#globalModalContent').html(loadingText);
	$('#globalModalContent').load('handler/master_modal.php?act=register');
	$('#globalModalConfirm').html('Register');
	$('#globalModalConfirm').attr('class','btn btn-primary');
	$('#globalModalConfirm').attr('onclick','doRegister()');
	$('#globalModal').modal('toggle');
=======
	$('#cartModalLabel').html('Services Cart');
	$('#cartModalContent').load('handler/master_modal.php?act=viewCart');
	$('#cartModalConfirm').html('Checkout');
	$('#cartModalConfirm').attr('class','btn btn-primary');
	$('#cartModalConfirm').attr('onclick','doLogin()');
	$('#cartModal').modal('toggle');
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
}