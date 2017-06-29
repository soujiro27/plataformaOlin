const $=require('jquery');
var query=require('jquery-confirm')
const template=require('./../templates/table')
const page=require('page');
const categorias=require('./../templates/forms/update/categorias.js')
const ins=require('./../rutas/insert');

let insert= new ins();

module.exports=class Tabla{


  getTable(tabla){
      let get=new Promise((resolve,reject)=>{
        $.get('/app/controllers/tables.php',function(json, textStatus) {
            resolve(JSON.parse(json));
        });
      })
      return get
  }

  drawTable(ruta){
    let self=this
    self.getTable(ruta)
    .then(response=>{
      let tabla=template(response)
      $('div.loader').remove()
      $('section.wrapper').html(tabla);
      self.clickBtn();
      self.clickTr();
      
    })
  }

  clickTr(){
    let self=this
    $('table tbody tr').click(function(){
      let id=$(this).data('id');
      let campo=$(this).data('nombre')
      let data={}
      data[campo]=id
      data['tabla']='categorias'
      $.get({
        url:'/app/php/getRegister.php',
        data:data,
        success:function(data){
          let json=JSON.parse(data);
          let template=categorias(json[0])
          $('section.wrapper').empty().html(template)
          insert.cancelar();
          insert.getData('update');
        }
      })
  })
  }

  clickBtn(){
    $('button#agregar').click(function(event) {
       insert.rutas('categorias');
       insert.getData('insert');
    });
  }






}

