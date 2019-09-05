<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php include './tools/navbar.php';?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
	<?php include './tools/left-sidebar.php';?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3 class="text-center">Bramble console</h3>
                            <div class="embed-responsive-16by9">
			<iframe
			<?php
				echo 'src="https://'.$_SERVER["SERVER_ADDR"].':4443/?hostname='.$_SERVER["SERVER_ADDR"].'&username=bramble&password=password" class="embed-responsive-item" width="100%" height="500" id="console_frame" name="console_frame">';
			?>
			<p>
			<?php
			    echo '<a href="https://'.$_SERVER["SERVER_ADDR"].'/?hostname='.$_SERVER["SERVER_ADDR"].'&username=bramble&password=password">';
			?>
			      iframe doesn't work click on this link to access to the console.<i>iframes</i>.
			    </a>
			  </p>
			</iframe>

      <script>
      // Select the email link anchor text
      function clipboard(number) {
        className='.js-command'+number
        var command = document.querySelector(className);
        var range = document.createRange();
        range.selectNode(command);
        window.getSelection().addRange(range);
        try {
          // Now that we've selected the anchor text, execute the copy command
          var successful = document.execCommand('copy');
          var msg = successful ? 'successful' : 'unsuccessful';
          console.log('Copy command was ' + msg);
        } catch(err) {
          console.log('Oops, unable to copy');
        }
        window.getSelection().removeAllRanges();
      };
      </script>


      <div class="list-group">
        <a href="#!" onclick="clipboard(0)" class="list-group-item active"><i class="fas fa-terminal"></i> Open Bramble Software with the following command : <i class="js-command0">sudo bramble</i>
          <footer class="blockquote-footer">Click to copy in the clipboard</footer>
        </a>
        <a target="_blank" rel="noopener noreferrer " href="https://<?php echo 'https://'.$_SERVER["SERVER_ADDR"].':4443/';?>" class="list-group-item list-group-item-action"><i class="fas fa-window-restore"></i> Open in full screen
          <footer class="blockquote-footer">Click here to open in a new window</footer>
        </a>
        <a href="#!" onclick="clipboard(1)" class="list-group-item active"><i class="fas fa-terminal"></i> To have all privilege use the following command : <i class="js-command1">sudo su</i>
          <footer class="blockquote-footer">Click to copy in the clipboard</footer>
        </a>
      </div>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
</body>

</html>
