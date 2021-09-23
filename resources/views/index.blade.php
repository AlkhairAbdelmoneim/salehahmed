<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>شركة المنيري المحدودة</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/icons8.png')}}" rel="icon">
  <link href="{{{asset('assets/img/apple-touch-icon.png')}}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  {{--  Toastr  --}}
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- font Arabic -->
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />

  <!-- =======================================================
  * Template Name: BizLand - v3.3.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a
            href="mailto:contact@example.com">www.systemoheamed168</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>0116550666</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        {{--  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>  --}}
        <a href="https://www.facebook.com/profile.php?id=100006597918811" target="a_blank" class="facebook"><i class="bi bi-facebook"></i></a>
        {{--  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>  --}}
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{ route('welcome') }}">شركة المنيري المحدودة<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">الرئيسيه</a></li>
          <li><a class="nav-link scrollto" href="#about">معلومات عنا</a></li>
          <li><a class="nav-link scrollto" href="#services">أعمالنا</a></li>
          <li><a class="nav-link scrollto" href="#contact">إتصل بنا</a></li>

          @guest
          @if (Route::has('login'))
              <li>
                  <a class="nav-link scrollto" href="{{route('login')}}"
                      title="تسجيل دخول">تسجيل دخول</a>
              </li>
          @endif

      @else

          <li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              <a class="nav-link scrollto"  href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
         تسجيل خروج
    </a>
          </li>

      @endguest


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>{!! getSetting() !!}</h1>
      <h2>تركيب الاسلاك الشائكه والأمواس بمختلف انواعها </h2>
      <div class="d-flex">
        {{--  <a href="#about" class="btn-get-started scrollto">Get Started</a>  --}}
        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i
            class="bi bi-play-circle"></i><span>الفيديو</span></a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section class="Featured">
      <div class="container aos-init aos-animate" data-aos="fade-up">


        <div class="container">
          <div class="row my-link">
            @foreach ($last_services as $value)

            <div class="col-xl-4 col-md-4">
              <div class="card custom-card my_card">
                <img class="card-img-top w-100 bg-danger-transparent" src="{{$value->image_path}}" title="{{$value->name}}" alt="No image found">
                <div class="card-body">
                  <h4 class="card-title">{{$value->name}}</h4>
                  <p class="card-text">{{$value->description}}</p>
                  <a class="a_link" href="{{route('single',$value->id)}}" title="{{$value->name}}">المزيد<i class="fe fe-arrow-right ml-1"></i></a>
                </div>
              </div>
            </div>

            @endforeach


          </div>
          </div>
        </div>

      </div>
    </section>
 <!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3><span>معلومات عن الشركه</span></h3>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/commpany.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up"
            data-aos-delay="100">
            <h3>المنيري للأسلاك الشائكه والامواس</h3>
            <p class="fst-italic">{!! getSetting('about_commpany') !!}</p>
            <ul>
              <li>
                <i class="bx bx-store-alt"></i>
                <div>
                  <h5>مميزاتنا</h5>
                  <p> ننجز عملك بأسعار تنافسيه وفي متناول اليدين</p>
                </div>
              </li>
              <li>
                <i class="bx bx-images"></i>
                <div>
                  <h5>شعارنا</h5>
                  <p>دقه في العمل و سرعه في الاداء</p>
                </div>
              </li>
            </ul>
            {{--  <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
              voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>  --}}
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="75" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>عملائنا</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="66" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>الاعمال المكتمله</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>ساعات الدعم</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>ساعات العمل</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section class="Featured" id="services">
        <div class="section-title">
          <h3><span>أعمالنا</span></h3>
          <p>منازل مزارع شركات</p>
        </div>
        
          <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="container">
              <div class="row my-link">

                @foreach ($services as $item)
                <div class="col-xl-3 col-md-3">
                  <div class="card custom-card my_card">
                    <img class="card-img-top w-100 bg-danger-transparent" src="{{$value->image_path}}" title="{{$value->name}}" alt="No image found">
                    <div class="card-body">
                      <h4 class="card-title">{{$item->name}}</h4>
                      <p class="card-text">{!!$item->description!!}</p>
                      <a class="a_link" href="#">المزيد<i class="fe fe-arrow-right ml-1"></i></a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              </div>
            </div>
    
          </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3><span>إتصل بنا</span></h3>
          <p>فقط إتصل بنا لإنجاز عملك في اسرع وقت ممكن</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>موقعنا</h3>
              <p>{!!getSetting('address') !!}</p>
              
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>إيميل</h3>
              <p>contact@example.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>هاتف</h3>
              <p>{!!getSetting('phone') !!}</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6 ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d61513.49670964946!2d32.560874981689466!3d15.506280139457465!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x168e8e2fddb8829b%3A0x967a6bfb4ede000c!2z2LPZiNmCINin2YTYs9is2KfZhtip!5e0!3m2!1sar!2s!4v1632315415475!5m2!1sar!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>

          <div class="col-lg-6">
            <form action="{{route('contact')}}"  method="POST" class="custom-form">
              @csrf
              <div class="row">
                <div class="col form-group">
                  {{-- <small id="name_error" class="text-danger"></small> --}}
                  <input type="text" name="name" class="form-control" placeholder="إسمك الكامل" required>
                </div>

                <div class="col form-group">
                  {{-- <small id="name_error" class="text-danger"></small> --}}
                  <input type="text" name="phone" class="form-control" placeholder="رقم تلفونك" required>
                </div>
                
              <div class="form-group">
                {{-- <small id="subject_error" class="text-danger"></small> --}}
                <input type="text" class="form-control" name="subject" id="subject" placeholder="الموضوع" required>
              </div>
              <div class="form-group">
                {{-- <small id="message_error" class="text-danger"></small> --}}
                <textarea class="form-control" id="textarea" name="message" rows="5" placeholder="رسالتك لينا شنو" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">تحميل</div>
                <div class="error-message"></div>
                <div class="sent-message">تم إرسال رسالتك بنجاح</div>
              </div>
              <button type="submit">إرسال</button>

            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <!-- <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div> -->
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>إتصل بنا<span></span></h3>
            <p>
              {!!getSetting('address') !!}
              <br>
              <strong>هاتف:</strong>{!!getSetting('phone') !!}<br>
              <strong>إيميل:</strong>www.systemoheamed168<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>روابط مفيدة</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">الرئيسيه</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">معلومات عنا</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">أعمالنا</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">خدماتنا</a></li> -->
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li> -->
            </ul>
          </div>

          <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>خدماتنا</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#"></a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> -->

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>شبكاتنا الاجتماعية</h4>
            <!-- <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p> -->
            <div class="social-links mt-3">
              {{--  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>  --}}
              <a href="https://www.facebook.com/profile/php?id=100009716526337" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
              {{--  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>  --}}
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; جميع الحقوق محفوظه <strong><span>المنيري</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        صمم بواسطه <a href="https://www.linkedin.com/in/alkhair-abd-elmoneim-1473511b7/" target="a_blank" style="font-weight: bold;">الخير عبدالمنعم</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>

  {{-- toastr message --}}
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

  <script>

    @if (Session::has('message'))
    
        var type="{{ Session::get('alert-type', 'info') }}"
    
        switch(type){
        case 'info':
        toastr.info("{{ Session::get('message') }}");
    
        break;
        case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
        case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
        }
    @endif

      // Trigger NiceScroll
$('body').niceScroll({
    cursorcolor: '#f03',
    cursorwidth: '10px',
    cursorborder: 'none',
    cursorborderradius: '0',
    zindex: '99999999',
    smoothscroll: 'true',
});
</script>

</body>

</html>