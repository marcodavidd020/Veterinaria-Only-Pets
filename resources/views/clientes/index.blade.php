@extends('home')
@section('title', 'clientes')
@section('registrar-datos', 'active')
@section('css-derecha')
    <link rel="stylesheet" href="{{ asset('css/table-information.css') }}">
    <style>
        #ClienteFormUpdate .form-control,
        #ClienteFormUpdate .form-select,
        #ClienteFormUpdate .select2-selection {
            background-color: khaki !important;
        }

    </style>
@endsection
@section('contenido')

    <div class="crud">

        @can('clientes.create')
        <div class="registrar">
            <button class="buttonRegistrame" data-bs-toggle="modal" data-bs-target="#ClienteFormInput"
                onclick="createSelector('cliente','input')">
                Registrar <br>cliente
            </button>
        </div>
        @endcan

        <div class="tabla-contenedor">
            <table class="tabla">
                <thead class="thead">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Ci</th>
                        <th>Direccion</th>
                        <th>Email</th>
                        <th>Fecha nacimiento</th>
                        <th>Sexo</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->apellido_paterno }}</td>
                            <td>{{ $cliente->apellido_materno }}</td>
                            <td>{{ $cliente->ci }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->fecha_de_nacimiento }}</td>
                            <td>{{ $cliente->sexo }}</td>
                            <td>
                                @can('clientes.edit')
                                <button href="{{ route('clientes.edit', $cliente) }}" class="button-edit"
                                    onclick=@php
                                    echo "\"imprimir(" . json_encode($cliente->id) . ")\""; @endphp data-bs-toggle="modal" data-bs-target="#ClienteFormUpdate">
                                    <span class="material-icons-sharp">
                                        edit
                                    </span>
                                </button>
                                @endcan
                            </td>
                            <td><a href="{{route('clientes.show', $cliente)}}" class="button-edit" id="ver">
                                    <span class="material-icons-sharp">
                                        visibility
                                    </span>
                                </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('body-final')
    @can('clientes.create')
    <x-input-datos id="ClienteFormInput" type="cliente" />
    @endcan

    @can('clientes.edit')
    <x-update-datos id="ClienteFormUpdate" type="cliente" />
    @endcan
@endsection
@section('js-home')

    <script>
        const createSelector = (type, mod) => {
            let selector = '.' + mod + '-datos-telefono-' + type;
            $(selector).select2({
                //   theme: 'bootstrap-5',
                tags: true,
                placeholder: 'Inserte los telefonos',
                maximumSelectionLength: 3,
                maximumInputLength: 9,
                minimumInputLength: 8,
                tokenSeparators: [',', ' '],
                width: '100%',

            })
        }
        //EVENTO ONCLICK PARA EL BOTON DE EDITAR


        function imprimir(id) {
            var admin = new XMLHttpRequest()
            admin.open("GET", "/clientes/datas/" + id.toString(), true)
            admin.addEventListener("load", cargarDatos)
            admin.send()
        }

        function cargarDatos(e) {
            const datos = JSON.parse(this.responseText)
            // console.log(datos)
            $("#ClienteFormUpdate #nombre").attr("value", datos.persona.nombre)
            $("#ClienteFormUpdate #apellido_paterno").attr("value", datos.persona.apellido_paterno)
            $("#ClienteFormUpdate #apellido_materno").attr("value", datos.persona.apellido_materno)
            $("#ClienteFormUpdate #ci").attr("value", datos.persona.ci)
            $("#ClienteFormUpdate #email").attr("value", datos.persona.email)
            $("#ClienteFormUpdate #sexo").attr("value", datos.persona.sexo)
            $("#ClienteFormUpdate #fecha_de_nacimiento").attr("value", datos.persona.fecha_de_nacimiento)
            //make the same with direccion
            $("#ClienteFormUpdate #direccion").attr("value", datos.persona.direccion)
            if (datos.persona.sexo == "M") {
                $("#ClienteFormUpdate #sexoM").prop("checked", true)
                $("#ClienteFormUpdate #sexoF").prop("checked", false)
            } else {
                $("#ClienteFormUpdate #sexoF").prop("checked", true)
                $("#ClienteFormUpdate #sexoM").prop("checked", false)
            }

            //PARA LOS TELEFONOS
            createSelector('cliente', 'update')
            $('.update-datos-telefono-cliente').empty()
            const telefonos = datos.persona.telefonos.map((telefono) => telefono.numero)

            datos.persona.telefonos.forEach((telefono) => {
                let data = {
                    id: telefono.numero,
                    text: String(telefono.numero),
                }
                $(".update-datos-telefono-cliente").append(new Option(data.text, data.id, false, false))
                    .trigger('change')
            })

            $(".update-datos-telefono-cliente").val(telefonos)
            $(".update-datos-telefono-cliente").trigger('change')


            let action = "/clientes/" + datos.id

            $('#ClienteFormUpdate form').attr('action', action)


        }
    </script>
@endsection
