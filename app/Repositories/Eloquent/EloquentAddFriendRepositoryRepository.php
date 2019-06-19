<?php

namespace App\Repositories\Eloquent;

use App\AddFriendRepository;
use App\Repositories\Contracts\AddFriendRepositoryRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentAddFriendRepositoryRepository extends AbstractRepository implements AddFriendRepositoryRepository
{
    public function entity()
    {
        return AddFriendRepository::class;
    }
}
