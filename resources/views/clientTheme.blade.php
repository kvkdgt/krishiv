<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishiv Technologies</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/theme.css'); }} ">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">
</head>
<div class="header-hero">
    <header>
        <div class="logo">
            <img src="{{ URL::asset('imgs/logo.png'); }}" style="width:75%" alt="">
        </div>
        <div class="menus">
            <span class="menu-name"><a href="#services">SERVICES</a></span>
            <span class="menu-name">PORTFOLIO</span>
            <span class="menu-name">BLOG</span>
            <span class="menu-name"><a href="#contact-us">CONTACT US</a></span>


        </div>
        <div class="bars" id="bar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="bar-icon"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
            </svg>
        </div>

    </header>
    <div class="hero">
        <div class="left">
            <div class="main-content">Welcome to Krishiv Technologies - Empowering Tomorrow's Technology Today!</div>
            <div class="sub-header">At Krishiv technologies, we believe in pushing the boundaries of technology to create solutions that transform businesses and elevate the human experience. Our passion for innovation, commitment to excellence, and cutting-edge expertise make us your trusted partner on the journey to digital success.</div>
            <a href="#contact-us" class="button-link"><div class="button"><span class="get-quote">GET QUOTE</span></div></a>
        </div>
        <div class="right"><img src="{{ URL::asset('imgs/hero1.png'); }}" class="heroImg" alt=""></div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="close-btn" id="closeBtnForSidebar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M0.75 23.249L23.25 0.749023" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M23.25 23.249L0.75 0.749023" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
        <div class="menus-sidebar">
            <div class="menu-name-sidebar">SERVICES</div>
            <div class="menu-name-sidebar">PORTFOLIO</div>
            <div class="menu-name-sidebar">BLOG</div>
            <div class="menu-name-sidebar">CONTACT US</div>


        </div>
    </div>
</div>

<body>
    @yield('content')

    <footer>
        <div class="footer-main">
            <div class="what-we-do">
                <div class="footer-header">What We Do</div>
                <div class="footer-content">
                    <a href="#">PHP Web Development</a>
                    <a href="#">Laravel Web Development</a>
                    <a href="#">React Web Development</a>
                    <a href="#">Mobile App Development</a>

                </div>
            </div>

            <div class="what-we-do">
                <div class="footer-header">About Krishiv</div>
                <div class="footer-content">
                    <a href="#">About us</a>
                    <a href="#">Portfolio</a>
                    <a href="#">Blog</a>
                    <a href="#">Terms and Conditions</a>


                </div>
            </div>

            <div class="what-we-do">
                <!-- <div class="footer-header">&nbsp;</div> -->
                <div class="footer-content">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Testimonials</a>
                    <a href="#">Store</a>

                </div>
            </div>

            <div class="what-we-do">
                <div class="footer-header">Connect</div>
                <div class="footer-content">
                    <a href="tel:919265868327">+91 92658 68327</a>
                    <a href="tel:916354958743">+91 63549 58743</a>
                    <a href="mailto:kvkdgt12345@gmail.com">kvkdgt12345@gmail.com</a>
                    <div class="social-media">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                            </svg>
                        </a>&nbsp;
                        <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/></svg>
                        </a>
                        &nbsp;
                        <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <hr style="width:50%;" />
        <div class="copyright">© Copyright 2024 Krishiv Technologies</div>
    </footer>
    <script src="{{ URL::asset('js/script.js'); }} "></script>

</body>

</html>