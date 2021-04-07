<!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->
    
    <!DOCTYPE html>
    <html>
    <head>
    <title>Đơn đặt phòng</title>
    
    <!-- For-Mobile-Apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="E Shop Cart Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Android Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //For-Mobile-Apps -->
    
    <!-- Custom-Theme-Files -->
    <link rel="stylesheet" href="{{asset('public/checkout/css/style.css')}}" type="text/css" media="all" />
    <!-- //Custom-Theme-Files -->
    
    <!-- Remove-Item-JavaScript -->
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script>$(document).ready(function(c) {
            $('.alert-close1').on('click', function(c){
                $('.close1').fadeOut('slow', function(c){
                      $('.close1').remove();
                });
            });	  
        });
        </script>
        <script>$(document).ready(function(c) {
            $('.alert-close2').on('click', function(c){
                $('.close2').fadeOut('slow', function(c){
                      $('.close2').remove();
                });
            });	  
        });
        </script>
        <script>$(document).ready(function(c) {
            $('.alert-close3').on('click', function(c){
                $('.close3').fadeOut('slow', function(c){
                      $('.close3').remove();
                });
            });	  
        });
        </script>
    <!-- //Remove-Item-JavaScript -->
    
    </head>
    
    <!-- Body-Starts-Here -->
    <body>
    
        <h1></h1>
    
        <!-- Content-Starts-Here -->
        <div class="container">
            <?php
                $content = Cart::content();
            ?>
            <!-- Mainbar-Starts-Here -->
            <div class="main-bar">
                <div class="product">
                    <h3>Phòng</h3>
                </div>
                <div class="quantity">
                    <h3>Số ngày ở</h3>
                </div>
                <div class="price">
                    <h3>Giá</h3>
                </div>
                <div class="clear"></div>
            </div>
            <!-- //Mainbar-Ends-Here -->
    
            <!-- Items-Starts-Here -->
            @foreach($content as $valueInfo )
                <div class="items">
        
                    <!-- Item1-Starts-Here -->
                    <div class="item1">
                        <div class="close1">
                            <!-- Remove-Item -->
                            <a href="{{URL::to('/delete-cart/'.$valueInfo->rowId)}}" class="alert-close1">
                                
                            </a><!-- //Remove-Item -->
                            <div class="image1">
                                <img src="{{('public/upload/rooms/'.$valueInfo->options->image)}}" width="70">
                            </div>
                            <div class="title1">
                                <p>{{$valueInfo->name}}</p>
                            </div>
                            <div class="quantity1">
                                <form action="{{URL::to('/update-cart')}}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="{{$valueInfo->qty}}">
                                    <input type="hidden" value="{{$valueInfo->rowId}}" name="rowId_cart"/>
                                    <input type="submit" name="submit" value="Cập nhật"}/>
                                </form>
                            </div>
                            <div class="price1">
                                <p>{{number_format($valueInfo->price).' đ'}}</p>
                            </div>
                            
                            <div class="clear"></div>
                        </div>
                    </div>
                    <!-- //Item1-Ends-Here -->
        
        
                </div>
                <!-- //Items-Ends-Here -->
            @endforeach
                <!-- Total-Price-Starts-Here -->
                <div class="total">
                    <div class="total1">Tổng tiền</div>
                    <div class="total2">{{Cart::subtotal().' đ'}}</div>
                    <div class="clear"></div>
                </div>
                <!-- //Total-Price-Ends-Here -->
            
            <!-- Checkout-Starts-Here -->
            <div class="checkout">
                <div class="discount">
                    <span>Apply Discount Code</span> <input type="text">
                </div>
                <div class="add" >
                    <a  href="{{URL::to('/')}}">Trang chủ</a>
                </div>
                <?php
                    $id   = Session::get('id');
                    if($id!= null) {
                ?>
                    <div class="checkout-btn">
                        <a href="{{URL::to('/checkout')}}">Chấp nhận</a>                       
                    </div>
                    
                <?php
                    } else {
                ?>
                    <div class="checkout-btn">
                        <a href="{{URL::to('/show-login')}}">Chấp nhận</a>
                    </div>  
                <?php
                    }
                ?>
                <div class="clear"></div>
            </div>
            <!-- //Checkout-Ends-Here -->
    
        </div>
        <!-- Content-Ends-Here -->
    
      
    
    </body>
    <!-- Body-Ends-Here -->
    
    </html>