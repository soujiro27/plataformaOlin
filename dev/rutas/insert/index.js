require('babelify-es6-polyfill');
const noty= require('noty');
const $=require('jquery');
const categorias=require('./../../templates/forms/insert/categorias.js');




module.exports=class RutasInsert{

  rutas(ruta){
    var self=this
    let template;
    if(ruta=='categorias'){template=categorias}
    self.renderForm(template);
    
  }



  renderForm(template){
    let main=$('section.wrapper')
    main.empty()
    main.html(template)
    this.cancelar()
    
  }

  cancelar(){
    let self = this
    $('button#cancelar').click(function(event) {
      event.preventDefault()
      location.href='/templates/web/categorias.php';
    });
  }


getData(tipo){
    let self=this
    $('form#categorias').submit(function(event) {
      event.preventDefault()
      let datosSend=$(this).serialize()
      self.sendData(datosSend,tipo,'Categorias')
      .then(response=>{ 
        $.each(response,function(index,value){
        if(index=='error'){
         new noty({
            type: 'warning',
            layout: 'center',
            theme: 'metroui',
            text: value,
            timeout: 2000,
            progressBar: true,
          })
        }else{
          location.href="/templates/web/categorias.php";
        }
          })

      })
      

    });
  }


  sendData(datos,tipo,ruta){
    let post=new Promise((resolve,reject)=>{
      $.post({
        url:'/app/php/'+tipo+'categorias.php',
        data:datos,
        success:function(json){
          let data=JSON.parse(json)
          resolve(data)
        }
      });
    })
    return post
  }


}
