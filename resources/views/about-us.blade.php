@extends('secondaryTheme')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/client/about.css'); }} ">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home.css'); }} ">

<script async src="https://www.googletagmanager.com/gtag/js?id=G-CZ03HCNN7R"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-CZ03HCNN7R');
</script>
<title>About | Krishiv Technologies</title>
<div class="main-about-section">
    <div class="about-us">
        <div class="about-us-container">
            <div class="why-krishiv">
                <div class="heading-why-krishiv">
                    <h2>Why Krishiv?</h2>
                    <p>At Krishiv Technologies, we are dedicated to upholding the highest standards of honesty, integrity, and excellence in every project we undertake. Our team of talented professionals is committed to delivering exceptional results, always going the extra mile to exceed client expectations. We believe in balancing hard work with a vibrant, enjoyable work culture, ensuring our team is both productive and happy.
                    </p>
                </div>
                <div class="service-related">
                    <div class="service-box">
                        <div class="title">
                            <h3>Fast and quality service</h3>
                            <p>With a focus on innovation, quality, and timely delivery, we strive to exceed client expectations and leave a lasting impact.</p>
                        </div>
                    </div>
                    <div class="service-box">
                        <div class="title">
                            <h3>Trusted Services</h3>
                            <p>Trust us to be your partner in crafting compelling visual experiences that captivate your audience and set you apart from the competition.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="why-krishiv">
                <div class="heading-why-krishiv">
                    <h2>Quality Check!</h2>
                    <p>We take pride in delivering top-notch quality work that exceed expectations. With our team of talented developers and creative professionals, we bring your vision to life through innovative and impactful work.
                    </p>
                </div>
                <div class="how-we-work-parent">
                <div class="how-we-work">
                    <div class="innovation-img">
                        <img src="{{ URL::asset('imgs/innovation.svg'); }}" alt="">
                    </div>
                    <div class="innovation-message">
                        <h3>
                        A culture of innovation. 
                        </h3>
                      <p>
                      Every brand and business is on a digital journey with varying needs and challenges. Our team of senior marketing practitioners – with extensive backgrounds at world-leading brands, agencies, small businesses, and startups – deliver value at every level, building and strengthening your digital capability across a range of digital marketing disciplines.
                      </p>

                      <p>
                      We’re passionate about digital and relentless about getting the details right. One of our first questions will always be to understand the objectives of any strategy, idea or practice you have. We’ll then ask the difficult questions (you’ll find us quite straight-talking) and help you implement what might be quite challenging solutions. We Create A Trustworthy Brand Experience
                      </p>
                      <p>
                      From our perspective, quality assurance is a subset of the overall usability goal—after all, a website isn’t usable if it isn’t working. Quality assurance is an important step in the website development process and, by all means, must not be skipped. A broken link or a misspelled word may seem like trivial mistakes, but they can greatly undermine the credibility of your website. You want people who visit your site to feel confident about the quality of the information they find.
                      </p>
                    </div>
                </div>
                </div>
                <div class="service-related">
                    <div class="service-box-2">
                        <div class="title">
                            <h3>Fast and quality service</h3>
                            <p>You can count on us for full support. Our dedicated team is always ready to help, ensuring your questions are answered promptly and your experience with us is smooth and satisfying.</p>
                        </div>
                    </div>
                    <div class="service-box-2">
                        <div class="title">
                            <h3>Satisfied Service</h3>
                            <p>We are committed to delivering services that exceed expectations. Our goal is to ensure complete satisfaction by providing high-quality, reliable solutions tailored to meet your needs every step of the way.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="contact-container" id="contact-us">
    <div class="contact-info">
        <h2>Let's talk</h2>
        <p>To request a quote or want to meet up for coffee, contact us directly or fill out the form and we will get back to you promptly.</p>
        <div class="contact-details-svg">
            <img src="{{ URL::asset('imgs/contact.svg'); }}" alt="">
        </div>

    </div>
    <div class="contact-form">
        <form id="contactForm" method="POST" action="{{ route('enquiry.store') }}">
            @csrf
            <input type="text" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
            <span class="error" id="nameError">Please enter your name</span>

            <input type="email" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}">
            <span class="error" id="emailError">Please enter a valid email address</span>

            <input type="text" id="contactNumber" name="contactNumber" placeholder="Your Contact Number" value="{{ old('contactNumber') }}">
            <span class="error" id="contactError">Please enter a valid contact number</span>

            <textarea id="message" name="message" placeholder="Your Message">{{ old('message') }}</textarea>
            <span class="error" id="messageError">Please enter your message</span>

            <button type="submit">Send Message</button>
        </form>

    </div>
</div>
        </div>
    </div>
</div>
@if(session('success'))
<div id="successMessage" class="success-message">
    <div class="success-message-content">
        <span class="close-btn" onclick="closeSuccessMessage()">&times;</span>
        <h2>Success!</h2>
        <p>{{ session('success') }}</p>
    </div>
</div>
@endif
<script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        // Clear previous error messages
        document.querySelectorAll('.error').forEach(function(el) {
            el.style.display = 'none';
        });
        document.querySelectorAll('input, textarea').forEach(function(el) {
            el.classList.remove('input-error');
        });


        let valid = true;

        // Validate name
        const name = document.getElementById('name').value;
        if (!name) {
            document.getElementById('nameError').style.display = 'inline';
            document.getElementById('name').classList.add('input-error');
            valid = false;
        }

        // Validate email
        const email = document.getElementById('email').value;
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!email || !email.match(emailPattern)) {
            document.getElementById('emailError').style.display = 'inline';
            document.getElementById('email').classList.add('input-error');
            valid = false;
        }

        // Validate contact number
        const contactNumber = document.getElementById('contactNumber').value;
        const contactPattern = /^[0-9]+$/;
        if (!contactNumber || !contactNumber.match(contactPattern)) {
            document.getElementById('contactError').style.display = 'inline';
            document.getElementById('contactNumber').classList.add('input-error');
            valid = false;
        }

        // Validate message
        const message = document.getElementById('message').value;
        if (!message) {
            document.getElementById('messageError').style.display = 'inline';
            document.getElementById('message').classList.add('input-error');
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }

        function showSuccessMessage() {
            document.getElementById('successMessage').style.display = 'block';
        }

        function closeSuccessMessage() {
            document.getElementById('successMessage').style.display = 'none';
        }
        document.querySelectorAll('input, textarea').forEach(function(el) {
            el.addEventListener('input', function() {
                el.classList.remove('input-error');
                const errorId = el.id + 'Error';
                document.getElementById(errorId).style.display = 'none';
            });
        });
    });

    // Clear error messages on input change
    document.getElementById('name').addEventListener('input', function() {
        document.getElementById('nameError').style.display = 'none';
    });

    document.getElementById('email').addEventListener('input', function() {
        document.getElementById('emailError').style.display = 'none';
    });

    document.getElementById('contactNumber').addEventListener('input', function() {
        document.getElementById('contactError').style.display = 'none';
    });

    document.getElementById('message').addEventListener('input', function() {
        document.getElementById('messageError').style.display = 'none';
    });

    function showSuccessMessage() {
        document.getElementById('successMessage').style.display = 'block';
        setTimeout(function() {
            closeSuccessMessage();
        }, 3000); // Hide after 3 seconds (3000 milliseconds)
    }

    // Function to close the success message
    function closeSuccessMessage() {
        document.getElementById('successMessage').style.display = 'none';
    }

    // Show the success message if it's set in the session
    @if(session('success'))
    showSuccessMessage();
    @endif
</script>
@endsection