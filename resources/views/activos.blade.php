<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- ******************************   Formulario activos   *****************************************-->

            <div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3><b>Crear Activo</b></h3>
                            </center>
                        </div>
                        <form method="POST" action="{{ route('storeActivos') }}"  enctype="multipart/form-data">


                            <div class="card-body">
                                <div class="row">
                                    @csrf
                                    <div class="col-md-12">
                                        <br>
                                        <center>
                                            <h4>Datos del Activo</h4>
                                        </center>
                                    </div>

                                    <br>
                                    <br>

                                    
                                    <div class="col-md-4">
                                        <label for="descripcion">Descripcion del Activo</label>
                                        <input id="descripcion" type="text" placeholder="Descripcion del Activo" class="form-control" name="descripcion" value="{{old('descripcion')}}" maxlength="50" required autofocus>
                                    </div>

                                    <br>

                                    <div class="col-md-4">
                                        <label for="imagen">Imagen del Activo</label>
                                        <input id="imagen" type="file" placeholder="Imagen" class="form-control" name="imagen" value="{{old('imagen')}}" required autofocus>
                                    </div>

                                    <br>

                                    <div class="col-md-4">
                                        <label for="serial">Serial</label>
                                        <input id="serial" type="text" placeholder="Serial" class="form-control" name="serial" value="{{old('serial')}}" maxlength="35" required autofocus>
                                    </div>

                                    <br>

                                    <div class="col-md-4">
                                        <label for="modelo">Modelo</label>
                                        <input id="modelo" type="text" placeholder="Modelo" class="form-control" name="modelo" value="{{old('modelo')}}" maxlength="35" required autofocus>
                                    </div>

                                    <br>

                                    <div class="col-md-4">
                                        <label for="marca">Marca</label>
                                        <input id="marca" type="text" placeholder="Marca" class="form-control" name="marca" value="{{old('marca')}}" maxlength="35" required autofocus>
                                    </div>

                                    <br>

                                    <div class="col-md-4">
                                        <label for="plantel">Plantel al que Pertenece</label>
                                        <select class="form-control" id="plantel" name="plantel" required >
                                            <option value="">Seleccione uno</option>
                                            @foreach($varPlantel as $plantel)
                                                <option  value="{{$plantel->id_plantel}}">{{$plantel->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <br>





                                    <div class="col-md-4">
                                        <label for="area">Area</label>
                                        <select class="form-control" id="area" name="area" required >
                                            <option value="">Seleccione una</option>
                                        </select>
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
                    @if (session('guardaActivo'))
                    <div class="alert alert-success">
                        <strong>{{session('guardaActivo')}}</strong>
                    </div>
                    @endif
                </div>

                        <br>
                        <br>

                

                <!-- ******************************   Inicia tabla   *****************************************-->
<div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">

                        @if (session('elimiActivos'))
                    <div class="alert alert-danger">
                        <strong>{{session('elimiActivos')}}</strong>
                    </div>
                    @endif

                    @if (session('modiActivos'))
                    <div class="alert alert-success">
                        <strong>{{session('modiActivos')}}</strong>
                    </div>
                    @endif

                    @if (session('moverActivos'))
                    <div class="alert alert-primary">
                        <strong>{{session('moverActivos')}}</strong>
                    </div>
                    @endif

                        <div class="card-header">
                            <center>
                                <h3><b>Lista de Activos</b></h3>
                            </center>
                        </div>
        
      <table id="activos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th class="px-2 py-2">
                <center>
                    <span class="text-gray-300">Id</span>
                </center>
            </th>
            <th class="px-2 py-2">
                <center>
                    <span class="text-gray-300">Serial</span>
                </center>
            </th>
            <th class="px-2 py-2">
                <center>
                    <span class="text-gray-300">Descripcion</span>
                </center>
            </th>
            <th class="px-2 py-2">
                <center>
                    <span class="text-gray-300">Imagen</span>
                </center>
            </th>
            <th class="px-2 py-2">
                <center>
                    <span class="text-gray-300">Modelo</span>
                </center>
            </th>
            <th class="px-2 py-2">
                <center>
                   <span class="text-gray-300">Marca</span> 
                </center>
            </th>
            <th class="px-2 py-2">
                <center>
                    <span class="text-gray-300">Plantel al que Pertenece</span>
                </center>
            </th>
            <th class="px-2 py-2">
                <center>
                   <span class="text-gray-300">Area</span> 
                </center>
            </th>
            <th class="px-2 py-2">
                <center>
                    <span class="text-gray-300">Modificar</span>
                </center>
            </th>
            <th class="px-2 py-2">
                <center>
                    <span class="text-gray-300">Reubicar</span>
                </center>
            </th>
            <th class="px-2 py-2">
                <center>
                   <span class="text-gray-300">Eliminar</span> 
                </center>
            </th>
          </tr>
        </thead>
        <tbody class="bg-gray-200">
            @foreach($obj as $objetos)
                  <tr>
                      <td class="px-2 py-2"><center>{{$objetos->id}}</center></td>
                      <td class="px-2 py-2"><center>{{$objetos->serial}}</center></td>
                      <td class="px-2 py-2"><center>{{$objetos->descripcion}}</center></td>
                      <td class="px-2 py-2">
                        <center>
                            <img src="{{asset($objetos->imagen)}}" class="img-fluid img-thumbnail" width="120px" >
                        </center>
                      </td>
                      <td class="px-2 py-2"><center>{{$objetos->modelo}}</center></td>
                      <td class="px-2 py-2"><center>{{$objetos->marca}}</center></td>
                      <td class="px-2 py-2"><center>{{$objetos->nombre_plantel->descripcion}}</center></td>
                      <td class="px-2 py-2"><center>{{$objetos->nombre_area->descripcion}}</center></td>
                      <td>
                        <center>
                            <a  href="{{ route('mostrarModificarActivos',$objetos->id) }}">
                          <button class="btn btn-success">
                            <i class="fas fa-code"></i>
                          </button>
                        </a>
                        </center>
                      </td>
                      <td>
                        <center>
                            <a  href="{{ route('mostrarMoverActivos',$objetos->id) }}">
                          <button class="btn btn-primary">
                            <i class="fas fa-code"></i>
                          </button>
                        </a>
                        </center>
                      </td>
                      <td>
                        <center>
                            <form method="POST" action="{{ route('eliminarActivos',$objetos->id) }}"  enctype="multipart/form-data">
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

                                    <script type="text/javascript">


                                        $( "#plantel" ).change(function() {

                                                var route = "/consulta/areas/" + $('#plantel').val();

                                                $("#area option").remove()

                                                 $("#area").append("<option value = ''>Selecione una</option>")
                                                 $("#area").selectpicker('refresh');
                                                //value="res[i].">nombre_area</

                                                $.get(route, function(res){
                                                   //aqui va si si encuentra resultados
                                                   for( i = 0; i < res.length;i++){
                                                     
                                                     $("#area").append("<option value = "+res[i].id+">"+res[i].descripcion+"</option>")
                                                   }
                                                   $("#area").selectpicker('refresh');
                                                 
                                                }).fail(function(res) {
                                                    // aqui si falla dejar vacio
                                                });

                                            });
                                    </script>

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
