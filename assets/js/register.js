$(function(){
	$('form#usuarios').on('submit',datosUsuario);
})



function datosUsuario(e){
	e.preventDefault();
	let nombre=$('input#nombre').val();
	let pass=$('input#password').val();
	let repass=$('input#repassword').val();
	if(pass==repass){
		let data={
			nombre:nombre,
			password:pass
		}
		console.log(data)
		//registerUsuario(data);
	}
	else{
		$.alert({
    		title: 'Error',
    		content: 'Las Cotraseñas no son Iguales'
		});
	}
	
}

function registerUsuario(data){
	$.post({
		url:'./registrarUser',
		data:data,
		success:function(data){
			let json=$.parseJSON(data);
			if(json.insert=='false'){
				$.alert({
    				title: 'Error',
    				content: 'Ya hay un Correo registrado'
				});
			}else{
				
			}
		}
	});
}