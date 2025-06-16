<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Magicalcrumbles</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #fffaf5;
      color: #34241d;
      overflow-x: hidden;
    }

    .navbar {
      background-color: #3a2a23;
    }

    .navbar .navbar-brand,
    .navbar-nav .nav-link {
      color: #FDF6E3;

            font-family: 'Nunito', sans-serif;

font-weight: 600;
letter-spacing: 1px;
text-transform: uppercase;

    }

    .navbar .nav-link.active,
    .navbar .nav-link:hover {
      background-color: #5b3c2a;
      color: white;
      border-radius: 6px;
    }

    .navbar-toggler {
      border-color: #FDF6E3;
    }

    .navbar-toggler-icon {
      filter: invert(100%);
    }

    #main-content {
      padding: 0.1;
      background-color: #fffaf5;
    }

    .modal-content {
      background-color: #fffaf5;
      color: #5C4033;
      border-radius: 12px;
      border: 1px solid #ead9c6;
    }

    .modal-header,
    .modal-footer {
      border: none;
    }

    .btn-danger {
      background-color: #A74F1F;
      border-color: #A74F1F;
    }

    .btn-danger:hover {
      background-color: #8B3E1F;
      border-color: #8B3E1F;
    }

    .pagination .page-item.active .page-link {
      background-color: #7E6B58 !important;
      border-color: #7E6B58 !important;
      color: white !important;
    }

    .pagination .page-link {
      color: #7E6B58;
    }

    .pagination .page-link:hover {
      color: #615344;
      background-color: #a18c77;
      border-color: #9c8772;
    }

    .nav-item{
        margin-right: 1rem;
    }

    .storename{
         margin-left: 1rem;
    }

    footer a:hover {
  color: #d9bfa9 !important;
}

  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid"  style="margin-left: 2rem; margin-right: 2rem;">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="{{ asset('logo.png') }}" alt="Logo" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: contain;">
      <span class="fw-bold storename">MagicalCrumbles</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="{{ url('/store/guest/login') }}">
       Log-in
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ url('/store/guest/register') }}">
Register
         </a>
        </li>

             </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<main id="main-content">
  {{ $slot }}
</main>

<footer class="text-center text-lg-start mt-5" style="background-color: #3a2a23; color: #FDF6E3; padding: 2rem 0;">
  <div class="container px-4">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5 class="fw-bold">MagicalCrumbles</h5>
        <p>Whimsical treats baked to delight. Discover your next favorite crumble with us!</p>
      </div>

      <div class="col-md-4 mb-3" style="margin-left: 20rem;">
        <h5 class="fw-bold">Follow Us</h5>
        <a href="#" class="text-light me-3"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-light me-3"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-light"><i class="bi bi-twitter"></i></a>
        <a href="#" class="text-light"><i class="fab fa-tiktok"></i></a>
      </div>
    </div>
    <hr style="background-color: #FDF6E3;">
    <p class="mb-0">2025 MagicalCrumbles.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>
