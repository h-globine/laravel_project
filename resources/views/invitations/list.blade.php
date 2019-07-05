@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card mb-2">
        <div class="card-header">
          {{ $invitations->count() }} invitations are waiting ...
        </div>
      </div>
      @include('flash-message')
    </div>
    @foreach($invitations as $invitation)
        <div class="col-md-3">
          <div class="card card-body">
            <strong>
              {{ $invitation->sender->name}}
            </strong>
             invites you to be friends
            <div class="d-flex justify-content-center">
              <form class="mx-1" action="{{ route('acceptInvitation', ['sender_id' => $invitation->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary mt-2">Accept</button>
              </form>
                <form class="mx-1" action="{{ route('declineInvitation', ['sender_id' => $invitation->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger mt-2">Decline</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
  </div>
</div>
@endsection
