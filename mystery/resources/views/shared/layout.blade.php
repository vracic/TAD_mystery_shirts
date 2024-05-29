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
    <link rel="stylesheet" href="/css/style.css" />
  </head>
  
  <!--habilitar la funcionalidad de espionaje de navegación-->
  <body data-bs-spy="scroll" data-bs-target="#navbar-scrollspy">

    @include('shared.nav')
  
    <div>
          @yield('content')
      </div>

  </body>

  <footer class="bg-dark text-light border-top">
      <p class="text-center py-5 mb-0">&copy; Kick Mistery Box</p>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="/script/script.js"></script>
    <script>
        function toggleLang() {
            window.location.href = "{{ route('toggleLang') }}";
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var buttons = document.querySelectorAll('.btn-primary[data-modal-id]');
        var closeButtons = document.querySelectorAll('.close[data-modal-id]');

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                var modalId = this.getAttribute('data-modal-id');
                var modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = "block";
                }
            });
        });

        closeButtons.forEach(button => {
            button.addEventListener('click', function() {
                var modalId = this.getAttribute('data-modal-id');
                var modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = "none";
                }
            });
        });

        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        }
        });
    </script>
        
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
  </body>
</html>
