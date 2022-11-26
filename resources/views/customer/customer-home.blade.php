@extends('customer-layout.main')
@section('customer-content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <h1>Welcome to <span>Diya Restaurant</span></h1>
                    <h2>Delivering great food for more than 18 years!</h2>

                    <div class="btns">
                        <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
                        <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in"
                    data-aos-delay="200">
                    <a href="https://www.youtube.com/watch?v=u6BOC7CDUTQ" class="glightbox play-btn"></a>
                </div>

            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                        <div class="about-img">
                            <img src="{{ asset('customer-template/img/about.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </li>
                            <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate
                                velit.</li>
                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu
                                fugiat nulla pariatur.</li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                            in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Why Us</h2>
                    <p>Why Choose Our Restaurant</p>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="box" data-aos="zoom-in" data-aos-delay="100">
                            <span>01</span>
                            <h4>Lorem Ipsum</h4>
                            <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="200">
                            <span>02</span>
                            <h4>Repellat Nihil</h4>
                            <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire
                                leno para dest</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="300">
                            <span>03</span>
                            <h4> Ad ad velit qui</h4>
                            <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Menu</h2>
                    <p>Các món ăn của nhà hàng</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($types as $t)
                                @if (!$t->hasMenuItems->isEmpty())
                                <li data-filter=".filter-{{ $t->id }}">{{ $t->name }}</li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($types as $t)
                        @foreach ($t->hasMenuItems as $m)
                        @if ($m->status == 0)
                            <div class="col-lg-6 menu-item filter-{{ $m->hasType->id }}">
                                <img src="{{ asset('images/menu') }}/{{ $m->hasImage->name }}" class="menu-img" alt="">
                                <div class="menu-content">
                                    <a href="#">{{ $m->name }}</a><span>{{ $m->price }} VND</span>
                                </div>

                                    <div class="menu-ingredients">
                                        {{ $m->ingredients }}
                                    </div>
                                    @if (Session::has('loginID'))
                                    <div class="d-flex justify-content-end mr-3">
                                        <a href="#" idItem="{{$m->id}}" nameItem="{{$m->name}}" priceItem="{{$m->price}}" class="book-a-table-btn place-order d-none d-lg-flex">+</a>
                                    </div>
                                    @endif


                            </div>
                            @endif
                        @endforeach
                    @endforeach




                </div>

            </div>
        </section><!-- End Menu Section -->




        <!-- ======= Book A Table Section ======= -->
        <section id="book-a-table" class="book-a-table">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Reservation</h2>
                    <p>Book a Table</p>
                </div>

                <form action="{{ route('bookTable') }}" method="post" role="form" class="php-email-form"
                    data-aos="fade-up" data-aos-delay="100">
                    @csrf
                    <div class="row">

                        <div class="col-lg-4 col-md-6 form-group mt-3">
                            <input type="text" autocomplete="off" name="date" class="form-control" id="date"
                                placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <div class="validate"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3">
                            <input type="text" class="form-control without_ampm" name="time" min="09:00"
                                max="20:00" id="time" placeholder="Time" data-rule="minlen:4"
                                data-msg="Please enter at least 4 chars">
                            <div class="validate"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3">
                            <input type="number" class="form-control" name="people" id="people"
                                placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your booking request was sent. We will call back or send an Email to
                            confirm your reservation. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Book a Table</button></div>
                </form>

            </div>
        </section><!-- End Book A Table Section -->

        {{-- <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What they're saying about us</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{asset('customer-template/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{asset('customer-template/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{asset('customer-template/img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{asset('customer-template/img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{asset('customer-template/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section --> --}}

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">

            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Gallery</h2>
                    <p>Some photos from Our Restaurant</p>
                </div>
            </div>

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-0">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('customer-template/img/gallery/gallery-1.jpg') }}" class="gallery-lightbox"
                                data-gall="gallery-item">
                                <img src="{{ asset('customer-template/img/gallery/gallery-1.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('customer-template/img/gallery/gallery-2.jpg') }}" class="gallery-lightbox"
                                data-gall="gallery-item">
                                <img src="{{ asset('customer-template/img/gallery/gallery-2.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('customer-template/img/gallery/gallery-3.jpg') }}" class="gallery-lightbox"
                                data-gall="gallery-item">
                                <img src="{{ asset('customer-template/img/gallery/gallery-3.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('customer-template/img/gallery/gallery-4.jpg') }}" class="gallery-lightbox"
                                data-gall="gallery-item">
                                <img src="{{ asset('customer-template/img/gallery/gallery-4.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('customer-template/img/gallery/gallery-5.jpg') }}" class="gallery-lightbox"
                                data-gall="gallery-item">
                                <img src="{{ asset('customer-template/img/gallery/gallery-5.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('customer-template/img/gallery/gallery-6.jpg') }}" class="gallery-lightbox"
                                data-gall="gallery-item">
                                <img src="{{ asset('customer-template/img/gallery/gallery-6.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('customer-template/img/gallery/gallery-7.jpg') }}" class="gallery-lightbox"
                                data-gall="gallery-item">
                                <img src="{{ asset('customer-template/img/gallery/gallery-7.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('customer-template/img/gallery/gallery-8.jpg') }}" class="gallery-lightbox"
                                data-gall="gallery-item">
                                <img src="{{ asset('customer-template/img/gallery/gallery-8.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Gallery Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>
            </div>

            <div data-aos="fade-up">
                <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://www.google.com/maps/embed/v1/place?q=178+Tầm+Vu,+Hưng+Lợi,+Ninh+Kiều,+Cần+Thơ,+Việt+Nam&key=AIzaSyAXBzYeMoJ5WXaY63xqBI0DOtXGTgGgWzk"
                    frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="container" data-aos="fade-up">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="info">

                            <div class="email">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>



                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="info">




                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>



                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="info">


                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>

                    </div>


                </div>

            </div>
        </section><!-- End Contact Section -->
        <!-- ======= Forms Section ======= -->
        <section id="forms" class="book-a-table @if (Session::has('loginID')) d-none @endif">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Đăng nhập/ Đăng ký</h2>
                    <p>Đăng nhập để dùng dịch vụ</p>
                </div>

                <div class="row">
                    <form action="{{ route('registerGuest') }}" id="register-form" method="post" role="form"
                        class="php-email-form @if (Session::has('loginID')) d-none @endif">
                        @csrf
                        <div class="row">
                            <div class="text-center mb-3">
                                <h3>Đăng ký</h3>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" value=""
                                    placeholder="Họ tên" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    autocomplete="off" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="phone" id="res-phone"
                                placeholder="Số điện thoại" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="password" class="form-control" autocomplete="off" name="password"
                                id="res-password" placeholder="Mật khẩu" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="password" class="form-control " autocomplete="off" name="password_confirmation"
                                id="res-password-confirmation" placeholder="Nhập lại mật khẩu" required>
                        </div>

                        <div class="my-3">
                            <div class="loading">Loading</div>
                            @if (Session::has('registerSuccess'))
                                <div class="sent-message d-block">{{ Session::get('registerSuccess') }}</div>
                            @elseif (Session::has('RegisterError'))
                                <div class="error-message d-block">{{ Session::get('registerError') }}</div>
                            @endif
                        </div>
                        <div class="text-center"><button type="submit">Đăng ký thành viên</button></div>
                        <div class="text-center mt-3"><a class="toggle-login" href="">Đã có tài khoản? Đăng
                                nhập.</a></div>
                    </form>

                    <form action="{{ route('loginGuest') }}" id="login-form" method="post" role="form"
                        class="php-email-form d-none @if (Session::has('loginID')) d-none @endif">
                        @csrf
                        <div class="text-center mb-3">
                            <h3>Đăng nhập</h3>
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="Số điện thoại" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="password" class="form-control" autocomplete="off" name="password"
                                id="subject" placeholder="Mật khẩu" required>
                        </div>


                        <div class="my-3">
                            <div class="loading">Loading</div>
                            @if (Session::has('loginSuccess'))
                                <div class="sent-message d-block">{{ Session::get('loginSuccess') }}</div>
                            @elseif (Session::has('loginError'))
                                <div class="error-message d-block">{{ Session::get('loginError') }}</div>
                            @endif
                        </div>
                        <div class="text-center"><button type="submit">Đăng nhập</button></div>
                        <div class="text-center mt-3"><a class="toggle-register" href="">Chưa có tài khoản? Đăng
                                ký.</a></div>
                    </form>



                </div>

            </div>
        </section><!-- End Forms Section -->
    </main><!-- End #main -->
@endsection
@section('page-js')
    <script>
        $('.toggle-login').click(function(e) {
            e.preventDefault();
            console.log('a')
            $('#register-form').addClass('d-none');
            $('#login-form').removeClass('d-none');
        })
        $('.toggle-register').click(function(e) {
            e.preventDefault();
            $('#login-form').addClass('d-none');
            $('#register-form').removeClass('d-none');

        })
    </script>
@endsection
