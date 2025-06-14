<div>


        <div class="d-md-flex flex-row justify-content-md-between" style="margin-bottom: 1rem;">
     
            <div class="input-group mb-3">               
                <input type="" value="Buscar" class="btn btn-primary" style="background-color: var(--color-danger);">
                <input wire:model.debounce.300ms="search"  type=" text" name="busqueda" class="form-control" id="busqueda">
            </div>

        </div>


    <div class="tabla-contenedor">
        <table class="tabla">
            <thead class="thead">
                <tr>
                    <th>Id</th>
                    <th style="width:20%;">Usuario</th>
                    <th>Accion</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($acciones as $accion)
                    <tr>
                        <td>{{ $accion->id }}</td>
                        @php
                            $persona = $accion->usuario->persona;
                        @endphp
                        <td>{{ $persona->nombre . ' ' . $persona->apellido_paterno . ' ' . $persona->apellido_materno }}
                        </td>
                        <td>{{ $accion->accion }}</td>
                        <td>{{ $accion->descripcion }}</td>
                        <td>{{ $accion->fecha }}</td>
                        <td>{{ $accion->hora }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination" style="margin-top: 1rem;">
        {{ $acciones->links() }}
    </div>
 

</div>
