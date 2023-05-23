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
                                <h3><b>Reubicar Activo</b></h3>
                            </center>
                        </div>

                                    <br>

                    <form action="{{route('moverActivos',$mod->id)}}" method ="POST">
                        <div class="card-body">
                                <div class="row">
                                    @csrf

                                    <br>

                <div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3><b>Origen</b></h3>
                            </center>
                        </div>

                                    <br>

                    <div class="col-md-4">
                        <label>Plantel:</label>
                        <span>{{$mod->nombre_plantel->descripcion}}</span>
                        <br>
                        <label>Area:</label>
                        <span>{{$mod->nombre_area->descripcion}}</span>
                    </div>
                        
                

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3><b>Destino</b></h3>
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
                        
                

                    </div>
                </div>


                                        

                                    <br>    
                    
                        <div class="card-footer">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" id="guardar" class="btn btn-primary">
                                            &nbsp;&nbsp;Reubicar
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