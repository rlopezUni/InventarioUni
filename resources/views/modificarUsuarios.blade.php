<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    
    <div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3><b>Modificar Usuario</b></h3>
                            </center>
                        </div>

                                    <br>

                    <form action="{{route('modificarUsuarios',$mod->id)}}" method ="POST" enctype="multipart/form-data">
                        <div class="card-body">
                                <div class="row">
                                    @csrf

                                    <br>

                    <div class="col-md-4">
                        <label>Nuevo Nombre del Usuario:</label>
                        <br>
                        <input type="text" name="usuario" value="{{$mod->name}}" maxlength="50" required autofocus>
                    </div>

                    <div class="col-md-4">
                                        <label for="rol">Nuevo Rol</label>
                                        <br>
                                        <select class="form-control" id="rol" name="rol" required >
                                            <option value="{{$mod->rol}}">{{$mod->descripcion_rol->descripcion}}</option>
                                            @foreach($roles as $rol)
                                                <option  value="{{$rol->id}}">{{$rol->descripcion}}</option>
                                            @endforeach
                                        </select>
                    </div>
                        
                                    <div class="col-md-4">

                                        <label for="correo">Nuevo Correo</label>
                                        <br>
                                        <input id="correo" type="email" class="form-control" name="correo" value="{{$mod->email}}" maxlength="50" required autofocus>
                                    </div>

                                    <br>

                                    <div class="col-md-4">
                                        <label for="contraseña">Nueva Contraseña</label>
                                        <br>
                                        <input id="contraseña" type="password"  class="form-control" name="contraseña" value="" maxlength="35" required autofocus>
                                    </div>
         

                        <div class="card-footer">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" id="guardar" class="btn btn-primary">
                                            &nbsp;&nbsp;Guardar Cambios
                                        </button>
                                    </center>
                                </div>
                            </div>     

                            </div>

                            </div>
                    </div>
                    </form>





                
                 
            </div>
        </div>
    </div>
</div>
    </div>




   



</x-app-layout>

