<div class="container-fluid py-3"> {{-- Usamos container-fluid para 100% de largura e py-3 para um pequeno padding vertical --}}
    <div class="card shadow-lg bg-white rounded"> {{-- Removemos mx-auto, my-5 e w-75 --}}
        <h3 class="card-header d-flex justify-content-center">Lista de Sensores</h3>
        <div class="card-body">

            {{-- Botão de Cadastro --}}
            <a href="{{ route('sensor.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Sensor</a>

            {{-- Mensagem de Sessão --}}
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            {{-- Área de Filtros e Paginação --}}
            <div class="card mb-3 p-2"> {{-- Reduzimos a margem e padding no card de filtro --}}
                <div class="card-body p-2"> {{-- Reduzimos o padding interno --}}
                    {{-- CORRIGIMOS A CLASSE AQUI: row mb-3 --}}
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-5">
                            <input type="text" class="form-control form-control-sm" placeholder="Buscar Sensores..."
                                wire:model.live='search'>
                        </div>
                        <div class="col-md-2"> {{-- Ajustamos a coluna para caber o seletor --}}
                            <select wire:model.live="perPage" class="form-select form-select-sm">
                                <option value="15">15 por página</option>
                                <option value="25">25 por página</option>
                                <option value="50">50 por página</option>
                                <option value="100">100 por página</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tabela de Sensores --}}
            <table class="table table-bordered table-striped table-sm"> {{-- Adicionamos table-sm para reduzir o espaçamento da tabela --}}
                <thead>
                    <tr>
                        <th>Ambiente</th>
                        <th>Tipo</th>
                        <th class="w-25">Descricao</th> {{-- Aumentamos a largura para Descrição --}}
                        <th>Codigo</th>
                        <th style="width: 120px;">Status</th> {{-- Largura fixa para o Switch --}}
                        <th style="width: 150px;">Ações</th> {{-- Largura fixa para os botões --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sensors as $sensor)
                        <tr>
                            <td>{{ $sensor->ambiente_id }}</td>
                            <td>{{ $sensor->tipo }}</td>
                            <td>{{ $sensor->descricao }}</td>
                            <td>{{ $sensor->codigo }}</td>
                            <td>
                                {{-- SWITCH BOOTSTRAP --}}
                                <div class="form-check form-switch d-flex align-items-center m-0">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="sensorSwitch{{ $sensor->id }}" wire:click="BotaoLed({{ $sensor->id }})"
                                        {{ $sensor->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label ms-2" for="sensorSwitch{{ $sensor->id }}">
                                        {{ $sensor->status == 1 ? 'Ligado' : 'Desligado' }}
                                    </label>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('sensor.edit', $sensor->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="{{ route('sensor.delete', $sensor->id) }}" class="btn btn-sm btn-danger mt-1 mt-md-0">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           
            {{-- Links de Paginação --}}
            <div class="mt-3"> {{-- Reduzimos a margem superior --}}
                {{ $sensors->links() }}
            </div>
        </div>
    </div>
</div>