@extends('home')
@section('title', 'Administrativos')

@section('registrar-datos', 'active')

@section('css-derecha')
    <link rel="stylesheet" href="{{ asset('css/table-information.css') }}">
    <style>
        #AdministrativoFormUpdate .form-control,
        #AdministrativoFormUpdate .form-select,
        #AdministrativoFormUpdate .select2-selection {
            background-color: khaki !important;
        }
    </style>
@endsection

@section('contenido')

    @can('adimnistrativos.create')
        <div class="registrar">
            <button class="buttonRegistrame" data-bs-toggle="modal" data-bs-target="#AdministrativoFormInput"
                onclick="createSelector('administrativo','input')">
                Registrar <br>Administrativo
            </button>
        @endcan
    </div>

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
                <th>Sexo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="tbody">
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->persona->nombre }}</td>
                    <td>{{ $admin->persona->apellido_paterno }}</td>
                    <td>{{ $admin->persona->apellido_materno }}</td>
                    <td>{{ $admin->persona->ci }}</td>
                    <td>{{ $admin->profesion }}</td>
                    <td>{{ $admin->persona->email }}</td>
                    <td>{{ $admin->persona->sexo }}</td>
                    <td>
                        <div class="d-flex flex-row justify-content-between">
                            @can('administrativos.edit')
                                <button class="button-edit">
                                    <span class="material-icons-sharp" onclick=@php echo "\"imprimir(" . json_encode($admin->id) . ")\""; @endphp data-bs-toggle="modal"
                                        data-bs-target="#AdministrativoFormUpdate">
                                        edit
                                    </span>
                                </button>
                            @endcan
                            <a href="{{ route('administrativos.show', $admin) }}" class="button-edit" id="ver">
                                <span class="material-icons-sharp">
                                    visibility
                                </span>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection

@section('body-final')
    @can('administrativos.create')
        <x-input-datos id="AdministrativoFormInput" type="administrativo" />
    @endcan
    @can('administrativos.edit')
        <x-update-datos id="AdministrativoFormUpdate" type="administrativo" />
    @endcan
@endsection

@section('js-home')

    <script>
        const createSelector = (type, mod) => {
            let selector = '.' + mod + '-datos-telefono-' + type;
            $(selector).select2({
                theme: 'bootstrap-5',
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
            admin.open("GET", "/administrativos/datas/" + id.toString(), true)
            admin.addEventListener("load", cargarDatos)
            admin.send()
        }

        function cargarDatos(e) {
            const datos = JSON.parse(this.responseText)
            // console.log(datos)
            $("#AdministrativoFormUpdate #nombre").attr("value", datos.persona.nombre)
            $("#AdministrativoFormUpdate #apellido_paterno").attr("value", datos.persona.apellido_paterno)
            $("#AdministrativoFormUpdate #apellido_materno").attr("value", datos.persona.apellido_materno)
            $("#AdministrativoFormUpdate #ci").attr("value", datos.persona.ci)
            $("#AdministrativoFormUpdate #profesion").attr("value", datos.profesion)
            $("#AdministrativoFormUpdate #email").attr("value", datos.persona.email)
            $("#AdministrativoFormUpdate #sexo").attr("value", datos.persona.sexo)
            $("#AdministrativoFormUpdate #fecha_de_nacimiento").attr("value", datos.persona.fecha_de_nacimiento)
            //make the same with direccion
            $("#AdministrativoFormUpdate #direccion").attr("value", datos.persona.direccion)
            if (datos.persona.sexo == "M") {
                $("#AdministrativoFormUpdate #sexoM").prop("checked", true)
                $("#AdministrativoFormUpdate #sexoF").prop("checked", false)
            } else {
                $("#AdministrativoFormUpdate #sexoF").prop("checked", true)
                $("#AdministrativoFormUpdate #sexoM").prop("checked", false)
            }

            //PARA LOS TELEFONOS
            createSelector('administrativo', 'update')
            $('.update-datos-telefono-administrativo').empty()
            const telefonos = datos.persona.telefonos.map((telefono) => telefono.numero)

            datos.persona.telefonos.forEach((telefono) => {
                let data = {
                    id: telefono.numero,
                    text: String(telefono.numero),
                }
                $(".update-datos-telefono-administrativo").append(new Option(data.text, data.id, false, false))
                    .trigger('change')
            })

            $(".update-datos-telefono-administrativo").val(telefonos)
            $(".update-datos-telefono-administrativo").trigger('change')

            //TURNO
            $("#AdministrativoFormUpdate #turno option")[0].selected = "true"
            if (datos.turno[0]) {
                const turno = datos.turno[0].id_turno ?? null
                const turnoSelected = "#AdministrativoFormUpdate #turno " + "option[value=" + String(turno) + "]"
                $("#AdministrativoFormUpdate #turno option").each((i, e) => {
                    $(e).attr("selected", false)
                    // console.log(e)
                })
                $(turnoSelected).attr("selected", true)
            }


            let action = "/administrativos/" + datos.id

            $('#AdministrativoFormUpdate form').attr('action', action)




        }
    </script>
@endsection
