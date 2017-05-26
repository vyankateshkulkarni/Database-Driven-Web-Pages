<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <title>Search Page</title>
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
        <button class="btn btn-info" type="submit" name="searchSubmit" >Search</button>

</head>
<body>
  </form>
  </ul>
  
  </div>
  </nav>  

<form action="" class="form form-horizontal" method="POST" role="form" novalidate="novalidate">
<div class="container">
  <h2>Search Results:</h2>
  
</script>
  <form>
  <script type="text/javascript">
    function ShowHideDiv1() {
        var optradio1 = document.getElementById("optradio1");
        var filterByTitle = document.getElementById("FilterByTitle");
        var filterByDescription = document.getElementById("FilterByDescription");
        filterByTitle.style.display = optradio1.checked ? "block" : "none";
        filterByDescription.style.display = 'none';

    }
    function ShowHideDiv2() {
        var optradio2 = document.getElementById("optradio2");
        var filterByDescription = document.getElementById("FilterByDescription");
        var filterByTitle = document.getElementById("FilterByTitle");
        filterByDescription.style.display = optradio2.checked ? "block" : "none";
        filterByTitle.style.display = 'none';
    }
    function ShowHideDiv3() {
        var optradio3 = document.getElementById("optradio3");
        var noFilter = document.getElementById("NoFilter");
        var filterByTitle = document.getElementById("FilterByTitle");
        var filterByDescription = document.getElementById("FilterByDescription");
        noFilter.style.display = 'none';
        filterByDescription.style.display = 'none';
        filterByTitle.style.display = 'none';
    }
</script>
<div class="container">
<div class="jumbotron col-md-12">
    <div class="radio col-md-10">
      <label for="optradio1"><input type="radio" id="optradio1" name="optradio" onclick="ShowHideDiv1()" value="checked"<?php  
      if(isset($_GET['searchSubmit']))
        {echo "checked";}?>>Filter By Title </label>
      <div  class="form-group field-account-individual " >
            <label class="col-md-1 control-label" for="FilterByTitle"></label>

            <div   class="col-md-12" >
                <input class="form-control" data-val="true" data-val-requiredif="Filter By Title is required" data-val-requiredif-dependentproperty="IsFilterByTitle" data-val-requiredif-targetvalue="False" id="FilterByTitle" name="FilterByTitle" type="text" 
                value="<?php 
                $connection = mysqli_connect('localhost', 'root', '', 'art');
                if(isset($_GET["search"]))
                  {
                    $getId= $_GET["search"]; 
                     echo htmlentities($getId);
                  }
                ?>" <input type="radio" id="optradio1" name="optradio" onclick="ShowHideDiv1()" value="checked">
                <span class="field-validation-valid help-block" data-valmsg-for="FilterByTitle" data-valmsg-replace="true"></span>
            </div>
        </div>
    </div>
   
   <div class="radio col-md-10">
      <label><input type="radio" name="optradio" id="optradio2" onclick="ShowHideDiv2()" >Filter By Description </label>
       <div  class="form-group field-account-individual " >
            <label class="col-md-1 control-label" for="IsFilterByDescription"></label>
            <div class="col-md-12">
                <input class="form-control" data-val="true" data-val-requiredif="Filter By Description is required." data-val-requiredif-dependentproperty="IsFilterByDescription" data-val-requiredif-targetvalue="False" id="FilterByDescription" name="FilterByDescription" type="text" value="">
                <span class="field-validation-valid help-block" data-valmsg-for="IsFilterByDescription" data-valmsg-replace="true"></span>
            </div>
        </div>
    </div>
    <div class="radio col-md-10">
      <label><input type="radio" name="optradio" id="optradio3" onclick="ShowHideDiv3()" >No filter(Show All Art Works)</label>
               <div class="form-group field-account-individual ">
            <label class="col-md-1 control-label" for="NoFilter"></label>
            <div class="col-md-12">
                <input class="form-control" data-val="true" data-val-requiredif="No filter is required." data-val-requiredif-dependentproperty="IsNoFilter" data-val-requiredif-targetvalue="False" id="NoFilter" name="NoFilter" type="text" value="">
                <span class="field-validation-valid help-block" data-valmsg-for="NoFilter" data-valmsg-replace="true"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
            <div class="col-md-3">
                <input type="submit" value="Filter" class="btn btn-lg-1 btn-primary" id="filter"><br>
            </div>  
    </div>
</form> 
</div>
</div>
<script type="text/javascript">

$("#filter").click(function(){

 var  filterByTitle=$("#FilterByTitle").val();
 var  filterByDescription=$("#FilterByDescription").val();
 var  noFilter=$("#NoFilter").val();
document.cookie= "filterByTitle="+filterByTitle;
document.cookie= "filterByDescription="+filterByDescription;
document.cookie= "noFilter="+noFilter;
});
</script>
<?php
echo '<link rel="stylesheet" type="text/css" href="project3.css">';
$connection = mysqli_connect('localhost', 'root', '', 'art');
mysqli_set_charset($connection,"utf8"); 

 if (isset($_POST['optradio'])) 
 {
  $filterByTitle=$_COOKIE["filterByTitle"];
$filterByDescription=$_COOKIE["filterByDescription"];
$noFilter=$_COOKIE["noFilter"];
  if(isset($_POST['FilterByTitle']))
    {
      if($_POST['FilterByTitle']!=null){
        $sql= "SELECT Title, Description, ArtWorkID FROM artworks where Title like '%".$filterByTitle."%'";
        $records= mysqli_query($connection,$sql);
        while($rows= $records-> fetch_assoc())
              {
                 $id=$rows["ArtWorkID"];
                 echo '<br>'.'<a href="Part03_SingleWork.php?id='.$id.'">'.$rows['Title'].'</a><br>';
              }
            }
            
    }
   if(isset($_POST['FilterByDescription']))
    {
        if($_POST['FilterByDescription']!=null){  
        $sql= "SELECT Title, Description, ArtWorkID, ImageFileName FROM artworks where Title like '%".$filterByDescription."%'";
        $records= mysqli_query($connection,$sql);
        while($rows= $records-> fetch_assoc())
              {
                $imageId=$rows["ImageFileName"];
                 $id=$rows["ArtWorkID"];
                 $description = $rows['Description'];
                 $keyword = $filterByDescription;
                 echo '<br><br><a href="Part03_SingleWork.php?id='.$id.'"><img class="searchImg" src="images/art/works/square-medium/'.$imageId.'.jpg"  width="100px" height="100px"/></a>';
                 echo '<a href="Part03_SingleWork.php?id='.$id.'">'.$rows['Title'].'</a>'.'<div class="dvSearch"><br><br>';
                 echo str_ireplace($keyword, '<span class="spnKeyword">'.$keyword.'</span>', $description.'</div><br>');
              }
            }
    }
      if(($_POST['FilterByDescription']==null) && ($_POST['FilterByTitle']==null)){
        $sql= "SELECT Title, Description, ArtWorkID, ImageFileName FROM artworks";
        $records= mysqli_query($connection,$sql);
        while($rows= $records-> fetch_assoc())
              {
                 $id=$rows["ArtWorkID"];
                 $imageId=$rows["ImageFileName"];
                $description = $rows['Description'];
                $keyword = $noFilter;
                echo '<br><br><a href="Part03_SingleWork.php?id='.$id.'"><img class="searchImg" src="images/art/works/square-medium/'.$imageId.'.jpg"  width="100px" height="100px"/></a>';
                echo '<a href="Part03_SingleWork.php?id='.$id.'">'.$rows['Title'].'</a><br>'.'<div class="dvSearch"><br><br>';
                echo str_ireplace($keyword, '<span class="spnKeyword">'.$keyword.'</span>', $description.'</div><br>'); 
              }       
             }
    } 
    else{
      echo "<h3>Please select any radio button and then filter your results</h3>";
    }
?>
</body>
</html>