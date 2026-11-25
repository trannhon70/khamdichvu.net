<?php include_once "inc/header.php" ?>

<?php
$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$current_url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$slug = basename(parse_url($current_url, PHP_URL_PATH), '.html');

$getPostDetail = $bai_viet->getBaiViet_bySlug($slug);
$listQuanTam = $benh->getDSBaiVietLienQuan($slug);

function setTitleAndScroll()
{
    global $getPostDetail; // Đảm bảo truy cập biến toàn cục
    if ($getPostDetail && isset($getPostDetail['tieu_de'])) {
        // Lấy các giá trị từ $getPostDetail
        $title = isset($getPostDetail['tieu_de']) ? $getPostDetail['tieu_de'] : 'Default Title';
        $description = isset($getPostDetail['descriptions']) ? $getPostDetail['descriptions'] : 'Default Description';
        $keywords = isset($getPostDetail['keyword']) ? $getPostDetail['keyword'] : 'default, keywords';
        $image = isset($getPostDetail['img']) ? $getPostDetail['img'] : '/path/to/default-image.jpg';

        // Chuyển đổi các giá trị sang dạng an toàn cho HTML và JavaScript
        $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $safeDescription = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
        $safeKeywords = htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8');
        $safeImage = htmlspecialchars($image, ENT_QUOTES, 'UTF-8');

        // Đảm bảo rằng bạn chèn vào trong thẻ <head>
        echo "<title>$safeTitle</title>\n";
        echo "<meta name='description' content='$safeDescription'>\n";
        echo "<meta name='keywords' content='$safeKeywords'>\n";
        echo "<meta property='og:title' content='$safeTitle'>\n";
        echo "<meta property='og:description' content='$safeDescription'>\n";
        echo "<meta property='og:image' content='https://khamdichvu.net/admin/uploads/$safeImage'>\n";
        echo "<meta property='og:image:width' content='1200'>\n";
        echo "<meta property='og:image:height' content='630'>\n";
        echo "<meta property='og:type' content='article'>\n";
        echo "<meta property='og:url' content='https://khamdichvu.net/{$getPostDetail['slug']}.html'>\n";
    }
}
setTitleAndScroll();
function replaceContent($content)
{
    $replace = [
        '{pk}' => '<a class="pk-link" href="https://khamdichvu.net/">Phòng Khám Đa Khoa TPHCM</a>',
        '{sdt}' => '<a class="phone-link" href="tel:0931688716">0931688716</a>',
        '{tuvan}' => '<a class="chat-link" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">Tư vấn trực tuyến</a>',
    ];

    return str_replace(
        array_keys($replace),
        array_values($replace),
        $content
    );
}
?>

<?php
$indexCss = file_get_contents(__DIR__ . '/css/index.min.css');
$DanhmucCss = file_get_contents(__DIR__ . '/css/danh-muc.min.css');
?>
<style amp-custom>
    <?= $DanhmucCss ?><?= $indexCss ?>
</style>

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QD9GPKH"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php if (isset($getPostDetail)) { ?>
        <?php include "layout/header_layout.php" ?>
        <main>
            <article>
                <div class="category">

                    <div class="category__right">
                        <a href="<?php echo $local ?>/<?php echo $getPostDetail['slug_khoa']  ?>/<?php echo $getPostDetail['slug_benh']  ?>" style="margin-bottom: 10px;" id="category__right-breadcrumb">
                            Danh mục > <?php echo $getPostDetail['name_khoa'] ?> > <?php echo $getPostDetail['name_benh'] ?>
                        </a>
                        <?php if ($getPostDetail !== 'Hiện tại dữ liệu này chưa có bài viết!') { ?>
                            <h1 id="titleBaiViet" class="category__right-title">
                                <?php echo $getPostDetail['tieu_de'] ?>
                            </h1>

                            <div class="danhmuc__menu">
                                <div class="danhmuc__menu-top" id="toc-toggle-btn">
                                    <amp-img src="<?php echo $local ?>/images/icons/icon_menu.webp"
                                        height="20" width="25"></amp-img>

                                    <span>Mục lục</span>

                                    <span class="toc-icon">▾</span>
                                </div>

                                <nav class="danhmuc__menu-nav" id="toc-menu">
                                    <ul></ul>
                                </nav>
                            </div>


                            <div style="padding-top:10px">
                                <?php if (Session::get('role') === '1' || Session::get('role') === '2') {
                                ?>
                                    <?php if (isset($getPostDetail) && isset($getPostDetail['name_khoa'])) { ?>
                                        <a class="chinh-sua"
                                            href="<?php echo $local ?>/admin/bai-viet-edit.php?edit=<?php echo $getPostDetail['id'] ?>"><i
                                                style="font-size:19px" class="bx bxs-pencil"></i>chỉnh sửa</a>
                                    <?php } else { ?>
                                        <a class="chinh-sua"
                                            href="<?php echo $local ?>/admin/tin-tuc-edit.php?edit=<?php echo $getPostDetail['id'] ?>">
                                            <i style="font-size:19px" class="bx bxs-pencil"></i>chỉnh sửa</a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div id="bai-viet">
                                <?php echo replaceContent($getPostDetail['content']); ?>
                            </div>
                            <div class="bai-viet-footer">Nội dung bài viết cung cấp nhằm mục đích tham khảo thêm kiến thức y tế,
                                một số nội dung có thể không thuộc nghiệp vụ của phòng khám chúng tôi, Hiệu quả của việc hỗ trợ
                                điều trị phụ thuộc vào cơ địa của mỗi người. Cần biết thông tin liên hệ để được tư vấn trực
                                tuyến miễn phí.<a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">[TƯ VẤN
                                    TRỰC TUYẾN]</a>
                            </div>
                    </div>
                <?php } else { ?>
                    <div><?php echo $getPostDetail ?></div>
                <?php } ?>
                </div>
                <?php include_once './layout/comment_layout.php' ?>
            </article>
        </main>

        <?php include_once "inc/footer.php" ?>

        <script defer>
            document.addEventListener('DOMContentLoaded', (event) => {
                let baiVietElement = document.getElementById('bai-viet');
                if (baiVietElement) {
                    let pElements = baiVietElement.getElementsByTagName('p');
                    for (let i = 0; i < pElements.length; i++) {
                        pElements[i].style.color = '#000000'; // Ghi đè CSS trước đó
                        pElements[i].style.fontWeight = 400;
                        pElements[i].style.fontSize = '14px';
                        pElements[i].style.lineHeight = '27px';
                    }

                    let h2Elements = baiVietElement.getElementsByTagName('h2');
                    for (let i = 0; i < h2Elements?.length; i++) {
                        // Xóa màu của tất cả thẻ con
                        h2Elements[i].textContent = h2Elements[i].textContent;

                        h2Elements[i].style.margin = '10px 0px';
                        h2Elements[i].style.lineHeight = '35px';
                        h2Elements[i].style.borderBottom = '1px solid rgb(6, 86, 170)';
                        h2Elements[i].style.fontSize = '22px';
                        h2Elements[i].style.color = 'rgb(6, 86, 170)';


                    }

                    let h3Elements = baiVietElement.getElementsByTagName('h3');
                    for (let i = 0; i < h3Elements?.length; i++) {
                        h3Elements[i].style.lineHeight = '40px';
                    }

                    let h4Elements = baiVietElement.getElementsByTagName('h4');
                    for (let i = 0; i < h4Elements?.length; i++) {
                        h4Elements[i].style.lineHeight = '35px';
                    }
                }


                if (window.innerWidth < 1000) {
                    const imgElements = baiVietElement.getElementsByTagName('img');

                    for (let i = 0; i < imgElements.length; i++) {
                        const img = imgElements[i];

                        // Chờ ảnh load xong để lấy kích thước thật
                        img.onload = function() {
                            if (img.naturalWidth > 100) {
                                img.style.maxWidth = '100%';
                                img.style.height = 'auto';
                                img.style.objectFit = 'contain';
                            }
                        };

                        // Trường hợp ảnh đã load từ cache
                        if (img.complete) {
                            if (img.naturalWidth > 100) {
                                img.style.maxWidth = '100%';
                                img.style.height = 'auto';
                                img.style.objectFit = 'contain';
                            }
                        }
                    }
                }


            });
            document.addEventListener('DOMContentLoaded', () => {
                const tocWrapper = document.querySelector('.danhmuc__menu');
                const tocBtn = document.getElementById('toc-toggle-btn');
                const tocMenu = document.getElementById('toc-menu');

                const contentElement = document.getElementById('bai-viet');
                const menuNav = tocMenu.querySelector('ul');
                const headings = contentElement.querySelectorAll('h2, h3');

                let isOpen = false;

                // =========================
                // 1. TOGGLE OPEN/CLOSE
                // =========================
                const openTOC = () => {
                    tocWrapper.classList.add('open');
                    isOpen = true;
                };

                const closeTOC = () => {
                    tocWrapper.classList.remove('open');
                    isOpen = false;
                };

                tocBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    isOpen ? closeTOC() : openTOC();
                });

                // =========================
                // 2. CLICK OUTSIDE CLOSE
                // =========================
                document.addEventListener('click', (e) => {
                    if (!tocWrapper.contains(e.target)) {
                        closeTOC();
                    }
                });

                // =========================
                // 3. BUILD MENU (H2 + H3)
                // =========================
                let currentSub = null;

                headings.forEach((heading, index) => {
                    const id = heading.textContent.trim()
                        .replace(/\s+/g, '-')
                        .toLowerCase() + '-' + index;

                    heading.id = id;

                    if (heading.tagName === 'H2') {
                        const li = document.createElement('li');

                        const a = document.createElement('a');
                        a.href = `#${id}`;
                        a.textContent = heading.textContent;

                        const sub = document.createElement('ul');

                        li.appendChild(a);
                        li.appendChild(sub);
                        menuNav.appendChild(li);

                        currentSub = sub;

                    } else if (heading.tagName === 'H3' && currentSub) {
                        const li = document.createElement('li');
                        const a = document.createElement('a');

                        a.href = `#${id}`;
                        a.textContent = '' + heading.textContent;

                        li.appendChild(a);
                        currentSub.appendChild(li);
                    }
                });

                // =========================
                // 4. SMOOTH SCROLL
                // =========================
                menuNav.addEventListener('click', (e) => {
                    if (e.target.tagName === 'A') {
                        e.preventDefault();

                        const target = document.getElementById(
                            e.target.getAttribute('href').substring(1)
                        );

                        if (target) {
                            const headerOffset = 800; // chỉnh theo header của bạn

                            const elementPosition = target.getBoundingClientRect().top;
                            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                            window.scrollTo({
                                top: offsetPosition,
                                behavior: 'smooth'
                            });

                            closeTOC(); // auto close sau khi click
                        }
                    }
                });

                // =========================
                // 5. AUTO OPEN WHEN SCROLL INTO ARTICLE
                // =========================
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            openTOC();
                        }
                    });
                }, {
                    threshold: 0.3
                });

                observer.observe(contentElement);
            });
        </script>

    <?php } else { ?> <div
            style="display:flex;align-items:center;justify-content:center;color:red;font-size:30px;height:100vh">link bài
            viết này không tồn tại!</div> <?php } ?>