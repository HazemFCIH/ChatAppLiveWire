<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $dates =['last_massage_at'];
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function users(){

        return $this->belongsToMany(User::class)
            ->withPivot('read_at')
            ->withTimestamps()->oldest();
}
public function messages(){
        return $this->hasMany(Message::class)->oldest();
}

}
