<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Module extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function modules()
    {
        return $this->hasMany(UserModule::class, 'module_id');
    }
}
