@extends('shared.layout')
@section('content')

<main>
      <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-light text-center">
        <div class="display-1" style="margin-top: 14rem">Admin page</div>
        <hr>
        
        <div class="hero-shadow"></div>
        

        <h1>Orders</h1>
        <form action="{{ route('orders.index') }}" method="GET">
            <button type="submit" id="showBoxesBtn">All orders</button>
        </form>

        <table class="table table-striped !important;" style="margin-top: 3rem">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Sent</th>
                    <th>Items</th>
                    <th>Address</th>
                    <th>User ID</th>
                    <th>Avoid Nations</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>
                        <td>{{ $order->sent }}</td>
                        <td>
                            @foreach (json_decode($order->items) as $item)
                                <div class="centerLeftCard">
                                    <strong>Type:</strong> {{ $item->type }}<br>
                                    <strong>Size:</strong> {{ $item->size }}<br>
                                    <br>
                                </div>
                            @endforeach
                        </td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->avoidNations }}</td>
                        <td>
                        @if ($order->sent == 0)
                        <form action="{{ route('orders.send', [$order->id]) }}" method="POST">
                            @csrf
                            <button class="showBoxesBtn" type="submit">Send Order</button>
                        </form>
                    @else
                        <span>Order Sent</span>
                    @endif
                      </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <br>
        <hr>
        <br>

        <h1>Users</h1>

        <table class="table table-striped !important;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>email</th>
                    <th>role</th>
                    <th>address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <br>
        <br>

        <h1>Favorites</h1>

        <table class="table table-striped !important;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>type</th>
                    <th>count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($favorites as $fav)
                    <tr>
                        <td>{{ $fav->id }}</td>
                        <td>{{ $fav->type_en }}</td>
                        <td>{{ $fav->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        

    <br>
    <br>
    <br>


</main>

@endsection