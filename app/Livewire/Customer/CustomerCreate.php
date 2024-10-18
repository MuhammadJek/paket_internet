<?php

namespace App\Livewire\Customer;

use App\Models\Package;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class CustomerCreate extends Component
{
    public $name;
    public $email;
    public $phone_number;
    public $address;
    public $package_id;
    public function render()
    {
        $package = Package::all();

        return view('livewire.customer.customer-create', compact('package'));
    }

    public function store()
    {

        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:pelanggans,email',
            'phone_number' => 'required|min:10|max:13',
            'address' => 'nullable',
            'package_id' => 'required|exists:packages,id',
        ]);

        try {
            DB::beginTransaction();
            $create = Pelanggan::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'address' => $this->address,
                'package_id' => $this->package_id,
            ]);

            DB::commit();
            if ($create) {
                $this->dispatch('CustomerCreate');
                session()->flash('success', 'Successfully created!');
                return redirect()->to('/customer');
            }
        } catch (\Throwable $th) {
            DB::rollBack();

            session()->flash('danger', 'Error Server!');
            return redirect()->to('/customer');
        }
    }
}
