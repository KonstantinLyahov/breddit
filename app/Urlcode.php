<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urlcode extends Model
{
    protected $fillable = ['codable_type', 'codable_id'];
    public function codable()
    {
        return $this->morphTo();
    }
}
