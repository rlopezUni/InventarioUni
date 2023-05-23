<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- ******************************   Formulario areas   *****************************************-->

            <div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3><b>Crear Usuario</b></h3>
                            </center>
                        </div>
                        <form method="POST" action="{{ route('storeUsuarios') }}"  enctype="multipart/form-data">


                            <div class="card-body">
                                <div class="row">
                                    @csrf

                                    <br>

                                    <div class="col-md-4">
                                        <label for="usuario">Nombre del Usuario</label>
                                        <input id="usuario" type="text" placeholder="Usuario" class="form-control" name="usuario" value="{{old('usuario')}}" maxlength="50" required autofocus>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="rol">Roles</label>
                                        <select class="form-control" id="rol" name="rol" required >
                                            <option value="">Seleccione uno</option>
                                            @foreach($roles as $rol)
                                                <option  value="{{$rol->id}}">{{$rol->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="correo">Correo del Usuario</label>
                                        <input id="correo" type="email" placeholder="Correo" class="form-control" name="correo" value="{{old('correo')}}" maxlength="50" required autofocus>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="contraseña">Contraseña</label>
                                        <input id="contraseña" type="password" placeholder="Contraseña" class="form-control" name="contraseña" value="{{old('correo')}}" maxlength="50" required autofocus>
                                    </div>

                                    

                                    <br>

                                </div>

                            </div>


                            <div class="card-footer">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" id="guardar" class="btn btn-primary">
                                            &nbsp;&nbsp;Guardar
                                        </button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (session('guardaUsuario'))
                    <div class="alert alert-success">
                        <strong>{{session('guardaUsuario')}}</strong>
                    </div>
                    @endif
                </div>

                        <br>
                        <br>

                

                <!-- ******************************   Inicia tabla   *****************************************-->
<div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                    
                    @if (session('elimiUsuarios'))
                    <div class="alert alert-danger">
                        <strong>{{session('elimiUsuarios')}}</strong>
                    </div>
                    @endif

                    @if (session('modiUsuario'))
                    <div class="alert alert-success">
                        <strong>{{session('modiUsuario')}}</strong>
                    </div>
                    @endif

                        <div class="card-header">
                            <center>
                                <h3><b>Lista de Areas</b></h3>
                            </center>
                        </div>
        
      <table id="activos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th class="px-5 py-2">
                <center>
                     <span class="text-gray-300">Id</span>
                </center>
            </th>
            <th class="px-5 py-2">
                <center>
                    <span class="text-gray-300">Nombre del Usuario</span>
                </center>
            </th>
            <th class="px-5 py-2">
                <center>
                    <span class="text-gray-300">Rol</span>
                </center>
            </th>
            <th class="px-5 py-2">
                <center>
                   <span class="text-gray-300">Correo</span> 
                </center>
            </th>
            <th class="px-5 py-2">
                <center>
                    <span class="text-gray-300">Modificar</span>
                </center>
            </th>
            <th class="px-5 py-2">
                <center>
                    <span class="text-gray-300">Eliminar</span>
                </center>
            </th>
          </tr>
        </thead>
        <tbody class="bg-gray-200">
            @foreach($usuario as $usuario)
                  <tr>
                      <td class="px-5 py-2"><center>{{$usuario->id}}</center></td>
                      <td class="px-5 py-2"><center>{{$usuario->name}}</center></td>
                      <td class="px-5 py-2"><center>{{$usuario->descripcion_rol->descripcion}}</center></td>
                      <td class="px-5 py-2"><center>{{$usuario->email}}</center></td>
                      <td>
                        <center>
                            <a  href="{{ route('mostrarModificarUsuarios',$usuario->id) }}">
                          <button class="btn btn-success">
                            <i class="fas fa-code"></i>
                          </button>
                        </a>
                        </center>
                      </td>
                      <td>
                        <center>
                            <form method="POST" action="{{ route('eliminarUsuarios',$usuario->id) }}"  enctype="multipart/form-data">
                            @csrf
                             <a target="_blank" href="">
                          <button class="btn btn-danger">
                            <i class="fas fa-code"></i>
                          </button>
                        </a>
                        </form>
                        </center>
                          
                      </td>
                  </tr>
              @endforeach

        </tbody>
      </table>

  </div>
</div>

      <br>
      <br>
  <!-- **********************************   fin tabla ***************************************-->








            </div>
        </div>
    </div>
</x-app-layout>

<script defer src="{{asset('js/jquery/jquery.dataTables.min.js')}}" ></script>
<script defer src="{{asset('js/jquery/dataTables.bootstrap4.min.js')}}" ></script>
<script defer src="{{asset('js/jquery/dataTables.fixedHeader.min.js')}}" ></script>
<script defer src="{{asset('js/jquery/dataTables.responsive.min.js')}}" ></script>
<script defer src="{{asset('js/jquery/responsive.bootstrap.min.js')}}" ></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#activos').DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
        });
        
    } );
</script>