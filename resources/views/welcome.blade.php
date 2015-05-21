<html>
	<head>
		<title>Laravel</title>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<style>
			@import url(http://weloveiconfonts.com/api/?family=fontawesome);
			/* ---------- ERIC MEYER'S RESET CSS ---------- */
			/* ---------- http://meyerweb.com/eric/tools/css/reset/ ---------- */
			@import url(http://meyerweb.com/eric/tools/css/reset/reset.css);
			/* ---------- FONTAWESOME ---------- */
			[class*="fontawesome-"]:before {
			font-family: 'FontAwesome', sans-serif;
			}
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #161693;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}
			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}
			.content {
				text-align: center;
				display: inline-block;
			}
			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}
			.quote {
				font-size: 24px;
				margin-bottom: 40px;
			}
			a {
			color: #eee;
			text-decoration: none;
			}
			a:hover {
			text-decoration: underline;
			}
		</style>
		<script>
			$(document).ready(function () {
				$("button").click(function () {
					$(".pop").fadeIn(300);
					positionPopup();
					});
					$(".pop > span").click(function () {
					$(".pop").fadeOut(300);
				});
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Welcome to TODO	</div>
				<div class="quote">Simple web solution for todo list</div>
				<style>
					button {
						background: #20b9a4;
						display: block;
						margin: 0 auto;
						margin-bottom: 20px;
						width: 200px;
						font-size: 16.996px;
						line-height: 20px;
						padding: 12px 18px 13px;
						-webkit-border-radius: 6px;
						-moz-border-radius: 6px;
						-ms-border-radius: 6px;
						-o-border-radius: 6px;
						border-radius: 6px;
						-webkit-transition: all .3s ease-in-out;
						-moz-transition: all .3s ease-in-out;
						transition: all .3s ease-in-out;
						color: #ffffff;
						cursor: pointer;
					}
					button:hover {
						opacity: 0.8;
						-webkit-transition: all .3s ease-in-out;
						-moz-transition: all .3s ease-in-out;
						transition: all .3s ease-in-out;;
					}
					.pop {
						display: none;
						position: fixed;
						top: 10.3%;
						left: 10.3%;
						width: 50%;
						height: 50%;
						margin-left: 14.5%;
						margin-top: 5%;
						background: #ffffff;
						-webkit-border-radius: 6px;
						-moz-border-radius: 6px;
						-ms-border-radius: 6px;
						-o-border-radius: 6px;
						border-radius: 6px;
						outline: 10px solid rgba(0, 0, 0, .1);
					}
					.pop > h1 {
						padding: 30px 30px 10px 30px;
						color: white;
						font-size: 30px;
						font-weight: 700;
						background: #3b4148;
					}
					.pop > div {
						padding-left: 30px;
						font-size: 100%;
						background: #3b4148;
					}
					.pop > span {
						cursor: pointer;
						position: absolute;
						top: 4%;
						right: 4%;
						-webkit-border-radius: 100px;
						-moz-border-radius: 100px;
						border-radius: 100px;
						background: #cccccc;
						color: #ffffff;
						padding: 6px 0px 0px 9px;
						width: 30px;
						height: 30px;
					}
					#login {
						width: 280px;
						height: 100%;
						margin-left: 27%;
					}
					#login form span {
						margin: 10px 0;
						background-color: #363b41;
						border-radius: 3px 0px 0px 3px;
						color: #606468;
						display: block;
						float: left;
						height: 50px;
						line-height: 50px;
						text-align: center;
						width: 50px;
					}
					#login form input {
						height: 50px;
					}
					#login form input[type="text"], input[type="password"], input[type="email"] {
						margin: 10px 0;
						background-color: #3b4148;
						border-radius: 0px 3px 3px 0px;
						color: #606468;
						margin-bottom: 1em;
						padding: 0 16px;
						width: 230px;
					}
					#login form input[type="submit"] {
						margin: 10px 0;
						border-radius: 3px;
						-moz-border-radius: 3px;
						-webkit-border-radius: 3px;
						background-color: #ea4c88;
						color: #eee;
						font-weight: bold;
						margin-bottom: 2em;
						text-transform: uppercase;
						width: 280px;
					}
					#login form input[type="submit"]:hover {
						background-color: #d44179;
					}
					#login > p {
						text-align: center;
						color: white;
						font-size: 20px;
						font-weight: 700;
						margin-top: 10px;
					}
					#login > p span {
						padding-left: 5px;
					}
				</style>
				<button class="reg">Getting Started</button>
				<div class="pop">
					<span>✖</span>
					<h1>Login</h1>
					<hr>
					<div id="container">
						<div id="login">
							<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<div class="col-md-6">
										<span class="fontawesome-user"></span><input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-6">
										<span class="fontawesome-lock"></span><input type="password" class="form-control" name="password" placeholder="Password">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-6 col-md-offset-4">
										<input type="submit" class="btn btn-primary" value="Login"></input>
										<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
									</div>
								</div>
							</form>
							<p>Not a member? <a href="{{ url('/auth/register') }}">Sign up now</a><span class="fontawesome-arrow-right"></span></p>
							</div> <!-- end login -->
						</div>
					</div>
				</body>
			</html>