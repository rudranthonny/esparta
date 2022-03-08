<div>
    <div class="m-4">
        <a class="btn btn-danger" id="agregar" href="{{ route('admin.estudiantes.create') }}" role="button"><i class="fas fa-user-plus"></i> Agregar Estudiante</a>
        <a class="btn btn-info" id="emitircarnet" onclick="emitircarnet()" href="#" role="button"><i class="fas fa-id-card"></i> Emitir Carnet</a>
      </div>
    <div class="m-4">
        <input class="form-control" id="exampleDataList" placeholder="Buscar Estudiante" wire:model="search">
    </div>

    <div class="m-4">
        @if ($estudiantes->count())

            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th class="cursor" scope="col" wire:click="order('dni')">dni
                            {{-- sort --}}
                            @if ($sort == 'dni')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col">Inicio
                        </th>
                        <th class="cursor" scope="col" wire:click="order('name')">Nombres
                            {{-- sort --}}
                            @if ($sort == 'name')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor" scope="col" wire:click="order('ap_paterno')">Apellidos
                            {{-- sort --}}
                            @if ($sort == 'ap_paterno')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor" scope="col" wire:click="order('codigo')">Codigo
                            {{-- sort --}}
                            @if ($sort == 'codigo')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor" scope="col" wire:click="order('celular')">Celular
                            {{-- sort --}}
                            @if ($sort == 'celular')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col">Estados</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estudiantes as $estudiante)
                        <tr>
                            <td>{{ $estudiante->dni }}</td>
                            <td>@isset($estudiante->matricula->fechainicio){{ $estudiante->matricula->fechainicio }}@endisset
                                </td>
                                <td>{{ $estudiante->name }}</td>
                                <td>{{ $estudiante->ap_paterno." ".$estudiante->ap_materno }}</td>
                                <td>{{ $estudiante->codigo }}</td>
                                <td>{{ $estudiante->celular }}</td>
                                <td>
                                    <a class="btn btn-success" id="editarestudiante" href="{{ route('admin.estudiantes.edit', $estudiante->id) }}"
                                        role="button"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" id="eliminarestudiante" href="#"
                                        onclick="eliminar('eliminar-{{ $estudiante->id }}')"><i class="fas fa-trash"></i></a>
                                    <form action="{{ route('admin.estudiantes.destroy', $estudiante->id) }}"
                                        id="eliminar-{{ $estudiante->id }}" method="POST" class="b-eliminar">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No existe ningun registro coincidente
                </div>
            @endif
            <div class="d-flex justify-content-end">
                {{ $estudiantes->links() }}
            </div>
        </div>
    </div>
