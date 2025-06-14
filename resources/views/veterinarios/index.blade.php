@extends('home')
@section('title', 'Veterinarios')

@section('registrar-datos','active')
@section('css-derecha')

<link rel="stylesheet" href="{{asset('css/table-information.css')}}">
    <style>
        #VeterinarioFormUpdate .form-control,
        #VeterinarioFormUpdate .form-select,
        #VeterinarioFormUpdate .select2-selection{
            background-color: khaki !important;
        }
    </style>
@endsection

@section('contenido')
<div class="crud">
    @can('veterinarios.create')
    <div class="registrar">

        <button class="buttonRegistrame"   data-bs-toggle="modal"
        data-bs-target="#VeterinarioFormInput" onclick="createSelector('veterinario','input')">

            Registrar <br>Veterinario
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
                    <th>Profesion</th>
                    <th>Email</th>
                    <th>Servicio</th>
                    <th>Sexo</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach($veterinarios as $veterinario)
                <tr>
                    <td>{{$veterinario->id}}</td>
                    <td>{{$veterinario->persona->nombre}}</td>
                    <td>{{$veterinario->persona->apellido_paterno}}</td>
                    <td>{{$veterinario->persona->apellido_materno}}</td>
                    <td>{{$veterinario->persona->ci}}</td>
                    <td>{{$veterinario->profesion}}</td>
                    <td>{{$veterinario->persona->email}}</td>
                    <td>{{$veterinario->servicio->nombre??''}}</td>
                    <td>{{$veterinario->persona->sexo}}</td>
                    <td>
                        @can('veterinarios.edit')
                        <button class="button-edit" id="editar" onclick =@php
                        echo "\"imprimir(" . json_encode($veterinario->id) . ")\""; @endphp
                        data-bs-toggle="modal"
                                data-bs-target="#VeterinarioFormUpdate">
                            <span class="material-icons-sharp">
                                edit
                            </span>

                        </button>
                        @endcan
                    </td>
  
                    <td><a href="{{route('veterinarios.show', $veterinario)}}" class="button-edit" id="ver">
                            <span class="material-icons-sharp">
                                visibility
                            </span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('body-final')
@can('veterinarios.create')
<x-input-datos id="VeterinarioFormInput" type="veterinario" />
@endcan

@can('veterinarios.edit')
<x-update-datos id="VeterinarioFormUpdate" type="veterinario" />
@endcan

@endsection

@section('js-home')

    <script>
        const createSelector = (type, mod) => {
            let selector = '.' + mod + '-datos-telefono-' + type;
            $(selector).select2({
                //theme: 'bootstrap-5',
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
            admin.open("GET","/veterinarios/datas/" + id.toString(), true)
            admin.addEventListener("load", cargarDatos)
            admin.send()
        }

        function cargarDatos(e) {
            const datos = JSON.parse(this.responseText)
            console.log(datos)
            $("#VeterinarioFormUpdate #nombre").attr("value", datos.persona.nombre)
            $("#VeterinarioFormUpdate #apellido_paterno").attr("value", datos.persona.apellido_paterno)
            $("#VeterinarioFormUpdate #apellido_materno").attr("value", datos.persona.apellido_materno)
            $("#VeterinarioFormUpdate #ci").attr("value", datos.persona.ci)
            $("#VeterinarioFormUpdate #profesion").attr("value", datos.profesion)
            $("#VeterinarioFormUpdate #email").attr("value", datos.persona.email)
            $("#VeterinarioFormUpdate #sexo").attr("value", datos.persona.sexo)
            $("#VeterinarioFormUpdate #fecha_de_nacimiento").attr("value", datos.persona.fecha_de_nacimiento)
            //make the same with direccion
            $("#VeterinarioFormUpdate #direccion").attr("value", datos.persona.direccion)
            if (datos.persona.sexo == "M") {
                $("#VeterinarioFormUpdate #sexoM").prop("checked", true)
                $("#VeterinarioFormUpdate #sexoF").prop("checked", false)
            } else {
                $("#VeterinarioFormUpdate #sexoF").prop("checked", true)
                $("#VeterinarioFormUpdate #sexoM").prop("checked", false)
            }

            //PARA LOS TELEFONOS
            createSelector('veterinario', 'update')
            $('.update-datos-telefono-veterinario').empty()
            const telefonos = datos.persona.telefonos.map((telefono) => telefono.numero)
            
            datos.persona.telefonos.forEach((telefono) => {
                let data = {
                    id: telefono.numero,
                    text: String(telefono.numero),
                }
                $(".update-datos-telefono-veterinario").append(new Option(data.text, data.id, false, false))
                    .trigger('change')
            })

            $(".update-datos-telefono-veterinario").val(telefonos)
            $(".update-datos-telefono-veterinario").trigger('change')

            //TURNO
            $("#VeterinarioFormUpdate #turno option")[0].selected="true"
            if (datos.turno[0]) {
                const turno = datos.turno[0].id_turno ?? null
                const turnoSelected = "#VeterinarioFormUpdate #turno " + "option[value=" + String(turno) + "]"
                $("#VeterinarioFormUpdate #turno option").each((i,e)=>{
                    $(e).attr("selected", false)
                   // console.log(e)
                })
                $(turnoSelected).attr("selected", true)
            }

            //SERVICIO
            $("#VeterinarioFormUpdate #servicio option")[0].selected="true"
            if (datos.id_servicio) {
                const servicio = datos.id_servicio?? null
                const servicioSelected = "#VeterinarioFormUpdate #servicio " + "option[value=" + String(servicio) + "]"
                $("#VeterinarioFormUpdate #servicio option").each((i,e)=>{
                    $(e).attr("selected", false)
                   // console.log(e)
                })
                $(servicioSelected).attr("selected", true)
            }
            
            
                let action = "/veterinarios/" + datos.id

               $('#VeterinarioFormUpdate form').attr('action', action)
        }   

        
    </script>
@endsection
