<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithoutUrlPagination as LivewireWithoutUrlPagination;
use Livewire\WithPagination;

class Pelanggan extends Model
{
    use  WithPagination, LivewireWithoutUrlPagination, HasFactory;
    protected $fillable = [
        'package_id',
        'name',
        'email',
        'phone_number',
        'address',
    ];

    public function packages()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
