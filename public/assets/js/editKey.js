
$(document).ready(function(){
    
    
   /* var editButton=$('button').attr('id');
    
    
    
    $("button").click(function() {
        
        var buttons= document.getElementsByTagName("button");
        for (var i = 0; i < buttons.length; i++) {
            alert(buttons[i].id);
            $(buttons[i].id)
            
        }
        
        alert("hola");
        
    });*/
    
    $('#keys_table').on('click','#editName',function () {
        $('key1').replaceWith("<input type='text'>");
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




