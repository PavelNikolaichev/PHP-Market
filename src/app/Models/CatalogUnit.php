<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogUnit extends Model
{
    use HasFactory;

    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'catalog_unit_id');
    }
}
