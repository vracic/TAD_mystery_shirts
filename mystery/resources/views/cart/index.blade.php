@extends('shared.layout')
@section('content')

<section id="home" class="home">
      <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
        <div class="display-1">Kick Mystery Box</div>

        <p class="welcome-text mb-5">
        @lang('messages.unlock')
        </p>
        <a href="#boxes" class="btn btn-outline-light" id="showBoxesBtn">@lang('messages.take_a_look')</a>
        <div class="hero-shadow"></div>
        
      </div>
    </section>

    <main>
            @foreach ($cart as $index => $c)
                <p> {{ $c['type'] }}</p>
                <form action="{{ route('cart.remove', ['index' => $index]) }}" method="POST">
                    @csrf   
                    <button type="submit">Remove</button>
                </form>
            @endforeach


        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <input type="text" name="address" placeholder="Address">
            <button type="submit">Checkout</button>
        </form>
    </main>
</section>

@endsection