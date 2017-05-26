<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Single Artist Page</title>
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
	      <input class="form-control" type="text" placeholder="Search" name="search">
	      <button class="btn btn-info" type="submit" name="searchSubmit">Search</button>
		</form>
	</ul>
</div>
</nav>  
</head>

<body>
<?php
echo '<link rel="stylesheet" type="text/css" href="project3.css">';
$connection = new mysqli("localhost", "root", "", "art");
mysqli_set_charset($connection,"utf8"); 
$id=$_GET['id'];
if ($connection->connect_error)
{
    die("Connection failed: " . $connection->connect_error);
}
mysqli_set_charset($connection,"utf8");   
$sql="SELECT firstname, lastname, details, yearofbirth, yearofdeath, nationality, artistLink FROM artists WHERE artistid=$id";
$result = $connection->query($sql);           
if ($result->num_rows > 0) 
{
      while($row = $result->fetch_assoc())
       {
       $artistName=$row['firstname'].' '.$row['lastname'];
       $artistTenure=($row['yearofbirth'].' - '.$row['yearofdeath']);
        $artistNationality=$row['nationality'];
        $details= $row['details'];
        $artistLink=$row['artistLink'];
      	
                                  
                   echo '<div class="person1" > 
                            <h1>'.$artistName.'</h1>
                            <img src="images/art/artists/medium/'.$id.'.jpg" class="img-thumbnail"/>
                          </div>
                           
                         <div class="dvArtistDetails">
                            <table><tr><td>'.$details.'</td></tr>
                            <tr><td> </td></tr>
                            <td><br></td> 
                                <tr><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default btn-sm;text-primary">
          <span class="glyphicon glyphicon-heart"></span> Add to Favorites List
        </button></th></tr>
                            <td><br></td>
                                <tr><table class="tbArtistDetails"><tr><th colspan="2">Artist  Details</th></tr>
                                    <tr><td>Date</td>
                                        <td>'.$artistTenure.'</td></tr>
                                        <tr><td>Nationality</td>
                                            <td>'.$artistNationality.'</td>    
                                        </tr>
                                        <tr>
                                            <td>More Info:</td>
                                            <td><a href="'.$artistLink.'">'.$artistLink.'</a></td>
                                        </tr>
                                </table></tr>
                                </table></div>';                          
                   echo '<h4 class="hdArtistName">'.'Art By '.$artistName.'</h4>';      
                }
} 
else 
{
        include("Error.php");
}             
$sql="SELECT b.title artwork_title, b.yearofwork year_of_work, b.imagefilename imagefile, b.artworkid workid from artists a, artworks b where a.artistid=b.artistid and a.artistid=$id";
$result = $connection->query($sql);
if ($result->num_rows > 0)
 {
    while($row = $result->fetch_assoc()) 
    {
        $imageId=$row["imagefile"];
        $artwork_title=$row["artwork_title"];
        $year_of_work=$row["year_of_work"];                
                    echo '<div class="artistDiv col-md-3" align="center"><img src="images/art/works/square-thumbs/'.$imageId.'.jpg" class="img-thumbnail"/>'.'<p>'
                         .'<a href="Part03_SingleWork.php?id=' .$row['workid'] . '">'.$artwork_title.' ,'.$year_of_work.'</a></p><a href="Part03_SingleWork.php?id=' .$row['workid']  . '"class="btn btn-info btn-sm"><span class="glyphicon glyphicon-info-sign"></span> View</a>'
                    	.'&nbsp'.'<a href="#" class="btn btn-info btn-success btn-sm"><span class="glyphicon glyphicon-gift"></span> Wish</a>'
                    	.'&nbsp'.'<a href="#" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
                    	</div>';                    
    }
} 
else
{
        include("Error.php");
}            
$connection->close();                       
?> 
</body>
</html>