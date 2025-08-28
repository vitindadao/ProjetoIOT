<?php

namespace App\Livewire\Sensor;

use App\Models\Sensor;
use Livewire\Component;

class SensorDelete extends Component
{

    public $sensorId;
    public $ambiente_id;
    public $codigo;


    public function mount($id)
    {
        $sensor = Sensor::find($id);
        if($sensor == null) {
            session()->flash('error', 'Id de Aluno nao encontrado');
        } else {
        $this->sensorId = $sensor->id;
        $this->codigo = $sensor->codigo;
        }
    }
 
    public function delete()
    {
        $sensor = Sensor::find($this->sensorId);
    
 
        $sensor->delete();
 
     
    }
    public function render()
    {
        return view('livewire.sensor.sensor-delete');
    }
}
