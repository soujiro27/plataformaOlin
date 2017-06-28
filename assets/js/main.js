$(document).ready(function(){
  
  
  //------------------------------------//
  //Navbar//
  //------------------------------------//
    	var menu = $('.navbar');
    	$(window).bind('scroll', function(e){
    		if($(window).scrollTop() > 140){
    			if(!menu.hasClass('open')){
    				menu.addClass('open');
    			}
    		}else{
    			if(menu.hasClass('open')){
    				menu.removeClass('open');
    			}
    		}
    	});
  
  
  //------------------------------------//
  //Scroll To//
  //------------------------------------//
  $(".scroll").click(function(event){		
  	event.preventDefault();
  	$('html,body').animate({scrollTop:$(this.hash).offset().top}, 800);
  	
  });
  
  //------------------------------------//
  //Wow Animation//
  //------------------------------------// 
  wow = new WOW(
        {
          boxClass:     'wow',      // animated element css class (default is wow)
          animateClass: 'animated', // animation css class (default is animated)
          offset:       0,          // distance to the element when triggering the animation (default is 0)
          mobile:       false        // trigger animations on mobile devices (true is default)
        }
      );
      wow.init();


  $('form#usuarios').on('submit',datosUsuario);	

});


function datosUsuario(e){
  e.preventDefault();
  let nombre=$('input#nombre').val();
  let pass=$('input#password').val();
  let repass=$('input#repassword').val();
  if(pass==repass){
    
    let data={
      nombre:nombre,
      password:pass
    };
    registerUsuario(data);
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
    url:"./../../app/php/registraUser.php",
    data:data,
    success:function(data){
      let json=$.parseJSON(data);

      $.each(json,function(index,value){
        if(index=='error'){
          $.alert({
            title: 'Error',
            content: value
        });
        }else{
          $('div.formulario').empty();
          $('div.formulario').html('<p class="black"> Tu registro ha sido Completado inicia sesion para empezar a disfruta de OLIN </p>');
        }
      })


      
    }
  });
}