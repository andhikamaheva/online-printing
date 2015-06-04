function validationLoginMember(){
	$('#loginMember').bootstrapValidator({
		message: 'This value is not valid',
		fields: {
			username: {
				message: 'Username tidak valid',
				validators: {
					notEmpty: {
						message: 'Username tidak boleh kosong'
					},
					stringLength: {
						min: 4,
						max: 30,
						message: 'Panjang username harus lebih dari 6 dan kurang dari 30 karakter'
					},
					regexp: {
						regexp: /^[a-zA-Z0-9_\.]+$/,
						message: 'Username hanya dapat menggunakan huruf, angka, titik dan garis bawah'
					}
				}
			},
			password: {
				validators: {
					notEmpty: {
						message: 'Password Tidak Boleh Kosong'
					},
					regexp: {
						regexp: /^[a-zA-Z0-9_\.]+$/,
						message: 'Password hanya dapat menggunakan huruf, angka, titik dan garis bawah'
					}
				}
			}
		}
	});
}