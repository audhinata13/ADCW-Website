<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreviousEvent extends Model
{
    protected $table = 'previous_events';
    protected $guarded = ['id'];

    public function image()
    {
        return asset('storage/' . $this->image);
    }

    public function youtubeUrl()
    {
        if (!$this->link_youtube) {
            return null;
        }
        preg_match('/(?:v=|\/)([0-9A-Za-z_-]{11})/', $this->link_youtube, $matches);

        if (!empty($matches[1])) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        return null;
    }

}
