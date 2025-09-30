<?php

namespace App\Livewire\Sensor;

use App\Models\Sensor;
use Livewire\Component;

class SensorEdit extends Component
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

    public function mount($id)
    {
        $sensor = Sensor::find($id);
        if ($sensor == null) {
            session()->flash('error', 'Id nao encontrado');
        } else {
            $this->tipo = $sensor->tipo;
            $this->codigo = $sensor->codigo;
            $this->descricao = $sensor->descricao;
            $this->status = $sensor->status;
           
        }
    }

    public function update()
    {
        $this->validate();

        $sensor = Sensor::find($this->sensorId);
        

        $sensor->update([
            'tipo' => $this->tipo,
            'codigo' => $this->codigo,
            'descricao' => $this->descricao,
            'status' => $this->status,
        ]);

       
        session()-> flash('message', 'sensor atualizado com sucesso');
        return redirect()->route('Sensor.list');
    }


    public function render()
    {
        return view('livewire.sensor.sensor-edit');
    }
}
