<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $guarded = ['id'];

    public function image()
    {
        return asset('storage/' . $this->image);
    }
}
