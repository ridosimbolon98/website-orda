<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login Admin Samosir Semarang</title>
	<link rel="stylesheet" type="text/css" href="../assets/view/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/view/css/font-awesome.min.css">
	<style type="text/css">
		.form-group{
			margin-left: 33%;
			margin-bottom: 20px;
		}
		input[type="text"],
		input[type="password"]{
		    width: 50%;
		    height: 40px;
		    padding: 0 10px;
		    background: #eeeeee;
		    border:none;
		    color: #808080;
		}

		input[type="submit"]{
			width: 50%;
			height: 40px;
		    list-style: none;
		    padding: 4px 16px;
		    border: 1px solid #33cd77;
		    border-radius: 4px;
		    color: #fff;
		    cursor: pointer;
		    font-size: 15px;
		}
		 
		input[type="submit"]:hover{
		    background: #28a45e;
		    outline: none;
		}
	</style>
</head>
<body class="bg-dark">

	<!--- NAVBAR -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark pt-3 pb-3">
		<div class="container">
		  <a href="index.php" class="navbar-brand">Login Admin Samosir Semarang</a>
		  <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item px-2">
		        <a href="v_anggota.php" class="nav-link">Kembali</a>
		      </li>
		    </ul>
		  </div>
		</div>
	</nav>
	<div class="bg-light pt-3">
		
	</div>

	<!--- FORM LOGIN -->
	<div class="container pt-5 pl-5">
		<div class="row">
			<div class="col-sm-12">
				<div class="card-body">
					<h4 class="text-center text-white">Login Admin</h4>
					<form method="post" action="login_aksi.php">
						<div class="form-group">
							<label class="text-white">Username</label>
							<input class="form-control" type="text" name="username" placeholder="Username" autofocus required>
						</div>
						<div class="form-group ">
							<label class="text-white">Password</label>
							<input class="form-control" type="password" name="password" placeholder="Password" required>
						</div>
						<div class="form-group">
							<input class="form-control btn btn-success" type="submit" name="button" value="LOGIN">
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>

</body>
</html>