<?php
//$SONGS_FILE = "songs.txt";
 $SONGS_FILE ="songs_shuffled.txt";
if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
	header("HTTP/1.1 400 Invalid Request");
	die("ERROR 400: Invalid request - This service accepts only GET requests.");
}

$top = "";

if (isset($_REQUEST["top"])) {
	$top = preg_replace("/[^0-9]*/", "", $_REQUEST["top"]);
}

if (!file_exists($SONGS_FILE)) {
	header("HTTP/1.1 500 Server Error");
	die("ERROR 500: Server error - Unable to read input file: $SONGS_FILE");
}

header("Content-type: application/xml");

print "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
print "<songs>\n";


$lines = file($SONGS_FILE);
$line=array();
for ($i = 0; $i < count($lines); $i++) {
	list($title, $artist, $rank, $genre, $time) = explode("|", trim($lines[$i]));
	if ($rank <= $top) {
		$string="\t<song rank=\"$rank\">\n\t\t<title>$title</title>\n\t\t<artist>$artist</artist>\n\t\t<genre>$genre</genre>\n\t\t<time>$time</time>\n\t</song>\n";		
		$line[$rank]=$string;
	}
}
for($i = 0; $i <= $top; $i++){
	print $line[$i];
}
print "</songs>";

?>
