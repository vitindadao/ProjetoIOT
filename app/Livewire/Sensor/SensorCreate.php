<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;


class SensorCreate extends Component
{

    public $ambiente;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;

    protected $rules = [
        'ambiente' => 'required',
        'codigo' => 'required|string|unique:sensors,codigo',
        'tipo' => 'required|string|',
    ];

    protected $messages = [
        'ambiente.required' => 'É Necessario o ID do ambiente',
        

        'codigo,required' => 'É Necessario o codigo',
        'codigo.string' => 'O campo codigo tem q ser um texto Válido',
        'codigo.unique' => 'Este codigo já está cadastrado.',

        'tipo,required' => 'É Necessario o tipo do sensor',
        'tipo.string' => 'O campo tipo tem q ser um texto Válido',


    ];

    public function store()
    {

        $this->validate();


        if ($this->ambiente == null) {
            session()->flash('error', 'Ambiente nao encontrado');
        }
            Sensor::create([
                'ambiente_id' => $this->ambiente,
                'codigo' => $this->codigo,
                'tipo' => $this->tipo,
                'descricao' => $this->descricao,
                'status' => $this->status,
            ]);

            session()->flash('message', 'Sensor criado com sucesso.');
            $this->reset(['ambiente', 'codigo', 'tipo', 'descricao', 'status']);
    }

    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.sensor.sensor-create', compact('ambientes'));
    }
}
