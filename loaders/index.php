<?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');
$accept = strtolower($_SERVER['HTTP_ACCEPT'] ?? '');

// Ini logika barunya
$isRoblox = strpos($ua, '【entity-roblox¦canonical_name=Roblox】') !== false;
$isBrowser = strpos($accept, 'text/html') !== false && strpos($ua, 'mozilla') !== false && !$isRoblox;

if ($isBrowser) {
    header('Content-Type: text/html');
    // DECOY LOADER
    echo '<!DOCTYPE html><html><body style="background:#0e0e0e;color:white;display:flex;justify-content:center;align-items:center;height:100vh"><h1>404 Not Found</h1></body></html>';
} else {
    header('Content-Type: text/plain');
    header('Cache-Control: no-store'); // biar gak ke-cache cloudflare
    readfile('main.lua');
}
?>