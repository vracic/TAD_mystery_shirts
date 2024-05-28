@extends('shared.layout')
@section('content')

<section id="home" class="home">
      <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
        <div class="display-1">Your cart</div>
        <hr>

        
        <div class="hero-shadow"></div>
        
        @foreach ($cart as $index => $c)
            <table>
                <tr>
                    <tc>
                        {{ app()->getLocale() === 'en' ? $c['name_en'] : $c['name_es'] }}

                        (size: {{ $c['size'] }}, 
                        nations to avoid: {{ $c['nations'] }})

                        <form action="{{ route('cart.remove', ['index' => $index]) }}" method="POST">
                            @csrf   
                            <button type="submit">Remove</button>
                        </form>
                    </tc>
                </tr>
            </table>

        @endforeach
    <br>
    <br>
    <br>

    <p>Total price: {{ $total_price }} </p>
    
    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        <input type="text" name="address" placeholder="Address">
        <button type="submit">Checkout</button>
    </form>
      </div>
    </section>

    <main>
    </main>

@endsection