<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ISI search</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A search tool for ISI journals">
<meta name="author" content="Jorge Villalon">

<!-- Le styles -->
<link href="css/bootstrap.css" rel="stylesheet">
<style type="text/css">
body {
	padding-top: 60px;
	padding-bottom: 40px;
}
</style>
<link href="css/bootstrap-responsive.css" rel="stylesheet">


</head>

<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse"> <span class="icon-bar"></span> <span
					class="icon-bar"></span> <span class="icon-bar"></span>
				</a> <a class="brand" href="#">ISI search</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<form class="well" action="upload.php" method="POST"
		enctype="multipart/form-data">
		<legend>Update Master Journal List</legend>
		<label class="control-label" for="inputFile">MJL file</label>
		<div class="fileupload fileupload-new" data-provides="fileupload">
			<div class="input-append">
				<div class="uneditable-input span3">
					<i class="icon-file fileupload-exists"></i> <span
						class="fileupload-preview"></span>
				</div>
				<span class="btn btn-file"><span class="fileupload-new">Select file</span><span
					class="fileupload-exists">Change</span><input
					style="position: absolute;" type="file" name="file"/> </span><a href="#"
					class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
			</div>
		</div>
		<label class="control-label" for="inputPassword">Password</label> <input
			type="password" id="inputPassword" placeholder="Password" name="clave">
			<p></p>
		<button type="submit" class="btn btn-primary">Save</button>
		<button type="button" class="btn"
			onclick="window.location.replace('index.php');">Cancel</button>
	</form>
	<!-- Le javascript
================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>
