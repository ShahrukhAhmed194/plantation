<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giving Tree</title>
    <link rel="stylesheet" href="{{ asset('assets/css/welcome-1.0.0.css') }}">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">Giving Tree</div>
        <nav>
            <ul>
                <li><a href="#about">About Us</a></li>
                <li><a href="#how-it-works">How It Works</a></li>
                <li><a href="/home">Gift a Tree</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li>@if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="homeBtn">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="logInBtn">Log in</a>
                    @endauth
                @endif
            </li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="hero">
        <div class="hero-content">
            <h1>Give the Gift of Life with a Tree</h1>
            <p>Make a lasting impact by gifting a tree to someone special.</p>
            <a href="/home" class="cta-button">Gift a Tree Now</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="about-content">
            <h2>About Giving Tree</h2>
            <p>Our mission is to make the world greener by enabling people to gift trees to their loved ones. Each tree gifted contributes to a healthier planet.</p>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works">
        <h2>How It Works</h2>
        <div class="steps">
            <div class="step">
                <img src="{{ asset('assets/img/hero-tree2.jpg') }}" alt="Choose a Tree">
                <h3>Choose a Tree</h3>
                <p>Select from a variety of trees to gift.</p>
            </div>
            <div class="step">
                <img src="{{ asset('assets/img/tree_gift.jpg') }}" alt="Personalize Your Gift">
                <h3>Personalize Your Gift</h3>
                <p>Add a personal message for the recipient.</p>
            </div>
            <div class="step">
                <img src="{{ asset('assets/img/tree_hand.jpg') }}" alt="We Plant It for You">
                <h3>We Plant It for You</h3>
                <p>Our team plants the tree and sends a certificate to the recipient.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials">
        <h2>What Our Customers Say</h2>
        <div class="testimonial">
            <p>"This is such a thoughtful gift! My friend loved it."</p>
            <span>- Jane Doe</span>
        </div>
        <div class="testimonial">
            <p>"A wonderful way to give back to the planet and celebrate a special occasion."</p>
            <span>- John Smith</span>
        </div>
    </section>

    <!-- Call-to-Action Section -->
    <section id="cta">
        <h2>Ready to Make a Difference?</h2>
        <a href="/home" class="cta-button">Gift a Tree Today</a>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <h2>Get in Touch</h2>
        <div class="contact-info">
            <p><strong>Address:</strong> 123 Tree St, Forest City, USA</p>
            <p><strong>Phone:</strong> (123) 456-7890</p>
            <p><strong>Email:</strong> info@givingtree.com</p>
        </div>
        <div class="map">
            <!-- Embedded Google Map -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3165.555243933748!2d-122.08424968469289!3d37.421999779825614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fbaab48dfb9f7%3A0x2d54c49e746d2a70!2s1600+Amphitheatre+Pkwy%2C+Mountain+View%2C+CA+94043%2C+USA!5e0!3m2!1sen!2sus!4v1554141234567"
                width="600"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
            ></iframe>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="quick-links">
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <a href="#privacy">Privacy Policy</a>
            <a href="#terms">Terms of Service</a>
        </div>
        <div class="newsletter">
            <label for="newsletter">Register With Us</label>
            <a href="/register">Subscribe</z>
        </div>
        <p>© 2024 Giving Tree. All rights reserved.</p>
    </footer>
</body>
</html>
