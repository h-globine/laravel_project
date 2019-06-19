<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Notifications\MessageReceived;
use App\Repository\ConversationRepository;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{

    private $conversationRepository;
    private $auth;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $auth)
    {
        $this->middleware('auth');
        $this->conversationRepository = $conversationRepository;
        $this->auth = $auth;
    }

    public function index(){
        return view('conversation/index', [
            'users' => $this->conversationRepository->getConversations($this->auth->user()->id),
            'unread'=> $this->conversationRepository->unreadCount($this->auth->user()->id)
        ]);
    }
    public function show(User $user){
        $me = $this->auth->user();

        $messages = $this->conversationRepository->getMessagesFor($me->id, $user->id)->paginate(50);
        $unread = $this->conversationRepository->unreadCount($this->auth->user()->id);
        if (isset($unread[$user->id])){
            $this->conversationRepository->readAllFrom($user->id, $me->id);
            unset($unread[$user->id]);
        }
        return view('conversation/show', [
            'users' => $this->conversationRepository->getConversations($this->auth->user()->id),
            'user' => $user,
            'messages' => $messages,
            'unread'=> $unread
        ]);
    }

    public function store(User $user, StoreMessageRequest $request){
        $message = $this->conversationRepository->createMessage(
            $request->get('content'),
            $this->auth->user()->id,
            $user->id
        );
        $user->notify(new MessageReceived($message));
        return redirect(route('conversation.show', ['id'=>$user->id]));
    }
}
