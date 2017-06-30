var yo = require('yo-yo')
module.exports=function(data){

console.log(data);


var el=yo`
<form role="form" id="subcategorias">
    <div class="form-group">
        <label for="idCategoria">Categoria</label>
        <select  class="form-control" id="idCategoria" name="idCategoria" required >
            <option value=""> Escoge una opcion </option>
            ${data.map(function(json){
                return yo`<option value="${json.idCategoria}">${json.nombre}</option>`;
            })}
        </select>
    </div>
    <div class="form-group">
        <label for="nombre">Sub Categoria</label>
        <input type="text" class="form-control" id="nombre" placeholder=" Sub Categoria" name="nombre">
    </div>
    
    <button type="submit" class="btn btn-info">Guardar</button>
    <button class="btn btn-default btn-sm" id="cancelar">Cancelar</button>
</form>`;
    return el;
}