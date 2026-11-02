<?php
$accept = $_SERVER['HTTP_ACCEPT'] ?? '';
$isBrowser = strpos($accept, 'text/html') !== false;

if ($isBrowser) {
    // INI DECOY LOADER - yang dilihat browser
?>
<!DOCTYPE html>
<html>
<head><title>Loading...</title>
<style>
  body { background:#0e0e0e; color:white; display:flex; justify-content:center; align-items:center; height:100vh; font-family:sans-serif; flex-direction:column }
  .loader { border:4px solid #333; border-top:4px solid #fff; border-radius:50%; width:40px; height:40px; animation:spin 1s linear infinite; }
  @keyframes spin { to { transform:rotate(360deg) } }
</style>
</head>
<body>
  <div class="loader"></div>
  <p style="margin-top:20px; opacity:.6">Preparing content... 404</p>
  <script>setTimeout(()=>{ document.body.innerHTML="<h1>404 Not Found</h1>" },1500)</script>
</body>
</html>
<?php
    exit;
} else {
    // INI BUAT EXECUTOR - jadi loader
    header('Content-Type: text/plain');
    // Opsi A: langsung kirim script asli
    // readfile('main.lua');

    // Opsi B: lebih aman pake loader system (biar link asli ke-hide)
    echo "loadstring(game:HttpGet('https://domainkamu.com/main.lua'))()";
}
?>