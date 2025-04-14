<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $guarded = ['id'];

    public function image()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        } else {
            return asset('assets/frontend/images/ADC LOGO.png');
        }
    }
}
