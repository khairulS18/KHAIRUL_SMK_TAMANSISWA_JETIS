<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $table = 'scores';
    protected $fillable = [
        'user_id', 'game_version_id',
        'score'
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function gameversions() {
    return $this->belongsTo(Gameversion::class, 'game_version_id', 'id');
    }
}
