<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

   public function package_amenities()
    {
        return $this->hasMany(PackageAmenity::class);
    }
}
