<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gameversion extends Model
{
    use HasFactory;
    protected $table = 'game_versions';
    protected $fillable = [
        'game_id', 'version', 'storage_path'
    ];

    public function scores() {
        return $this->belongsTo(Score::class, 'game_version_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
