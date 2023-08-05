@extends('layouts.app')

@section('content')
    <section class="hero-c-container">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/slide1.png') }}" class="d-block w-100" alt="...">
                    <div class="slider-text">
                        <h1>Welcome to TalentArina</h1>
                        <p>Your Gateway to Empowering Careers and Endless Opportunities! Uncover the Path to Professional Success as You Connect with Leading Companies, Network with Industry Experts, and Embark on a Journey of Discovery.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/slide2.png') }}" class="d-block w-100" alt="...">
                    <div class="slider-text2">
                        <h1>Step into a World of Career Exploration and Achievements</h1>
                        <p>Your Gateway to Empowering Careers and Endless Opportunities! Uncover the Path to Professional Success as You Connect with Leading Companies, Network with Industry Experts, and Embark on a Journey of Discovery. Elevate Your Job Search with a Transformative Experience, Where Your Ambitions Are Fueled and Dreams Take Flight. Join TalentArina Today and Embrace a New Era of Career Advancement - Your Future Starts Here!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/slide3.png') }}" class="d-block w-100" alt="...">
                    <div class="slider-text3">
                        <h1>Success Starts Here: Transform Your Job Search with TalentArina's Visionary Virtual Fair</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-card">
            <h2>CARD</h2>
        </div>
    </section>


    <form method="post" class="search-jobs-form" action="{{ route('search.job') }}">
        @csrf
        <div class="row1">
            <div class="col1">
                <input name="job_title" type="text" class="search-input" placeholder="Job title">
            </div>
            <div class="location-container">
                <select name="job_region" class="select2" data-width="100%" data-live-search="true" title="Select Region">
                    <option>Select Region</option>
                    <option value="Anywhere">Anywhere</option>
                    <option>Ahafo Region</option>
                    <option>Ashanti Region</option>
                    <option>Bono East</option>
                    <option>Bono Region</option>
                    <option>Central Region</option>
                    <option>Eastern Region</option>
                    <option>Greater Accra</option>
                    <option>North East</option>
                    <option>Northern Region</option>
                    <option>Oti Region</option>
                    <option>Savannah Region</option>
                    <option>Upper East</option>
                    <option>Upper West</option>
                    <option>Volta Region</option>
                    <option>Western North</option>
                    <option>Western Region</option>
                </select>
            </div>
            <div class="location-container">
                <select name="job_type" class="select2" data-style="btn-white btn-lg" data-width="100%" data-live-search="true"
                    title="Select Job Type">
                    <option>Select Job Type</option>
                    <option>Part Time</option>
                    <option>Full Time</option>
                </select>
            </div>
            <div class="btn-container">
                <button type="submit" name="submit" class="btn-search">
                    Search Job
                </button>
            </div>
        </div>
        <div class="row2">
            <div class="row2-container">
                <h3>Trending Keywords:</h3>
                <ul class="keyword">
                    @foreach ($duplicates as $duplicate)
                        <li><a href="#" class="">{{ $duplicate->keyword }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </form>

    {{-- <div class="hero-section">
        <div class="hero-img">
            <img src="{{ asset('assets/images/job-search.jpg') }}" alt="">


            <div class="right-hero">
                <h1>Connect with the Best</h1>
                <p>Meet Leading Employers and Secure Your Future</p>
                <p>
                    we bring together a curated selection of top employers from various industries, providing you with a
                    unique opportunity to connect directly with the best in the business. Explore a wide range of career
                    opportunities, network with industry leaders, and take decisive steps towards securing a successful
                    future. Join us to elevate your job search, unlock new possibilities, and embark on a path towards
                    professional fulfillment.
                </p>
                <p class="qs">Do You Have Any Concerns?</p>



                <div class="card-hero">
                    <div class="img-container">
                        <div class="img">
                            <div class="slogan">
                                <p>Your Career!</p>
                                <span class="line"></span>
                                <p>Your Connection</p>
                                <span class="line"></span>
                                <p>Your Success!</p>
                            </div>
                        </div>
                        <div class="description card-hero">
                            <span class="title">
                                Talent Arina
                            </span>
                        </div>
                    </div>
                </div>

                <button class="button">
                    Get in touch
                    <div class="hoverEffect">
                        <div>
                        </div>
                </button>

                <!-- Social media -->

                <div class="card-social">
                    <span>Social</span>
                    <a class="social-link" href="#">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 461.001 461.001" xml:space="preserve"
                            fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path style="fill:#F61C0D;"
                                        d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728 c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137 C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607 c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <a class="social-link" href="#">
                        <svg fill="#000000" viewBox="0 0 512 512" id="icons" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M412.19,118.66a109.27,109.27,0,0,1-9.45-5.5,132.87,132.87,0,0,1-24.27-20.62c-18.1-20.71-24.86-41.72-27.35-56.43h.1C349.14,23.9,350,16,350.13,16H267.69V334.78c0,4.28,0,8.51-.18,12.69,0,.52-.05,1-.08,1.56,0,.23,0,.47-.05.71,0,.06,0,.12,0,.18a70,70,0,0,1-35.22,55.56,68.8,68.8,0,0,1-34.11,9c-38.41,0-69.54-31.32-69.54-70s31.13-70,69.54-70a68.9,68.9,0,0,1,21.41,3.39l.1-83.94a153.14,153.14,0,0,0-118,34.52,161.79,161.79,0,0,0-35.3,43.53c-3.48,6-16.61,30.11-18.2,69.24-1,22.21,5.67,45.22,8.85,54.73v.2c2,5.6,9.75,24.71,22.38,40.82A167.53,167.53,0,0,0,115,470.66v-.2l.2.2C155.11,497.78,199.36,496,199.36,496c7.66-.31,33.32,0,62.46-13.81,32.32-15.31,50.72-38.12,50.72-38.12a158.46,158.46,0,0,0,27.64-45.93c7.46-19.61,9.95-43.13,9.95-52.53V176.49c1,.6,14.32,9.41,14.32,9.41s19.19,12.3,49.13,20.31c21.48,5.7,50.42,6.9,50.42,6.9V131.27C453.86,132.37,433.27,129.17,412.19,118.66Z">
                                </path>
                            </g>
                        </svg>
                    </a>
                    <a class="social-link" href="#">
                        <svg viewBox="0 -28.5 256 256" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path
                                        d="M216.856339,16.5966031 C200.285002,8.84328665 182.566144,3.2084988 164.041564,0 C161.766523,4.11318106 159.108624,9.64549908 157.276099,14.0464379 C137.583995,11.0849896 118.072967,11.0849896 98.7430163,14.0464379 C96.9108417,9.64549908 94.1925838,4.11318106 91.8971895,0 C73.3526068,3.2084988 55.6133949,8.86399117 39.0420583,16.6376612 C5.61752293,67.146514 -3.4433191,116.400813 1.08711069,164.955721 C23.2560196,181.510915 44.7403634,191.567697 65.8621325,198.148576 C71.0772151,190.971126 75.7283628,183.341335 79.7352139,175.300261 C72.104019,172.400575 64.7949724,168.822202 57.8887866,164.667963 C59.7209612,163.310589 61.5131304,161.891452 63.2445898,160.431257 C105.36741,180.133187 151.134928,180.133187 192.754523,160.431257 C194.506336,161.891452 196.298154,163.310589 198.110326,164.667963 C191.183787,168.842556 183.854737,172.420929 176.223542,175.320965 C180.230393,183.341335 184.861538,190.991831 190.096624,198.16893 C211.238746,191.588051 232.743023,181.531619 254.911949,164.955721 C260.227747,108.668201 245.831087,59.8662432 216.856339,16.5966031 Z M85.4738752,135.09489 C72.8290281,135.09489 62.4592217,123.290155 62.4592217,108.914901 C62.4592217,94.5396472 72.607595,82.7145587 85.4738752,82.7145587 C98.3405064,82.7145587 108.709962,94.5189427 108.488529,108.914901 C108.508531,123.290155 98.3405064,135.09489 85.4738752,135.09489 Z M170.525237,135.09489 C157.88039,135.09489 147.510584,123.290155 147.510584,108.914901 C147.510584,94.5396472 157.658606,82.7145587 170.525237,82.7145587 C183.391518,82.7145587 193.761324,94.5189427 193.539891,108.914901 C193.539891,123.290155 183.391518,135.09489 170.525237,135.09489 Z"
                                        fill="#5865F2" fill-rule="nonzero"> </path>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <a class="social-link" href="#">
                        <svg fill="#000000" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="icon">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M488.1 414.7V303.4L300.9 428l83.6 55.8zm254.1 137.7v-79.8l-59.8 39.9zM512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm278 533c0 1.1-.1 2.1-.2 3.1 0 .4-.1.7-.2 1a14.16 14.16 0 0 1-.8 3.2c-.2.6-.4 1.2-.6 1.7-.2.4-.4.8-.5 1.2-.3.5-.5 1.1-.8 1.6-.2.4-.4.7-.7 1.1-.3.5-.7 1-1 1.5-.3.4-.5.7-.8 1-.4.4-.8.9-1.2 1.3-.3.3-.6.6-1 .9-.4.4-.9.8-1.4 1.1-.4.3-.7.6-1.1.8-.1.1-.3.2-.4.3L525.2 786c-4 2.7-8.6 4-13.2 4-4.7 0-9.3-1.4-13.3-4L244.6 616.9c-.1-.1-.3-.2-.4-.3l-1.1-.8c-.5-.4-.9-.7-1.3-1.1-.3-.3-.6-.6-1-.9-.4-.4-.8-.8-1.2-1.3a7 7 0 0 1-.8-1c-.4-.5-.7-1-1-1.5-.2-.4-.5-.7-.7-1.1-.3-.5-.6-1.1-.8-1.6-.2-.4-.4-.8-.5-1.2-.2-.6-.4-1.2-.6-1.7-.1-.4-.3-.8-.4-1.2-.2-.7-.3-1.3-.4-2-.1-.3-.1-.7-.2-1-.1-1-.2-2.1-.2-3.1V427.9c0-1 .1-2.1.2-3.1.1-.3.1-.7.2-1a14.16 14.16 0 0 1 .8-3.2c.2-.6.4-1.2.6-1.7.2-.4.4-.8.5-1.2.2-.5.5-1.1.8-1.6.2-.4.4-.7.7-1.1.6-.9 1.2-1.7 1.8-2.5.4-.4.8-.9 1.2-1.3.3-.3.6-.6 1-.9.4-.4.9-.8 1.3-1.1.4-.3.7-.6 1.1-.8.1-.1.3-.2.4-.3L498.7 239c8-5.3 18.5-5.3 26.5 0l254.1 169.1c.1.1.3.2.4.3l1.1.8 1.4 1.1c.3.3.6.6 1 .9.4.4.8.8 1.2 1.3.7.8 1.3 1.6 1.8 2.5.2.4.5.7.7 1.1.3.5.6 1 .8 1.6.2.4.4.8.5 1.2.2.6.4 1.2.6 1.7.1.4.3.8.4 1.2.2.7.3 1.3.4 2 .1.3.1.7.2 1 .1 1 .2 2.1.2 3.1V597zm-254.1 13.3v111.3L723.1 597l-83.6-55.8zM281.8 472.6v79.8l59.8-39.9zM512 456.1l-84.5 56.4 84.5 56.4 84.5-56.4zM723.1 428L535.9 303.4v111.3l103.6 69.1zM384.5 541.2L300.9 597l187.2 124.6V610.3l-103.6-69.1z">
                                </path>
                            </g>
                        </svg>
                    </a>
                </div>


            </div>



        </div>
    </div> --}}

    <div class="card" style="background-color: #17141D;">
        <header class="card-header">
            <p>Talent Arina</p>
            <span class="title">Discover Limitless Opportunities</span>
            <svg class="half-circle2" viewBox="0 0 106 57">
                <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
            </svg>
        </header>

        <div class="cards-container">
            <div class="card1">
                <div class="content">
                    <p class="heading">Explore
                    </p>
                    <p class="icon"><i class="fas fa-search"></i></p>
                    <p class="para">
                        Dive into a world of countless opportunities waiting to be discovered. Browse through a wide range
                        of job listings spanning various sectors and industries
                    </p>
                    <button class="btn">Read more</button>
                </div>
            </div>

            <div class="card1">
                <div class="content">
                    <p class="heading">Apply
                    </p>
                    <p class="icon"><i class="fas fa-file-alt"></i></p>
                    <p class="para">
                        Applying for your dream job has never been easier. With just a few clicks, you can submit your
                        application directly to the employers of your choice.
                    </p>
                    <button class="btn">Read more</button>
                </div>
            </div>

            <div class="card1">
                <div class="content">
                    <p class="heading">Connect</p>
                    <p class="icon"><i class="fas fa-users"></i></i></p>
                    <p class="para">
                        Networking is a vital aspect of career growth, and we've got you covered. Our virtual job fair
                        provides a unique opportunity to connect with industry-leading professionals and recruiters.
                    </p>
                    <button class="btn">Read more</button>
                </div>
            </div>
        </div>

        <div class="card-author">
            <a class="author-avatar" href="#">
                <span>
                </span></a>
            <svg class="half-circle" viewBox="0 0 106 57">
                <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
            </svg>
            <div class="author-name">
                <div class="author-name-prefix">Author</div> Emmanuel Abraham
            </div>
        </div>
        <div class="tags">
            <a href="#">html</a>
            <a href="#">css</a>
            <a href="#">web-dev</a>
        </div>
    </div>



    <section class="stats" style="background-color: #15121A;" id="next">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2 text-white">TalentArina Site Stats</h2>
                    <p class="lead text-white">Discover the Impact of Our Job Fair Platform: Unleashing Opportunities,
                        Empowering Careers!</p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="counter">
                            <div class="counter-icon">
                                <i class="fa-solid fa-user-group"></i>
                            </div>
                            <span class="counter-value">1963</span>
                            <h3>Candidates</h3>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter blue">
                            <div class="counter-icon">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                            <span class="counter-value">1854</span>
                            <h3>Jobs Posted</h3>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter blue">
                            <div class="counter-icon">
                                <i class="fa fa-rocket"></i>
                            </div>
                            <span class="counter-value">1854</span>
                            <h3>Jobs Filled</h3>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter blue">
                            <div class="counter-icon">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <span class="counter-value">1854</span>
                            <h3>Companies</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Counter --}}



    <h2 class="number-jobs">{{ $total_jobs }} Job Listed</h2>

    <div class="job-container" style=" background-color: #15121A;">

        @foreach ($jobs as $job)
            <div class="card-job-post" style="padding: 10px">
                <a href="{{ route('single.job', $job->id) }}"></a>
                <div class="job-content">
                    <p class="heading">{{ $job->job_title }}
                    </p>
                    <img class="job-logo" src="{{ asset('assets/images/' . $job->image . '') }}" alt="">
                    <p class="para">
                        {{ $job->job_description }}
                    </p>
                    <div class="job-details">
                        <span><i class="fa-solid fa-briefcase"></i>{{ $job->company }}</span>
                        <span><i class="fa-solid fa-location-dot"></i>{{ $job->job_region }}</span>
                        <span><i class="fa-solid fa-clock"></i>{{ $job->job_type }}</span>
                    </div>
                    <button class="btn"><a href="{{ route('single.job', $job->id) }}">Apply</a>
                    </button>
                </div>
            </div>
        @endforeach

    </div>


    <section class="job-sign-up" style=" background-color: #15121A;">
        <div class="container-signup">
            <div class="first-row">
                <div class="first-col">
                    <h2 class="text-white">Looking For A Job?</h2>
                    <p class="mb-0 text-white lead">
                        Unlock a world of boundless opportunities tailored just for you. Join our virtual job fair <br>
                        platform and embark on an exciting journey filled with top-notch employers, inspiring connections,
                        <br> and a multitude of career pathways. Discover your true potential and elevate your job search
                        with TalentArina. <br> Your dream job awaits – seize the chance to make your mark in the
                        professional realm!.
                    </p>
                </div>
                <button class="btn-ss"><a href="index.php"> Sign Up</a>
                </button>
                <div class="">
                    <!-- <a href="#" class="btn-ss">Sign Up</a> -->
                </div>
            </div>
        </div>
    </section>



    <!-- Testimonial -->
    <!-- Swiper -->
    <div class="testimonial-container" style="background-color: #15121A;">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/user1.jpg') }}" alt="">
                    <h2>Mary</h2>
                    <p>TalentArina has been a game-changer for my job search! The platform's user-friendly interface made it
                        effortless to explore job opportunities across industries. I connected with incredible employers,
                        and within weeks, I secured my dream job. Thank you, TalentArina, for opening doors to a bright
                        future!"</p>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/user2.jpg') }}" alt="">
                    <h2>Laura</h2>
                    <p>"I owe my career breakthrough to TalentArina's exceptional job fair platform. The networking
                        opportunities and career resources provided were invaluable in building my professional profile. I
                        landed multiple job offers from top companies, and I couldn't be happier with the outcome. Grateful
                        to TalentArina for making my dreams come true!"</p>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/user3.jpg') }}" alt="">
                    <h2>John</h2>
                    <p>"As an employer, TalentArina has been a fantastic recruitment partner. We connected with an
                        impressive pool of talented candidates, and the platform's advanced features streamlined our hiring
                        process. The caliber of candidates we found on TalentArina exceeded our expectations, and we've
                        built a strong team of professionals thanks to their exceptional service."</p>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/user1.jpg') }}" alt="">
                    <h2>Esther</h2>
                    <p>"TalentArina truly stands out in the job fair space. The platform's innovative approach to virtual
                        job fairs is refreshing. I attended their event and found the interactions with recruiters seamless
                        and engaging. The site stats and analytics provided valuable insights into my job search progress. I
                        highly recommend TalentArina to anyone serious about their career."</p>
                </div>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>


        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <p class="title">Unlock Your Career Potential:</p>
                    <p>"Experience the Future of Job Fairs at TalentArina! Connect with Top Employers, Explore Limitless
                        Opportunities, and Propel Your Success in the Job Market like Never Before."</p>
                </div>
                <div class="flip-card-back">
                    <p class="title">Your Gateway to Thriving Careers:</p>
                    <p>"Join TalentArina's Virtual Job Fair for a Transformative Journey. Elevate Your Job Search, Network
                        with Industry Leaders, and Embrace a World of Unprecedented Opportunities."</p>
                </div>
            </div>
        </div>
    </div>




    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>


    <script src="https://pagead2.googlesyndication.com/pagead/managed/js/adsense/m202307180101/show_ads_impl_fy2021.js"
        id="google_shimpl"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

    <script>
        $(document).ready(function(){
    $('.counter-value').each(function(){
    $(this).prop('Counter',0).animate({
    Counter: $(this).text()
    },{
    duration: 3500,
    easing: 'swing',
    step: function (now){
    $(this).text(Math.ceil(now));
    }
    });
    });
    });

    </script>


    <!-- <div class="carousel-container">
          <img src="{{ asset('assets/images/slider1.jpg') }}" alt="Image 1">
          <img src="{{ asset('assets/images/person_2.jpg') }}" alt="Image 2">
          <img src="{{ asset('assets/images/person_3.jpg') }}" alt="Image 3">
        </div> -->
@endsection
