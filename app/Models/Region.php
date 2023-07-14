<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class Region extends Model
{
    use HasFactory;
    protected $table = 'regions';
    protected $fillable = ['region_name'];
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'regions_stores','regions_id','stores_id' );
    }
}