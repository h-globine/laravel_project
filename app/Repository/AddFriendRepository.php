<?php

namespace App\Repository;

use App\AddFriend;
use App\User;
use App\Message;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AddFriendRepository
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function getPerson($user){
        $search = $this->user->newQuery()
            ->select('name','id')
            ->where('name', '=', $user)
            ->get();
        return $search;
    }

    public function getAllPerson(){
        $allPerson = $this->user->newQuery()
            ->select('name','id')
            ->get();
        return $allPerson;

    }


}
