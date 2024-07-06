<?php

namespace App\Livewire;

use Livewire\Component;

class QrURLForm extends Component
{
    public $imagePath = 'images\bearchillin.jpg';

    public $imageURL;

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
