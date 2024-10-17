<?php

namespace App\Livewire\Package;

use App\Models\Package;
use Livewire\Attributes\On;
use Livewire\Component;

class PackageDetail extends Component
{
    public $item;
    public function render()
    {
        return view('livewire.package.package-detail');
    }
    #[On('packageDetail2')]
    public function customerDetail2($packageId)
    {
        $this->item = Package::find($packageId);
    }
}
