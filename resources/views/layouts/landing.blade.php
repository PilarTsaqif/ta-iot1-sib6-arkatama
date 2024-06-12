<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Create a stylish landing page for your business startup and get leads for the offered services with this free HTML landing page template.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>ASTROBOY - PANEL MONITORING INTERNET of THINGS</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext"
        rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="images/0.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html"></a> -->

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="contactDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        CONTACT
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="contactDropdown"
                        style="max-width: 200px; border-radius: 10px; background-color: #ffffff;">
                        <a class="dropdown-item" href="https://github.com/PilarTsaqif" style="color: #000;">
                            <i class="fab fa-github mr-2"></i>GitHub
                        </a>
                        <a class="dropdown-item" href="https://wa.me/+628991636684" style="color: #000;">
                            <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                        </a>
                    </div>

                </li>

                <!-- Mulai bagian navigasi yang terkait dengan autentikasi -->
                @if (Auth::check())
                    <!-- Jika pengguna sudah login -->
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('dashboard') }}">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('logout') }}">LOGOUT</a>
                    </li>
                @else
                    <!-- Jika pengguna belum login -->
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('register') }}">REGISTER</a>
                    </li>
                @endif
                <!-- Akhir bagian navigasi yang terkait dengan autentikasi -->
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1><span class="turquoise">IoT Monitoring</span> Dashboard</h1>
                            <p class="p-large">Welcome to the IoT Monitoring Dashboard. Log in to monitor and manage
                                your IoT devices.</p>
                            @if (Auth::check())
                                <a class="btn-solid-lg page-scroll" href="{{ route('dashboard') }}">DASHBOARD</a>
                            @else
                                <a class="btn-solid-lg page-scroll" href="{{ route('login') }}">LOGIN</a>
                            @endif
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="info-container" style="text-align: right; font-size: 24px;">
                            <!-- Adjusting size and position -->
                            <!-- Display the clock -->
                            <div id="clock" style="font-size: 1.5em; color: black; padding-bottom: 10px;"></div>
                            <!-- Changing text color to black -->
                            <!-- Display the date -->
                            <div id="date" style="font-size: 1.2em; color: black; padding-bottom: 10px;"></div>
                            <!-- Changing text color to black -->
                            <!-- Display the weather -->
                            <div id="weather" style="font-size: 1.2em; color: black;"></div>
                            <!-- Changing text color to black -->
                        </div> <!-- end of info-container -->
                    </div> <!-- end of col-lg-6 -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- JavaScript for displaying time, date, and weather -->
    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            document.getElementById('clock').innerHTML = hours + ':' + minutes + ':' + seconds;
            setTimeout(updateClock, 1000);
        }

        // Function to update date
        function updateDate() {
            var now = new Date();
            var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
                'November', 'December'
            ];
            var day = days[now.getDay()];
            var date = now.getDate();
            var month = months[now.getMonth()];
            var year = now.getFullYear();
            document.getElementById('date').innerHTML = day + ', ' + month + ' ' + date + ', ' + year;
        }

        // Function to get random weather data
        function getWeather() {
            // Array of possible weather conditions
            var weatherConditions = ['Sunny', 'Cloudy', 'Partly Cloudy', 'Rainy', 'Stormy', 'Snowy'];
            // Generate a random index to select a weather condition
            var randomIndex = Math.floor(Math.random() * weatherConditions.length);
            var randomCondition = weatherConditions[randomIndex];
            // Generate a random temperature between 10°C to 35°C
            var randomTemperature = Math.floor(Math.random() * (35 - 10 + 1)) + 10;
            var weatherData = {
                temperature: randomTemperature + '°C',
                condition: randomCondition
            };
            document.getElementById('weather').innerHTML = 'Temperature: ' + weatherData.temperature + ', Condition: ' +
                weatherData.condition;
        }

        // Call the functions initially
        updateClock();
        updateDate();
        getWeather();
    </script>

    <!-- Customers -->
    <div class="slider-1">
        <div class="content-container" style="padding: 0 10px;">
            <h5>Welcome to IoT Login</h5>
            <div style="text-align: justify;">
                <p>Log in to explore and manage your IoT devices. With our platform, you can monitor, control, and
                    analyze your devices seamlessly. Join us in shaping the future of IoT technology! Log in to explore
                    and manage your IoT devices. With our platform, you can monitor, control, and analyze your devices
                    seamlessly. Join us in shaping the future of IoT technology! Log in to explore and manage your IoT
                    devices. With our platform, you can monitor, control, and analyze your devices seamlessly. Join us
                    in shaping the future of IoT technology!</p>
            </div>
        </div> <!-- end of content-container -->
    </div> <!-- end of slider-1 -->


    <!-- IoT Services -->
    <div id="services" class="cards-1">
        <div class="container" style="padding: 0 10px;">
            <div class="row">
                <div class="col-lg-12">
                    <h2>IoT Solutions</h2>
                    <div style="text-align: justify;">
                        <p class="p-heading p-large">We provide a comprehensive range of IoT solutions tailored to meet
                            the diverse needs of businesses operating in various industries. Our cutting-edge technology
                            and innovative approach enable us to deliver customized solutions that optimize operations,
                            enhance efficiency, and drive growth. Whether you're in manufacturing, healthcare,
                            transportation, or any other sector, our IoT solutions empower you to harness the power of
                            connected devices and data analytics to make informed decisions and stay ahead of the
                            competition.</p>
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="images/8.png" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">Device Integration</h4>
                            <div style="text-align: justify;">
                                <p>Our team specializes in integrating diverse IoT devices into your existing
                                    infrastructure, ensuring seamless connectivity and functionality.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="images/10.png" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">Data Analytics</h4>
                            <div style="text-align: justify;">
                                <p>Utilize the power of IoT-generated data with our advanced analytics solutions,
                                    enabling you to derive valuable insights and make informed business decisions.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="images/11.png" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">Remote Monitoring</h4>
                            <div style="text-align: justify;">
                                <p>Effortlessly monitor and manage your IoT devices remotely with our secure solutions,
                                    ensuring uninterrupted operation and proactive maintenance.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->

    <!-- Details 1 -->
    <div class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <div style="text-align: justify;">
                            <h2>Design and Plan Your IoT Implementation Strategy</h2>
                            <p>Utilize our expertise to design, develop, and meticulously plan your IoT implementation
                                strategy. Our team of seasoned professionals is equipped to provide comprehensive
                                guidance, leveraging industry best practices and cutting-edge technologies to ensure the
                                success of your IoT initiatives. From initial concept to final execution, we'll
                                collaborate closely with you to identify key objectives, assess potential challenges,
                                and craft tailored solutions that align seamlessly with your business goals. Whether
                                you're embarking on a new IoT project or seeking to optimize your existing
                                infrastructure, our proactive approach and strategic insights will empower you to
                                navigate the complexities of the IoT landscape with confidence and precision.</p>
                        </div>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="images/118.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of details 1 -->


    <!-- Details 2 -->
    <div class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="images/15.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Maximize IoT Efficiency</h2>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Learn step by step how to optimize your IoT infrastructure
                                </div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Enhance your company's performance and achieve new milestones
                                </div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Boost satisfaction levels from stakeholders to employees</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Utilize data analytics to drive informed decision-making and
                                    maximize ROI</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Implement robust security measures to safeguard sensitive IoT
                                    data</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Integrate IoT solutions seamlessly with existing business
                                    processes and systems</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Optimize resource utilization and minimize operational costs
                                    through IoT implementation</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Enable remote monitoring and control for enhanced flexibility
                                    and efficiency</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Improve customer experiences through personalized services and
                                    real-time insights</div>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 2 -->


    <!-- Developers -->
    <div id="developers" class="basic-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Our IoT Developers</h2>
                    <p class="p-heading p-large">Meet our dedicated team of IoT developers, experts in crafting
                        innovative solutions for the IoT ecosystem.</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="images/pilar.png" alt="alternative">
                        </div> <!-- end of image-wrapper -->
                        <p class="p-large"><strong>Pilar Rif'at Tsaqif</strong></p>
                        <p class="job-title">Univ. Sultan Ageng Tirtayasa</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="https://github.com/PilarTsaqif">
                                    <i class="fas fa-circle fa-stack-2x github"></i>
                                    <i class="fab fa-github fa-stack-1x"></i>
                                </a>
                            </span>

                            <span class="fa-stack">
                                <a href="https://wa.me/+628991636684">
                                    <i class="fas fa-circle fa-stack-2x whatsapp"></i>
                                    <i class="fab fa-whatsapp fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-4 -->
    <!-- end of developers -->


    <!-- Contact -->
    <div id="contact" class="form-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Information</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="address">Don't hesitate to give us a call or send us a contact form message</li>
                        <li><i class="fas fa-map-marker-alt"></i>Rangkasbitung, Lebak-Banten. Indonesia</li>
                        <li><i class="fas fa-phone"></i><a class="turquoise"
                                href="tel:+628123456789">+628991636684</a></li>
                        <li><i class="fas fa-envelope"></i><a class="turquoise"
                                href="mailto:pilarrifatt@gmail.com">pilarrifatt@gmail.com</a></li>
                    </ul>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-2 -->
    <!-- end of contact -->


    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>

</html>
