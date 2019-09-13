<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Wifi</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->

	<?php include 'tools/navbar.php';?>

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
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Wifi </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/index.php" class="breadcrumb-link">Bramble</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Wifi</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- wifi  -->
                    <!-- ============================================================== -->


                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                            <div class="section-block">
                                <div class="accrodion-regular">
                                    <div id="accordion4">
                                        <h3 class="section-title">Reachable Wifi <a class="btn badge-dark float-right" href="/wifi.php"><i class="fa fa-sync"></i>
Refresh</a></h3>
                                        <br/>
                        <?php
                        $int=shell_exec('sudo iw dev wlan0 scan | grep "SSID:\|signal:"');
                        $i=0;
                        foreach(preg_split("/((signal:))/", $int) as $line){
                            $i=$i+1;
                            //<-40 perfect, <-50 excellent, <-60 good, <-70 medium, <-80 Unreliable, <-90 too low
			    			if(empty($line)|| strlen($line)==1){
			    				continue;
			    			}
							if(preg_match("/((SSID: ))/",$line)!=1){
								echo "error :";
								echo $line;
								continue;
							}
                            list($signal, $ssid) = explode("SSID: ", $line, 2);
                            if(empty($ssid) || strlen($ssid)==1) continue;

                            $signal = preg_replace('~\D~', '', $signal);
                            $signal = (int)$signal/100;
                            $badge="";
                            if($signal < 40){
                                $signal="perfect";
                                //echo '<div class="card bg-success">';
                                $badge='<span class="badge badge-success float-right">Signal quality : Perfect</span>';
                            }
                            elseif ($signal < 50) {
                                $signal="excellent";
                                //echo '<div class="card bg-success">';
                                $badge='<span class="badge badge-success float-right">Signal quality : Excellent</span>';
                            }
                            elseif ($signal < 60) {
                                $signal="good";
                                // echo '<div class="card bg-primary">';
                                $badge='<span class="badge badge-primary float-right">Signal quality : Good</span>';
                            }
                            elseif ($signal < 70) {
                                $signal="medium";
                                // echo '<div class="card bg-info">';
                                $badge='<span class="badge badge-info float-right">Signal quality : Medium</span>';
                            }
                            elseif ($signal < 80 ) {
                                $signal="unreliable";
                                // echo '<div class="card bg-warning">';
                                $badge='<span class="badge badge-warning float-right">Signal quality : Unreliable</span>';
                            }
                            elseif ($signal < 90 ) {
                                $signal="too low";
                                // echo '<div class="card bg-danger">';
                                $badge='<span class="badge badge-danger float-right">Signal quality : Really bad</span>';
                            }
                            echo '<div class="card bg-light">';
                            $name="collapse$i";
                            echo '<div class="card-header '.$name.'">
                                    <h5 class="mb-0">
                                       <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#'.$name.'" aria-expanded="false" aria-controls="'.$name.'">
                                         <span class="fas fa-angle-down mr-3"></span>'.$ssid.'
                                     </button>'.$badge.'</h5>
                                </div>';
                            echo '<div id="'.$name.'" class="collapse" aria-labelledby="headingEleven" data-parent="#accordion4">
                                    <div class="card-body">

                                            <h5 class="card-header">Connection Form</h5>
                                            <div class="card-body">
                                                <form action="#" id="'.$name.'" data-parsley-validate="">
                                                    <div class="form-group">
                                                        <label for="inputPassword'.$i.'">Wifi Password</label>
                                                        <input id="inputPassword'.$i.'" type="password" placeholder="Wifi password" required="" class="form-control">
                                                    </div>
                                                    <button class="btn btn-space btn-light" onclick="display_password('.$i.')" id="disp'.$i.'">Display password</button>
                                                    <div class="row">
                                                        <div class="col-sm-6 pl-0">
                                                            <p class="text-right">
                                                                <button type="submit" class="btn btn-space btn-dark">Connect</button>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                </div>';
                            echo '</div>';
                            //echo "$ssid : $signal";

                            //echo "<p>$line</p>";
                        }
                        echo '</div></div></div></div>';
                        ?>
                    </div>

                    <script>
                    function display_password(i) {
                      var x = document.getElementById("inputPassword"+i);
                      var y = document.getElementById("disp"+i);
                      if (x.type === "password") {
                        x.type = "text";
                        y.innerHTML = "Hide password";
                      } else {
                        x.type = "password";
                        y.innerHTML = "Display password";
                      }
                    }
                    </script>
                    <!-- ============================================================== -->
                    <!-- end wifi  -->
                    <!-- ============================================================== -->

                            <!-- ============================================================== -->
                            <!-- end sales traffice country source  -->
                            <!-- ============================================================== -->
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
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
</body>

</html>
