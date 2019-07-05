@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('response'))
                        <div class="alert alert-success" role="alert">
                            {{ session('response') }}
                        </div>
                    @endif
                   <div class="col-md-4">
                       @if(!empty($profile))
                            <img class="avatar" src="{{$profile->profile_pic}}"  style="border-radius: 100%;max-width: 100px;">
                       @endif
                   </div>
                    <div class="col-md-8">
                        @if(!empty($profile))
                            <h3>Welcome {{$profile->name}} you're a {{$profile->designation}} </h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
