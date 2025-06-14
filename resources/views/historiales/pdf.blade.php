<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>
</head>

<body>
    <div class="tabla" style="padding: 3rem;">

        <h1 style="text-align: center;">Historial Clinico</h1>

        <h1>{{$historiale->mascota->nombre}}</h1>
        <h3>{{$historiale->mascota->raza}} | {{$historiale->mascota->descripcion}}</h3>
        <p>
            <strong>Peso</strong>: @if($historiale->peso)
            {{$historiale->peso}}
            @else
            ---
            @endif <br>
            <strong>Talla</strong>: @if($historiale->talla)
            {{$historiale->talla}}
            @else
            ---
            @endif
        </p>

        <hr>
        <div style="display: flex;">

            <p>
            <div style="padding: 0 1rem;">
                <h2>Consultas:</h2>
                <p>
                    @forelse($historiale->detalle_historial as $detalle)
                    <strong>Fecha de consulta</strong>: {{$detalle->fecha_consulta}}
                    <br>
                    <strong>Descripcion</strong>: {{$detalle->descripcion}}
                    <br>
                    <strong>Fecha proxima consulta</strong>: {{$detalle->fecha_prox_consulta}}
                    <br> <br>
                    @empty
                    No tiene consultas
                    @endforelse
                </p>
            </div>
            </p>

            <div style="width:1px; height:auto; background-color:silver;"></div>

            <p>
            <div style="padding: 0 1rem;">
                <h2>Cirugias:</h2>
                <p>
                    @forelse($historiale->cirugia as $cirugia)
                    <strong>Nombre</strong>: {{$cirugia->nombre}}
                    <br>
                    <strong>Fecha</strong>: {{$cirugia->pivot->fecha}}
                    <br>
                    <strong>Hora</strong>: {{$cirugia->pivot->hora}}
                    <br>
                    <strong>Veterinario encargado</strong>: {{$cirugia->pivot->veterinario_encargado}}
                    <br> <br>
                    @empty
                    No tiene cirugias
                    @endforelse
                </p>
            </div>
            </p>

            <div style="width:1px; height:auto; background-color:silver;"></div>

            <p>
            <div style="padding: 0 1rem;">
                <h2>Enfermedades:</h2>
                <p>
                    @forelse($historiale->enfermedad as $enfermedad)
                    <strong>Nombre</strong>: {{$enfermedad->nombre}}
                    <br>
                    <strong>Fecha de deteccion</strong>: {{$enfermedad->pivot->fecha_deteccion}}
                    <br>
                    <strong>Inicio de tratamiento</strong>: @if($enfermedad->pivot->inicio_tratamiento)
                    {{$enfermedad->pivot->inicio_tratamiento}}
                    @else
                    ---
                    @endif
                    <br>
                    <strong>Fin de tratamiento</strong>: @if($enfermedad->pivot->fin_tratamiento)
                    {{$enfermedad->pivot->fin_tratamiento}}
                    @else
                    ---
                    @endif
                    <br><br>
                    @empty
                    No tiene enfermedades
                    @endforelse
                </p>
            </div>
            </p>

            <div style="width:1px; height:auto; background-color:silver;"></div>

            <p>
            <div style="padding: 0 1rem;">
                <h2>Vacunas:</h2>
                <p>
                    @forelse($historiale->vacuna as $vacuna)
                    <strong>Nombre</strong>: {{$vacuna->nombre}}
                    <br>
                    <strong>Dosis</strong>: {{$vacuna->pivot->dosis}}
                    <br>
                    <strong>Fecha de apliacion</strong>: {{$vacuna->pivot->fecha_aplicacion}}
                    <br>
                    <strong>Fecha proxima apliacion</strong>: @if($vacuna->pivot->fecha_prox_aplicacion)
                    {{$vacuna->pivot->fecha_prox_aplicacion}}
                    @else
                    ---
                    @endif
                    <br><br>
                    @empty
                    No tiene vacunas aplicadas
                    @endforelse
                </p>
            </div>
            </p>
        </div>
        <hr>
    </div>
</body>

</html>