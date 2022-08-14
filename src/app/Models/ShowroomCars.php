<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowroomCars extends Model
{
    use HasFactory;

    public function relatedModel()
    {
        return $this->belongsTo(VehicleDirectory::class, 'vehicle_directory_id');
    }
}
