<?php
include 'tools/security.php';
admin_only();
?>

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
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" action="create_account_backend.php" method="post">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Create a new account</h3>
		<?php
		if(isset($_GET['msg'])){
			$msg=$_GET['msg'];
			if($msg=="afail1"){

				echo '<div class="alert alert-danger" role="alert">Username field is empty.</div>';
			}
			if($msg=="afail2"){
				echo '<div class="alert alert-danger" role="alert">Email field is empty.</div>';
			}
			if($msg=="afail3"){
                echo '<div class="alert alert-danger" role="alert">Password field is empty.</div>';
            }
			if($msg=="afail4"){
				echo '<div class="alert alert-info" role="alert">Error unable to connect to the database</div>';
			}
			if($msg=="afail5"){
				echo '<div class="alert alert-info" role="alert">Creation failed</div>';
			}
		}
		else{
			echo '<div class="alert alert-primary" role="alert">Please enter the new user information.</div>';
		}
	    ?>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" type="password" required="" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" type="password" required="" placeholder="Confirm">
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="is_admin" ><span class="custom-control-label">Give him admin privilege</a></span>
                    </label>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                </div>
                </div>
            </div>
        </div>
    </form>
</body>

 
</html>
