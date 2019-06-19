@extends('layouts.app')



@section('content')
    <form action="" method="post">
        {{csrf_field()}}
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <input name="search" class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">
            </div>
            <div class="col-lg-2">
                <button class="btn btn-primary" type="submit">Envoyez</button>
            </div>
        </div>
    </form>
@endsection

<?php var_dump($_POST);?>

