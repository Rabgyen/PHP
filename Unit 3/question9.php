<?php

$comment = "This is a damn good product but the service is hell";
$badWords = ["damn", "hell"];
$censored = $comment;
$count = 0;

foreach ($badWords as $bad) {
    if (strpos($censored, $bad) !== false) $count++;
    $censored = str_replace($bad, "****", $censored);
}

echo "Original: $comment<br>";
echo "Censored: $censored<br>";
echo "Words censored: $count<br>";

?>
