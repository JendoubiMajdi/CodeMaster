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

    <div class="contact-page section">
    <div class="container">
        <h1>Create a New Hotel</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-7">
            <form id="contact-form" action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
    @csrf  <!-- This is important for protecting against CSRF attacks -->

    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <label for="name">Hotel Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required placeholder="Enter Hotel Name">
                @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" placeholder="Enter Description">{{ old('description') }}</textarea>
                @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <label for="localisation">Localisation</label>
                <input type="text" name="localisation" id="localisation" class="form-control" value="{{ old('localisation') }}" required placeholder="Enter Localisation">
                @error('localisation')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>


        <!-- New fields -->
        <div class="col-lg-12">
            <fieldset>
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number') }}" placeholder="Enter Contact Number">
                @error('contact_number')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <label for="website">Website</label>
                <input type="url" name="website" id="website" class="form-control" value="{{ old('website') }}" placeholder="Enter Website URL">
                @error('website')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <label for="rating">Rating</label>
                <input type="number" step="0.1" name="rating" id="rating" class="form-control" value="{{ old('rating') }}" min="0" max="5" placeholder="Enter Rating (0-5)">
                @error('rating')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <label for="number_of_rooms">Number of Rooms</label>
                <input type="number" name="number_of_rooms" id="number_of_rooms" class="form-control" value="{{ old('number_of_rooms') }}" placeholder="Enter Number of Rooms">
                @error('number_of_rooms')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse') }}" required placeholder="Enter Adresse">
                @error('adresse')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <label for="pays">Pays</label>
                <input type="text" name="pays" id="pays" class="form-control" value="{{ old('pays') }}" required placeholder="Enter Pays">
                @error('pays')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <label for="nombre_etages">Nombre d'Étages</label>
                <input type="number" name="nombre_etages" id="nombre_etages" min="1" class="form-control" value="{{ old('nombre_etages') }}" required placeholder="Enter Number of Floors">
                @error('nombre_etages')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <label for="services">Services (nom:prix)</label>
                <input type="text" name="services" id="services" class="form-control" value="{{ old('services') }}" placeholder="Enter Services (e.g. Spa:50,Gym:30)">
                @error('services')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <label for="activites">Activites (nom:prix)</label>
                <input type="text" name="activites" id="activites" class="form-control" value="{{ old('activites') }}" placeholder="Enter Activities (e.g. Swimming:10, Hiking:15)">
                @error('activites')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>

        <!-- New Image Upload Field -->
        <div class="col-lg-12">
            <fieldset>
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            </fieldset>
        </div>

        <div class="col-lg-12">
            <fieldset>
                <button type="submit" class="orange-button">Create Hotel</button>
            </fieldset>
        </div>
    </div>
</form>


            </div>
            <div class="col-lg-5">
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="item phone">
                            <img src="assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                            <h6>010-020-0340<br><span>Phone Number</span></h6>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="item email">
                            <img src="assets/images/email-icon.png" alt="" style="max-width: 52px;">
                            <h6>info@villa.co<br><span>Business Email</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
