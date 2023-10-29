<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('./db_connect.php');
ob_start();
if (!isset($_SESSION['system'])) {
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($system as $k => $v) {
		$_SESSION['system'][$k] = $v;
	}
}
ob_end_flush();
?>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>
		<?php echo $_SESSION['system']['name'] ?>
	</title>


	<?php include('./header.php'); ?>
	<?php
	if (isset($_SESSION['login_id']))
		header("location:index.php?page=home");

	?>

</head>
<style>
	body {
		background: url(JU6.jpg);
		background-repeat: no-repeat;
		background-size: cover;
		font-family: Assistant, sans-serif;
		display: flex;
		min-height: 90vh;
	}

	.login {
		color: white;
		background: #136a8a;
		background:
			-webkit-linear-gradient(to right, #08a045, #9fffcb);
		background:
			linear-gradient(to right, #08a045, #9fffcb);
		margin: auto;
		box-shadow:
			0px 2px 10px rgba(0, 0, 1, 0.2),
			0px 10px 20px rgba(0, 0, 1, 0.3),
			0px 30px 60px 1px rgba(0, 0, 1, 0.5);
		border-radius: 8px;
		padding: 50px;
	}

	.login .head {
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.login .head .company {
		font-size: 2.2em;
	}

	.login .msg {
		text-align: center;
	}

	.login .form input[type=text].text {
		border: none;
		background: none;
		box-shadow: 0px 2px 0px 0px white;
		width: 100%;
		color: white;
		font-size: 1em;
		outline: none;
	}

	.login .form .text::placeholder {
		color: #D3D3D3;
	}

	.login .form input[type=password].password {
		border: none;
		background: none;
		box-shadow: 0px 2px 0px 0px white;
		width: 100%;
		color: white;
		font-size: 1em;
		outline: none;
		margin-bottom: 20px;
		margin-top: 20px;
	}

	.login .form .password::placeholder {
		color: #D3D3D3;
	}

	.login .form .btn-login {
		background: none;
		text-decoration: none;
		color: white;
		box-shadow: 0px 0px 0px 2px white;
		border-radius: 3px;
		padding: 5px 2em;
		transition: 0.5s;
	}

	.login .form .btn-login:hover {
		background: white;
		color: dimgray;
		transition: 0.5s;
	}

	.login .forgot {
		text-decoration: none;
		color: white;
		float: right;
	}

	footer {
		position: absolute;
		color: #136a8a;
		bottom: 10px;
		padding-left: 20px;
	}

	footer p {
		display: inline;
	}

	footer a {
		color: green;
		text-decoration: none;
	}

	footer a:hover {
		text-decoration: underline;
	}

	footer .heart {
		color: #B22222;
		font-size: 1.5em
	}
	.btnn {
		background-color: #71cb90;
	}
</style>

<body>


	<section class='login' id='login'>
		<div class='head'>
			<h1 class='company'>JU Alumni Association</h1>
		</div>
		<p class='msg'>Welcome back</p>
		<form id="login-form">
			<div class="form-group">
				<label for="username" class="control-label">Username</label>
				<input type="text" id="username" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label for="password" class="control-label">Password</label>
				<input type="password" id="password" name="password" class="form-control">
			</div>
			<button class="btn-sm btn-block btn-wave col-md-4 btnn">Login</button>
		</form>
		</div>
	</section>





</body>
<script>

	$('#login-form').submit(function (e) {
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'ajax.php?action=login',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success: function (resp) {
				if (resp == 1) {
					location.href = 'index.php?page=home';
				} else {
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>

</html>