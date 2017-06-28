require('babelify-es6-polyfill');
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
      location.href='/categorias';
    });
  }


getData(){
    let self=this
    $('form#categorias').submit(function(event) {
      event.preventDefault()
      let datosSend=$(this).serialize()
      self.sendData(datosSend,'insert','Categorias')
      .then(response=>{ 
          if(response.insert=='true'){
            location.href='/categorias';
          }else if(response.insert=='false'){
            alert("Error: Registro Duplicado")
        }
      })
      

    });
  }


  sendData(datos,tipo,ruta){
    let post=new Promise((resolve,reject)=>{
      $.post({
        url:'/'+tipo+'/'+ruta,
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
