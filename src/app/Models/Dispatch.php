<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    protected $fillable=[
        "event_id",
        "worker_id",
        "permit",
        "memo",
    ];

    public function event(){
        return $this->belongsTo(Event::class,"event_id");
    }
    public function worker(){
        return $this->belongsTo(Worker::class,"worker_id");
    }
}
