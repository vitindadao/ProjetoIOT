<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;


class SensorCreate extends Component
{

    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;

    protected $rules = [
        'ambiente-id' => 'required|integer',
        'codigo' => 'required|string|unique:sensores,codigo',
         'tipo' => 'required|string',
          'descricao' => 'required|text',
           'status' => '',

    ];

    protected $messages =[
        'ambiente-id.required' => 'e necessario o id do ambiente',
         'ambiente-id.integer' => 'o campo id e do tipo inteiro',
         'codigo-id.required' => 'e necessario o codigo do sensor',
         'codigo.string' => 'o campo deve ser um texto valido',
         'codigo.unique' => 'codigo ja existe',
         'tipo.required' => 'campo obrigatorio',
         'tipo.string' => 'o campo deve ser um texto valido',
         'descricao.required' => 'campo obrigatorio',
         'descricao.text' => 'campo permite apenas texto',
         'status.boolean ' => 'apenas os valores true ou false'

    ];
    public function store() {
        $this->validate();
        if ($this->status !== null) {
        
            Sensor::create([
                'ambiente_id' => $this->ambiente_id,
                'codigo' => $this->codigo,
                'tipo' => $this->tipo,
                'descricao' => $this->descricao,
                'status'=> $this->status
            ]);
            session()->flash('message', 'Sensor criado com sucesso');
            $this->reset(['ambiente_id', 'descricao','status', 'codigo', 'tipo']);

        } else {
            session()->flash('message', 'Nao foi possivel cadastrar');
        }
    }

    public function render()
    {
        return view('livewire.sensor.sensor-create');
    }
}
