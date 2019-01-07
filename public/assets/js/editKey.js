$(document).ready(function(){
  
    $('#keys_table').on('click','#editName',function () {
        $('#llave1').replaceWith("<input type='text'>");
        $('#editName').replaceWith('<input type="submit" class="btn btn-success" value="Guardar">');
        $('#deleteKey').replaceWith('<button type="button" id="cancel" class="btn btn-warning">Cancelar</button>');
    });   
    $('#keys_table').on('click','#cancel',function () {
        alert("hola");
        $('#llave1').replaceWith("<input type='text'>");
        $('#editName').replaceWith('<input type="submit" class="btn btn-success" value="Guardar">');
        $('#deleteKey').replaceWith('<button type="button" id="cancel" class="btn btn-warning">Cancelar</button>');
    }); 

   
});