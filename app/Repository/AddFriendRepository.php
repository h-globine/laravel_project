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

    private $addFriend;
    private $user;

    public function __construct(AddFriend $addFriend, User $user)
    {
        $this->addFriend = $addFriend;
        $this->user = $user;
    }


    public function getPerson($user){
        $search = $this->user->newQuery()
            ->select('name','id')
            ->where('name', '=', $user)
            ->get();
        return $search;
    }
}
