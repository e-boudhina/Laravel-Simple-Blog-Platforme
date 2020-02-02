    @extends('layouts.app')

    @section('content')
        <div class="jumbotron text-center">
            <h1>{{$title}}</h1>
            <!-- you can also use <?php echo $title ?> -->
            <p>This is the laravel application from the "The laravel From Scratch" Youtube Series By Traversy Media corrected by e-boudhina </p>
            <p>
                <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
                <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
            </p>
        </div>
    @endsection
