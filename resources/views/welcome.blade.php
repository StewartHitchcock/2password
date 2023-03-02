@extends('layouts.app')
@section('content')

<body>
    <div class="w-25 mx-auto text-center">
        <h1>Welcome to 2Password</h1>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem modi veniam voluptatibus tempora? Totam
            aliquam iure voluptatem nesciunt quam dignissimos deserunt animi numquam eligendi maxime? Illum quam
            possimus cupiditate dignissimos? Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo illum
            voluptatibus nesciunt maiores, molestias tempora eaque totam a, ipsa consequuntur sunt modi iusto enim
            numquam facere sapiente eius esse ex?</p>

        @guest
        @if (Route::has('login'))

        <a class="btn btn-primary btn-lg" href="{{ route('login') }}">{{ __('Login') }}</a>

        @endif

        @if (Route::has('register'))

        <a class="btn btn-primary btn-lg" href="{{ route('register') }}">{{ __('Register') }}</a>

        @endif
        @else
        <h2> Welcome back {{ Auth::user()->name }}!<h2>
                <a class="btn btn-primary btn-lg" href="/record">Passwords</a>
                @endguest
    </div>
</body>

@endsection