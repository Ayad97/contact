
<?php
/*check if user coming from request*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //assign var
       $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
       $email= filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
       $call = filter_var($_POST['call-phone'],FILTER_SANITIZE_NUMBER_INT);
       $text = filter_var($_POST['message'],FILTER_SANITIZE_STRING);

       //creating array for erroers

       $formErrors = array();

       if (strlen($user) < 3) {
           $formErrors[] = "Username Can't Be Less Than<strong> 3 Chars</strong>";
       }

       if (strlen($user) > 20) {
           $formErrors[] = "Username Can't Be Larger Than<strong> 20 Chars</strong>";
       }

        if (strlen($text) < 10) {
           $formErrors[] = "Your Message Can't Be Less Than<strong> 10 Chars</strong>";
       }

        if (empty($email)) {
           $formErrors[] = "Your Email Can't Be  <strong>Empty</strong>";
       }

       if (empty($call)) {
           $formErrors[] = "Your Cell Phone Can't Be  <strong>Empty</strong>";
       }
       //if no errors send email [mail(to, subject,massage, header, prametars)]
       $headers = 'From :' . $email . '\r\n';
       $to     = 'azzdataa@yahoo.com';
       $subject= 'Contact Form';
       $message = $text;
       if (empty($formErrors)) {

          mail($to, $subject, $message, $headers);
          $user = '';
          $email = '';
          $call = '';
          $text = '';
          $success = '<div class="alert alert-success">We Have Your Message Now.</div>';
       }
        

}   

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Form</title>
	<!-- Optional theme bootstrapcdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<!-- CSS  UI-->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/contact.css">
    <!-- Latest compiled and minified JavaScript -->
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- JQUERY  UI-->
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->
    </head>
    <body>
    <!--start Form-->
        <div class="container">
            <h1 class="text-center">Contact Me</h1>
            <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
               
                <?php if (isset($formErrors)) { ?> 
                <?php   
                           foreach ($formErrors as  $ERRORS) {
                           echo '<div class="text-center alert alert-danger alert-dismissible" role="alert">';
                           echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                           echo     '<span aria-hidden="true">&times;</span>';
                           echo '</button>';
                           echo  "<strong >". $ERRORS ."</strong><br>";
                           echo "</div>"; 
                         } ?>

                          
                <?php }
                  if (isset($success)) {
                    echo $success ;
                  }
                ?>

                <div class="form-group">
                    <input class=" username form-control" pattern=".{3,10}" title="Username Must Be Between 3 & 10 Chars"  required type="text" name="username" placeholder="Type Your Username" value="<?php if (isset($user)) {echo $user;}?>">
                    <i class="fa fa-user fa-fw"></i>
                    <span class="astrisc">*</span>
                    <div class="alert alert-danger custom-alert">
                          Username Must Be Larger Than <strong>2 Chars</strong>
                    </div>
                </div>


                <div class="form-group">
                     <input class="email form-control" type="email" name="email" placeholder="Valid Email" required value="<?php if (isset($email)) {echo $email;}?>">
                     <i class="fa fa-envelope fa-fw"></i>
                     <span class="astrisc">*</span>
                     <div class="alert alert-danger custom-alert">
                           Email Can't Be <strong>Empty</strong>
                     </div>
                </div>

                <input class="form-control" type="tel" name="call-phone" placeholder="Cell Phone" value="<?php if (isset($email)) {echo $call;}?>">
                <i class="fa fa-phone fa-fw"></i>
                <div>
                    <textarea class="text form-control" minlength="10" name="message" placeholder="Your Message" required><?php if (isset($text)) {echo $text;}?></textarea>
                     <div class="alert alert-danger custom-alert">
                           Message Can't Be Less Than <strong>10 Cars</strong>
                     </div>
                </div>
                

                <input class="sendBtn btn btn-success" type="submit"  value='Send Massage'  >
                <i class="fa fa-send send-i fa-fw"></i>
                

            </form>

        </div>
    <!--end Form-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="js/contact.js"></script>

    </body>
</html>


