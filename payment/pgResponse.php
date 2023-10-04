<?php
session_start();
// print_r($_POST);
extract($_SESSION);
// print_r($order);
// print_r($_SESSION);
// print_r($_SESSION['detail']);
// exit();
 $eemail = $_SESSION['detail']['email'];
 $phn = $_SESSION['detail']['contact_phone'];
 $name = $_SESSION['detail']['first_name'];
 $amount = $_SESSION['detail']['amount'];
// echo $_SESSION["order"];
// echo $_SESSION["order"]['email'];
?>


<html>
  <head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    
<body style="background-color: #e6effd;">
<?php

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
include 'phpmailer/PHPMailerAutoload.php';
include ('phpmailer/class.phpmailer.php');

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
 $orderid = $_POST['ORDERID'];
 $txtid =  $_POST["TXNID"];
$txtamount=  $_POST["TXNAMOUNT"];
$txtcu =  $_POST["CURRENCY"];
$txtdate =  $_POST["TXNDATE"];
$txtstutus=  $_POST["STATUS"];
$txtgetway =  $_POST["GATEWAYNAME"];
$txtbank =  $_POST["BANKNAME"];
// $txtid =  $_POST["TXNID"];


$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	 "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		
    $mail = new PHPMailer();
    // $mail->SMTPDebug = 1;                                 // Enable verbose debug output
     $mail->isSMTP();
     // $mail->Host = "localhost";                                     // Set mailer to use SMTP
     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
     $mail->SMTPAuth = true;                               // Enable SMTP authentication
     $mail->Username = 'payment.ivssolutions@gmail.com';                 // SMTP username
     $mail->Password = 'dtrooxnhdtmzzmck';                              // SMTP password
     $mail->SMTPSecure = 'ssl';
     $mail->SMTPConnect(
         array(
             "ssl" => array(
                 "verify_peer" => false,
                 "verify_peer_name" => false,
                 "allow_self_signed" => true
             )
         )
     );                           // Enable TLS encryption, `ssl` also accepted
     $mail->Port = 465;
 $mail->AddAddress("payment.ivssolutions@gmail.com","Immivisas");
 $mail->SetFrom($eemail, $name);
 $mail->isHTML(true);
 // $mail->AddReplyTo("hareshjambucha.bca@gmail.com","Haresh");
 $mail->Subject  = "Payment to IVS Solutions is $txtstutus";
 $mail->Body     = "<table  style='border-collapse: collapse; width: 100%;'>
   
 <tr>
 <td>
                                                     <p style='margin: 0;'>Name: $name</p>
                                                     <p style='margin: 0;'>Email: $eemail</p>
                                                    
                                                     <p style='margin: 0;'>Phn NO: $phn</p>
                                                     <p style='margin: 0;'>TXNID NO: $txtid</p>
                                                     <p style='margin: 0;'>Amount: $txtamount</p>
                                                     <p style='margin: 0;'>Date : $txtdate</p>
                                                     <p style='margin: 0;'>Stuts: $txtstutus</p>
                                                     <p style='margin: 0;'>BANK GETWAY NO: $txtgetway</p>
                                                     <p style='margin: 0;'>Bank Name: $txtbank</p>
                                                     </td>
                                                     </tr>
                                                     </table>";
 $mail->WordWrap = 50;
 if(!$mail->Send()) {
  'Message was not sent.';
  'Mailer error: ' . $mail->ErrorInfo;
 } else {
  'Message has been sent.';
 }
    
		

  if($eemail!='')
  {
	
            $mail = new PHPMailer();
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();
            // $mail->Host = "localhost";                                     // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'payment.ivssolutions@gmail.com';                 // SMTP username
            $mail->Password = 'dtrooxnhdtmzzmck';                              // SMTP password
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                )
            );                           // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;
        $mail->AddAddress($eemail,$name);
        $mail->SetFrom('payment.ivssolutions@gmail.com', 'IVS Solutions');
        $mail->isHTML(true);
        // $mail->AddReplyTo("hareshjambucha.bca@gmail.com","Haresh");
        $mail->Subject  = "Payment to IVS Solutions is $txtstutus";
        $mail->Body     = "<table  style='border-collapse: collapse; width: 100%;'>
          
        <tr>
        <td>
                                                            <p style='margin: 0;'>Name: $name</p>
                                                            <p style='margin: 0;'>Email: $eemail</p>
                                                            
                                                            <p style='margin: 0;'>Phn NO: $phn</p>
                                                            <p style='margin: 0;'>TXNID NO: $txtid</p>
                                                            <p style='margin: 0;'>Amount: $txtamount</p>
                                                            <p style='margin: 0;'>Date : $txtdate</p>
                                                            <p style='margin: 0;'>Stuts: $txtstutus</p>
                                                            <p style='margin: 0;'>BANK GETWAY NO: $txtgetway</p>
                                                            <p style='margin: 0;'>Bank Name: $txtbank</p>
                                                            </td>
                                                            </tr>
                                                            </table>";
        $mail->WordWrap = 50;
        if(!$mail->Send()) {
          'Message was not sent.';
           'Mailer error: ' . $mail->ErrorInfo;
        } else {
          'Message has been sent.';
        }

	 
  }
		
		?>

<div class="container ">
    <div class="card" style='margin: 78px; background-color: #e6effd;
  
    border:1px solid rgb(230 239 253);' >
      <div class="card-body">
        <div class="row d-flex justify-content-center pb-5">
          <div class="col-md-7 col-xl-5 mb-4 mb-md-0" style='border-radius: 26px;background-color:white;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;'>
      </br>
          <div style="border-radius:200px; height:66px; font-size: 40px; width:66px;background-image: linear-gradient(#07c9b2, #20d697); margin:0 auto; text-align: center; color:white;">
               <center> <i class="checkmark">✓</i></center>
               </div>
               <br>
                <h3 style='text-align: center; color:20d697'>Payment successful!</h3> 
                <p style='color:gray'>Transaction No : <?php echo $txtid; ?></p>
                <hr>
                <br>
                <br>
                <div class=" rounded d-flex flex-column">
           
                <div class="p-2 d-flex">
                    <div class="col-8" style='color:gray' ><b>Amount Paid</b></div>
                    <div class="ml-auto"><?php echo $txtamount;?> </div>
                </div>
                <div class="p-2 d-flex">
                    <div class="col-8" style='color:gray'><b>Bank</b></div>
                    <div class="ml-auto" style='color:gray'><?php echo $txtbank;?></div>
                </div>
                <div style='text-align:center;'>
                    <a href='https://immivisas.com/'> <input type="button" value="Continue" class="btn  " style='color:white;font-weight: 700;font-size:17px;padding: 7px 90px; background-image: linear-gradient(#07c9b2, #20d697);'></a>
                </div>
               <br>
            </div>

          </div>

          <div class="col-md-5 col-xl-4 offset-xl-1">
            <img src='payment-done.png'>
          </div>
        </div>
      </div>
    </div>
  </div>
		
		  <?php
		//  "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	 }
	else {
	    	// $emaill='nakranimanushree888@gmail.com';
        $mail = new PHPMailer();
        // $mail->SMTPDebug = 1;                                 // Enable verbose debug output
         $mail->isSMTP();
         // $mail->Host = "localhost";                                     // Set mailer to use SMTP
         $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
         $mail->SMTPAuth = true;                               // Enable SMTP authentication
         $mail->Username = 'payment.ivssolutions@gmail.com';                 // SMTP username
         $mail->Password = 'dtrooxnhdtmzzmck';                              // SMTP password
         $mail->SMTPSecure = 'ssl';
         $mail->SMTPConnect(
             array(
                 "ssl" => array(
                     "verify_peer" => false,
                     "verify_peer_name" => false,
                     "allow_self_signed" => true
                 )
             )
         );                           // Enable TLS encryption, `ssl` also accepted
         $mail->Port = 465;
     $mail->AddAddress("payment.ivssolutions@gmail.com","IVS Solutions");
     $mail->SetFrom($eemail, $name);
     $mail->isHTML(true);
     // $mail->AddReplyTo("hareshjambucha.bca@gmail.com","Haresh");
     $mail->Subject  = "Payment to IVS Solutions is $txtstutus";
     $mail->Body     = "<table  style='border-collapse: collapse; width: 100%;'>
       
     <tr>
     <td>
                                                         <p style='margin: 0;'>Name: $name</p>
                                                         <p style='margin: 0;'>Email: $eemail</p>
                                                        
                                                         <p style='margin: 0;'>Phn NO: $phn</p>
                                                         <p style='margin: 0;'>TXNID NO: $txtid</p>
                                                         <p style='margin: 0;'>Amount: $txtamount</p>
                                                         <p style='margin: 0;'>Date : $txtdate</p>
                                                         <p style='margin: 0;'>Stuts: $txtstutus</p>
                                                         <p style='margin: 0;'>BANK GETWAY NO: $txtgetway</p>
                                                         <p style='margin: 0;'>Bank Name: $txtbank</p>
                                                         </td>
                                                         </tr>
                                                         </table>";
     $mail->WordWrap = 50;
     if(!$mail->Send()) {
      'Message was not sent.';
      'Mailer error: ' . $mail->ErrorInfo;
     } else {
      'Message has been sent.';
     }
        


     if($eemail!='')
     {
     
               $mail = new PHPMailer();
              //  $mail->SMTPDebug = 2;                                 // Enable verbose debug output
               $mail->isSMTP();
               // $mail->Host = "localhost";                                     // Set mailer to use SMTP
               $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
               $mail->SMTPAuth = true;                               // Enable SMTP authentication
               $mail->Username = 'payment.ivssolutions@gmail.com';                 // SMTP username
               $mail->Password = 'dtrooxnhdtmzzmck';                              // SMTP password
               $mail->SMTPSecure = 'ssl';
               $mail->SMTPConnect(
                   array(
                       "ssl" => array(
                           "verify_peer" => false,
                           "verify_peer_name" => false,
                           "allow_self_signed" => true
                       )
                   )
               );                           // Enable TLS encryption, `ssl` also accepted
               $mail->Port = 465;
           $mail->AddAddress($eemail,$name);
           $mail->SetFrom('payment.ivssolutions@gmail.com', 'IVS Solutions');
           $mail->isHTML(true);
           // $mail->AddReplyTo("hareshjambucha.bca@gmail.com","Haresh");
           $mail->Subject  = "Payment to IVS Solutions is $txtstutus";
           $mail->Body     = "<table  style='border-collapse: collapse; width: 100%;'>
             
           <tr>
           <td>
                                                               <p style='margin: 0;'>Name: $name</p>
                                                               <p style='margin: 0;'>Email: $eemail</p>
                                                               
                                                               <p style='margin: 0;'>Phn NO: $phn</p>
                                                               <p style='margin: 0;'>TXNID NO: $txtid</p>
                                                               <p style='margin: 0;'>Amount: $txtamount</p>
                                                               <p style='margin: 0;'>Date : $txtdate</p>
                                                               <p style='margin: 0;'>Stuts: $txtstutus</p>
                                                               <p style='margin: 0;'>BANK GETWAY NO: $txtgetway</p>
                                                               <p style='margin: 0;'>Bank Name: $txtbank</p>
                                                               </td>
                                                               </tr>
                                                               </table>";
           $mail->WordWrap = 50;
           if(!$mail->Send()) {
             'Message was not sent.';
              'Mailer error: ' . $mail->ErrorInfo;
           } else {
             'Message has been sent.';
           }
   
      
     }


		?>
<div class="container ">
    <div class="card" style='margin: 78px; background-color: #e6effd;
  
    border:1px solid rgb(230 239 253);' >
      <div class="card-body">
        <div class="row d-flex justify-content-center pb-5">
          <div class="col-md-7 col-xl-5 mb-4 mb-md-0" style='border-radius: 26px;background-color:white;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;'>
      </br>
          <div style="border-radius:200px; height:66px; font-size: 40px; width:66px;background-image: linear-gradient(#c90707, #edc3c3); margin:0 auto; text-align: center; color:white;">
          <center> <i class="checkmark">☓</i></center>
               </div>
               <br>
                <h3 style='text-align: center; color:#c90707'>Payment Fail!</h3> 
                <p style='color:gray'>Transaction No : <?php echo $txtid; ?></p>
                <hr>
                <br>
                <br>
                <div class=" rounded d-flex flex-column">
           
                <div class="p-2 d-flex">
                    <div class="col-8" style='color:gray' ><b>Amount Paid</b></div>
                    <div class="ml-auto"><?php echo $txtamount;?> </div>
                </div>
                <div class="p-2 d-flex">
                    <div class="col-8" style='color:gray'><b>Bank</b></div>
                    <div class="ml-auto" style='color:gray'><?php echo $txtbank;?></div>
                </div>
                <div style='text-align:center;'>
                    <a href='https://immivisas.com/make-a-payment.php'> <input type="button" value="Try Again" class="btn  " style='color:white;font-weight: 700;font-size:17px;padding: 7px 90px; background-image: linear-gradient(#c90707, #edc3c3);'></a>
                </div>
      </br>
            </div>

          </div>

          <div class="col-md-5 col-xl-4 offset-xl-1">
            <img src='payment-done.png'>
          </div>
        </div>
      </div>
    </div>
  </div>
		  <?php

		 "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		
		 foreach($_POST as $paramName => $paramValue) {
			 "<br/>" . $paramName . " = " . $paramValue;
		}
     
		
	 }

	// $order["transaction_id"] = $paramList["TXNID"];
	// $order["payment_mode"] = $paramList["PAYMENTMODE"];
	// $order["order_date"] = $paramList["TXNDATE"];
	// $orderid = $paramList["ORDERID"];
	
    

// print_r($order);

	// extract($order);
	

	// $order_details = serialize($details);

    if($paramList["STATUS"] == "TXN_SUCCESS") {
		// $SQL = "INSERT INTO contacts(customer_id,order_id,amount,payment,transaction_id,name,email,password, mobile,mobile_two,country,city,pincode,address,uniqno,plan_id) VALUES
		// ('$cuid','$orderid ','$amount','Successful','$transaction_id','$name','$email','$pass','$mobile','$mobile','$country','$city','$pincode','$address','$uniqno','$plan_id')";
		// mysqli_query($con, $SQL) or die(mysqli_error($con));
		
		// unset($_SESSION["order"]);
		
        // header("Location: ../");
        

// 		if(isset($_SESSION["userId"])) {
// 			header("Location: ../index.php");
// 		} else {
// 			header("Location: ../order-details.php?oid=$order_id");
// 		}
	} else {
		header("Location: ../make-a-payment.php?error=Order could not be processed. Place order again.");
	}

}
else {
	header("Location: ../make-a-payment.php?error=Order could not be processed. Place order again.");
}

?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          
        </body>
</html>