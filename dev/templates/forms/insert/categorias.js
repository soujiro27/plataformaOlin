var yo = require('yo-yo')
module.exports=function(){

var el=yo`
<form role="form" id="categorias">
    <div class="form-group">
        <label for="nombre">Categoria</label>
        <input type="text" class="form-control" id="nombre" placeholder="Categoria" name="nombre">
    </div>
    
    <button type="submit" class="btn btn-info">Guardar Categoria</button>
    <button class="btn btn-default btn-sm" id="cancelar">Cancelar</button>
</form>`;
    return el;
}