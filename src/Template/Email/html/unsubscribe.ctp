<?php
$content = str_replace('%name%', $name, $content);
$content = str_replace('%address%', $address, $content);
$content = explode("\n", $content);

foreach ($content as $line):
    echo '<p> ' . $line . "</p>\n";
endforeach;
echo '<br><br>';
echo 'The C4H Team';
echo '<hr>';
echo '<a href=\'' . $unsub . '\'>Unsubscribe from email</a>';
?>
