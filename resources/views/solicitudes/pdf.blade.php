<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{public_path('css/table-information.css')}}" type="text/css">
    <title>Recibo</title>
</head>

<body>
    <div class="tabla" style="padding: 3rem;">
        <h1>Recibo</h1>
        <strong>Cliente: {{ $solicitud->cliente->persona->nombre .
                                        ' ' .
                                        $solicitud->cliente->persona->apellido_paterno .
                                        ' ' .
                                        $solicitud->cliente->persona->apellido_materno }}</strong>
        <p>
            <strong>Tipo de servicio</strong>: @if ($solicitud->id_servicio)
            {{ $solicitud->servicio->nombre }}
            @else
            ninguno
            @endif
            <br>
            <strong>Mascota</strong>: {{$solicitud->mascota->nombre}} <br>
            <strong>ID recibo</strong>: {{$solicitud->id_recibo}} <br>
            <strong>Concepto</strong>: {{$solicitud->recibo->concepto}} <br>
            <strong>Monto cancelado</strong>: {{$solicitud->recibo->monto_cancelado}} <br>
            <strong>Saldo</strong>: {{$solicitud->recibo->saldo}} <br>
            <strong>Monto total</strong>: {{$solicitud->recibo->monto_total}} <br>
        </p>
    </div>
</body>

</html>