<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Areas') }}
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
                                <h3><b>Crear Area</b></h3>
                            </center>
                        </div>
                        <form method="POST" action="{{ route('storeAreas') }}"  enctype="multipart/form-data">


                            <div class="card-body">
                                <div class="row">
                                    @csrf

                                    <br>

                                    <div class="col-md-4">
                                        <label for="area">Nombre del Area</label>
                                        <input id="area" type="text" placeholder="Area" class="form-control" name="area" value="{{old('area')}}" maxlength="50" required autofocus>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="area">Plantel al que Pertenece</label>
                                        <select class="form-control" id="plantel" name="plantel" required >
                                            <option value="">Seleccione uno</option>
                                            @foreach($plant as $plantel)
                                                <option  value="{{$plantel->id}}">{{$plantel->descripcion}}</option>
                                            @endforeach
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
                    @if (session('guardaArea'))
                    <div class="alert alert-success">
                        <strong>{{session('guardaArea')}}</strong>
                    </div>
                    @endif
                </div>

                        <br>
                        <br>
                        


                

                <!-- ******************************   Inicia tabla   *****************************************-->
<div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                    
                    @if (session('elimiAreas'))
                    <div class="alert alert-danger">
                        <strong>{{session('elimiAreas')}}</strong>
                    </div>
                    @endif

                    @if (session('modiAreas'))
                    <div class="alert alert-success">
                        <strong>{{session('modiAreas')}}</strong>
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
                    <span class="text-gray-300">Nombre del Area</span>
                </center>
            </th>
            <th class="px-5 py-2">
                <center>
                    <span class="text-gray-300">Plantel al que Pertenece</span>
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
             @foreach($varArea as $area)
                  <tr>
                      <td class="px-5 py-2"><center>{{$area->id}}</center></td>
                      <td class="px-5 py-2"><center>{{$area->descripcion}}</center></td>
                      <td class="px-5 py-2"><center>{{$area->nombre_plantel->descripcion}}</center></td>
                      <td>
                        <center>
                            <a  href="{{ route('mostrarModificarAreas',$area->id) }}">
                          <button class="btn btn-success">
                            <i class="fas fa-code"></i>
                          </button>
                        </a>
                        </center>
                      </td>
                      <td>
                        <center>
                            <form method="POST" action="{{ route('eliminarAreas',$area->id) }}"  enctype="multipart/form-data">
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