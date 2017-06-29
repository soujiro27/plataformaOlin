var yo = require('yo-yo')
module.exports=function(data){
var el=yo`
<form role="form" id="categorias">
      

    <div class="form-group">
        <label for="nombre">Categoria</label>
        <input type="text" class="form-control" id="nombre" placeholder="Categoria" name="nombre" value=${data.nombre} />
        <input type="hidden" class="form-control" id="nombre" placeholder="Categoria" name="idCategoria" value=${data.idCategoria} />

    </div>
    <button type="submit" class="btn btn-info">Actualizar</button>
    <button class="btn btn-default btn-sm" id="cancelar">Cancelar</button>
</form>`;
    return el;
}