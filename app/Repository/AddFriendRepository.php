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
            ->select('name','users.id')
            ->where('name', '=', $user)
            ->whereRaw('users.id not in (select receiver_id from invitations where sender_id = '.Auth::user()->id.')')
            ->whereRaw('users.id not in (select user_1_id from friends where user_2_id = '.Auth::user()->id.')')
            ->get();
        return $search;
    }

    public function getAllPerson(){
        $allPerson = $this->user->newQuery()
            ->select('name','users.id')
            ->whereRaw('users.id not in (select receiver_id from invitations where sender_id = '.Auth::user()->id.')')
            ->whereRaw('users.id not in (select user_1_id from friends where user_2_id = '.Auth::user()->id.')')
            ->get();
        return $allPerson;

    }


}
