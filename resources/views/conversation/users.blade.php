<div class="col-md-3">
    <div class="list-group">
        @foreach($users as $user)
            <a class="list-group-item d-flex justify-content-between align-items-center" href="{{route('conversation.show', $user->friend->id)}}">
                {{$user->friend->name}}
                <span>
                    @if(isset($unread[$user->friend->id]))
                        <span class="badge badge-pill badge-primary">
                           {{$unread[$user->friend->id]}}
                        </span>
                    @endif
                </span>

                {{$user->unread}}

            </a>
        @endforeach
    </div>
</div>
