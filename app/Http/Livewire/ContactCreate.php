<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;

class ContactCreate extends Component
{

    public $name;
    public $phone;

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store(){

        $this->validate([
            "name"=>"required",
            "phone"=>"required"
        ]);

        $contact = Contact::create([
            "name"=>$this->name,
            "phone"=>$this->phone
        ]);

        $this->resetInput();
        $this->emit("ContactStore", $contact);
    }


    private function resetInput(){
        $this->name=Null;
        $this->phone=Null;
    }
}
