<?php

namespace App\Livewire\Package;

use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PackageCreate extends Component
{

    public $name;
    public $speed;
    public $price;
    public function render()
    {
        return view('livewire.package.package-create');
    }
    public function store()
    {


        $this->validate([
            'name' => 'required|max:255',
            'speed' => 'required|integer',
            'price' => 'required'
        ]);

        try {

            DB::beginTransaction();

            $create = Package::create([
                'name' => $this->name,
                'speed' => $this->speed,
                'price' =>  str_replace('.', '', $this->price),
            ]);

            DB::commit();
            if ($create) {
                $this->dispatch('PackageCreate');
                session()->flash('success', 'Successfully created!');
                return redirect()->to('/package');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('danger', 'Error Server!');
            return redirect()->to('/package');
        }
    }
}
