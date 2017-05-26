<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>Home Page</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<nav class="navbar navbar-inverse" role="navigation">
<div class="container-fluid">
    <ul class="nav navbar-nav">
		<li><a class="navbar-brand">Assign 1</span></a></li>
		<li class="active"><a href="Default.php">Home</a></li>
		<li><a href="about.php">About us</a></li>    
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pages<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="Part01_ArtistsDataList.php">Artists Data List (Part 1)</a></li>
				<li><a href="Part02_SingleArtist.php?id=19">Single Artsist (Part 2)</a></li>
				<li><a href="Part03_SingleWork.php?id=394">Single Work (Part 3)</a></li>
				<li><a href="Part04_Search.php">Search (Part 4)</a></li>
			</ul>
		</li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<form class="form-inline float-lg-right navbar-brand" action="Part04_Search.php" method="GET" >Vyankatesh Manohar Kulkarni 
	      	<input class="form-control" type="text" placeholder="Search Paintings" name="search">
	      	<button class="btn btn-info" type="submit" name="searchSubmit" >Search</button>
		</form>
	</ul>
	
</div>
</nav>  
</head>

<body>
	<div class="container">
		<div class="jumbotron">
			<h1>Welcome to Assignment #3</h1>
			<h2>Database Driven Web Pages</h2>
			<h4>This is the third assignment for Vyankatesh Kulkarni for COMP 5335</h4>	
		</div>
		<div class="row">
			<div class="col-md-2">
				<h3><span class="glyphicon glyphicon-info-sign"></span> About us</h3>
				<p>What this is all about and other stuff</p>
				<a href="about.php" class="btn btn-danger"><span class="glyphicon glyphicon-link"></span> Visit Page</a> 
			</div>
			<div class="col-md-2">
				<h3><span class="glyphicon glyphicon-list"></span> Artist List</h3>
				<p>Displays a list of artist names as links</p>
				<a href="Part01_ArtistsDataList.php" class="btn btn-danger"><span class="glyphicon glyphicon-link"></span> Visit Page</a> 
			</div>
			<div class="col-md-2">
				<h3><span class="glyphicon glyphicon-user"></span> Single Artist</h3>
				<p>Displays information for a single artist</p>
				<a href="Part02_SingleArtist.php?id=19" class="btn btn-danger"><span class="glyphicon glyphicon-link"></span> Visit Page</a> 
			</div>
			<div class="col-md-2">
				<h3><span class="glyphicon glyphicon-picture"></span> Single Work</h3>
				<p>Displays information for a single work</p>
				<a href="Part03_SingleWork.php?id=394" class="btn btn-danger"><span class="glyphicon glyphicon-link"></span> Visit Page</a> 
			</div>
			<div class="col-md-2">
				<h3><span class="glyphicon glyphicon-search"></span> Search</h3>
				<p>Perform search on ArtWorks tables</p>
				<a href="Part04_Search.php" class="btn btn-danger"><span class="glyphicon glyphicon-link"></span> Visit Page</a> 
			</div>
		</div>
	</div>
</body>
</html>