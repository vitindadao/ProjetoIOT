<div class="mt-5">
    @if (session()->has('error'))
        <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-50">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
        </div>
    @else
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-75">
            <h3 class="card-header d-flex justify-content-center">Editar sensor</h3>
            <div class="card-body">
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label for="ambiente_id" class="form-label">Ambiente_id</label>
                        <input type="text" class="form-control" id="ambiente_id" placeholder="Insira o id" wire:model.defer="ambiente_id">
                        @error('ambiente_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="codigo" class="form-label">codigo</label>
                        <input type="text" class="form-control" id="codigo" placeholder="Insira o codigo" wire:model.defer="codigo">
                        @error('codigo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">tipo</label>
                        <input type="text" class="form-control" id="tipo" placeholder="Insira o tipo" wire:model.defer="tipo">
                        @error('tipo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">status</label>
                    
                        <select class="form-select @error('status') is-invalid @enderror" id="status" wire:model.defer="status">
                            <option hidden>Selecione sua Série</option>
                            <option value="0">inativo</option>
                            <option value="1">ativo</option>
                            
                         
                        </select> 
                    
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">descricao</label>
                        <input type="descricao" class="form-control" id="descricao" wire:model.defer="descricao">
                        @error('descricao')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                

                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-75 p-3">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>