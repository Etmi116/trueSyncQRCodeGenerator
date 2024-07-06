<?php

namespace App\Livewire;

use Livewire\Component;
use phpDocumentor\Reflection\Types\Null_;

class QrURLForm extends Component
{
    public $imagePath = 'images\bearchillin.jpg';

    public $imageURL;
    /*
    public function mount($path){
        if($path==NULL){
            $this->imagePath = 'images\bearchillin.jpg';
        }
        else{
            $this->imagePath = $path;
        }
        
    }
    */

    public function render()
    {
        return view('livewire.qr-u-r-l-form');
    }

    public function genCode(){
        $validated = $this->validate([
            'imageURL' => 'required|bail|active_url'
        ]);

        $this->imagePath = 'images\bearconcern.png';

    }
}
