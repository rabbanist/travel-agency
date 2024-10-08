<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DestinationPhoto;
use App\Models\DestinationVideo;
use App\Models\Package;

class Destination extends Model
{
    use HasFactory;

    public function photos()
    {
        return $this->hasMany(DestinationPhoto::class);
    }

    public function videos()
    {
        return $this->hasMany(DestinationVideo::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
