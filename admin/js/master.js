var loadingText="<center><span class=\'alert alert-info\'><i class=\'fa fa-spinner fa-spin fa-lg\'></i> Mengambil Data...</span></center>";
var processText="<center><span class=\'alert alert-info\'><i class=\'fa fa-spinner fa-spin fa-lg\'></i> Sedang Memproses...</span></center>";
var tableText="<center><div class=\'alert alert-info\'><i class=\'fa fa-spinner fa-spin fa-lg\'></i> Menyegarkan Data...</div></center>";

function adminEdit(id){
	$('#adminModalLabel').html('Ubah Admin');
	$('#adminModalContent').html(loadingText);
	$('#adminModalContent').load('handler/master_modal.php?p=editAdmin&id='+id);
	$('#adminModalConfirm').html('Simpan');
	$('#adminModalConfirm').attr('class','btn btn-primary');
	$('#adminModalConfirm').attr('onclick','adminEditSave(\''+id+'\')');
	$('#adminModal').modal('toggle');
}

function adminEditSave(id){
	namaD=$('#editAdminForm').find( "input[name='namaD']" ).val();
	email=$('#editAdminForm').find( "input[name='email']" ).val();
	password=$('#editAdminForm').find( "input[name='password']" ).val();
	re_password=$('#editAdminForm').find( "input[name='re_password']" ).val();
	error=$('#editAdminForm').find('.has-error').length;




	if(namaD!="" && email!="" && error==0){
		if((password!="" && re_password!="") || (password=="" && re_password=="")){
			$('#adminModalContent').html(processText);
			$.ajax({    //create an ajax request to load_page.php
				type: "POST",
				url: "handler/update_handler.php?t=admin",
				dataType: "html",
				data: { 'admin_username': id,
						'admin_name' : namaD,
						'admin_email' : email,
						'admin_pass' : password },   //expect html to be returned
				success: function(response){
					if(response!=""){
						alert(response);
					}
					$('#adminModal').modal('toggle');
					$('#dataAdmin').html(tableText);
					$('#admin_name').html(namaD);
					$('#dataAdmin').load('content/table_admin.php');
				}
			});
		}
	}
}

function adminDelete(id,act){
	if(act==true){
		$('#adminModalLabel').html('Buka Admin');
	}else{
		$('#adminModalLabel').html('Kunci Admin');
	}
	$('#adminModalContent').html(loadingText);
	$('#adminModalContent').load('handler/master_modal.php?p=deleteAdmin&id='+id);
	if(act==true){
		$('#adminModalConfirm').attr('class','btn btn-success');
		$('#adminModalConfirm').html('Buka');
	}else{
		$('#adminModalConfirm').attr('class','btn btn-danger');
		$('#adminModalConfirm').html('Kunci');
	}
	$('#adminModalConfirm').attr('onclick','adminDeleteConf(\''+id+'\', '+act+')');
	$('#adminModal').modal('toggle');
}

function adminDeleteConf(id,act){
	$('#adminModalContent').html(processText);
	$.ajax({    //create an ajax request to load_page.php
		type: "POST",
		url: "handler/delete_handler.php?t=admin&a="+act,
		dataType: "html",
		data: { 'admin_username': id },   //expect html to be returned
		success: function(response){
			if(response!=""){
				alert(response);
			}
			$('#adminModal').modal('toggle');
			$('#dataAdmin').html(tableText);
			$('#dataAdmin').load('content/table_admin.php');
		}
	});
}

function adminReset(){
	$('#grpUser').attr('class','form-group');
	$('#grpNama').attr('class','form-group');
	$('#grpEmail').attr('class','form-group');
	$('.help-block').remove();
}

function adminReset(){
	$('#grpUser').attr('class','form-group');
	$('#grpNama').attr('class','form-group');
	$('#grpEmail').attr('class','form-group');
	$('.help-block').remove();

	$( "input[name='username']" ).val(null);
	$( "input[name='namaD']" ).val(null);
	$( "input[name='email']" ).val(null);
}

function adminAdd(){
	username=$('#insertAdminForm').find( "input[name='username']" ).val();
	namaD=$('#insertAdminForm').find( "input[name='namaD']" ).val();
	email=$('#insertAdminForm').find( "input[name='email']" ).val();
	error=$('#insertAdminForm').find('.has-error').length;
	
	if(username!="" && namaD!="" && email!="" && error==0){
		$('#insertAdminForm').html(processText);
		$.ajax({    //create an ajax request to load_page.php
			type: "POST",
			url: "handler/insert_handler.php?t=admin",
			dataType: "html",
			data: { 'admin_username': username ,
				    'admin_name': namaD ,
				    'admin_email': email
				  },   //expect html to be returned
			success: function(response){
				$('#insertAdminForm').load('content/form_admin.php');
				if(response!=""){
					alert(response);
				}
				$('#dataAdmin').html(tableText);
				$('#dataAdmin').load('content/table_admin.php');
			}
		});
	}
}

function memberDelete(id,act){
	if(act==true){
		$('#memberModalLabel').html('Buka Pelanggan');
	}else{
		$('#memberModalLabel').html('Kunci Pelanggan');
	}
	$('#memberModalContent').html(loadingText);
	$('#memberModalContent').load('handler/master_modal.php?p=deleteMember&id='+id);
	if(act==true){
		$('#memberModalConfirm').attr('class','btn btn-success');
		$('#memberModalConfirm').html('Buka');
	}else{
		$('#memberModalConfirm').attr('class','btn btn-danger');
		$('#memberModalConfirm').html('Kunci');
	}
	$('#memberModalConfirm').attr('onclick','memberDeleteConf(\''+id+'\', '+act+')');
	$('#memberModal').modal('toggle');
}

function memberDeleteConf(id,act){
	$('#memberModalContent').html(processText);
	$.ajax({    //create an ajax request to load_page.php
		type: "POST",
		url: "handler/delete_handler.php?t=member&a="+act,
		dataType: "html",
		data: { 'member_username': id },   //expect html to be returned
		success: function(response){
			if(response!=""){
				alert(response);
			}
			$('#memberModal').modal('toggle');
			$('#dataMember').html(tableText);
			$('#dataMember').load('content/table_member.php');
		}
	});
}

function serviceEdit(id){
	$('#serviceModalLabel').html('Ubah Layanan Dasar');
	$('#serviceModalContent').html(loadingText);
	$('#serviceModalContent').load('handler/master_modal.php?p=editService&id='+id);
	$('#serviceModalConfirm').html('Simpan');
	$('#serviceModalConfirm').attr('class','btn btn-primary');
	$('#serviceModalConfirm').attr('onclick','serviceEditSave(\''+id+'\')');
	$('#serviceModal').modal('toggle');
}

function serviceDetEdit(id,size){
	$('#serviceModalLabel').html('Ubah Rincian Layanan Dasar');
	$('#serviceModalContent').html(loadingText);
	$('#serviceModalContent').load('handler/master_modal.php?p=editServiceDet&id='+id+'&size='+size);
	$('#serviceModalConfirm').html('Simpan');
	$('#serviceModalConfirm').attr('class','btn btn-primary');
	$('#serviceModalConfirm').attr('onclick','serviceDetEditSave(\''+id+'\',\''+size+'\')');
	$('#serviceModal').modal('toggle');
}


function serviceEditSave(id){
	namaD=$('#editServiceForm').find( "input[name='namaD']" ).val();
	error=$('#editServiceForm').find('.has-error').length;
	if(namaD!="" && error==0){
		$('#serviceModalContent').html(processText);
		$.ajax({    //create an ajax request to load_page.php
			type: "POST",
			url: "handler/update_handler.php?t=service",
			dataType: "html",
			data: { 'service_id': id,
					'service_name' : namaD },   //expect html to be returned
			success: function(response){
				if(response!=""){
					alert(response);
				}
				$('#serviceModal').modal('toggle');
				$('#dataService').html(tableText);
				$('#dataService').load('content/table_service.php');
			}
		});
	}
}

function serviceDetEditSave(id,size){
	layanan=$('#editServiceDetForm').find("select[name='layanan']" ).val();
	panjang=$('#editServiceDetForm').find( "input[name='panjang']" ).val();
	lebar=$('#editServiceDetForm').find( "input[name='lebar']" ).val();
	harga=$('#editServiceDetForm').find( "input[name='price']" ).val();
	error=$('#editServiceDetForm').find('.has-error').length;

	if(layanan!="" && error==0 && panjang!="" && lebar!="" && harga!=""){
		$('#serviceModalContent').html(processText);
		$.ajax({    //create an ajax request to load_page.php
			type: "POST",
			url: "handler/update_handler.php?t=serviceDet",
			dataType: "html",
			data: { 'id_lama': id,
					'size_lama': size,
					'service_id': layanan,
					'service_size' : panjang+' x '+lebar,
					'service_price' : harga},   //expect html to be returned
			success: function(response){
				if(response!=""){
					alert(response);
				}
				$('#serviceModal').modal('toggle');
				$('#dataService').html(tableText);
				$('#dataService').load('content/table_service_detail.php');
			}
		});
	}
}

function serviceDelete(id,act){
	if(act==true){
		$('#serviceModalLabel').html('Buka Layanan Dasar');
	}else{
		$('#serviceModalLabel').html('Kunci Layanan Dasar');
	}
	$('#serviceModalContent').html(loadingText);
	$('#serviceModalContent').load('handler/master_modal.php?p=deleteService&id='+id);
	if(act==true){
		$('#serviceModalConfirm').attr('class','btn btn-success');
		$('#serviceModalConfirm').html('Buka');
	}else{
		$('#serviceModalConfirm').attr('class','btn btn-danger');
		$('#serviceModalConfirm').html('Kunci');
	}
	$('#serviceModalConfirm').attr('onclick','serviceDeleteConf(\''+id+'\', '+act+')');
	$('#serviceModal').modal('toggle');
}

function serviceDeleteConf(id,act){
	$('#serviceModalContent').html(processText);
	$.ajax({    //create an ajax request to load_page.php
		type: "POST",
		url: "handler/delete_handler.php?t=service&a="+act,
		dataType: "html",
		data: { 'service_id': id },   //expect html to be returned
		success: function(response){
			if(response!=""){
				alert(response);
			}
			$('#serviceModal').modal('toggle');
			$('#dataService').html(tableText);
			$('#dataService').load('content/table_service.php');
		}
	});
}

function serviceAdd(){
	namaD=$('#insertServiceForm').find( "input[name='namaD']" ).val();
	error=$('#insertServiceForm').find('.has-error').length;
	
	if(namaD!="" && error==0){
		$('#insertServiceForm').html(processText);
		$.ajax({    //create an ajax request to load_page.php
			type: "POST",
			url: "handler/insert_handler.php?t=service",
			dataType: "html",
			data: { 'service_name': namaD },   //expect html to be returned
			success: function(response){
				$('#insertServiceForm').load('content/form_service.php');
				if(response!=""){
					alert(response);
				}
				$('#dataService').html(tableText);
				$('#dataService').load('content/table_service.php');
			}
		});
	}
}

function serviceReset(){
	$('#grpNama').attr('class','form-group');
	$('.help-block').remove();

	$( "input[name='namaD']" ).val(null);
}


function serviceDetAdd(){
	layanan=$('#insertServiceDetForm').find( "select[name='layanan']" ).val();
	panjang=$('#insertServiceDetForm').find( "input[name='panjang']" ).val();
	lebar=$('#insertServiceDetForm').find( "input[name='lebar']" ).val();
	harga=$('#insertServiceDetForm').find( "input[name='harga']" ).val();
	error=$('#insertServiceDetForm').find('.has-error').length;

	if(panjang!="" && lebar!="" && harga!="" && error==0){
		$('#insertServiceDetForm').html(processText);
		$.ajax({    //create an ajax request to load_page.php
			type: "POST",
			url: "handler/insert_handler.php?t=servicedet",
			dataType: "html",
			data: { 'service_panjang': panjang,
					'service_lebar' : lebar,
					'service_price' : harga,
					'service_layanan' : layanan },   //expect html to be returned
			success: function(response){
				$('#insertServiceDetForm').load('content/form_service_detail.php');
				if(response!=""){
					alert(response);
				}
				$('#dataService').html(tableText);
				$('#dataService').load('content/table_service_detail.php');
			}
		});
	}
}

function serviceDetReset(){
	$('#grpNama').attr('class','form-group');
	$('#grpUkuran').attr('class','form-group');
	$('#grpHarga').attr('class','form-group');
	$('.help-block').remove();

	$( "input[name='panjang']" ).val(null);
	$( "input[name='lebar']" ).val(null);
	$( "input[name='harga']" ).val(null);
}


function serviceDetDelete(id,size){
	$('#serviceModalLabel').html('Hapus Layanan Rinci');
	$('#serviceModalContent').html(loadingText);
	$('#serviceModalContent').load('handler/master_modal.php?p=deleteServiceDet&id='+id+'&size='+size);
	$('#serviceModalConfirm').attr('class','btn btn-danger');
	$('#serviceModalConfirm').html('Hapus');
	//$('#serviceModalConfirm').attr('onclick','serviceDetDeleteConf(\''+id+'\', '+act+')');
	$('#serviceModalConfirm').attr('onclick','serviceDetDeleteConf(\''+id+'\',\''+size+'\')');
	$('#serviceModal').modal('toggle');
}

function serviceDetDeleteConf(id,size){
	$('#serviceModalContent').html(processText);
	$.ajax({    //create an ajax request to load_page.php
		type: "POST",
		url: "handler/delete_handler.php?t=serviceDet",
		dataType: "html",
		data: { 'service_id': id,
				'service_size' : size
				 },   //expect html to be returned
		success: function(response){
			if(response!=""){
				alert(response);
			}
			$('#serviceModal').modal('toggle');
			$('#dataService').html(tableText);
			$('#dataService').load('content/table_service_detail.php');
		}
	});
}
