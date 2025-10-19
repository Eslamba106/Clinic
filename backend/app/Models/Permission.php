<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sections()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
