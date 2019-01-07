@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')






<div class="row">

    <div class="col-sm-9">
        <h4>Crear Llave</h4>
        <div class="tab-content">
            <hr>



            <form class="form" action="#" method="post">
                <label for="date">Nombre de la llave</label>
                <p> <input type="text" name="newKeyName" placeholder="Nombre de la llave" /></p>
<<<<<<< HEAD
                
                
                
         
            
         
                
=======



>>>>>>> df7c8ccc00087c2e84916dcb0843a572ba2924d9
               <label for="date">Añade un dispositivo</label>

               <p><input type="file"  name="newKey" /></p>


                <button type="submit" class="btn btn-default btn-primary">Añadir</button>

            </form>
            <br>




        </div>
    </div><!--/col-9-->
</div><!--/row-->















@stop
