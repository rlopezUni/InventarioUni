<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Activos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    
    <div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3><b>Modificar Activo</b></h3>
                            </center>
                        </div>

                                    <br>

                    <form action="{{route('modificarActivos',$mod->id)}}" method ="POST" enctype="multipart/form-data">
                        <div class="card-body">
                                <div class="row">
                                    @csrf

                                    <br>

                    <div class="col-md-4">
                        <label>Nueva Descripcion del Activo:</label>
                        <br>
                        <input type="text" name="descripcion" value="{{$mod->descripcion}}" maxlength="50" required autofocus>
                    </div>

                    <div class="col-md-4">
                                        <label for="imagen">Nueva Imagen</label>
                                        <input id="imagen" type="file" placeholder="Imagen" class="form-control" name="imagen" required autofocus>
                                    </div>
                        
                    <div class="col-md-4">

                                        <label for="serial">Nuevo Serial</label>
                                        <br>
                                        <input id="serial" type="text" placeholder="Serial" class="form-control" name="serial" value="{{$mod->serial}}" maxlength="35" required autofocus>
                                    </div>

                                    <br>

                                    <div class="col-md-4">
                                        <label for="modelo">Nuevo Modelo</label>
                                        <br>
                                        <input id="modelo" type="text" placeholder="Modelo" class="form-control" name="modelo" value="{{$mod->modelo}}" maxlength="35" required autofocus>
                                    </div>

                                    <br>

                                    <div class="col-md-4">
                                        <label for="marca">Nueva Marca</label>
                                        <br>
                                        <input id="marca" type="text" placeholder="Marca" class="form-control" name="marca" value="{{$mod->marca}}" maxlength="35" required autofocus>
                                    </div>

                                    <br>

                                    <div class="col-md-4">
                                        <label for="plantel">Plantel al que Pertenece</label>
                                        <br>
                                        <select class="form-control" id="plantel" name="plantel" required >
                                            <option value="{{$mod->id_plantel}}">{{$mod->nombre_plantel->descripcion}}</option>
                                            @foreach($varPlantel as $plantel)
                                                <option  value="{{$plantel->id_plantel}}">{{$plantel->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <br>





                                    <div class="col-md-4">
                                        <label for="area">Area</label>
                                        <br>
                                        <select class="form-control" id="area" name="area" required >
                                            <option value="{{$mod->id_area}}">{{$mod->nombre_area->descripcion}}</option>
                                            <option value=""></option><!--Segun el plantel-->
                                        </select>
                                    </div>

                                    <br>







                        
                    

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