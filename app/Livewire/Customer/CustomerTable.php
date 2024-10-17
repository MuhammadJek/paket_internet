<?php

namespace App\Livewire\Customer;

use App\Models\Package;
use App\Models\Pelanggan;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerTable extends Component
{
    public $name;
    public $package;
    public $search;
    public $customerId;

    use WithPagination;
    public function render()
    {

        $customers = Pelanggan::join('packages', 'pelanggans.package_id', '=', 'packages.id')->select('pelanggans.*', 'packages.name as pname')
            ->when($this->name, function ($query) {
                $query->where('pelanggans.name', 'like', '%' . $this->name . '%');
            })->when($this->package, function ($query) {
                $query->where('pelanggans.package_id', $this->package);
            })->when($this->search, function ($query) {
                $query->where('pelanggans.name', 'like', '%' . $this->search . '%')->orWhere('pelanggans.address', 'like', '%' . $this->search . '%')->orWhere('pelanggans.email', 'like', '%' . $this->search . '%')->orWhere('pelanggans.phone_number', 'like', '%' . $this->search . '%')->orWhere('packages.name', 'like', '%' . $this->search . '%');
            })->paginate(10);
            
        $packages = Package::all();

        return view('livewire.customer.customer-table', compact('customers', 'packages'));
    }
    public function customerDetail($customerID)
    {
        // $this->name = $mitra['name'];
        $this->dispatch('customerDetail2', customerID: $customerID);
    }
    public function customerEdit($customer)
    {
        $this->dispatch('customerEditPage', customer: $customer);
    }
    public function delete($customer)
    {
        $this->customerId = $customer['id'];
        $this->dispatch('DeleteConfirmation', customer: $customer);
    }

    #[On('Destroy')]
    public function destroy()
    {
        Pelanggan::find($this->customerId)->delete();
    }
    public function updatingName()
    {
        $this->resetPage();
    }
    public function updatingPackage()
    {
        $this->resetPage();
    }
}
