@extends('home')
@section('title', 'Mascotas')

@section('registrar-datos','active')

@section('css-derecha')
<link rel="stylesheet" href="{{asset('css/table-information.css')}}">

  <style>
    #mascotasFormUpdate .form-control,
    #mascotasFormUpdate .form-select,
    #mascotasFormUpdate .select2-selection {
        background-color: khaki !important;
    }

  </style>
@endsection

@section('contenido')

<div class="crud">


  <div class="d-md-flex justify-content-md-between" style="margin-bottom: 1rem;">
    @can('mascotas.create')
    <div class="registrar">
      <button href="{{'/administrativos/create'}}" class="buttonRegistrame" data-bs-toggle="modal"
      data-bs-target="#mascotasFormInput" onclick="createSelector('Input')">
        Registrar <br>Mascota
      </button>
    </div>
    @endcan

    <form action="{{ route('mascotas.index')}}" method="GET">
      <div class="btn-group">
        <input type=" text" name="busqueda" class="form-control">
        <input type="submit" value="Buscar" class="btn btn-primary" style="background-color: var(--color-danger);">
      </div>
    </form>
  </div>
  <div class="tabla-contenedor">
    <table class="tabla">
      <thead class="thead">
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Especie</th>
          <th>raza</th>
          <th>sexo</th>
          <th>Nombre del dueño</th>
          <th style="width:20%;">Acciones</th>
        </tr>
      </thead>
      <tbody class="tbody">
        @foreach($mascotas as $mascota)
        <tr>
          <td>{{$mascota->id}}</td>
          <td>{{$mascota->nombre}}</td>
          <td>{{$mascota->especie}}</td>
          <td>{{$mascota->raza}}</td>
          <td>{{$mascota->sexo}}</td>
          <td>{{$mascota->propietario[0]->nombre.' '.$mascota->propietario[0]->apellido_paterno.' '.$mascota->propietario[0]->apellido_materno}}</td>
          <td>
            <div class="d-flex flex-row justify-content-between">
              @can('mascotas.edit')
              <button class="button-edit" onclick=@php echo "\"desplegarForm(" . json_encode($mascota->id) . ")\""; @endphp 
              data-bs-toggle="modal" data-bs-target="#mascotasFormUpdate">
                <span class="material-icons-sharp">
                  edit
                </span>
              </button>
              @endcan
              <a href="{{route('mascotas.show', $mascota)}}" class="button-edit" id="ver">
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
  </div>
  <div class="pagination" style="margin-top: 1rem;">
    {{$mascotas->appends('busqueda=>$busqueda')}}
  </div>
</div>
@endsection
@section('body-final')
<x-mascotas-input id="mascotasFormInput"/>
<x-mascotas-update id="mascotasFormUpdate"/>
@endsection

@section('js-home')
  <script>
    const createSelector = (type) =>{  

      $('#formMascotas' + type + ' #duenhos').select2({
          theme: 'bootstrap-5',
         // tags: true,
         // dropdownParent: $('#mascotasFormInput'),
          placeholder: 'Seleccione los dueños',
          maximumSelectionLength: 5,
          width: '100%'
      })
    }

    function desplegarForm(id) {
      var admin = new XMLHttpRequest()
      admin.open("GET", "/mascotas/datas/" + id.toString(), true)
      admin.addEventListener("load", cargarDatos)
      admin.send()
  }

  function cargarDatos(e) {
      const datos = JSON.parse(this.responseText)
      // console.log(datos)
      $("#mascotasFormUpdate #nombre").attr("value", datos.nombre)
      $("#mascotasFormUpdate #especie").attr("value", datos.especie)
      $("#mascotasFormUpdate #raza").attr("value", datos.raza)
      $("#mascotasFormUpdate #fecha_de_nacimiento").attr("value", datos.fecha_nacimiento)
      $("#mascotasFormUpdate #descripcion").val( datos.descripcion)

      if (datos.sexo == "Macho") {
          $("#mascotasFormUpdate #sexoMacho").prop("checked", true)
          $("#mascotasFormUpdate #sexoHembra").prop("checked", false)
      } else {
          $("#mascotasFormUpdate #sexoMacho").prop("checked", true)
          $("#mascotasFormUpdate #sexoHembra").prop("checked", false)
      }

      //PARA LOS TELEFONOS
      createSelector('Update')
      $("mascotasFormUpdate #duenhos").val(null).trigger('change')
     // $('#mascotasFormUpdate #duenhos').empty()
    const duenhos = datos.propietario.map((propietario) => propietario.id)
  /* 
     datos.propietario.forEach((propietario) => {
          let data = {
              id: propietario.id,
              text: String(propietario.nombre + ' ' + propietario.apellido_paterno + ' ' + propietario.apellido_materno),
          }

          $("#mascotasFormUpdate #duenhos").append(new Option(data.text, data.id, false, false))
              .trigger('change')
       })
*/
      $("#mascotasFormUpdate #duenhos").val(duenhos)
      $("#mascotasFormUpdate #duenhos").trigger('change')


      let action = "/mascotas/" + datos.id

      $('#mascotasFormUpdate form').attr('action', action)


  }
  </script>

@endsection