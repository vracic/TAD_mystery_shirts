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
      <section id="boxes">
        <div class="container py-5 ">
          <div class="row text-center">
          @foreach ($packages as $package)
            <div class="col-12 col-sm-6 col-md-4 px-3 mb-8">
                <div class="p-6 bg-light-light">
                    <a class="link-dark text-decoration-none d-block px-6 mt-6 mb-2" href="#">
                        <img class="mb-5 mx-auto img-fluid w-100" style="height: 300px; object-fit: contain;" src="img/example.png" alt="">                        
                        <h3 class="mb-2 lead fw-bold">{{ app()->getLocale() === 'en' ? $package->name_en : $package->name_es }}</h3>

                        @php
                            $isFavorite = $user->favorites->contains($package->id);
                        @endphp

                        <a id="toggle-favorite-btn-{{ $package->id }}" class="btn {{ $isFavorite ? 'favorite' : 'not-favorite' }}" title="{{ $isFavorite ? 'Remove from favorites' : 'Add to favorites' }}" onclick="toggleFavorite({{ $package->id }})">
                            &#x2764; 
                        </a>

                        <p class="h6 text-info">
                            <span class="small text-secondary">${{ number_format($package->price, 2) }}</span>
                        </p>
                    </a>
                    <button class="btn btn-sm btn-primary" data-modal-id="modal-{{ $package->id }}">@lang('messages.buyNow')</button>
                </div>
            </div>

             <div id="modal-{{ $package->id }}" class="modal"  tabindex="-1" role="dialog" aria-labelledby="modal-{{ $package->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-shadow" role="document">
                    <div class="modal-content ">
                    <div class="modal-body">
                    <h3 class="mb-2 lead fw-bold">{{ app()->getLocale() === 'en' ? $package->name_en : $package->name_es }}</h3>
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
                            <input type="hidden" name="package_id" value="{{$package->id}}">
                            <div class="form-group">
                                <label for="size">Size</label>
                                <select id="size" name="size" class="form-control">
                                    <option>Select</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nations">@lang('messages.nations')</label>
                                <input type="text" name="nations" class="form-control"></input>
                            </div>
                            <button type="submit" class="btn btn-primary">@lang('messages.addToCart')</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div> 

           @endforeach

          </div>
        </div>
      </section>

      <section id="HowItWorks" class="HowItWorks py-5">
        <div class="container py-5 text-center">
            <div class="display-3 orange-color mb-0 text-uppercase plan py-5">
                <p class="purpleText">@lang('messages.howDoWork1')</p>
                <p class="purpleText">@lang('messages.howDoWork2')</p>
            </div>
        </div>
        <div class="container py-5">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="divImg">
                        <img src="img/paquete.png" alt="Choose Your Box" class="img-fluid mb-3 card-img-top">
                    </div>
                    <h3><strong>@lang('messages.choose')</strong></h3>
                    <p>@lang('messages.browse1')<strong>@lang('messages.browseStrong')</strong>@lang('messages.browse2')</p>
                </div>
                <div class="col-md-4">
                    <div class="divImg">
                        <img src="img/camiseta-de-futbol.png" alt="Place Your Order" class="img-fluid mb-3 card-img-top">
                    </div>
                    <h3><strong>@lang('messages.yourOrder')</strong></h3>
                    <p>@lang('messages.select1')<strong>@lang('messages.selectStrong')</strong>@lang('messages.select2')</p>
                </div>
                <div class="col-md-4">
                    <div class="divImg">
                        <img src="img/paquete-entregado.png" alt="We'll Pick Your Shirt" class="img-fluid mb-3 card-img-top">
                    </div>
                    <h3><strong> @lang('messages.get')</strong></h3>
                    <p>@lang('messages.simple')<strong>@lang('messages.simpleStrong')</strong></p>
                </div>
                <div >
                    <a href="#boxes" class="btn btn-outline-light" id="showBoxesBtn">@lang('messages.showBoxes')</a>
                </div>
            </div>
        </div>
    </section>

    <section id="aboutUs" class="aboutUs bg-light py-5">
        <div class="container py-5 mb-5">
            <div class="container py-5 text-center">
                <div class="display-3 orange-color mb-0 text-uppercase plan py-5">
                    <p class="purpleText">@lang('messages.about')</p>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button
                            class="accordion-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseOne"
                            aria-expanded="true"
                            aria-controls="collapseOne">
                            @lang('messages.returns1')
                        </button>
                    </h2>
                    <div
                        id="collapseOne"
                        class="accordion-collapse collapse show"
                        aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @lang('messages.returns2')
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo"
                            aria-expanded="false"
                            aria-controls="collapseTwo">
                            @lang('messages.gifts')
                        </button>
                    </h2>
                    <div
                        id="collapseTwo"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        @lang('messages.lookingForGift')
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseThree"
                            aria-expanded="false"
                            aria-controls="collapseThree">
                            @lang('messages.sizeGuide')
                        </button>
                    </h2>
                    <div
                        id="collapseThree"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">@lang('messages.size')</th>
                                            <th scope="col">@lang('messages.chest')</th>
                                            <th scope="col">@lang('messages.length')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">S</th>
                                            <td>50</td>
                                            <td>70</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">M</th>
                                            <td>53</td>
                                            <td>72</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">L</th>
                                            <td>56</td>
                                            <td>74</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">XL</th>
                                            <td>59</td>
                                            <td>76</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <section id="getConnected" class="getConnected py-5">
        <div class="container text-center">
            <div class="container py-5 text-center">
                <div class="display-3 orange-color mb-0 text-uppercase plan py-5">
                    <p class="purpleText">@lang('messages.getConnected')</p>
                </div>
            </div>
            <p class="lead"></p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-contact p-3 mb-5 shadow-sm">
                        <div class="card-body">
                            <img src="img/email.png" alt="Send Email" class="mb-3" width="50">
                            <h5 class="card-title"><strong>@lang('messages.sendEmail')</strong></h5>
                            <p class="card-text">info@Mbox.com<br>support@Mbox.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-contact p-3 mb-5 shadow-sm">
                        <div class="card-body">
                            <img src="img/llamada-telefonica.png" alt="Call Us" class="mb-3" width="50">
                            <h5 class="card-title"><strong>@lang('messages.call')</strong></h5>
                            <p class="card-text">+34 666 000 666<br>+34 600 600 600</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-contact p-3 mb-5 shadow-sm">
                        <div class="card-body">
                            <img src="img/ubicacion.png" alt="Address" class="mb-3" width="50">
                            <h5 class="card-title"><strong>@lang('messages.address')</strong></h5>
                            <p class="card-text">Avenida Luis Montoto, 1<br>Seville 41005, Spain</p>
                        </div>
                    </div>
                </div>
                <div class="hero-shadow-light"></div>
            </div>
        </div>
    </section>

    <section id="newsletter" class="newsletter bg-dark text-light py-5">
        <div class="container text-center">
            <h2 class="display-4 font-weight-bold purpleText">@lang('messages.subscribeTo')</h2>
            <p class="lead">
                @lang('messages.news')
            </p>
            <form class="row py-5">
                <div class="col-md-6 offset-md-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter your email">
                        <button onclick="alert('Thanks for subscribing!')" class="btn btn-primary" type="button">@lang('messages.subscribe')</button>
                    </div>
                </div>
            </form>
        </div>

    </section>

    </main>

    <script>
        function toggleFavorite(packageId) {
            const url = `/users/${packageId}`;
            const token = '{{ csrf_token() }}';

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                }
            })
            .then(response => response.json())
            .then(data => {
                const button = document.getElementById(`toggle-favorite-btn-${packageId}`);
                if (data.isFavorite) {
                    button.classList.remove('not-favorite');
                    button.classList.add('favorite');
                } else {
                    button.classList.remove('favorite');
                    button.classList.add('not-favorite');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
    
@endsection