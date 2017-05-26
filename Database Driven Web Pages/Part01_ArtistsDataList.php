<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>Artist Data List Page</title>

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
              <input class="form-control" type="text" placeholder="Search" name="search">
              <button class="btn btn-info" type="submit" name="searchSubmit">Search</button>
        </form>
    </ul>
  </div>
</nav>  
</head>

<body>
<p><h2>Artists Data List (Part 1)</h2></p>
<?php
$connection = mysqli_connect('localhost', 'root', '', 'art');
mysqli_set_charset($connection,"utf8"); 
$records= mysqli_query($connection, 'SELECT * FROM artists order by LastName');
while ($rows= $records-> fetch_assoc()) 
  {
      $id= $rows['ArtistID'];
      echo '<a href="Part02_SingleArtist.php?id='.$id.'">'.$rows['FirstName'].' '.$rows['LastName'].' ('.$rows['YearOfBirth'].'-'.$rows['YearOfDeath'].') </a><br>';
  }
?>
</body>
</html>