<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kick Mystery Box</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <!--bi #icono en class para insertar icono -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <!--habilitar la funcionalidad de espionaje de navegación-->
  <body data-bs-spy="scroll" data-bs-target="#navbar-scrollspy">
    <nav
      class="navbar navbar-expand-lg bg-light py-4 fixed-top custom-navbar"
      id="navbar-scrollspy"
    >
      <div class="container">
        <div class="logo">
            <a aria-label="MisteryBox Element" data-cy="Mosterybox-logo" title="Back home" href="#"><img alt="Misterybox logo logo" loading="lazy" height="80" decoding="async" data-nimg="1" style="color:transparent" src="img/logo.png"></a>
        </div>
        <div class="navbar-title">
            <ul>
                <div id="ulNAbvar">Kick</div>
                <div id="ulNAbvar">Mistery</div>
                <div id="ulNAbvar">Box</div>
            </ul>
        </div>
       
        </a>
        <!--  botón de hamburguesa para móviles -->
        <button
          class="navbar-toggler bg-dark ml-auto" 
          
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" href="#home">@lang('messages.nav_home')</a>
            <a class="nav-link" href="#boxes">@lang('messages.nav_boxes')</a>
            <a class="nav-link" href="#HowItWorks">@lang('messages.nav_hiw')</a>
            <a class="nav-link" href="#aboutUs">@lang('messages.about')</a>
            <a class="nav-link" href="#getConnected">@lang('messages.nav_contact')</a>
            <a class="nav-link" href="#" onclick="toggleLang()" onclick="toggleLang()">@lang('messages.lang') </a>
          </div>
        </div>
      </div>
    </nav>
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
                        <p class="h6 text-info">
                            <span class="small text-secondary">${{ number_format($package->price, 2) }}</span>
                        </p>
                    </a>
                    <a onclick="alert('Se debe abrir el popUp')" class="btn btn-sm btn-primary" id="showBoxesBtn">@lang('messages.buyNow')</a>
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
                        <button class="btn btn-primary" type="button">@lang('messages.subscribe')</button>
                    </div>
                </div>
            </form>
        </div>

    </section>

    </main>
    <footer class="bg-dark text-light border-top">
      <p class="text-center py-5 mb-0">&copy; Kick Mistery Box</p>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="script/script.js"></script>
    <script>
        function toggleLang() {
            window.location.href = "{{ route('toggleLang') }}";
        }
    </script>
  </body>
</html>
