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
    <br>
    @include('flash-message')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php if (!isset($search)):?>
                    <?php foreach ($allPerson as $test):?>
                      @if (Auth::user()->id !== $test->id)
                        <tr>
                            <td>
                                <?php echo $test->name?>
                            </td>
                            <td>
                              <form action="{{route('sendInvitation', ['id' => $test->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Invite</button>
                              </form>
                            </td>
                        </tr>
                      @endif
                    <?php endforeach;?>
                <?php else: ?>
                    <?php foreach ($search as $test):?>
                      @if (Auth::user()->id !== $test->id)
                        <tr>
                            <td>
                                <?php echo $test->name?>
                            </td>
                            <td>
                              <form action="{{route('sendInvitation', ['id' => $test->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Invite</button>
                              </form>
                            </td>
                        </tr>
                      @endif
                    <?php endforeach;?>
                <?php endif;?>
                </tbody>
             </table>
        </div>
    </div>
@endsection
