<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Themes\Contracts\Scrolling;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $fillable = [
        'title', 'slug', 'description',
        'created_by', 'image'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
