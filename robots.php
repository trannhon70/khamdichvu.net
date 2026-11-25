<?php
header("Content-Type: text/plain");

echo "User-agent: *\n";
echo "Disallow: /admin/\n";
echo "Disallow: /private/\n";
echo "Allow: /\n";
echo "\n";
echo "Sitemap: https://www.khamdichvu.net/sitemap.xml.php\n";
