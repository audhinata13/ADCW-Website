<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationEvent extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function status()
    {
        if ($this->status == 0) {
            return '<span class="badge badge-secondary">Waiting</span>';
        } else if ($this->status == 1) {
            return '<span class="badge badge-warning">Payment Confirmation</span>';
        } else if ($this->status == 2) {
            return '<span class="badge badge-success">Approved</span>';
        } else {
            return '<span class="badge badge-danger">Rejected</span>';
        }
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proof_of_payment()
    {
        if ($this->proof_of_payment) {
            return asset('storage/' . $this->proof_of_payment);
        } else {
            return "";
        }
    }
}
