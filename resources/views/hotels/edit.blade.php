@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Hotel</h1>

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

        <!-- Form to edit a hotel -->
        <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- This is important to indicate the form method for updating -->

            <div class="form-group">
                <label for="name">Hotel Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $hotel->name) }}" required maxlength="255">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $hotel->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="localisation">Localisation</label>
                <input type="text" name="localisation" id="localisation" class="form-control" value="{{ old('localisation', $hotel->localisation) }}" required maxlength="255">
            </div>

            <div class="form-group">
                <label for="certification">Certification</label>
                <input type="text" name="certification" id="certification" class="form-control" value="{{ old('certification', $hotel->certification) }}" maxlength="255">
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number', $hotel->contact_number) }}">
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" name="website" id="website" class="form-control" value="{{ old('website', $hotel->website) }}">
            </div>

            <div class="form-group">
                <label for="rating">Rating (0-5)</label>
                <input type="number" name="rating" id="rating" class="form-control" step="0.1" value="{{ old('rating', $hotel->rating) }}" min="0" max="5">
            </div>

            <div class="form-group">
                <label for="number_of_rooms">Number of Rooms</label>
                <input type="number" name="number_of_rooms" id="number_of_rooms" class="form-control" value="{{ old('number_of_rooms', $hotel->number_of_rooms) }}" min="0">
            </div>

            <div class="form-group">
                <label for="adresse">Address</label>
                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $hotel->adresse) }}" required maxlength="255">
            </div>

            <div class="form-group">
                <label for="pays">Country</label>
                <input type="text" name="pays" id="pays" class="form-control" value="{{ old('pays', $hotel->pays) }}" required maxlength="255">
            </div>

            <div class="form-group">
                <label for="nombre_etages">Number of Floors</label>
                <input type="number" name="nombre_etages" id="nombre_etages" class="form-control" value="{{ old('nombre_etages', $hotel->nombre_etages) }}" required min="1">
            </div>

            <div class="form-group">
                <label for="services">Services</label>
                <textarea name="services" id="services" class="form-control">{{ old('services', $hotel->services) }}</textarea>
            </div>

            <div class="form-group">
                <label for="activites">Activities</label>
                <textarea name="activites" id="activites" class="form-control">{{ old('activites', $hotel->activites) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Hotel</button>
        </form>
    </div>
@endsection
