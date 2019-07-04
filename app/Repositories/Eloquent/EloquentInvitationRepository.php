<?php

namespace App\Repositories\Eloquent;

use App\Invitation;
use App\Repositories\Contracts\InvitationRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentInvitationRepository extends AbstractRepository implements InvitationRepository
{
    public function entity()
    {
        return Invitation::class;
    }
}
