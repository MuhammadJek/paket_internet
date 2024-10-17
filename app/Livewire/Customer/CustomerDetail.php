<?php

namespace App\Livewire\Customer;

use App\Models\Pelanggan;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerDetail extends Component
{
    public $item;
    public function render()
    {
        return view('livewire.customer.customer-detail');
    }

    #[On('customerDetail2')]
    public function customerDetail2($customerID)
    {
        $this->item = Pelanggan::find($customerID);
    }
}
