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


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">First</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <?php foreach ($allPerson as $test):?>
                    <?php echo $test->name?>
                <?php endforeach;?>
            </td>
            <td>test</td>
        </tr>
        </tbody>
    </table>


@endsection



