@extends('layouts.app')

<style>
    .social-link {
        width: 30px;
        height: 30px;
        border: 1px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
        border-radius: 50%;
        transition: all 0.3s;
        font-size: 0.9rem;
    }

    .social-link:hover,
    .social-link:focus {
        background: #ddd;
        text-decoration: none;
        color: #555;
    }

    .believes-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 40px;
        padding: 30px;
    }

    .believes-container .believes1 {
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .believes-container .believes1:hover {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .believes-container .believes1 h2 {
        font-size: 1.5rem;
        margin: 10px 0;
    }

    .believes-container .believes1 img {
        /* style the image as an icon */
        width: 50px;
        height: auto;
        margin-bottom: 20px;
        
    }

    /* make it responsive for smaller screens */
    @media (max-width: 700px) {
        .believes-container {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>

@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('images/hero_1.jpg'); background-color: #15121A;" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">About Us</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{ url('/') }}">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>About Us</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-light">
        <div class="container py-5">
            <div class="row h-100 align-items-center py-5">
                <div class="col-lg-6">
                    <h1 class="display-4">About us</h1>
                    <h3>
                        Empowering Careers, Connecting Futures
                    </h3>
                    <p>
                        At TalentArina, we believe that every individual deserves the opportunity to achieve their career
                        aspirations and unlock their full potential. As a revolutionary job fair platform, we have set out
                        to reshape the way job seekers and employers interact, forging a path that transcends traditional
                        boundaries and embraces the future of recruitment.
                    </p>
                    </p>
                </div>
                <div class="col-lg-6 d-none d-lg-block"><img src="https://bootstrapious.com/i/snippets/sn-about/illus.png"
                        alt="" class="img-fluid"></div>
            </div>
        </div>
    </div>

    <div class="bg-white py-5">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                    <h2 class="font-weight-light">Our Vision</h2>
                    <p class="font-italic text-muted mb-4">To create a dynamic, inclusive, and innovative space that
                        empowers talent to connect with leading employers, foster meaningful relationships, and embark on
                        transformative career journeys.</p><a href="#"
                        class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img
                        src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt=""
                        class="img-fluid mb-4 mb-lg-0"></div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 mx-auto"><img src="https://bootstrapious.com/i/snippets/sn-about/img-2.jpg"
                        alt="" class="img-fluid mb-4 mb-lg-0"></div>
                <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
                    <h2 class="font-weight-light">Your Journey, Our Purpose</h2>
                    <p class="font-italic text-muted mb-4">Our platform is meticulously designed to serve as a catalyst for
                        change, where job seekers can discover tailored opportunities that align with their unique skills
                        and passions. With our cutting-edge technology and intuitive interface, finding the perfect fit has
                        never been more accessible or rewarding.</p><a href="#"
                        class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
                </div>
            </div>
        </div>
    </div>


    <section style="background-color: aliceblue">
        <div class="believes-container">
            <div class="believes1">
                <img src="{{ asset('assets/images/icons/Cup.png') }}" alt="">
                <h2>Empowerment through Connections</h2>
                <p>
                    At TalentArina, we understand the undeniable power of networking. We bridge the gap between talent and
                    opportunity, facilitating seamless interactions between candidates and companies. Through virtual job
                    fairs and interactive events, our platform fosters an atmosphere of collaboration, ensuring that
                    connections made transcend the digital realm and lead to real-world accomplishments.
                </p>
            </div>
            <div class="believes1">
                <img src="{{ asset('assets/images/icons/rocket.png') }}" alt="">
                <h2>Elevating Your Potential</h2>
                <p>
                    We go beyond mere job postings by providing comprehensive insights into site statistics and user
                    analytics. Our users gain a deep understanding of their progress, enabling them to strategize and
                    fine-tune their career paths. With TalentArina, you are equipped to make informed decisions, elevating
                    your potential and reaching new heights in your professional journey.
                </p>
            </div>
            <div class="believes1">
                <img src="{{ asset('assets/images/icons/Flower.png') }}" alt="">
                <h2>Dedicated Support</h2>
                <p>
                    Our team of passionate professionals is committed to your success. From personalized assistance to
                    career resources, we stand by your side, empowering you every step of the way. TalentArina is more than
                    a platform; it's a supportive community driven by the collective pursuit of excellence.
                </p>
            </div>
            <div class="believes1">
                <img src="{{ asset('assets/images/icons/inbox.png') }}" alt="">
                <h2>Join TalentArina Today</h2>
                <p>
                    Experience the revolution in job searching. Embrace the future of recruitment and step into a world of
                    possibilities. Whether you're a recent graduate, a seasoned professional, or an employer seeking
                    exceptional talent, TalentArina welcomes you to embark on an extraordinary adventure. Together, let's
                    redefine the landscape of career advancement and forge a brighter future for talent and industry alike.
                </p>
            </div>
        </div>
    </section>
    <div class="bg-light py-5">
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-lg-5">
                    <h2 class="display-4 font-weight-light">Our team</h2>
                    <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="row text-center">
                <!-- Team item-->
                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="https://bootstrapious.com/i/snippets/sn-about/avatar-4.png" alt="" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Manuella Nevoresky</h5><span class="small text-uppercase text-muted">CEO -
                            Founder</span>
                       
                    </div>
                </div>
                <!-- End-->

                <!-- Team item-->
                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="https://bootstrapious.com/i/snippets/sn-about/avatar-3.png" alt="" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Samuel Hardy</h5><span class="small text-uppercase text-muted">CEO -
                            Founder</span>
                        
                    </div>
                </div>
                <!-- End-->

                <!-- Team item-->
                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="https://bootstrapious.com/i/snippets/sn-about/avatar-2.png" alt=""
                            width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Tom Sunderland</h5><span class="small text-uppercase text-muted">CEO -
                            Founder</span>
                       
                    </div>
                </div>
                <!-- End-->

                <!-- Team item-->
                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" alt=""
                            width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">John Tarly</h5><span class="small text-uppercase text-muted">CEO -
                            Founder</span>
                        
                    </div>
                </div>
                <!-- End-->

            </div>
        </div>
    </div>
@endsection
