<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;
use App\User;
use App\Friend;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    //
    public function list(Invitation $invitation, AuthManager $auth)
    {
      return view('invitations.list', [
        'invitations' => Invitation::all()->where('accepted', false)
          ->where('declined', false)
          ->where('receiver_id', $auth->user()->id),
      ]);
    }

    public function send($sender_id)
    {
      $receiver = User::find($sender_id);
      $sender = Auth::user();
      //
      $invitation = new Invitation;
      // send the request
      $invitation->receiver_id = $receiver->id;
      $invitation->sender_id = $sender->id;
      $invitation->accepted = false;
      $invitation->declined = false;
      //
      $invitation->save();
      // go back
      return back()->with('success','An invitation is flying to ' . $receiver->name);
    }

    public function accept($id)
    {
      //
      $invitation = Invitation::find($id);
      // close the invitation
      $invitation->accepted = true;
      $invitation->save();

      $user_1 = User::find($invitation->receiver_id);
      $user_2 = User::find($invitation->sender_id);

      // save both of them
      $friend = new Friend;
      $friend->user_1_id = $user_1->id;
      $friend->user_2_id = $user_2->id;
      $friend->save();

      //
      $friend = new Friend;
      $friend->user_2_id = $user_1->id;
      $friend->user_1_id = $user_2->id;
      $friend->save();

      return back()->with('success', 'You now are friend with ' . $invitation->sender->name);

    }

    public function decline($id)
    {
      $invitation = Invitation::find($id);
      // close the invitation
      $invitation->declined = true;
      $invitation->save();

      return back()->with('error', 'Invitation declined. We promess to say nothing to ' . $invitation->sender->name);
    }
}
