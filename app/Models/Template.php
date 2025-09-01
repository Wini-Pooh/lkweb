<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'css_framework',
        'color_scheme',
        'custom_css',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function sites()
    {
        return $this->hasMany(Site::class);
    }
}
