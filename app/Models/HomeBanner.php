<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    protected $fillable = [
        'subtitle',
        'title',
        'highlight_title',
        'description',
        'button_text',
        'button_link',
        'image',
        'status'
    ];
}
