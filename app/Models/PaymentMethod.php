<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $guarded = ['id'];

    public function icon()
    {
        if ($this->icon) {
            return asset('storage/' . $this->icon);
        } else {
            return asset('assets/img/example-image-50.jpg');
        }
    }
}
