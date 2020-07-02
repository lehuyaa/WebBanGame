<!DOCTYPE html>

    
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>GoodGames | Community and Store HTML Game Template</title>

    <meta name="description" content="GoodGames - Bootstrap template for communities and games store">
    <meta name="keywords" content="game, gaming, template, HTML template, responsive, Bootstrap, premium">
    <meta name="author" content="_nK">

    <link rel="icon" type="image/png" href="{{asset('public/assets/images/favicon.png')}}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- FontAwesome -->
    <script defer src="{{asset('public/assets/vendor/fontawesome-free/js/all.js')}}"></script>
    <script defer src="{{asset('public/assets/vendor/fontawesome-free/js/v4-shims.js')}}"></script>

    <!-- IonIcons -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/ionicons/css/ionicons.min.css')}}">

    <!-- Flickity -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/flickity/dist/flickity.min.css')}}">

    <!-- Photoswipe -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendor/photoswipe/dist/photoswipe.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendor/photoswipe/dist/default-skin/default-skin.css')}}">

    <!-- Seiyria Bootstrap Slider -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/bootstrap-slider/dist/css/bootstrap-slider.min.css')}}">

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendor/summernote/dist/summernote-bs4.css')}}">

    <!-- GoodGames -->
    <link rel="stylesheet" href="{{asset('public/assets/css/goodgames.css')}}">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{asset('public/assets/css/custom.css')}}">
    
    <!-- END: Styles -->

    <!-- jQuery -->
    <script src="{{asset('public/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    
    
</head>


<!--
    Additional Classes:
        .nk-page-boxed
-->
<body>
    
        



<!--
    Additional Classes:
        .nk-header-opaque
-->
<header class="nk-header nk-header-opaque">

    
    
<!-- START: Top Contacts -->
<div class="nk-contacts-top">
    <div class="container">
        <div class="nk-contacts-left">
            
        </div>
        <div class="nk-contacts-right">
            <ul class="nk-contacts-icons">
                
                
                <?php
                                    
                    $user_id = Session::get('user_id');
                    if ($user_id!=NULL) {
                ?>
                <li>
                    <a href="{{URL::to('/logout-checkout')}}" >
                        <span class="fa fa-sign-out" aria-hidden="true"></span>
                    </a>
                </li>
                <?php
                    }
                ?>
                
            </ul>
        </div>
    </div>
</div>
<!-- END: Top Contacts -->

    

    <!--
        START: Navbar

        Additional Classes:
            .nk-navbar-sticky
            .nk-navbar-transparent
            .nk-navbar-autohide
    -->
    <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
        <div class="container">
            <div class="nk-nav-table">
                
                <a href="{{URL::to('/')}}" class="nk-nav-logo">
                    <img src="{{asset('public/assets/images/logo.png')}}" alt="GoodGames" width="199">
                </a>
                
                <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">
                    
        
        
                <li>
            <a href="{{URL::to('/admin')}}">
                Admin
                
            </a>
        </li>
       <!--  <li>
            <a href="gallery.html">
                Thư Viện Ảnh
                
            </a>
        </li> -->
        







        <?php
            $user_id = Session::get('user_id');
            $ship_id = Session::get('ship_id');
                                    
            
            if ($user_id==NULL) {
        ?>
        <li>
            <a href="{{URL::to('/login-checkout')}}">
                Đăng Nhập
                
            </a>
        </li>
        <?php
            }
        ?>
         

        <li class=" nk-drop-item">
            <a href="{{URL::to('/')}}">
                Cửa Hàng
                
            </a><ul class="dropdown">
                        
        <li>
            <a href="{{URL::to('/')}}">
                Cửa Hàng
                
            </a>
        </li>
        
        <li>
            <a href="{{URL::to('/all-game-user')}}">
                Tất Cả Sản Phẩm
                
            </a>
        </li>
        <?php
            $user_id = Session::get('user_id');
            $ship_id = Session::get('ship_id');
                                    
            
            if ($user_id==NULL) {
        ?>
        <li>
            <a href="{{URL::to('/login-checkout')}}">
                Thủ Tục Thanh Toán
                
            </a>
        </li>
       
        <?php
            }else if($user_id!=NULL && $ship_id == NULL){
        ?>
       <li>
            <a href="{{URL::to('/checkout')}}">
                Thủ Tục Thanh Toán
                
            </a>
        </li>
        <?php
            }else if($user_id!=NULL && $ship_id != NULL){
        ?>
        <li>
            <a href="{{URL::to('/payment')}}">
                Thủ Tục Thanh Toán
                
            </a>
        </li>
        <?php
            }
        ?>
        <li>
            <a href="{{URL::to('/show-cart')}}">
                Giỏ Hàng
                
            </a>
        </li>
                    </ul>
        </li>

        
        <?php
            $user_id = Session::get('user_id');
            $ship_id = Session::get('ship_id');
                                    
            
            if ($user_id!=NULL) {
        ?>

        <li class=" nk-drop-item">
            <a href="{{URL::to('/')}}">
                <?php
                    $user_name = Session::get('name');
                        if ($user_name) {
                            echo $user_name;
                        }
                ?>
                
            </a><ul class="dropdown">
                        
        <li>
            <a href="{{URL::to('/manager-order-user')}}">
                Lịch Sử Mua Hàng                
            </a>
        </li>
        
        <li>
            <a href="{{URL::to('/logout-checkout')}}">
                Đăng Xuất
                
            </a>
        </li>
        
                    </ul>
        </li>
        <?php
            }
        ?>
                </ul>
                <ul class="nk-nav nk-nav-right nk-nav-icons">
                    
                        <li class="single-icon d-lg-none">
                            <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                            </a>
                        </li>
                    
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- END: Navbar -->

</header>

    
    
        <!--
    START: Navbar Mobile

    Additional Classes:
        .nk-navbar-left-side
        .nk-navbar-right-side
        .nk-navbar-lg
        .nk-navbar-overlay-content
-->
<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
    <div class="nano">
        <div class="nano-content">
            <a href="index.html" class="nk-nav-logo">
                <img src="assets/images/logo.png" alt="" width="120">
            </a>
            <div class="nk-navbar-mobile-content">
                <ul class="nk-nav">
                    <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END: Navbar Mobile -->

    

    <div class="nk-main">
        
            <!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">
        
        
        <li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
        
        
        <li><span class="fa fa-angle-right"></span></li>
        
        
        
        
        
        
        <li><span>Chi Tiết Đơn Hàng</span></li>
        
    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->

        

        
<div class="container">
    <div class="nk-store nk-store-cart">
        <div class="table-responsive">

            <!-- START: Products in Cart -->
            <table class="table nk-store-cart-products">
                <tbody>
                       
						@foreach($order_by_id as $o_by_id)
                        <tr>
                            <td class="nk-product-cart-thumb">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$o_by_id->Book_id)}}" class="nk-image-box-1 nk-post-image">
                                    <img src="{{asset('public/uploadimage/'.$o_by_id->Book_image)}}" alt="However, I have reason" width="115">
                                </a>
                            </td>
                            <td class="nk-product-cart-title">
                                <h5 class="h6">Sản Phẩm:</h5>
                                <div class="nk-gap-1"></div>

                                <h2 class="nk-post-title h4">
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$o_by_id->Book_id)}}">{{$o_by_id->Book_name}}</a>
                                </h2>
                            </td>
                            <td class="nk-product-cart-price">
                                <h5 class="h6">Giá:</h5>
                                <div class="nk-gap-1"></div>

                                <strong>{{number_format($o_by_id->Book_price).' '.'VNĐ'}}</strong>
                            </td>
                            <td class="nk-product-cart-quantity">
                                <h5 class="h6">Số Lượng:</h5>
                                <div class="nk-gap-1"></div>
                                <strong>{{$o_by_id->Book_quantity}}</strong>
                            </td>
                            <td class="nk-product-cart-total">
                                <h5 class="h6">Đơn Giá:</h5>
                                <div class="nk-gap-1"></div>

                                <?php
										$subtotal = $o_by_id->Book_price * $o_by_id->Book_quantity;
										echo number_format($subtotal).' '.'VNĐ';
									?>
                            </td>
                            
                        </tr>
                    	@endforeach
                        
                    
                </tbody>
            </table>
            <!-- END: Products in Cart -->

        </div>
        <div class="nk-gap-1"></div>
        <!-- <a class="nk-btn nk-btn-rounded nk-btn-color-white float-right" href="#">Update Cart</a> -->

        <div class="clearfix"></div>
        <div class="nk-gap-2"></div>
        <div class="row vertical-gap">
            <div class="col-md-6">

              

            </div>
            <div class="col-md-6">
                
            </div>
        </div>
       
    </div>
</div>

<div class="nk-gap-2"></div>


        
            <!-- START: Footer -->
<footer class="nk-footer">

    <div class="container">
        <div class="nk-gap-3"></div>
        <div class="row vertical-gap">
            <div class="col-md-6">
               
            </div>
            
        </div>
        <div class="nk-gap-3"></div>
    </div>

    <div class="nk-copyright">
        
    </div>
</footer>
<!-- END: Footer -->

        
    </div>

    

    
        <!-- START: Page Background -->

    <img class="nk-page-background-top" src="{{asset('public/assets/images/bg-top.png')}}" alt="">
    <img class="nk-page-background-bottom" src="{{asset('public/assets/images/bg-bottom.png')}}" alt="">
<!-- END: Page Background -->
    

    
        <!-- START: Search Modal -->
<div class="nk-modal modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0">Search</h4>

                <div class="nk-gap-1"></div>
                <form action="#" class="nk-form nk-form-style-1">
                    <input type="text" value="" name="search" class="form-control" placeholder="Type something and press Enter" autofocus>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Search Modal -->
    

    
        <!-- START: Login Modal -->
<div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0"><span class="text-main-1">Đăng Nhập</span></h4>

                <div class="nk-gap-1"></div>
                <form action="{{URL::to('/login-user')}}" class="nk-form text-white" method="POST">
                	{{ csrf_field() }}
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            Nhập Email Và Mật Khẩu Đăng Nhập:

                            <div class="nk-gap"></div>
                            <input type="email" value="" name="email_account" class=" form-control" placeholder="Email">

                            <div class="nk-gap"></div>
                            <input type="password" value="" name="password_account" class="required form-control" placeholder="Password">
                        </div>
                        
                    </div>

                    <div class="nk-gap-1"></div>
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            <a href="" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Đăng Nhập</a>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="mnt-5">
                                <small><a href="#">Không Có Tài Khoản ? Đăng Ký</a></small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- END: Login Modal -->

    

    
<!-- START: Scripts -->

<!-- Object Fit Polyfill -->
<script src="{{asset('public/assets/vendor/object-fit-images/dist/ofi.min.js')}}"></script>

<!-- GSAP -->
<script src="{{asset('public/assets/vendor/gsap/src/minified/TweenMax.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js')}}"></script>

<!-- Popper -->
<script src="{{asset('public/assets/vendor/popper.js/dist/umd/popper.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('public/assets/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Sticky Kit -->
<script src="{{asset('public/assets/vendor/sticky-kit/dist/sticky-kit.min.js')}}"></script>

<!-- Jarallax -->
<script src="{{asset('public/assets/vendor/jarallax/dist/jarallax.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/jarallax/dist/jarallax-video.min.js')}}"></script>

<!-- imagesLoaded -->
<script src="{{asset('public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>

<!-- Flickity -->
<script src="{{asset('public/assets/vendor/flickity/dist/flickity.pkgd.min.js')}}"></script>

<!-- Photoswipe -->
<script src="{{asset('public/assets/vendor/photoswipe/dist/photoswipe.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/photoswipe/dist/photoswipe-ui-default.min.js')}}"></script>

<!-- Jquery Validation -->
<script src="{{asset('public/assets/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>

<!-- Jquery Countdown + Moment -->
<script src="{{asset('public/assets/vendor/jquery-countdown/dist/jquery.countdown.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/moment/min/moment.min.js')}}"></script>
<script src="{{asset('public/assets/vendor/moment-timezone/builds/moment-timezone-with-data.min.js')}}"></script>

<!-- Hammer.js -->
<script src="{{asset('public/assets/vendor/hammerjs/hammer.min.js')}}"></script>

<!-- NanoSroller -->
<script src="{{asset('public/assets/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js')}}"></script>

<!-- SoundManager2 -->
<script src="{{asset('public/assets/vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js')}}"></script>

<!-- Seiyria Bootstrap Slider -->
<script src="{{asset('public/assets/vendor/bootstrap-slider/dist/bootstrap-slider.min.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('public/assets/vendor/summernote/dist/summernote-bs4.min.js')}}"></script>

<!-- nK Share -->
<script src="{{asset('public/assets/plugins/nk-share/nk-share.js')}}"></script>

<!-- GoodGames -->
<script src="{{asset('public/assets/js/goodgames.min.js')}}"></script>
<script src="{{asset('public/assets/js/goodgames-init.js')}}"></script>
<!-- END: Scripts -->



    
</body>
</html>
