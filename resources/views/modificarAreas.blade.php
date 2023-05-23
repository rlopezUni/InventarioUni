<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Areas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    
    <div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3><b>Modificar Area</b></h3>
                            </center>
                        </div>

                                    <br>

                    <form action="{{route('modificarAreas',$mod->id)}}" method ="POST">
                        <div class="card-body">
                                <div class="row">
                                    @csrf

                                    <br>

                    <div class="col-md-4">
                        <label>Nuevo Nombre del Area:</label>
                        <br>
                        <input type="text" name="area" value="{{$mod->descripcion}}" maxlength="50" required autofocus>
                    </div>
                        
                    <div class="col-md-4">

                        <label>Nuevo Plantel:</label>
                        <select class="form-control" id="plantel" name="plantel" required >
                            <option value="{{$mod->nombre_plantel->id}}">{{$mod->nombre_plantel->descripcion}}</option>
                                @foreach($plant as $plantel)
                                    <option  value="{{$plantel->id}}">{{$plantel->descripcion}}</option>
                                @endforeach
                        </select>

                    </div>

                            </div>
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
                    </form>





                
                 
            </div>
        </div>
    </div>
</div>
    </div>




   



</x-app-layout>