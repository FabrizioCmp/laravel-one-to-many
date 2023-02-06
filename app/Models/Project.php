<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "user_id", "cover_img", "github_link"
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
