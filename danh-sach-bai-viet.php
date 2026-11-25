<?php include_once "inc/header.php" ?>
<?php
$DSBaiViet = file_get_contents('css/danh-sach-bai-viet.min.css'); // Đọc nội dung file CSS
?>
<style amp-custom>
    <?= $DSBaiViet ?><?= $indexCss ?>
</style>
</head>
<?php
// Lấy path của URL
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$segments = explode('/', $path);

// Lấy 2 phần tử cuối của URL
$lastSegments = array_slice($segments, -2);

$khoa_slug = $lastSegments[0] ?? null;
$benh_slug = $lastSegments[1] ?? null;

$getDanhMucBenhByKhoa = $khoas->getDanhMucBenhByKhoa($khoa_slug);
$getTTBenhAndKhoa = $khoas->getTTBenhAndKhoa($khoa_slug, $benh_slug);

//danh sách bài viết theo slug bệnh
$list_BV_pagination = $bai_viet->getPagingBaiVietTheoBenh($benh_slug, 20);
// var_dump($list_BV_pagination);
?>

<body>
     <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QD9GPKH"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <main>
        <?php include_once "./layout/header_layout.php" ?>

        <section class="list">
            <div class="list__container">
                <div class="list__container-left">
                    <?php foreach ($getDanhMucBenhByKhoa as $value): ?>
                        <div class="list__container-left-title">
                            <?php echo $value['name'] ?>
                        </div>
                        <ul>
                            <?php foreach ($value['danhSachBenh'] as $benh): ?>
                                <li class="<?php echo ($benh_slug === $benh['slug']) ? 'danhmuc__left-li-active' : ''; ?>">
                                    <a href="<?php echo $local ?>/<?php echo $value['slug'] ?>/<?php echo $benh['slug'] ?>"><?php echo $benh['name']; ?></a>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                </div>
                <div class="list__container-right">
                    <?php foreach ($list_BV_pagination as $value): ?>
                        <div class="list__container-right-title"><?php echo $value['name'] ?> </div>
                        <div class="list__container-right-list">
                            <?php foreach ($value['danhSachBaiViet'] as $item): ?>
                                <a onclick="handleClick(event,'<?php echo $item['slug']; ?>')" class="list__container-right-list-card" href="<?php echo $local ?>/<?php echo $item['slug'] ?>.html">
                                    <div class="list__container-right-list-card-left">
                                        <h5><?php echo $item['tieu_de'] ?></h5>
                                        <span> <?php echo $item['descriptions'] ?></span>
                                    </div>
                                    <div class="list__container-right-list-card-right">
                                        <img width="100%" height="auto" src="<?php echo $local ?>/admin/uploads/<?php echo $item['img'] ?>" alt="...">
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </section>
        <script defer>
            function handleClick(event, slug) {
                event.preventDefault();
                // console.log("Slug của bài viết:", slug);
                let formData = {
                    slug: slug,
                };
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "<?php echo $local ?>/api/bai-viet/update-view.php", true);
                xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        let response = JSON.parse(xhr.responseText);

                    }
                };
                xhr.send(JSON.stringify(formData));
                // Ví dụ: Xử lý thêm trước khi chuyển trang
                setTimeout(() => {
                    window.location.href = `<?php echo $local ?>/` + slug + ".html";
                }, 500);
            }
        </script>
        <?php include_once "./inc/footer.php" ?>