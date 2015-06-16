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
	$('#registerConfirm').attr('onclick','loadRegister()');
	//$('#globalModal').modal('toggle');
}


function loadLoginModal(){
	$('#globalModalConfirm').html('Login');
	$('#globalModalLabel').html('Login');
	$('#globalModalContent').html(loadingText);
	$('#globalModalContent').load('handler/master_modal.php?act=login');
	$('#globalModalConfirm').attr('class','btn btn-primary');
	$('#globalModalConfirm').attr('onclick','doLogin()');
	$('#registerConfirm').attr('onclick','loadRegister()');
	$('#globalModal').modal('toggle');
}

function settingModal(){
	$('#globalModalConfirm').html('Save');
	$('#globalModalLabel').html('Pengaturan');
	$('#globalModalContent').html(loadingText);
	$('#globalModalContent').load('handler/master_modal.php?act=setting');
	$('#globalModalConfirm').attr('class','btn btn-primary');
	$('#globalModalConfirm').attr('onclick','doSetting()');
	$('#globalModal').modal('toggle');
}

function orderConfirmModal(){
	$('#globalModalLabel').html('Konfirmasi Pembayaran');
	$('#globalModalConfirm').html('Konfirmasi');
	$('#globalModalContent').html(loadingText);
	$('#globalModalContent').load('handler/master_modal.php?act=confirm');
	$('#globalModalConfirm').attr('class','btn btn-primary');
	$('#globalModalConfirm').attr('onclick','doFinishPay()');
	$('#registerConfirm').attr('onclick','registerModal()');
	$('#globalModal').modal('toggle');
}


function loadRegisterModal(){
	$('#globalModalLabel').html('Register');
	$('#globalModalContent').html(loadingText);
	$('#globalModalContent').load('handler/master_modal.php?act=register');
	$('#globalModalConfirm').html('Register');
	$('#globalModalConfirm').attr('class','btn btn-primary');
	$('#globalModalConfirm').attr('onclick','doRegister()');
	$('#globalModal').modal('toggle');
}

function registerModal(){
	$('#globalModalLabel').html('Register');
	$('#globalModalContent').html(loadingText);
	$('#globalModalContent').load('handler/master_modal.php?act=register');
	$('#globalModalConfirm').html('Register');
	$('#globalModalConfirm').attr('class','btn btn-primary');
	$('#globalModalConfirm').attr('onclick','doRegister()');
	//$('#globalModal').modal('toggle');
}


function cartModal(){
	$('#cartModalLabel').html('Services Cart');
	$('#cartModalCancel').remove();
	$('#cartModalContent').html(loadingText);
	$('#cartModalContent').load('handler/master_modal.php?act=viewCart');
	$('#cartModalConfirm').remove();
	
	$('#cartModal').modal('toggle');
	loadCart();
}

function loadCart(){
	$('#cartModal').on('hidden.bs.modal', function (e) {$('#navbar').load('template/navbar.php');});
}


function doLogin(){
	username=$('#globalModal').find( "input[name='username']" ).val();
	password=$('#globalModal').find("input[name='password']").val();
	error=$('#globalModal').find('.has-error').length;
	if(username!="" && error==0 && password!=""){
		//$('#globalModalContent').html(processText);
		$.ajax({    //crseate an ajax request to load_page.php
			type: "POST",
			url: "handler/login_handler.php",
			dataType: "html",
			data: { 'member_username': username,
					'member_password' : password },   //expect html to be returned
					success: function(response){
						if(response!=""){
					//alert(response);
					$('#errorLogin').html(loginGagal);
					//alert('Username atau password salah!');
				}
				else{
					$('#globalModal').html(processText);
					$('#checkoutList').load('handler/table_checkout.php');
					$('#navbar').load('template/navbar.php');
					$('#globalModal').modal('toggle');
					$('.modal-backdrop').remove();
				}
			}
		});
	}
}



function doRegister(){
	name = $('#registerMember').find( "input[name='name']" ).val();
	username = $('#registerMember').find( "input[name='username']" ).val();
	email = $('#registerMember').find( "input[name='email']" ).val();
	password = $('#registerMember').find( "input[name='password']" ).val();
	retype = $('#registerMember').find( "input[name='retype']" ).val();
	phone = $('#registerMember').find( "input[name='phone']" ).val();
	address = $('#registerMember').find( "input[name='address']" ).val();
	error = $('#registerMember').find('.has-error').length;
	if(name != "" && username != "" && email != "" && password != "" && phone != "" && address !== "" && error ==0){
		if(password == retype){
			$('#errorRegister').html(processText);
			$.ajax({
				type : "POST",
				url : "handler/insert_handler.php?act=register",
				dataType : "html",
				data : {
					'member_name' : name,
					'member_username' : username,
					'member_pass' : password,
					'member_phone'  : phone,
					'member_email' : email,
					'member_address' : address
				},
				success : function(response){
					if(response != ""){
						$('#errorRegister').html(response);

					}
				}

			});
		}
	}
}


function doSetting(){
	name = $('#settingMember').find( "input[name='name']" ).val();
	username = $('#settingMember').find( "input[name='username']" ).val();
	email = $('#settingMember').find( "input[name='email']" ).val();
	password = $('#settingMember').find( "input[name='password']" ).val();
	retype = $('#settingMember').find( "input[name='retype']" ).val();
	phone = $('#settingMember').find( "input[name='phone']" ).val();
	address = $('#settingMember').find( "input[name='address']" ).val();
	error = $('#settingMember').find('.has-error').length;
	if(name != "" && username != "" && email != "" && password != "" && phone != "" && address !== "" && error ==0){
		if(password == retype){
			$('#errorSetting').html(processText);
			$.ajax({
				type : "POST",
				url : "handler/insert_handler.php?act=update",
				dataType : "html",
				data : {
					'member_name' : name,
					'member_username' : username,
					'member_pass' : password,
					'member_phone'  : phone,
					'member_email' : email,
					'member_address' : address
				},
				success : function(response){
					if(response != ""){
						$('#errorSetting').html(response);
						//$('#navbar').load('template/navbar.php');
						loadNavbar();
					}
				}

			});
		}
	}
}

function loadNavbar(){
	$('#globalModal').on('hidden.bs.modal', function (e) {$('#navbar').load('template/navbar.php');});
}



function addCart(id,size){
	qty=document.getElementById("qty"+size).value;
	
	$.ajax({    //create an ajax request to load_page.php
		type: "POST",
		url: "handler/add_cart.php?act=cart&id="+id+"&qty="+qty,
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
	$('#checkoutList').load('handler/table_checkout.php');

}


function deleteTableCart(id,size){
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
	$('#checkoutList').html(tableText);
	$('#navbar').load('template/navbar.php');
	$('#checkoutList').load('handler/table_checkout.php');
	
}




function destroyCart() {
	$.ajax({
		type : "POST",
		url : "handler/update_cart.php?act=destroy",
		dataType : "html",
		success : function(response) {
			if (response != ""){
				alert(response);
			}

		}
	});
	$('#cartModalContent').html(tableText);
	$('#checkoutList').load('handler/table_checkout.php');
	$('#cartModalContent').load('handler/master_modal.php?act=viewCart');

}

function mysql_real_escape_string (str) {
	return str.replace(/[\0\x08\x09\x1a\n\r"'\\\%]/g, function (char) {
		switch (char) {
			case "\0":
				return "\\0";
			case "\x08":
				return "\\b";
			case "\x09":
				return "\\t";
			case "\x1a":
				return "\\z";
			case "\n":
				return "\\n";
			case "\r":
				return "\\r";
			case "\"":
			case "'":
			case "\\":
			case "%":
			return "\\"+char; // prepends a backslash to backslash, percent,
			// and double/single quotes
		}
	});
}

function doFinishPay(){
	var invoice	= $('#payForm').find('select[name="invoice"]').val();
	var file    = document.getElementsByName('bukti')[0].files[0];
	var reader  = new FileReader();
	var blob;
	
	if (file) {
		reader.readAsText(file);
	} else {
		alert('File Tidak boleh kosong');
	}

	reader.onloadend = function () {
		blob=mysql_real_escape_string(reader.result);
		$.ajax({
			type : "POST",
			url : "handler/insert_handler.php?act=updatePay",
			data : { 'invoice':invoice, 'bukti':blob },
			success : function(response) {
				if (response != ""){
					alert(response);
				}
			}
		});
	}
}