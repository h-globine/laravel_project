<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    //
    //
    public function receiver()
    {
      return $this->hasOne(User::class, 'id', 'receiver_id');
    }
    public function sender()
    {
      return $this->hasOne(User::class, 'id', 'sender_id');
    }
}
