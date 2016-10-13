<!DOCTYPE html>
<html>
  <head>
    <title>Ziaur Rahaman - project</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Ziaur Rahaman - project">
	<meta name="author" content="Ziaur Rahaman">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
	      body {
	        padding-top: 60px;
	        padding-bottom: 40px;
	      }
	      .sidebar-nav {
	        padding: 9px 0;
	      }
	      .view_contact{
	      	cursor: pointer;
	      }
	    </style>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
  </head>
  <body>
  <?php
  include("database/db_connect.php");
    include ( "lib/NexmoMessage.php" );
    $first_name = mysqli_real_escape_string($conn, $_POST['fname']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $rand_key = mysqli_real_escape_string($conn, $_POST['key']);

    $sql = "INSERT INTO contacts (firstname, lastname, phone,rand_key)
VALUES ('$first_name', '$last_name', '$phone', '$rand_key')";

if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


  /**
   * To send a text message.
   *
   */

  // Step 1: Declare new NexmoMessage.
  $nexmo_sms = new NexmoMessage('XXXXXXXX', 'XXXXXXXXXXXXXXXX');

  // Step 2: Use sendText( $to, $from, $message ) method to send a message. 
  $info = $nexmo_sms->sendText( $_POST['phone'], 'Ziaur Rahaman', $_POST['message']);
   ?>
    <div class="container-fluid">
      
        <div class="col-xs-12">
          <div class="row-fluid">
            <p><?php echo $nexmo_sms->displayOverview($info,$rand_key); ?></p>
            <p>
              <?php 
               ?>
            </p>
         <!-- 	<form>
         		<div class="form-group">
      			<label for="firstname">Name :<span><?php echo $_POST['firstname'];?></span></label>
      			</div>
      			<div class="form-group">
      			<label for="phone">Phone :<span><?php echo $_POST['phone'];?></span></label>
      			
    			</div>
    			<div class="form-group">
      			<label for="message">Message:(OTP)</label>
      			<textarea class="form-control" rows="5" id="message">Hi,</textarea><br/>
      			<input type="submit" name="submit" class="btn btn-info" value="Send">
    			</div>
         		
         	</form> -->
         </div><!--/span-->
       </div><!--/row-->
      


      <hr>

      <footer>
        <p>Created By<a href='http://www.allexamhub.com' target="_blank">Ziaur Rahaman</a></p>
      </footer>

    </div><!--/.fluid-container-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.bootstrap.wizard.js"></script>
  <script>
  $(document).ready(function() {
      $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
      var $total = navigation.find('li').length;
      var $current = index+1;
      var $percent = ($current/$total) * 100;
      $('#rootwizard').find('.bar').css({width:$percent+'%'});
    }});
  </script>
  </body>
</html>
