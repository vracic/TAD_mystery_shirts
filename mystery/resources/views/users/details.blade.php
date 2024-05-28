@extends('shared.layout')
@section('content')

<section id="home" class="home">
      <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
        <div class="display-1">Your details</div>

        <div class="hero-shadow"></div>

        @if (session('message')) 
            <div class="alert alert-danger">
                {{ session('message')}}
            </div> 
        @endif
        
        <form method="POST" action="{{ route('users.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <br>
        <br>
        <br>
    </div>
    <main>
        </main>
        
    </section>
    
    <h3>Your favorites</h3>
    @foreach ($packages as $package)
    <div class="col-12 col-sm-6 col-md-4 px-3 mb-8">
        <div class="p-6 bg-light-light">
            <a class="link-dark text-decoration-none d-block px-6 mt-6 mb-2" href="#">
                <img class="mb-5 mx-auto img-fluid w-100" style="height: 300px; object-fit: contain;" src="/img/example.png" alt="">
                <h3 class="mb-2 lead fw-bold">{{ app()->getLocale() === 'en' ? $package->name_en : $package->name_es }}</h3>

                @php
                $isFavorite = $user->favorites->contains($package->id);
                @endphp

                <button id="toggle-favorite-btn-{{ $package->id }}" class="btn {{ $isFavorite ? 'favorite' : 'not-favorite' }}" title="{{ $isFavorite ? 'Remove from favorites' : 'Add to favorites' }}" onclick="toggleFavorite({{ $package->id }})">
                    &#x2764;
                </button>

                <p class="h6 text-info">
                    <span class="small text-secondary">${{ number_format($package->price, 2) }}</span>
                </p>
            </a>
        </div>
    </div>
    @endforeach

    <br>
    <br>

    <h3>Your orders</h3>
    @foreach ($orders as $order)
    <div class="col-12 col-sm-6 col-md-4 px-3 mb-8">
        <div class="p-6 bg-light-light">
            <a class="link-dark text-decoration-none d-block px-6 mt-6 mb-2" href="#">
                <p>Date: {{ $order->created_at }} </p>
                <p>Sent: {{ $order->sent == 1 ? 'Yes' : 'No' }}</p>
                <p>Items: 
                @foreach (json_decode($order->items, true) as $item)
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (json_decode($order->items, true) as $item)
                        <tr>
                            <td>{{ $item['name_en'] }}</td>
                            <td>{{ $item['size'] }}</td>
                            <!-- Add more table cells for additional item attributes -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                @endforeach
                </p>

            </a>
        </div>
    </div>
    @endforeach


@endsection
