<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    public $status_update=0;

    public $listeners=[
        "ContactStore",
        "ContactUpdate"
    ];

    public function render()
    {
        $contact = Contact::latest()->paginate(5);
        return view('livewire.contact-index',compact("contact"));
    }

    public function ContactStore($contact){
        session()->flash("status","Contact ".$contact["name"]." Was Stored");
    }

    public function ContactUpdate($contact){
        session()->flash("status","Contact ".$contact["name"]." Was Updated");
    }

    public function deleteContact($contact){
        $contacts=Contact::find($contact);
        $contacts->delete();
        session()->flash("status","Contact Was Deleted");
    }

    public function getContact($id){
        $this->status_update=1;
        $contact = Contact::find($id);
        $this->emit("getContact",$contact);
    }
}
