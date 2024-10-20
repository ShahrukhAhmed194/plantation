<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantation</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/welcome-1.0.0.css') }}">
</head>
<body>
    <!-- Header -->
    <header>
        <a href="/home" class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="50" width="50">
            <h3>Plantation</h3>
        </a>
        <nav>
            <ul class="nav-links">
                <li><a href="#about">About Us</a></li>
                <li><a href="#how-it-works">How It Works</a></li>
                <li><a href="/home">Gift a Tree</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="homeBtn">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="logInBtn">Log in</a>
                        @endauth
                    @endif
                </li>
            </ul>
            <button class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
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
            <h2>About Plantation</h2>
            <h3>Growing a Greener Future, One Gift at a Time</h3>
            <div class="about-columns">
                <p>At Plantation, we believe that the most meaningful gifts don’t come wrapped in paper—they grow, flourish, and make the world a better place. Our mission is simple yet profound: to inspire people to celebrate life’s moments by gifting trees, leaving behind a legacy that benefits the planet for generations to come.</p>
    
                <p>When you gift a tree through Plantation, you're not just offering a present—you’re contributing to a healthier, more sustainable world. Each tree symbolizes hope, love, and renewal. It’s a reminder that even small gestures can spark big environmental changes.</p>
    
                <p>Whether it’s a birthday, wedding, or memorial, the gift of a tree is a living testament to your care for the people in your life—and for the planet we all share. Join us in creating a future where every occasion brings us closer to a greener, cleaner world.</p>
            </div>
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
        <figure class="snip1533">
            <figcaption>
              <blockquote>
                <p>If you do the job badly enough, sometimes you don't get asked to do it again.</p>
              </blockquote>
              <h3>Wisteria Ravenclaw</h3>
              <h4>Google Inc.</h4>
            </figcaption>
          </figure>
          <figure class="snip1533">
            <figcaption>
              <blockquote>
                <p>I'm killing time while I wait for life to shower me with meaning and happiness.</p>
              </blockquote>
              <h3>Ursula Gurnmeister</h3>
              <h4>Facebook</h4>
            </figcaption>
          </figure>
          <figure class="snip1533">
            <figcaption>
              <blockquote>
                <p>The only skills I have the patience to learn are those that have no real application in life. </p>
              </blockquote>
              <h3>Ingredia Nutrisha</h3>
              <h4>Twitter</h4>
            </figcaption>
          </figure>
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
            <a href="/register">Ready To Gift</z>
        </div>
        <p>© 2024 Plantation. All rights reserved.</p>
    </footer>

    <script src="{{asset('assets/js/welcome-1.0.0.js')}}"></script>
</body>
</html>
