<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Hotel Listings</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>
<body>

    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <ul class="info">
                        <li><i class="fa fa-envelope"></i> info@company.com</li>
                        <li><i class="fa fa-map"></i> Your Location</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="social-links">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="{{ url('/') }}" class="logo">
                            <h1>Hotel Listings</h1>
                        </a>
                        <ul class="nav">
                             <li><a href="index.html">Home</a></li>
                            <li><a href="{{ route('properties') }}" class="active">Properties</a></li>
                            <li><a href="{{ route('hotels.create') }}">Property Details</a></li>
                            <li><a href="contact.html">Contact Us</a></li> 
                            <li><a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="breadcrumb"><a href="#">Home</a> / Properties</span>
                    <h3>Available Hotels</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="section properties">
        <div class="container">
            <ul class="properties-filter">
                <li>
                    <a class="is_active" href="#!" data-filter="*">Show All</a>
                </li>
                <li>
                    <a href="#!" data-filter=".adv">Hotel</a>
                </li>
                <li>
                    <a href="#!" data-filter=".str">Resort</a>
                </li>
                <li>
                    <a href="#!" data-filter=".rac">Penthouse</a>
                </li>
            </ul>

            <div class="row properties-box">
    @foreach($hotels as $hotel)
        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 adv">
            <div class="item">
                <!-- Display hotel image or a placeholder if not available -->
                <img src="{{ asset('storage/' . $hotel->image) }}" alt="{{ $hotel->name }}" style="width: 100%; height: auto;">
                <span class="category">{{ $hotel->name }}</span>
                <h6>$2.264.000</h6>
                <h4><a href="property-details.html">{{ $hotel->localisation }}</a></h4>
                <p>{{ $hotel->description }}</p>

                <ul>
                    <li>Number: <span>{{ $hotel->contact_number }} </span></li>
                    <li>Website: <span>{{ $hotel->website }}</span></li>
                    <li>Floor: <span>{{ $hotel->nombre_etages }}</span></li>
                    <li>Bedrooms: <span>{{ $hotel->number_of_rooms }}</span></li>
                    <li>Rating: <span>{{ $hotel->rating }}</span></li>
                    <li>Services: <span>{{ $hotel->services }}</span></li>
                    <li>Activities: <span>{{ $hotel->activites }}</span></li>
                </ul>
                
                <div class="main-button">
                    <a href="{{ route('hotels.edit', $hotel->id) }}">Edit</a>
                    <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this hotel?');">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

        </div>
    </div>
    {{-- this is a different design in case you want it
    <div class="container">
    <h1>Détails de l'Hôtel</h1>
    @foreach($hotels as $hotel)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $hotel->name }}</h5>
                <img src="https://via.placeholder.com/400x250" alt="Hotel Image" class="card-img-top">
                <p class="card-text"><strong>Localisation : </strong>{{ $hotel->localisation }}</p>
                <p class="card-text"><strong>Description : </strong>{{ $hotel->description }}</p>
                <p class="card-text"><strong>Site web : </strong>{{ $hotel->website }}</p>
                <p class="card-text"><strong>Nombre d'étages : </strong>{{ $hotel->nombre_etages }}</p>
                <p class="card-text"><strong>Chambres : </strong>{{ $hotel->number_of_rooms }}</p>
                <p class="card-text"><strong>Évaluation : </strong>{{ $hotel->rating }}</p>
                <p class="card-text"><strong>Services : </strong>{{ $hotel->services }}</p>
                <p class="card-text"><strong>Activités : </strong>{{ $hotel->activites }}</p>
                <div class="main-button">
                    <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet hôtel ?');">Supprimer</button>
                    </form>
                </div>
                
            </div>
        </div>
    @endforeach
</div> 
--}}

    <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
