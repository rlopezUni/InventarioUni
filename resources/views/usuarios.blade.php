<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Consultar Activos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            

                <!-- ******************************   Inicia formulario   *****************************************-->
<div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3><b>Filtros</b></h3>
                            </center>
                        </div>

                                    <br>

                <!-- ******************************   Plantel  *****************************************-->

                    <form action="{{ route('mostrarPlantelActivos') }}" method ="POST">
                        <div class="card-body">
                                <div class="row">
                                    @csrf

                                    <br>

                <div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3><b>Por Plantel</b></h3>
                            </center>
                        </div>

                                    <br>

                    <div class="col-md-4">
                                        <label for="plantel">Plantel al que Pertenece</label>
                                        <select class="form-control" id="plant" name="plant" required >
                                            <option value="">Seleccione uno</option>
                                            @foreach($varPlantel as $plantel)
                                                <option  value="{{$plantel->id_plantel}}">{{$plantel->descripcion}}</option>
                                            @endforeach
                                        </select>
                     </div>

                     <br>
                        
                        <div class="card-footer">
                                <div class="col-md-12">
                                    <center>
                                        <a target="_blank">
                                        <button type="submit" id="guardar" class="btn btn-primary">
                                            &nbsp;&nbsp;Filtrar
                                        </button>
                                        </a>  
                                    </center>
                                </div>
                            </div>     

                            </div>

                            </div>
                    </div>
                </div>
                    </form>
                
                <!-- ******************************   Plantel y Area  *****************************************-->

                <form action="{{ route('mostrarPlantel_AreaActivos') }}" method ="POST">
                        <div class="card-body">
                                <div class="row">
                                    @csrf

                                    <br>

                <div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3><b>Por plantel y area</b></h3>
                            </center>
                        </div>

                                    <br>

                    <div class="col-md-4">
                                        <label for="plantel">Plantel</label>
                                        <br>
                                        <select class="form-control" id="plantel" name="plantel" required >
                                            <option value="">Seleccione uno</option>
                                            @foreach($varPlantel as $plantel)
                                                <option  value="{{$plantel->id_plantel}}">{{$plantel->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="area">Area</label>
                                        <br>
                                        <select class="form-control" id="area" name="area" required >
                                            <option value="">Seleccione una</option>
                                            <option value=""></option><!--Segun el plantel-->
                                        </select>
                                    </div>

                                    <br>
                                    <br>    
                    
                        <div class="card-footer">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" id="guardar" class="btn btn-primary">
                                            &nbsp;&nbsp;Filtrar
                                        </button>
                                    </center>
                                </div>
                            </div>     

                            </div>

                            </div>

                            </div>
</div>
                    
                    </form>
                 

</div>
</div>




<br><br>


                <!-- ******************************   Fin formulario   *****************************************-->

                <!-- ******************************   Inicia tabla   *****************************************-->
<div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">

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
                    <span class="text-gray-300">Id_activo</span>
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
                    <span class="text-gray-300">Plantel al que Pertenece</span>
                </center>
            </th>
            <th class="px-2 py-2">
                <center>
                    <span class="text-gray-300">Area</span>
                </center>
            </th>
          </tr>
        </thead>
        <tbody class="bg-gray-200">
           @foreach($obj as $objeto)
                  <tr>
                      <td class="px-2 py-2"><center>{{$objeto->id}}</center></td>
                      <td class="px-2 py-2"><center>{{$objeto->descripcion}}</center></td>
                      <td class="px-2 py-2">
                        <center>
                            <img src="{{asset($objeto->imagen)}}" class="img-fluid img-thumbnail" width="120px" >
                        </center>
                      </td>
                      <td class="px-2 py-2"><center>{{$objeto->nombre_plantel->descripcion}}</center></td>
                      <td class="px-2 py-2"><center>{{$objeto->nombre_area->descripcion}}</center></td>
                      
                      
                  </tr>
              @endforeach
             
             

        </tbody>
      </table>

  </div>
</div>

      <br>
      <br>
  <!-- **********************************   fin tabla ***************************************-->








            
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
