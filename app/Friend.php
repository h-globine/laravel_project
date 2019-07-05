<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
    public function me()
    {
      return $this->hasOne(User::class, 'id', 'user_1_id');
    }
    //
    public function friend()
    {
      return $this->hasOne(User::class, 'id', 'user_2_id');
    }
}
