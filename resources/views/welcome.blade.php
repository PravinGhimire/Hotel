@extends('master')

@section('content')
<!-- Banner Section -->
<section class="banner_main" id="home">
    <video autoplay muted loop id="heroVideo">
        <source src="{{ asset('images/hero.mp4') }}" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 67vh;">
            <div class="col-md-8 text-center text-white">
                <h1 class="display-4 font-weight-bold animate__animated animate__fadeInDown">Welcome to SajiloStay</h1>
                <p class="lead animate__animated animate__fadeInUp">Experience luxury and comfort like never before.</p>
                <a href="#about" class="btn btn-primary btn-lg mt-3 animate__animated animate__fadeInUp">Discover More</a>
            </div>
        </div>
    </div>
</section>

<!-- Check Availability Section -->
<section class="check-availability my-4 py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <h2 class="text-center mb-4">Check Room Availability</h2>
                <form action="{{ route('checkAvailability') }}" method="POST" class="bg-white p-4 rounded shadow">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="checkin" class="form-label">Check-In Date</label>
                            <input type="date" class="form-control" id="checkin" name="checkin" required>
                        </div>
                        <div class="col-md-3">
                            <label for="checkout" class="form-label">Check-Out Date</label>
                            <input type="date" class="form-control" id="checkout" name="checkout" required>
                        </div>
                        <div class="col-md-3">
                            <label for="guest" class="form-label">No of Guests</label>
                            <input type="number" class="form-control" id="guest" min="1" name="guest" required>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">Check Availability</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about my-5" id="about">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4">SajiloStay</h1>
            <p class="lead">At SajiloStay, we blend comfort and style to provide a memorable stay. Located in a peaceful area, our hotel features well-equipped rooms, top-notch amenities, and a friendly atmosphere.</p>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <img src="{{ asset('images/receiption.jpg') }}" class="img-fluid rounded small-img" alt="Poolside View" />
            </div>
            <div class="col-md-5">
                <img src="{{ asset('images/about.jpg') }}"  class="img-fluid rounded big-img" alt="Hotel Exterior" />
            </div>
            <div class="col-md-3">
                <img src="{{ asset('images/r3.jpg') }}" class="img-fluid rounded small-img" alt="Relaxing by the Pool" />

        </div>
       
        </div>
    </div>
    <style>
        .about {
            padding: 60px 0;
            background-color: #fff;
        }
        .display-4 {
            font-size: 3.5rem;
            font-weight: bold;
            color: #333;
        }
        .lead {
            font-size: 1.25rem;
            color: #777;
            margin-bottom: 40px;
        }
        .img-fluid {
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .img-fluid:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
    </style>
</section>

<!-- Amenities Section -->
<section class="amenities my-5" id="amenities">
    <div class="container">
        <div class="titlepage text-center animate__animated animate__fadeInUp">
            <h2>Our Services</h2>
            <p>Enjoy a range of facilities designed for your comfort and convenience.</p>
        </div>
        <div class="row text-center">
            <!-- Amenity 1 -->
            @foreach($amenities as $amenity)
            <div class="col-md-4 mb-4">
    <div class="amenity-card bg-light p-4 rounded shadow animate__animated animate__fadeInUp">
        <i class="{{ $amenity->icon }} mb-3" style="color: {{ $amenity->color }};"></i>
        <h4>{{ $amenity->name }}</h4>
        <p>{{ $amenity->description }}</p>
    </div>
</div>

        @endforeach
         

</section>

<!-- Add custom CSS for better styling -->
<style>
.amenities {
    padding: 40px 0;
}

.amenity-card {
    background: #ffffff;
    color: #343a40;
    border: 1px solid #e0e0e0;
    transition: background-color 0.3s, transform 0.3s;
}

.amenity-card:hover {
    background: #f1f1f1;
    transform: translateY(-5px);
}

.amenity-card i {
    color: #007bff; /* Default icon color */
}

.amenity-card h4 {
    margin-top: 10px;
    font-size: 1.5rem;
    color: #343a40;
}

.amenity-card p {
    font-size: 1rem;
    color: #6c757d;
}

.amenity-card i {
    transition: color 0.3s;
}

.amenity-card:hover i {
    color: #007bff; /* Change icon color on hover */
}
</style>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<!-- Customer Reviews Section -->
<!-- Testimonials Section -->
<section class="testimonials my-5" id="testimonials">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-8">
                <div class="titlepage ml-3 animate__animated animate__fadeInUp">
                    <h2>What Our Guests Say</h2>
                    <p>Read feedback from our valued guests about their experiences.</p>
                </div>
            </div>
            <div class="col-md-4 text-md-end text-center">
                <a href="#reviewForm" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal">
                    <i class="fas fa-pen"></i> Review
                </a>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Testimonial 1 -->
            <div class="col-md-4 mb-4">
                <div class="testimonial-card bg-light p-4 rounded shadow text-center animate__animated animate__fadeInUp">
                    <div class="testimonial-content">
                        <p>"SajiloStay provided an incredible experience! The room was comfortable, and the staff went above and beyond to make our stay memorable."</p>
                    </div>
                    <div class="testimonial-author mt-3">
                        <img src="{{ asset('images/guest1.jpg') }}" class="rounded-circle" alt="Guest 1" width="80" height="80">
                        <h5 class="mt-2">Yadav</h5>
                        <p class="text-muted">Regular Guest</p>
                    </div>
                </div>
            </div>
            <!-- Testimonial 2 -->
            <div class="col-md-4 mb-4">
                <div class="testimonial-card bg-light p-4 rounded shadow text-center animate__animated animate__fadeInUp">
                    <div class="testimonial-content">
                        <p>"The amenities at SajiloStay were top-notch, and the location was perfect for exploring the city. Highly recommend!"</p>
                    </div>
                    <div class="testimonial-author mt-3">
                        <img src="{{ asset('images/guest2.jpg') }}" class="rounded-circle" alt="Guest 2" width="80" height="80">
                        <h5 class="mt-2">Sita</h5>
                        <p class="text-muted">First-time Visitor</p>
                    </div>
                </div>
            </div>
            <!-- Testimonial 3 -->
            <div class="col-md-4 mb-4">
                <div class="testimonial-card bg-light p-4 rounded shadow text-center animate__animated animate__fadeInUp">
                    <div class="testimonial-content">
                        <p>"Exceptional service and a beautiful hotel. We enjoyed every moment of our stay and will definitely return."</p>
                    </div>
                    <div class="testimonial-author mt-3">
                        <img src="{{ asset('images/guest3.jpg') }}" class="rounded-circle" alt="Guest 3" width="80" height="80">
                        <h5 class="mt-2">Nabs</h5>
                        <p class="text-muted">Frequent Traveler</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Add custom CSS for better styling -->
<style>
.testimonials {
    padding: 40px 0;
}

.testimonial-card {
    background: #ffffff;
    color: #343a40;
    border: 1px solid #e0e0e0;
    transition: background-color 0.3s, transform 0.3s;
}

.testimonial-card:hover {
    background: #f1f1f1;
    transform: translateY(-5px);
}

.testimonial-content p {
    font-size: 1.1rem;
    color: #6c757d;
}

.testimonial-author img {
    border: 3px solid #007bff;
}

.testimonial-author h5 {
    margin-top: 10px;
    font-size: 1.25rem;
    color: #343a40;
}

.testimonial-author p {
    color: #6c757d;
}
</style>

<!-- Add smooth scroll script if needed -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const links = document.querySelectorAll('a[href^="#"]');
        for (const link of links) {
            link.addEventListener("click", function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute("href")).scrollIntoView({
                    behavior: "smooth"
                });
            });
        }
    });
</script>


<!-- Add custom CSS for better styling -->
<style>
.banner_main {
    position: relative;
    height: 67vh; /* Adjust this value to reduce the height */
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.6);
}

#heroVideo {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
}

.banner_main h1, .banner_main p {
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
}

.banner_main .btn {
    background-color: #007bff;
    border: none;
}

.check-availability {
    background: #f7f7f7;
    padding: 50px 0;
}

.check-availability .form-label {
    font-weight: bold;
}

.titlepage h2 {
    font-size: 2.5rem;
    font-weight: bold;
}

.titlepage p {
    font-size: 1.1rem;
    color: #6c757d;
}

.room, .menu-item, .service-card, .review-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s;
}

.room:hover, .menu-item:hover, .service-card:hover, .review-card:hover {
    transform: translateY(-10px);
}

.bed_room h3 {
    font-size: 1.25rem;
    margin-top: 15px;
}

.bed_room p {
    color: #6c757d;
}

.bed_room .amenities {
    font-size: 0.9rem;
    color: #6c757d;
}

.bed_room .book_btn {
    margin-top: 10px;
    background-color: #28a745;
    border: none;
}

.menu-content h3, .service-card h3, .review-card h3 {
    font-size: 1.25rem;
    margin: 10px 0;
}

.menu-content .btn, .service-card .btn, .review-card .btn {
    background-color: #007bff;
    border: none;
    margin-top: 10px;
}

.img-container {
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.img-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.our_room .titlepage, .resturant .titlepage, .services .titlepage, .customer-reviews .titlepage {
    margin-bottom: 40px;
}

.about_img figure img {
    max-width: 100%;
    height: 50%;
}

.services {
    padding: 40px 0;
}

.services .service-card {
    background: #f8f9fa;
    color: #343a40;
    transition: background-color 0.3s, transform 0.3s;
}

.services .service-card:hover {
    background: #e9ecef;
    transform: translateY(-10px);
}

.services .service-card i {
    color: #007bff; /* Icon color */
}

.services .service-card h3 {
    margin-top: 15px;
    font-size: 1.5rem;
}

.services .service-card p {
    color: #6c757d;
    font-size: 1rem;
}

.review-card {
    background: #f8f9fa;
}

.review-card .review-author img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border: 2px solid #007bff;
}

.review-card .review-author p {
    color: #6c757d;
}

.review-card p {
    color: #343a40;
}

/* Add smooth scroll script */
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const links = document.querySelectorAll('a[href^="#"]');
        for (const link of links) {
            link.addEventListener("click", function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute("href")).scrollIntoView({
                    behavior: "smooth"
                });
            });
        }
    });
</script>

@endsection