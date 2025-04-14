<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function image()
    {
        if ($this->image === 'default') {
            return asset('assets/img/example-image.jpg');
        } else {
            return asset('storage/' . $this->image);
        }
    }

    public function status()
    {
        if ($this->status == 0) {
            return '<span class="badge badge-danger">Closed</span>';
        } else if ($this->status == 1) {
            return '<span class="badge badge-info">Open Registration</span>';
        } else {
            return '<span class="badge badge-success">Finished</span>';
        }
    }

    public function scopeIsOpen($query)
    {
        return $query->where('status', 1);
    }

    public function formatDate()
    {

        if ($this->date && $this->end_date) {
            if ($this->date->translatedFormat('d') === $this->end_date->translatedFormat('d')) {
                return $this->date->translatedFormat('l, d F Y H:i:s') . ' - ' . $this->end_date->translatedFormat('H:i:s');
            } else {
                return $this->date->translatedFormat('l, d F Y H:i:s') . ' - ' . $this->end_date->translatedFormat('l, d F H:i:s');
            }
        }
    }
    public function formatDateOnly()
    {

        if ($this->date && $this->end_date) {
            if ($this->date->translatedFormat('d') === $this->end_date->translatedFormat('d')) {
                return $this->date->translatedFormat('F, d ') . ' - ' . $this->end_date->translatedFormat('d, Y');
            } else {
                return $this->date->translatedFormat('F, d ') . ' - ' . $this->end_date->translatedFormat('d, Y');
            }
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = \Str::slug($model->name);
        });

        static::updating(function ($model) {
            $model->slug = \Str::slug($model->name);
        });
    }

    public function feeFormat()
    {
        return number_format($this->fee, 0, '.', '.');
    }
}
