<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Planteles') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    
    <div class="col-md-12">
                    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
                        <div class="card-header">
                            <center>
                                <h3><b>Modificar Plantel</b></h3>
                            </center>
                        </div>

                                    <br>
    <form action="{{route('modificarPlanteles',$mod->id)}}" method ="POST">
        <div class="card-body">
            <div class="row">
                @csrf

                                    <br>

        <div class="col-md-4">
                        <label>Nuevo Nombre del Plantel:</label>
                        <br>
                        <input type="text" name="plantel" value="{{$mod->descripcion}}" maxlength="50" required autofocus>
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