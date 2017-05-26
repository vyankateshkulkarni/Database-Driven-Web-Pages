<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>Single Work Page</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="project3.css">
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
$connection = mysqli_connect('localhost', 'root', '', 'art');
mysqli_set_charset($connection,"utf8"); 
$art1Id= $_GET["id"];            
if ($connection->connect_error) 
{
die("Connection failed: " . $connection->connect_error);
}
mysqli_set_charset($connection,"utf8");   
$sql="SELECT  date_format(date(datecreated),'%m/%d/%y') orderdate FROM orders WHERE OrderID IN(SELECT orderid FROM orderdetails WHERE ArtWorkID=$art1Id)";
$result = $connection->query($sql);
echo '<div class="dvSales"><table class="tbSales"><tr><th>Sales</br></th></tr><tr><td>'; 
if($result->num_rows>0)
{
    while($row = $result->fetch_assoc())
    {
    echo '</br><a href="#">'.$row['orderdate'].'</a></br>'; 
    }
    echo '</td></tr></table></div>';
}
else
{                    
echo 'No Sales'.'</br></tr></table></div>';
}
$sql1="SELECT a.title, b.artistid artistid, b.firstname firstname, b.lastname lastname, a.imagefilename imagefile, a.yearofwork work_year, a.description details, round(a.msrp,2) cost, a.medium paint_medium, a.width width, a.height height, a.originalhome home FROM artworks a, artists b WHERE a.artworkid=$art1Id
  AND a.artistid=b.artistid";
$result1 = $connection->query($sql1);
if ($result1->num_rows > 0) 
{
  while($row = $result1->fetch_assoc()) 
    {
      $artistName=$row['firstname'].' '.$row['lastname'];
      $imageId=$row["imagefile"];
      $dimensions=$row['width'].'cm'.' x '.$row['height'].'cm';
      $artistId=$row['artistid'];
      $title=$row['title'];
      $workYear=$row['work_year'];
      $details=$row['details'];
      $cost=$row['cost'];
      $paintMedium=$row['paint_medium'];
      $home=$row['home'];
            echo '<h3>'.$row['title'].'</h3></br><p>By '.'<a href="Part02_SingleArtist.php?id='.$artistId.'">'.$artistName.'</a></p>';
            echo '<img src="images/art/works/square-medium/'.$imageId.'.jpg" data-toggle="modal" data-target="#myModal" width="350px" height="380px" class="modalImg"/>
            
            <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">    
            
            <div class="modal-content">
            <div class="modal-header">
            <p><b>'.$title.' ('.$workYear.' ) '.'by '.$artistName.'</b></p>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            <img src="images/art/works/square-medium/'.$imageId.'.jpg" width="480px" height="480px"/>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            </div>
            </div>';

            echo '<div class="dvArtWorkDetails"><p>'.$details.'</p><p class="pcost">$'.$cost.'</p><div><a href="#" class="btn  btn-default btn-sm"><span class="glyphicon glyphicon-gift"></span>Add to Wish List</a><a href="#" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-shopping-cart"></span>Add to Shopping Cart</a></div><br><table class="tbProductDetails"><tr><th class="thProductDetails" colspan="2">Product Details</th></tr><tr><td>Date:</td><td>'.$workYear.'</td></tr><tr><td>Medium:</td><td>'.$paintMedium.'</td></tr><tr><td>Dimensions:</td><td>'.$dimensions.'</td></tr><tr><td>Home:</td><td>'.$home.'</td></tr>';
    }
$sql1="SELECT b.genrename genrename FROM artworkgenres a, genres b WHERE a.artworkid=$art1Id AND a.genreid=b.genreid";   
$result1 = $connection->query($sql1); 
echo '<tr><td>Genres:</td><td>';
  if ($result1->num_rows > 0)
  {
    while($row = $result1->fetch_assoc()) 
    {
      echo '<a href="#">'.$row['genrename'].'</a><br/>';
    }
      echo '</td></tr>';
  }                     
} else 
{
include("Error.php");
}  
$sql2="SELECT b.subjectname subjectname FROM artworksubjects a, subjects b WHERE a.subjectid=b.subjectid AND a.artworkid=$art1Id";
$result2 = $connection->query($sql2);
echo '<tr><td>Subjects:</td><td>';
if($result2->num_rows>0)
{
    while($row=$result2->fetch_assoc())
      {
      echo '<a href="#">'.$row['subjectname'].'</a></br>';
      }
      echo'</td></tr></table></div>';
}
else
{
include("Error.php");
}  
$connection->close();             
?>        
</html>