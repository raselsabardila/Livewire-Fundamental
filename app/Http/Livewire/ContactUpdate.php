<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;

class ContactUpdate extends Component
{
    public $name;
    public $phone;
    public $contact_id;

    public $listeners=[
        "getContact"
    ];

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function getContact($contact){
        $this->name=$contact["name"];
        $this->phone=$contact["phone"];
        $this->contact_id=$contact["id"];
    }

    public function update(){
        $this->validate([
            "name"=>"required",
            "phone"=>"required"
        ]);
        
        $id=$this->contact_id;
        $contact = Contact::find($id);
        $contact->update([
            "name"=>$this->name,
            "phone"=>$this->phone
        ]);

        $this->resetInput();
        $this->emit("ContactUpdate",$contact);
    }

    private function resetInput(){
        $this->name=Null;
        $this->phone=Null;
    }
}