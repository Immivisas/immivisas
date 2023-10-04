<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="Immigration,studytour,studyabroad,stemcourse,">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />
    <title>Payment &#8211; IVS Solutions</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
	<link rel="stylesheet" href="assets/css/payment.css" title="default">
	<!-- <link rel="stylesheet" href="demo/demo.css">  -->

	<!-- COLORS | CURRENTLY USED DIFFERENTLY TO SWITCH FOR DEMO. IN ORIGINAL FILE ALL COLORS AVAILABLE IN COLORS FOLDER -->
	<link rel="stylesheet" href="assets/css/colors/default.css" title="default">
	<link rel="alternate stylesheet" href="assets/css/colors/default1.css" title="default1">
	<link rel="alternate stylesheet" href="assets/css/colors/default2.css" title="default2">
	<link rel="alternate stylesheet" href="assets/css/colors/default3.css" title="default3">
	<link rel="alternate stylesheet" href="assets/css/colors/default4.css" title="default4">
	<link rel="alternate stylesheet" href="assets/css/colors/default5.css" title="default5">
	<link rel="alternate stylesheet" href="assets/css/colors/default6.css" title="default6">
	<link rel="alternate stylesheet" href="assets/css/colors/default7.css" title="default7">
	<link rel="alternate stylesheet" href="assets/css/colors/default8.css" title="default8">
	<link rel="alternate stylesheet" href="assets/css/colors/default9.css" title="default9">
	<link rel="alternate stylesheet" href="assets/css/colors/default10.css" title="default10">
<!-- WordPress Site Scripts Here -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<!-- WordPress Scrips ENDS -->
</head>

<body class="gray-bg">

    <!-- Start: Preloader
    ============================= -->

    <?php include('top.php'); ?>
        <!-- Navigation End -->

        <!-- Breadcrumb Area -->
        <section id="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Make a Payment</h1>
                       
                    </div>
                </div>
            </div>
        </section>

    </header>
    <!-- End: Header ============================= -->

<!--Content-->
<div class="content_wrapper">
	<div class="container contentbg">
    	<div class="col-md-12 nopdgtopspc">
        	<div class="topContent">
                <div class="col-sm-12">
                    <p style="font-size:16px; margin-bottom:0px;">Thank you for considering IVS Solutions. Fill in the billing information.</p>
               	    <div class="paymentForm paypalform"><br><br>
                        <form name="_xclick" action="" method="post" class='pay' onsubmit="return validateForm()">
                            <input type="hidden" name="cmd" value="_xclick" />
                            <input type="hidden" name="business" value="ivs@immivisas.com" />
                            <input id="CurrecnyCode" type="hidden" name="currency_code" value="INR" />
                            <input type="hidden" name="item_name" value="Payment" />
                            <input id="CountryCode" type="hidden" name="lc" value="en_IN">
                            <div class="form-group cntrow">
                                <p class="col-sm-3">Name</p>
                                <div class="col-sm-9">
                                    <input type="text" name="first_name" value="" placeholder="Name" />
                                </div>
                            </div>
                            <div class="form-group cntrow">
                                <p class="col-sm-3">Phone</p>
                                <div class="col-sm-9">
                                    <input type="text"   maxlength="10" minlength="10" onkeypress="return isNumberKey(event)"  name="contact_phone" value="" placeholder="Phone" />
                                </div>
                            </div>
                            <div class="form-group cntrow">
                                <p class="col-sm-3">Email</p>
                                <div class="col-sm-9">
                                    <input type="text" name="email" value="" placeholder="Email" />
                                </div>
                            </div>
                            <div class="form-group cntrow">
                                <p class="col-sm-9">Select Currency</p>
                                <div class="col-sm-9">
                                    <select id="CurrencyName" name="CurrencyName" class='CurrencyNamer' style="width: 100%;border-radius: 10px;margin-left: -4px;padding: 5px;background: #f5f5f5;border: #ccc solid 1px;">
                                        <option value="INR,en_IN">INR- Indian Rupee</option>
                                        <option value="USD,en_US">USD- United States Dollar</option>
                                        <option value="GBP,en_GB">GBP- Great Britain Pound</option>
                                        <option value="EUR,en_FR">EUR- Euro</option>
                                        <option value="AUD,en_AU">AUD- Australian Dollar</option>
                                        <option value="CAD,en_CA">CAD- Canadian Dollar</option>
                                        <option value="NZD,en_NZ">NZD- Zealand dollar</option>
                                    </select>
                                    <script type="text/javascript">
                                        $("#CurrencyName").change(function () {
                                
                                            var data = $('option:selected', $(this)).val();
                                
                                            var arr = data.split(',');
                                            $('input#CurrecnyCode').val(arr[0]);
                                            $('input#CountryCode').val(arr[1]);
                                            //alert(arr[0] +'&&'+arr[1]);
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="form-group cntrow">
                                <p class="col-sm-3">Amount</p>
                                <div class="col-sm-9">
                                    <input type="text" name="amount" value="" placeholder="00.00" />
                                    
                                </div>
                            </div>
                            <div class="form-group cntrow">
                                <p class="col-sm-3"></p>
                                <div class="col-sm-9">
                                    <input type="image" src="assets/img/fd.gif" style="border:#fff;">
                                </div>
                            </div>                       
                        </form>
                        <!-- form validation -->
                        <script type="text/javascript">
                          function validateForm() {
                            var x = document.forms["_xclick"]["name"].value;
                            if (x == "") {
                                alert("Please enter your name!");
                                return false;
                            }
                            var x = document.forms["_xclick"]["phone"].value;
                            if (x == "") {
                                alert("Please enter your phone number!");
                                return false;
                            }
                            var x = document.forms["_xclick"]["Email"].value;
                            if (x == "") {
                                alert("Please enter your email id!");
                                return false;
                            }
                            var x = document.forms["_xclick"]["amount"].value;
                            if (x == "") {
                                alert("Please enter amount!");
                                return false;
                            }
                        }
                        </script>
                    </div>
                    <div class="col-sm-12">
                        <div class="logocards" style="margin-top:20px;">
                            <img src="assets/img/paypallogo.jpg" alt="Paytm"> 
                        </div>
                    </div>

                    <div class="col-sm-12">
                            <div class="paytmpg" style="margin-top:20px;">
                                <img src="assets/img/paytmlogo1.jpg" alt="Paytm"> 
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
                        
<br>

    <!-- Start: Footer Sidebar
    ============================= -->
   
    <?php include('footer-for-payment-page.php'); ?>

    
    <!-- End: Footer Copyright
    ============================= -->

    <!-- Scripts -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/jquery.shuffle.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>

    <!-- Smooth Scroll -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>

    <!-- Map Script -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqoWGSQYygV-G1P5tVrj-dM2rVHR5wOGY"></script>
    <script src="assets/js/map-script.js"></script> -->

    <!-- Custom Script -->
    <script src="assets/js/custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
     $(document).ready(function(){
  $('.pay').on('submit',function()
 {
    // alert('test');
    $subcat  = $('.CurrencyNamer').val();
    // alert($subcat);
    if($subcat  == 'INR,en_IN')
    {
        
            $('.pay').attr('action','payment/pgRedirect.php')

    }
    else
    {

        $('.pay').attr('action','https://www.paypal.com/us/cgi-bin/webscr')
    }

});

});

</script>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
	<script id="dsq-count-scr" src="https://immivisas-com.disqus.com/count.js" async></script>
	<?php include('footer-script-for-payment-page.php'); ?>



</body>

</html>