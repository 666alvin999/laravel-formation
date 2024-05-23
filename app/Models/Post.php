<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{

    use HasFactory;

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function auteur(): BelongsTo {
        return $this->belongsTo(Auteur::class);
    }

    protected $fillable = [
        'name',
        'slug',
        'content',
        'category_id',
        'auteur_id'
    ];

}
