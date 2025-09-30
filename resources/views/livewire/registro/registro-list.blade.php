<div class="container bg-body">
    <div class="container mt-5 ">
        <h1 class="text-3xl font-bold mb-6 flex items-center gap-3">
            <i class="bi bi-people-fill text-dark"></i>
            Lista de registros
        </h1>
        <div class="d-flex flex-row justify-content-end ">
            {{-- <a href="{{ route('registro.create') }}" class="btn btn-outline-primary mb-3 btn-sm"
                style="border-radius: 0.25rem; height: 38px; padding-top: 6px; min-width: 140px;">
                <i class="bi bi-person-add"></i> Novo registro
            </a> --}}
        </div>
        @if (session()->has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="d-flex flex-row justify-content-start">

            <input type="text" class="form-control flex-item justify-content-start" id="search"
                placeholder="Buscar registros..." wire:model.live="search" />
            <div class="flex-item col-md-3 ms-2">
                <select wire:model.live="perPage" class="form-select" style="border-color: #ced4da;">
                    <option value="15">15 por página</option>
                    <option value="30">30 por página</option>
                    <option value="45">45 por página</option>
                    <option value="100">100 por página</option>
                    <option value="10000000000000">Todos os Usuarios</option>
                </select>
            </div>
        </div>


        <table class="table table-striped table-hover align-middle mt-3">
            <thead class="table-dark'">
                <tr>
                    <th>ID do sensor</th>
                    <th>Valor</th>
                    <th>Unidade</th>
                    <th>Data e hora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registros as $registro)
                    <tr>
                        <td>{{ $registro->sensor_id }}</td>
                        <td>{{ $registro->valor }}</td>
                        <td>{{ $registro->unidade }}</td>
                        <td>{{ $registro->data_hora }}</td>
                        <td>
                            {{-- <a href="{{ route('registro.edit', $s->id) }}" class="btn btn-sm btn-success" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a> --}}
                            {{-- <a href="{{ route('registro.delete', $s->id) }}" class="btn btn-sm btn-danger"
                                title="Excluir">
                                <i class="bi bi-trash3-fill"></i>
                            </a> --}}
                        </td>
                    </tr>
               @endforeach
            </tbody>
        </table>


            <div class="mt-5">
                {{$registros->links()}}
            </div>

        </div>
    </div>
</div>
