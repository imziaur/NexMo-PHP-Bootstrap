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
  </head>
  <body>
   <?php $message = "Hi. Your OTP is: ".$_POST['rand']; ?>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="col-xs-12">
          <div class="row-fluid">
         	<form method="post" action="status.php">
         		<div class="form-group">
      			<label for="firstname">Name :<span><?php echo $_POST['firstname'].' '.$_POST['lastname'];?></span></label>
      			</div>
      			<div class="form-group">
      			<label for="phone">Phone :<span><?php echo $_POST['phone'];?></span></label>
      			
    			</div>
    			<div class="form-group">
      			<label for="message">Message:(OTP)</label>
      			<textarea class="form-control" rows="5" id="message"><?php echo $message ?></textarea>
      			<input type="hidden" name="fname" value="<?php echo $_POST['firstname'];?>">
      			<input type="hidden" name="lname" value="<?php echo $_POST['lastname'];?>">
      			<input type="hidden" name="phone" value="<?php echo $_POST['phone'];?>">
            <input type="hidden" name="message" value="<?php echo $message;?>">
      			<input type="hidden" name="key" value="<?php echo $_POST['rand'];?>">
      			<br/>
      			<input type="submit" class="btn btn-info" value="Send">
    			</div>
         		
         	</form> 
         </div><!--/span-->
       </div><!--/row-->
      </div>


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
