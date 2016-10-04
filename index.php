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
  include('database/db_connect.php');
  	$sql = "SELECT firstname, lastname,phone,status,response_id FROM contacts";
	$result = mysqli_query($conn, $sql);

  $json_contacts = file_get_contents("contacts.json");
  		$contacts = json_decode($json_contacts,true);
  // 		echo '<pre>';
  // 		var_dump($contacts);
		// echo '</pre>';
		
   ?>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="col-xs-12">
          <div class="row-fluid">
          <div class="row-fluid">

			<div class="span11">
              	<div id="rootwizard">
					<div class="navbar">
					  <div class="navbar-inner">
					    <div class="container">
					<ul>
					  	<li><a href="#tab1" data-toggle="tab">Contact List</a></li>
						<li><a href="#tab2" data-toggle="tab">View Send Messages</a></li>
					</ul>
					 </div>
					  </div>
					</div>				
					<div class="tab-content">
					    <div class="tab-pane" id="tab1">
					    <table class="table table-striped">
						    <thead>
						      <tr>
						        <th>First Name</th>
						        <th>Last Name</th>
						        <th>Contact Number</th>
						        <th></th>
						      </tr>
						    </thead>
						    <tbody>
						    <?php
						      foreach ($contacts as $key => $value) {
								foreach ($value as $key => $val) {?>
								<form method="post" action="view_contact.php">
						      <tr class="view_contact" data-href="view_contact.php">
						      
						        <td><?php echo $val['firstname'];?></td>
						        <td><?php echo $val['lastname'];?></td>
						        <td><?php echo $val['phone'];?></td>
						        <input type="hidden" id="firstname" name="firstname" value="<?php echo $val['firstname'];?>">
						        <input type="hidden" name="lastname" value="<?php echo $val['lastname'];?>">
						        <input type="hidden" name="phone" value="<?php echo $val['phone'];?>">
						        <td><input type="submit" class="btn btn-info" value="View Details"></td>
						      </tr>
						      </form>
						      <?php }} ?>
						    </tbody>
						  </table>
					    </div>
					    <div class="tab-pane" id="tab2">
					      <table class="table table-striped">
						    <thead>
						      <tr>
						        <th>First Name</th>
						        <th>Last Name</th>
						        <th>Contact Number</th>
						        <th>Status</th>
						        <th>Message Id</th>
						      </tr>
						    </thead>
						    <tbody>
						    <?php
						      while($row = mysqli_fetch_assoc($result)){?>
								<form method="post" action="view_contact.php">
						      <tr class="view_contact" data-href="view_contact.php">
						      
						        <td><?php echo $row['firstname'];?></td>
						        <td><?php echo $row['lastname'];?></td>
						        <td><?php echo $row['phone'];?></td>
						        <td><?php echo $row['status'];?></td>
						        <td><?php echo $row['response_id'];?></td>
						      </tr>
						      </form>
						      <?php } ?>
						    </tbody>
						  </table>
					    </div>
						
					 </div>
					 
				 </div>
             </div><!--/span-->

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
// 		jQuery(document).ready(function($) {
//     $(".view_contact").click(function() {
//     	alert('click');
//         window.document.location = $(this).data("href");
//     });
// });
	});
	</script>
  </body>
</html>
