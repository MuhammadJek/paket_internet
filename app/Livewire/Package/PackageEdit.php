<?php

namespace App\Livewire\Package;

use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class PackageEdit extends Component
{
    public $packageId;
    public $name;
    public $speed;
    public $price;
    public function render()
    {
        return view('livewire.package.package-edit');
    }

    #[On('packageEditPage')]
    public function packageEditPage($package)
    {
        $harga = round($package['price']);
        $this->packageId = $package['id'];
        $this->name = $package['name'];
        $this->speed = $package['speed'];
        $this->price = number_format($harga, 0, '', '.');
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required|max:255',
            'speed' => 'required|integer',
            'price' => 'required|numeric'
        ]);
        try {
            DB::beginTransaction();
            $package = Package::find($id);
            if ($package) {
                DB::commit();
                $package->update([
                    'name' => $this->name,
                    'speed' => $this->speed,
                    'price' =>  str_replace('.', '', $this->price),
                ]);

                $this->dispatch('PackageCreate');
                session()->flash('success', 'Successfully Updated!');
                return redirect()->to('/package');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('danger', 'Successfully Updated!');
            return redirect()->to('/package');
        }
    }
}
