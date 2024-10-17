<?php

namespace App\Livewire\Package;

use App\Models\Package;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PackageTable extends Component
{

    public $packageId;
    public $search;
    public $speed;

    use WithPagination;
    public function render()
    {
        $packages = Package::when($this->speed, function ($query) {
            $query->where('speed', 'like', '%' . $this->speed . '%');
        })->when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')->orWhere('speed', 'like', '%' . $this->search . '%')->orWhere('price', 'like', '%' . $this->search . '%');
        })->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.package.package-table', compact('packages'));
    }
    public function packageDetail($packageId)
    {

        $this->dispatch('packageDetail2', packageId: $packageId);
    }
    public function packageEdit($package)
    {

        $this->dispatch('packageEditPage', package: $package);
    }

    public function delete($package)
    {
        $this->packageId = $package['id'];
        $this->dispatch('DeleteConfirmation', package: $package);
    }

    #[On('Destroy')]
    public function destroy()
    {
        Package::find($this->packageId)->delete();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingSpeed()
    {
        $this->resetPage();
    }
}
