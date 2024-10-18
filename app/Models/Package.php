<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Package extends Model
{
    use  WithPagination, WithoutUrlPagination, HasFactory;
    protected $fillable = [
        'name',
        'speed',
        'price',
    ];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }
}
