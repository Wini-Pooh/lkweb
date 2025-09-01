<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'domain',
        'template_id',
        'selected_blocks',
        'custom_settings',
        'folder_path',
        'status'
    ];

    protected $casts = [
        'selected_blocks' => 'array',
        'custom_settings' => 'array',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSelectedBlocksModels()
    {
        if (empty($this->selected_blocks)) {
            return collect();
        }
        
        return Block::whereIn('id', $this->selected_blocks)
                   ->orderByRaw('FIELD(id, ' . implode(',', $this->selected_blocks) . ')')
                   ->get();
    }
}
