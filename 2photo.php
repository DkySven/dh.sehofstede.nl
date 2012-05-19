<?php
$title = " | Photos";
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'header.php';
include 'connect.php';
?>
<div id="foto">

<?
$qImg = 'SELECT `img`, `title`, `desc` FROM `images` WHERE img_id=' . rand(1, 5) . ';';
$rImg = mysql_query( $qImg );
if (!$rImg) {
	die('Invalid query: ' . mysql_error());
}
$aImg = mysql_fetch_assoc( $rImg );
echo '<h1>' . $aImg['title'] . '</h1> <br /> <img src="' . $aImg['img'] . '" alt="A random image" width="600"/> <br />' . $aImg['desc'];
?>
<p>
		For more pictures, see my <a href="http://www.flickr.com/photos/dirkheineh">photostream</a>.
		</p>
</div>
	</body>

</html>
