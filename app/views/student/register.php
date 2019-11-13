<?php require_once VIEWS.DS.'templates/public/header.php'?>
</head>
<body>

	<div class="jumbotron">
		<div class="text-center">
			<h3>TEST PAGE</h3>

			<article class="container">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</article>
		</div>

		<form method="post" action="/student/register">
			<legend>Student Information</legend>
			<div class="form-group">
				<label>Student Name</label>
				<input type="text" name="" placeholder="Student Name">
			</div>
		</form>


	</div>
<?php require_once VIEWS.DS.'templates/public/footer.php'?>

