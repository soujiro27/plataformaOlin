require('babelify-es6-polyfill');
const noty= require('noty');
const $=require('jquery');
const categorias=require('./../../templates/forms/insert/categorias.js');
const subcategorias=require('./../../templates/forms/insert/subcategorias.js');



module.exports=class RutasInsert{

  rutas(ruta){
    var self=this
    let template;
    if(ruta=='categorias'){template=categorias}
    if(ruta=='subcategorias'){
      self.getComboCategorias()
      .then(response=>{
        template=subcategorias(response)
        self.renderForm(template,ruta);
        self.getData(ruta,'insert')
      });
    }
    self.renderForm(template,ruta);
    
  }



  renderForm(template,ruta){
    let main=$('section.wrapper')
    main.empty()
    main.html(template)
    this.cancelar(ruta)
    
  }

  cancelar(ruta){
    let self = this
    $('button#cancelar').click(function(event) {
      event.preventDefault()
      location.href='/templates/web/'+ruta+'.php';
    });
  }


getData(ruta,tipo){
    let self=this
    $('form#'+ruta).submit(function(event) {
      event.preventDefault()
      let datosSend=$(this).serialize()+'&'+'modulo='+ruta
      self.sendData(datosSend,tipo,ruta)
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
          location.href="/templates/web/"+ruta+".php";
        }
          })

      })
      

    });
  }


  sendData(datos,tipo,ruta){
    let post=new Promise((resolve,reject)=>{
      $.post({
        url:'/app/php/'+tipo+ruta+'.php',
        data:datos,
        success:function(json){
          let data=JSON.parse(json)
          resolve(data)
        }
      });
    })
    return post
  }



  getComboCategorias(){
     let post=new Promise((resolve,reject)=>{
     $.get({
        url:'/app/php/getcombo.php',
         data:{
        modulo:'categorias',
        estatus:'ACTIVO'
        },
        success:function(data){
           let json=JSON.parse(data);
           resolve(json)
        }
      })
    })
    return post

  }


}
