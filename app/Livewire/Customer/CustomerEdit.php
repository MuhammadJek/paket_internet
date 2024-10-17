<?php

namespace App\Livewire\Customer;

use App\Models\Package;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerEdit extends Component
{
    public $customerId;
    public $name;
    public $email;
    public $phone_number;
    public $address;
    public $package_id;
    public function render()
    {
        $package = Package::all();

        return view('livewire.customer.customer-edit', compact('package'));
    }

    #[On('customerEditPage')]
    public function customerEditPage($customer)
    {
        $this->customerId = $customer['id'];
        $this->name = $customer['name'];
        $this->email = $customer['email'];
        $this->phone_number = $customer['phone_number'];
        $this->address = $customer['address'];
        $this->package_id = $customer['package_id'];
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|min:10|max:13',
            'address' => 'nullable',
            'package_id' => 'required|exists:packages,id',
        ]);

        try {
            DB::beginTransaction();
            // if ($validation) {
            $customer = Pelanggan::find($id);

            if ($customer) {
                $customer->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone_number' => $this->phone_number,
                    'address' => $this->address,
                    'package_id' => $this->package_id,
                ]);

                DB::commit();
                $this->dispatch('CustomerCreate');
                session()->flash('success', 'Successfully updated!');
                return redirect()->to('/customer');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('danger', 'Error Server!');
            return redirect()->to('/customer');
        }
    }
}
