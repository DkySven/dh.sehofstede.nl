<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'share/connect.php';

if (isset($_POST["nextid"])) {
	$nextvar = $_POST["nextid"];
} else {
	$nextvar = 1;
}

//desc needs the `, because it is also a sql command. (stupid me) Should fix the column name asap.
$qImg = 'SELECT img, title, `desc`, tag FROM images WHERE img_id=' . $nextvar;
$rImg = mysql_query( $qImg );
if (!$rImg) {
	die('Invalid query: ' . mysql_error());
}
$aImg = mysql_fetch_assoc( $rImg );

//Find the max img_id
$qMax = 'SELECT max(img_id) FROM images';
$rMax = mysql_query( $qMax );

if (!$rMax) {
	die('Invalid query: ' . mysql_error());
}
$aMax = mysql_fetch_row($rMax);

$simp = $aMax[0] - $nextvar;

//Calculation of the arguments used in the tumbnail for()
if ($nextvar < 3) {
	$aforvar =  1;
} elseif ($simp < 2) {
	$aforvar = $nextvar - 4 + $simp;
} else {
	$aforvar = $nextvar - 2;
}

if ($simp < 2) {
	$bforvar = $simp;
} elseif ($nextvar <= 2) {
	$bforvar = 5 - $nextvar;
} else {
	$bforvar = 2;
}

//html starts here
$title = "| Photos";
include 'share/header.php';
?>

	<div id="tumb">

<?
// The php code to set the tumbnails
for ($workvar = $aforvar; $workvar <= ($nextvar + $bforvar); $workvar++) {

	if ($nextvar == $workvar) {
		echo '<p> <img src="' . $aImg['img'] . '" alt="' .$aImg['tag'] . '" width="70" /> </p>';
	} else {
		$qTum = 'SELECT img, title, `desc`, tag FROM images WHERE img_id=' . $workvar;
		$rTum = mysql_query( $qTum );
		if (!$rTum) {
			die('Invalid query ($qTum): ' . mysql_error());
		}
		$aTum = mysql_fetch_assoc( $rTum );

		echo "<p> 
		<script type=\"text/javascript\">
		var jvar$workvar = $workvar - $nextvar ;
		document.write(jvar);
		</script>
		<a href=\"#\" onClick=\"javascript:knoppen.nextid.value = parseInt(knoppen.nextid.value) + jvar$workvar; knoppen.submit();\">
		<img src=\"" . $aTum['img'] . '" alt="' .$aTum['tag'] . '" width="60" />
		</a>
	 	</p>';
	}

}

?>
	</div>


	<div id="foto">

<?
echo '<h1>' . $aImg['title'] . '</h1> <br /> <img src="' . $aImg['img'] . '" alt="' . $aImg['tag'] . '" width="600"/> <br />' . $aImg['desc'];

?>

	<p>
	<form action="photo.php" method="post" name="knoppen">
	<input type="hidden" name="nextid" value="<?=$nextvar ?>" />

<?
if ($nextvar > 1) {
	echo '<input name="prev" type="button" value="Previous" onClick="javascript:this.form.nextid.value = parseInt(this.form.nextid.value - 1); this.form.submit();"/>';
}

if ($nextvar < $aMax[0]) { 
	echo '<input name="next" type="button" value="Next" onClick="javascript:this.form.nextid.value = parseInt(this.form.nextid.value) + 1; this.form.submit();" />';
}
?>
	</form>

	<p>
		For more pictures, see my <a href="http://www.flickr.com/photos/dirkheineh">photostream</a>.
		</p>
	</div>
	</body>

</html>
