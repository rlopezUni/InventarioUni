<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- ******************************   Inicia tabla   *****************************************-->
<div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">

                        <div class="card-header">
                            <center>
                                <h3><b>Lista de Movimientos</b></h3>
                            </center>
                        </div>
        
      <table id="activos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th class="px-2 py-2">
                <center>
                    <span class="text-gray-300">Id_activo</span>
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
                    <span class="text-gray-300">Fecha del Movimiento</span>
                </center>
            </th>
          </tr>
        </thead>
        <tbody class="bg-gray-200">
            @foreach($movs as $movimiento)
                  <tr>
                      <td class="px-2 py-2"><center>{{$movimiento->id_activo}}</center></td>
                      <td class="px-2 py-2"><center>{{$movimiento->nombre_plantel->descripcion}}</center></td>
                      <td class="px-2 py-2"><center>{{$movimiento->nombre_area->descripcion}}</center></td>
                      <td class="px-2 py-2"><center>{{$movimiento->created_at}}</center></td>
                      
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
