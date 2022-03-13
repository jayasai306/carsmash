<?php
/*
 * Title: Facemash Script
 * Author: TheBlackParade / [https://www.wemod.com/members/theblackparade/](https://www.wemod.com/members/theblackparade/)
 * Version: 1.0
 * 
 * [https://www.wemod.com](https://www.wemod.com/)
 * Performance rating = [(Total of opponents' ratings + 400 * (Wins - Losses)) / score].
 */
include('mysql.php');
include('functions.php');
 
// Get random 2
$query="SELECT * FROM images ORDER BY RAND() LIMIT 0,2";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_object($result)) {
 $images[] = (object) $row;
}
 
 
// Close the connection
mysqli_close($con);
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "[http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd](http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd)">
<html xmlns="[http://www.w3.org/1999/xhtml](http://www.w3.org/1999/xhtml)">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facemash</title>
<style type="text/css">
body, html {font-family:Arial, Helvetica, sans-serif;width:100%;margin:0;padding:0;text-align:center;}
h1 {background-color:orange;color:#fff;padding:20px 0;margin:0;}
a img {border:0;}
td {font-size:11px;}
.image {background-color:#eee;border:0px solid #ddd;border-bottom:1px solid #bbb;padding:5px;}
#m {color:blue; font-family:cursive; font-size:30px;}
</style>
</head>
<body>
 
<h1>FaceMash</h1>
<h3>Were we let in for our looks? No. Will we be judged on them? Yes.</h3>
<h2>Who's hotter? Click to choose.</h2>
<center>
<table>
 <tr>
  <td valign="top" class="image"><a href="rate.php?winner=<?=$images[0]->image_id?>&loser=<?=$images[1]->image_id?>"><img src="images/<?=$images[0]->filename?>" height="300" width="300" /></a></td>
  <td id="m">vs</td>
  <td valign="top" class="image"><a href="rate.php?winner=<?=$images[1]->image_id?>&loser=<?=$images[0]->image_id?>"><img src="images/<?=$images[1]->filename?>" height="300" width="300"/></a></td>
 </tr>
 <tr>
 <td colspan="2" ><?php echo $images[0]->filename?></td>
 <td> <?php echo $images[1]->filename?></td>
 </tr>
 <tr>
  <td colspan="2">Won: <?=$images[0]->wins?>, Lost: <?=$images[0]->losses?></td>
  <td >Won: <?=$images[1]->wins?>, Lost: <?=$images[1]->losses?></td>
 </tr>
 <tr >
  <td colspan="2">Score: <?=$images[0]->score?></td>
  
  <td >Score: <?=$images[1]->score?></td>
 </tr>
 
</table>
</center>
</body>
</html>