<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blogers extends Model
{
    use HasFactory;

    public function blogers ():HasMany {
        return $this->hasMany(Post::class, 'post_bloger');
    }
}
