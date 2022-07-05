<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    use Timestamp;
    // use Rateable;

    protected $guarded = ['id'];

    public function ratings()
    {
    return $this->hasMany(Rating::class);
    }
}
