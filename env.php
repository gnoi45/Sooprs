<?php
$SITE_URL = "https://sooprs.com" ;
// $SITE_URL = "https://localhost/sooprs" ;


// copy and paste this code where you want site url 
/* 
<?php echo $SITE_URL ?> 
*/

$RAZR_PAY_KEY = "rzp_live_SwPxj3HuCi6h9s" ;
// $RAZR_PAY_KEY='rzp_test_Wxc7YigZCnYuu0';




    // dot env file 
    // Check if the function is not already declared
if (!function_exists('loadEnv')) {
    function loadEnv($path)
    {
        $contents = file_get_contents($path);
        $lines = explode("\n", $contents);

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line && strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                if (!array_key_exists($key, $_ENV)) {
                    putenv("$key=$value");
                    $_ENV[$key] = $value;
                }
            }
        }
    }
}


?>