<?php

namespace App\Livewire;

use App\Models\QRCode;
use Livewire\Component;
use App\Providers\AppServiceProvider;

class QrMenu extends Component
{

    public $search ='';

    public function render()
    {
        //$data = QRCode::search('title',$this->search)->get();
        return view('livewire.qr-menu',['data'=>QRCode::search('title',$this->search)->get()]);
    }
}
