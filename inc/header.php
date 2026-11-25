<?php
session_start();
include 'lib/session.php';
Session::init();

ob_start("ob_gzhandler");
header("Timing-Allow-Origin: *");
header("Cache-Control: public, max-age=31536000, must-revalidate");
// Danh sách IP bị chặn
$blocked_ips = [''];

function getClientIp()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$client_ip = getClientIp();

if (in_array($client_ip, $blocked_ips)) {
    header('HTTP/1.0 403 Forbidden');
    header('Location: /404.php');
    exit();
}

setcookie(
    "myCookie",                // Tên cookie
    "value",                   // Giá trị cookie
    [
        "expires" => time() + 3600, // Thời gian hết hạn (1 giờ)
        "path" => "/",              // Đường dẫn
        "domain" => "https://www.khamdichvu.net",  // Tên miền (tuỳ chỉnh)
        "secure" => true,           // Chỉ gửi qua HTTPS
        "httponly" => true,         // Chỉ gửi cookie qua HTTP (không JavaScript)
        "samesite" => "None"        // SameSite=None
    ]
);

include_once 'classes/bai_viet.php';
include_once 'classes/tin_tuc.php';
include_once 'classes/benh.php';
include_once 'classes/khoa.php';

spl_autoload_register(function ($className) {
    include_once "classes/" . $className . ".php";
});
$dbReadStarTime = hrtime(true);
$khoas = new Khoa();
$bai_viet = new post();
$tin_tuc = new news();
$benh = new Benh();

$getMenuMobile = $benh->getMenuMobile();

$dbReadEndTime = hrtime(true);
$dbReadTotalTime = ($dbReadEndTime - $dbReadStarTime) / 1e+6;

header('Server-Timing: db;desc="Database";dur=' . $dbReadTotalTime);

$local = 'http://localhost/_nhatvietnew/khamdichvu.net'
// $local = 'https://www.khamdichvu.net'
?>

<?php

?>
<!DOCTYPE html>
<html lang="vi-VN">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="google-site-verification" content="epwvyrjdvyyimX2zV5GYxEM6r_5T8oXK3myubQc3Fkc" />
    <meta name="amp-script-src" content="sha384-1vNzwRfDkPJUDM7qB4z4jDKb6e98tjy8j-VcmKvImJOFkhBKPkIuWmTprT32Yhhy">
    <link rel="canonical" href="https://www.khamdichvu.net<?php echo $_SERVER['REQUEST_URI']; ?>" />

    <link rel="icon" href="<?php echo $local ?>/images/icons/icon_logocm.webp" type="image/x-icon">

    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
    <script async custom-element="amp-script" src="https://cdn.ampproject.org/v0/amp-script-0.1.js"></script>


    <!-- AMP Boilerplate Styles -->
    <style amp-boilerplate>
        body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both;
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }
    </style>
    <noscript>
        <style amp-boilerplate>
            body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none;
            }
        </style>
    </noscript>

    <script src="<?php echo $local ?>/js/headerStylesheet.min.js">
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "CreativeWorkSeason",
            "name": "Phòng khám Đa khoa uy tín chất lượng cao tại TPHCM",
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.9",
                "ratingCount": "368",
                "bestRating": "5",
                "worstRating": "1"
            }
        }
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5QD9GPKH');
    </script>
    <!-- End Google Tag Manager --