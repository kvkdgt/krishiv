@extends('secondaryTheme')
@section('content')
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CZ03HCNN7R"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CZ03HCNN7R');
</script>
<title>Contact | by Krishiv Technologies</title>

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home.css'); }} ">
<div class="main-content-contact-us-form">
    <div class="header-hero-secondary">
        <div class="get-in-touch-text">
            <div class="main-get-in-touch-text">Get in Touch</div>
            <div class="sub-main-get-in-touch-text">Let's connect and brainstorm your amazing idea and make plan to execute your idea.</div>

        </div>
        <div class="blue-space"></div>
    </div>
    <div class="white-space">&nbsp;</div>
    <div class="contact-wrapper-container">
        <div class="contact-container contact-container-2" id="contact-us">
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