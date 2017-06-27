const yo=require('yo-yo');
let body=require('./body')
module.exports=function(data){

  var el= yo`
    <div class="table-agile-info">
    <button class="btn btn-success" id="agregar">Agregar Categoria</button>

      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th data-breakpoints="xs">ID</th>
            <th>Categoria</th>
            <th>Estatus</th>
          </tr>
        </thead>
        <tbody>
          ${data.map(function(json){
            return body(json);
          })}
        </tbody>
      </table>
    </div>`;
    return el;
}