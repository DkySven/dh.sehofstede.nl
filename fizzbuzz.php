<?php

$title = "| FizzBuzz";
include('share/header.php');

for ($i = 1; $i <= 100; $i++) {
	if ($i % 3 != 0 and $i % 5 != 0) {
		echo $i;
		echo "<br />";
		continue;
	}
	if ($i % 3 == 0) {
		echo "Fizz";
	}
	if ($i % 5 == 0) {
		echo "Buzz";
	}
	echo "<br />";
}
?>

</body>

</html>
