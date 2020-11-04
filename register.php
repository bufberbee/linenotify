<?php

define('CLIENT_ID', 'ygASfZ53e80vwM0n2eKwQZ');
define('LINE_API_URI', 'https://notify-bot.line.me/oauth/authorize?');
define('CALLBACK_URI', 'http://localhost:80/lineNotify/callback.php');

$queryStrings = array(
    'response_type' => 'code',
    'client_id' => CLIENT_ID,
    'redirect_uri' => CALLBACK_URI,
    'scope' => 'notify',
    'state' => 'abcdef123456'
);

$queryString = LINE_API_URI . http_build_query($queryStrings);

?>

<a href="<?php echo $queryString; ?>">Register</a>