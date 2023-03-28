<?php
// Get device information
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$device = "";
if (strpos($user_agent, 'iPhone') !== false || strpos($user_agent, 'iPad') !== false || strpos($user_agent, 'iPod') !== false) {
    $device = "Apple Device";
} elseif (strpos($user_agent, 'Android') !== false) {
    $device = "Android Device";
} elseif (strpos($user_agent, 'Windows Phone') !== false) {
    $device = "Windows Phone";
} elseif (strpos($user_agent, 'Windows') !== false) {
    $device = "Windows PC";
} elseif (strpos($user_agent, 'Macintosh') !== false || strpos($user_agent, 'Mac OS') !== false) {
    $device = "Mac";
} elseif (strpos($user_agent, 'Linux') !== false) {
    $device = "Linux PC";
} else {
    $device = "Unknown";
}

$browser = $_SERVER['HTTP_USER_AGENT'];

// Output device information
echo "Device: " . $device . "<br>";
echo "Browser: " . $browser . "<br>";
?>


<?php
// Get device information
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ip_address = $_SERVER['REMOTE_ADDR'];
$timestamp = date('Y-m-d H:i:s');

// Create data string
$data = "$timestamp - $ip_address - $user_agent\n";

// Append data to file
$file_path = 'device_info.log';
$file_handle = fopen($file_path, 'a');
fwrite($file_handle, $data);
fclose($file_handle);

// Output success message
echo "Device information recorded successfully!";
?>
