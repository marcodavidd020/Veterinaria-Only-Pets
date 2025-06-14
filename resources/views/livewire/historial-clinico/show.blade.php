<div>
    <div class="container-fluid">


        <div class="tabla" style="padding: 3rem;">
            <div class="row">
                <h1 style="text-align: center;">Historial Clinico</h1>

                <div class=" d-flex flex-row justify-content-end ">
                    <a href="{{ route('historiales.pdf', $historial) }}" class="buttonRegistrame me-4">Exportar PDF</a>
                    <a @if (!Auth::user()->hasRole('cliente')) href="{{ route('historiales.index') }}"
                      @else
                        href="{{ route('mascotas.my') }}" @endif
                        class="buttonRegistrame">Volver Atras

                    </a>

                </div>


                <h1>{{ $historial->mascota->nombre }}</h1>
                <h3>{{ $historial->mascota->raza }} | {{ $historial->mascota->descripcion }}</h3>
                <p>
                    <strong>Peso</strong>: @if ($historial->peso)
                        {{ $historial->peso }}
                    @else
                        ---
                    @endif <br>
                    <strong>Talla</strong>: @if ($historial->talla)
                        {{ $historial->talla }}
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
                            @forelse($historial->detalle_historial as $detalle)
                                <strong>Fecha de consulta</strong>: {{ $detalle->fecha_consulta }}
                                <br>
                                <strong>Descripcion</strong>: {{ $detalle->descripcion }}
                                <br>
                                <strong>Fecha proxima consulta</strong>: {{ $detalle->fecha_prox_consulta }}
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
                            @forelse($historial->cirugia as $cirugia)
                                <strong>Nombre</strong>: {{ $cirugia->nombre }}
                                <br>
                                <strong>Fecha</strong>: {{ $cirugia->pivot->fecha }}
                                <br>
                                <strong>Hora</strong>: {{ $cirugia->pivot->hora }}
                                <br>
                                <strong>Veterinario encargado</strong>: {{ $cirugia->pivot->veterinario_encargado }}
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
                            @forelse($historial->enfermedad as $enfermedad)
                                <strong>Nombre</strong>: {{ $enfermedad->nombre }}
                                <br>
                                <strong>Fecha de deteccion</strong>: {{ $enfermedad->pivot->fecha_deteccion }}
                                <br>
                                <strong>Inicio de tratamiento</strong>: @if ($enfermedad->pivot->inicio_tratamiento)
                                    {{ $enfermedad->pivot->inicio_tratamiento }}
                                @else
                                    ---
                                @endif
                                <br>
                                <strong>Fin de tratamiento</strong>: @if ($enfermedad->pivot->fin_tratamiento)
                                    {{ $enfermedad->pivot->fin_tratamiento }}
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
                            @forelse($historial->vacuna as $vacuna)
                                <strong>Nombre</strong>: {{ $vacuna->nombre }}
                                <br>
                                <strong>Dosis</strong>: {{ $vacuna->pivot->dosis }}
                                <br>
                                <strong>Fecha de apliacion</strong>: {{ $vacuna->pivot->fecha_aplicacion }}
                                <br>
                                <strong>Fecha proxima apliacion</strong>: @if ($vacuna->pivot->fecha_prox_aplicacion)
                                    {{ $vacuna->pivot->fecha_prox_aplicacion }}
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



            </div>
            <hr>
            @can('historiales.edit')


                <h2 class="mb-4 mt-4">
                    Registrar Diagnostico
                </h2>
                <form wire:submit.prevent="guardarDiagnostico">
                    <div class="row" id="registro_de_diagnostico" x-data="iniciarDatosDiagnostico()">
                        <div class="col">
                            <div class="row mb-4">
                                <div class="form-floating">
                                    <textarea name="diagnostico" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                        wire:model="diagnostico" style="height: 150px"></textarea>
                                    <label class="mx-2" for="floatingTextarea"> Diagnostico </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="form-check p-2">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Enfermedad
                                                </label>
                                                <input class="form-check-input" type="checkbox" wire:model="hayEnfermedad"
                                                    id="flexCheckDefault" name="hayEnfermedad" x-model="hayEnfermedad">
                                            </div>

                                            <div class="input-group" x-show="hayEnfermedad" x-collapse>
                                                <span class="input-group-text">Nombre</span>
                                                <select class="form-select" id="id_enfermedad" wire:model="id_enfermedad">
                                                    <option selected disabled>Seleccione...</option>
                                                    @foreach ($enfermedades as $enfermedad)
                                                        <option value="{{ $enfermedad->id }}"> {{ $enfermedad->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <span class="input-group-text">Fecha de Detección</span>
                                                <input type="date" class="form-control" id="fecha_inicio_enfermedad"
                                                    wire:model="fecha_inicio_enfermedad">

                                                <span class="input-group-text">Inicio de Tratamiento</span>
                                                <input type="date" class="form-control"
                                                    id="inicio_tratamiento_enfermedad" min=""
                                                    wire:model="inicio_tratamiento_enfermedad">
                                            </div>


                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check p-2">
                                                <label class="form-check-label" for="cirugiaCheck">
                                                    Cirugia
                                                </label>
                                                <input class="form-check-input" type="checkbox" wire:model="hayCirugia"
                                                    id="cirugiaCheck" name="hayCirugia" x-model="hayCirugia">
                                            </div>

                                            <div class="input-group" x-show="hayCirugia" x-collapse>
                                                <span class="input-group-text">Nombre</span>
                                                <select class="form-select" id="id_cirugia" wire:model="id_cirugia">
                                                    <option selected disabled>Seleccione...</option>
                                                    @foreach ($cirugias as $cirugia)
                                                        <option value="{{ $cirugia->id }}"> {{ $cirugia->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <span class="input-group-text">Veterinario</span>
                                                <select class="form-select" id="cirugia" name="id_veterinario"
                                                    wire:model="id_veterinario">
                                                    <option selected disabled>Seleccione...</option>
                                                    @foreach ($veterinarios as $veterinario)
                                                        <option value="{{ $veterinario->id }}">
                                                            {{ $veterinario->persona->nombre . ' ' . $veterinario->persona->apellido_paterno . ' ' . $veterinario->persona->apellido_materno }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <span class="input-group-text">Fecha Programada</span>
                                                <input type="date" class="form-control" id="fecha_cirugia"
                                                    wire:model="fecha_cirugia">

                                                <span class="input-group-text">Hora Programada</span>
                                                <input type="time" class="form-control" id="hora_cirugia" min=""
                                                    wire:model="hora_cirugia">
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check p-2">
                                                <label class="form-check-label" for="vacunaCheck">
                                                    Vacuna
                                                </label>
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="vacunaCheck" x-model="hayVacuna" wire:model="hayVacuna">
                                            </div>
                                            <div class="input-group" x-show="hayVacuna" x-collapse>

                                                <span class="input-group-text"> Nombre </span>
                                                <select name="nombre_vacuna" id="id_vacuna" class="form-select"
                                                    wire:model="id_vacuna">
                                                    <option selected disabled>Seleccione </option>
                                                    @foreach ($vacunas as $vacuna)
                                                        <option value="{{ $vacuna->id }}"> {{ $vacuna->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <span class="input-group-text">Dosis</span>
                                                <select class="form-select" name="dosis_vacuna" id="dosis_vacuna"
                                                    wire:model="dosis_vacuna">
                                                    <option value="0">Unica</option>
                                                    <option value="1">Primera</option>
                                                    <option value="2">Segunda</option>
                                                    <option value="3">Tercera</option>
                                                    <option value="4">Cuarta</option>
                                                </select>

                                                <span class="input-group-text">Fecha próxima Aplcacion</span>
                                                <input type="date" class="form-control" id="fecha_proxima_vacuna"
                                                    wire:model="fecha_proxima_vacuna">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row p-5">
                                <button type="submit" class="btn btn-danger">Guardar Diagnostico</button>
                            </div>

                        </div>

                    </div>
                </form>
            @endcan
        </div>

    </div>
</div>
</div>
@section('js-home')
    <script>
        function iniciarDatosDiagnostico() {
            return {
                hayEnfermedad: false,
                hayVacuna: false,
                hayCirugia: false,
            }
        }
    </script>
@endsection
