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

    <div class="container">
    <h1>Create Box</h1>
    <form action="{{ route('packages.create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type_en">Type (English)</label>
            <input type="text" class="form-control" id="type_en" name="type_en" required>
        </div>
        
        <div class="form-group">
            <label for="name_en">Name (English)</label>
            <input type="text" class="form-control" id="name_en" name="name_en" required>
        </div>
        
        <div class="form-group">
            <label for="type_es">Type (Spanish)</label>
            <input type="text" class="form-control" id="type_es" name="type_es" required>
        </div>
        
        <div class="form-group">
            <label for="name_es">Name (Spanish)</label>
            <input type="text" class="form-control" id="name_es" name="name_es" required>
        </div>
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<br>
<br>

@if (session('message')) 
    <div class="alert alert-success">
        {{ session('message')}}
    </div> 
@endif


<div class="container">
    <h1>Update Packages</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type (English)</th>
                <th>Name (English)</th>
                <th>Type (Spanish)</th>
                <th>Name (Spanish)</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($packages as $package)
                <tr>
                    <form action="{{ route('packages.update', $package->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td>
                            <input type="text" class="form-control" name="type_en" value="{{ old('type_en', $package->type_en) }}" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="name_en" value="{{ old('name_en', $package->name_en) }}" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="type_es" value="{{ old('type_es', $package->type_es) }}" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="name_es" value="{{ old('name_es', $package->name_es) }}" required>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="price" value="{{ old('price', $package->price) }}" required>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <form action="{{ route('packages.delete', $package->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this package?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


</main>

@endsection