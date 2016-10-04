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
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="col-xs-12">
          <div class="row-fluid">
          	<form method="post" action="send_message.php">
					    		<h2><?php echo $_POST['firstname'].' '.$_POST['lastname']; ?></h2>
					    		<input type="hidden" name="firstname" value="<?php echo $_POST['firstname'];?>">
					    		<input type="hidden" name="lastname" value="<?php echo $_POST['lastname'];?>">
					    		<h3><?php echo $_POST['phone'];?></h3>
					    		<input type="hidden" name="phone" value="<?php echo $_POST['phone'];?>">
					    		<input type="hidden" name="rand" value="<?php echo rand(100000,999999); ?>">
					    		<input type="submit" class="btn btn-info" value="Send Message">
					    	</form>
			
           </div><!--/row-->
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
