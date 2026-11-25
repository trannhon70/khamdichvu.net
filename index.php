<?php include_once "inc/header.php" ?>
<?php
$indexCss = file_get_contents('css/index.min.css'); // Đọc nội dung file CSS
$trangChu = file_get_contents('css/trang-chu.min.css'); // Đọc nội dung file CSS
$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$current_url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<title>Phòng khám Đa khoa uy tín chất lượng cao tại TPHCM</title>
<meta name='description'
    content='Phòng khám Đa khoa TP.HCM tọa lạc tại vị trí thuận tiện, dễ dàng di chuyển. Phòng khám tiếp nhận khám nam khoa, phụ khoa, bệnh xã hội và hỗ trợ phá thai an toàn. Cơ sở vật chất khang trang, sạch sẽ, làm việc ngoài giờ, chi phí hợp lý, bảo mật thông tin và hỗ trợ người bệnh tận tình.'>
<meta
    name="keywords"
    content="phòng khám đa khoa tại TPHCM, phòng khám đa khoa uy tín ở TPHCM, phòng khám đa khoa tư nhân tại TPHCM, phòng khám đa khoa tốt ở TPHCM, bệnh viện đa khoa, phòng khám tư nhân tại TPHCM, phòng khám đa khoa gần đây, phòng khám uy tín ở TPHCM" />
<!-- Author -->
<meta name="author" content="Phòng khám Đa khoa TPHCM" />
<!-- Publisher -->
<meta name="publisher" content="Phòng khám Đa khoa TPHCM" />
<!-- Robots -->
<meta name="robots" content="index,follow" />
<link rel="canonical" href="<?php echo $current_url ?>">
<style amp-custom>
    <?= $trangChu ?><?= $indexCss ?>
</style>
</head>
<?php
$limit = 10;

$limitSuckhoe = isset($_GET['suckhoe']) ? $_GET['suckhoe'] : 5;
$limitdinhDuong = isset($_GET['dinhduong']) ? $_GET['dinhduong'] : 5;
$postNew = $bai_viet->getDSBaiVietNew($limit);
$postView = $bai_viet->getDSBaiVietView($limit);

$postSuckhoe = $bai_viet->getDSBaiVietByIdBenh(6, $limitSuckhoe);
$postdinhDuong = $bai_viet->getDSBaiVietByIdBenh(8, $limitdinhDuong);
?>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QD9GPKH"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <main>
        <?php include_once "./layout/header_layout.php" ?>
        <section class="diseases">
            <h1>Các bệnh nam khoa thường gặp</h1>
            <div class="diseases_list">
                <div class="diseases_list_item">
                    <img loading="lazy" width="60px" height="auto" src="<?php echo $local ?>/images/icons/Bao quy đầu.webp"
                        alt="...">
                    <div class="diseases_list_item_text">BAO QUY ĐẦU</div>
                </div>
                <div class="diseases_list_item">
                    <img loading="lazy" width="60px" height="auto" src="<?php echo $local ?>/images/icons/Bệnh dương vật.webp"
                        alt="...">
                    <div class="diseases_list_item_text">BỆNH DƯƠNG VẬT</div>
                </div>
                <div class="diseases_list_item">
                    <img loading="lazy" width="60px" height="auto" src="<?php echo $local ?>/images/icons/Chức năng sinh lý nam.webp"
                        alt="...">
                    <div class="diseases_list_item_text">CHỨC NĂNG SINH LÝ NAM</div>
                </div>
                <div class="diseases_list_item">
                    <img loading="lazy" width="60px" height="auto" src="<?php echo $local ?>/images/icons/Bệnh lây qua đường tình dục.webp"
                        alt="...">
                    <div class="diseases_list_item_text">BỆNH LÂY QUA ĐƯỜNG TÌNH DỤC</div>
                </div>
                <div class="diseases_list_item">
                    <img loading="lazy" width="60px" height="auto" src="<?php echo $local ?>/images/icons/Tiết niệu - sinh dục.webp"
                        alt="...">
                    <div class="diseases_list_item_text">TIẾT NIỆU - SINH DỤC</div>
                </div>
                <div class="diseases_list_item">
                    <img loading="lazy" width="60px" height="auto" src="<?php echo $local ?>/images/icons/Tuyến tiền liệt.webp"
                        alt="...">
                    <div class="diseases_list_item_text">TUYẾN TIỀN LIỆT</div>
                </div>
            </div>
            <div class="diseases_descriptions">
                <h2 class="font-bold text-[#2050bb] mb-6 leading-tight">
                    CÁC ANH EM NÊN KHÁM NAM KHOA KHI NHẬN THẤY CÓ NHỮNG TRIỆU CHỨNG NHƯ:
                </h2>
                <ul class="diseases_descriptions_ul">
                    <li class="diseases_descriptions_ul_li">
                        <span class="diseases_descriptions_ul_li_span">++</span>
                        <span><strong style="color:#ef4444; font-weight:700">Tiểu buốt, tiểu rắt</strong>, tiểu khó hoặc cảm giác nóng rát khi đi tiểu</span>
                    </li>
                    <li class="diseases_descriptions_ul_li">
                        <span class="diseases_descriptions_ul_li_span">++</span>
                        <span><strong style="color:#ef4444; font-weight:700">Dương vật</strong> có dịch bất thường, có mùi khó chịu hoặc tiết dịch khác thường</span>
                    </li>
                    <li class="diseases_descriptions_ul_li">
                        <span class="diseases_descriptions_ul_li_span">++</span>
                        <span><strong style="color:#ef4444; font-weight:700">Vùng kín</strong> ngứa, đỏ, sưng, nổi mụn, mụn nước hoặc xuất hiện tổn thương bất thường</span>
                    </li>
                    <li class="diseases_descriptions_ul_li">
                        <span class="diseases_descriptions_ul_li_span">++</span>
                        <span><strong style="color:#ef4444; font-weight:700">Đau hoặc sưng tinh hoàn</strong>, đau vùng bìu, háng hoặc vùng bụng dưới</span>
                    </li>
                    <li class="diseases_descriptions_ul_li">
                        <span class="diseases_descriptions_ul_li_span">++</span>
                        <span><strong style="color:#ef4444; font-weight:700">Đau khi quan hệ</strong>, đau khi xuất tinh hoặc có máu trong tinh dịch</span>
                    </li>
                    <li class="diseases_descriptions_ul_li">
                        <span class="diseases_descriptions_ul_li_span">++</span>
                        <span><strong style="color:#ef4444; font-weight:700">Rối loạn xuất tinh</strong>, xuất tinh quá sớm, khó xuất tinh hoặc xuất tinh bất thường</span>
                    </li>
                    <li class="diseases_descriptions_ul_li">
                        <span class="diseases_descriptions_ul_li_span">++</span>
                        <span><strong style="color:#ef4444; font-weight:700">Khó cương hoặc khó duy trì độ cương</strong>, giảm ham muốn tình dục kéo dài</span>
                    </li>
                    <li class="diseases_descriptions_ul_li">
                        <span class="diseases_descriptions_ul_li_span">++</span>
                        <span><strong style="color:#ef4444; font-weight:700">Tiểu nhiều lần, tiểu đêm</strong>, dòng tiểu yếu hoặc cảm giác tiểu không hết</span>
                    </li>
                    <li class="diseases_descriptions_ul_li">
                        <span class="diseases_descriptions_ul_li_span">++</span>
                        <span><strong style="color:#ef4444; font-weight:700">Xuất hiện mụn cóc, nốt sùi hoặc vết loét</strong> bất thường ở dương vật, bao quy đầu hoặc vùng sinh dục</span>
                    </li>
                    <li class="diseases_descriptions_ul_li">
                        <span class="diseases_descriptions_ul_li_span">++</span>
                        <span>Có <strong style="color:#ef4444; font-weight:700">quan hệ tình dục không an toàn</strong> và lo lắng về nguy cơ mắc các bệnh lây truyền qua đường tình dục</span>
                    </li>
                </ul>
            </div>
        </section>
        <section style="margin-top: 15px;" class="post">
            <ul class="post__ul">
                <li class="post__ul-li post__ul-li-active" data-tab="new">
                    <img loading="lazy" width="20px" height="20px" src="<?php echo $local ?>/images/icons/icon_new.webp"
                        alt="..."> Bài viết mới nhất
                </li>
                <li class="post__ul-li" data-tab="popular">
                    <img loading="lazy" width="20px" height="20px"
                        src="<?php echo $local ?>/images/icons/icon_docnhieu.webp" alt="..."> Đọc nhiều
                </li>
            </ul>
            <div id="new" class="tab-content tab-content-active">
                <?php if (!empty($postNew)) { ?>
                    <div class="content__list">
                        <div class="post-item content__list-left" data-slug="<?php echo $postNew[0]['slug']; ?>">
                            <div class="content__list-left-img">
                                <img loading="lazy" width="100%" height="300px"
                                    src="<?php echo $local ?>/admin/uploads/<?php echo $postNew[0]['img'] ?>" alt="...">
                            </div>
                            <div class="content__list-left-title">
                                <?php echo $postNew[0]['title'] ?>
                            </div>
                            <div class="content__list-left-text">
                                <?php echo $postNew[0]['descriptions'] ?>
                            </div>
                        </div>
                        <div class="content__list-right">
                            <?php if (!empty($postNew) && count($postNew) > 1) {
                                foreach (array_slice($postNew, 1) as $post) {
                            ?>
                                    <div class="post-item content__list-right-card"
                                        data-slug="<?php echo $post['slug']; ?>">
                                        <div class="content__list-right-card-left">
                                            <div class="content__list-left-title">
                                                <?php echo $post['title'] ?>
                                            </div>
                                            <div class="content__list-left-text">
                                                <?php echo $post['descriptions'] ?>
                                            </div>
                                        </div>
                                        <div class="content__list-right-card-right">
                                            <img loading="lazy" width="100%" height="auto"
                                                src="<?php echo $local ?>/admin/uploads/<?php echo $post['img'] ?>" alt="...">
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div style="display: flex; align-items: center; justify-content: center; height: 300px; ">Chưa có bài
                        viết nào</div>
                <?php } ?>
            </div>

            <div id="popular" class="tab-content">
                <?php if (!empty($postView)) { ?>
                    <div class="content__list">
                        <div class="post-item content__list-left" data-slug="<?php echo $postView[0]['slug']; ?>">
                            <div class="content__list-left-img">
                                <img loading="lazy" width="100%" height="300px"
                                    src="<?php echo $local ?>/admin/uploads/<?php echo $postView[0]['img'] ?>"
                                    alt="...">
                            </div>
                            <div class="content__list-left-title">
                                <?php echo $postView[0]['title'] ?>
                            </div>
                            <div class="content__list-left-text">
                                <?php echo $postView[0]['descriptions'] ?>
                            </div>
                        </div>
                        <div class="content__list-right">
                            <?php if (!empty($postView) && count($postView) > 1) {
                                foreach (array_slice($postView, 1) as $view) {
                            ?>
                                    <div class="post-item content__list-right-card"
                                        data-slug="<?php echo $view['slug']; ?>">
                                        <div class="content__list-right-card-left">
                                            <div class="content__list-left-title">
                                                <?php echo $view['title'] ?>
                                            </div>
                                            <div class="content__list-left-text">
                                                <?php echo $view['descriptions'] ?>
                                            </div>
                                        </div>
                                        <div class="content__list-right-card-right">
                                            <img loading="lazy" width="100%" height="auto"
                                                src="<?php echo $local ?>/admin/uploads/<?php echo $view['img'] ?>" alt="...">
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div style="display: flex; align-items: center; justify-content: center; height: 300px; ">Chưa có bài
                        viết nào</div>
                <?php } ?>
            </div>
            </div>
        </section>
        <section class="health">
            <div class="health__container">
                <div class="health__container-title">Chuyên đề sức khỏe</div>
                <div class="carousel-container">
                    <div class="carousel-track">
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/namgioi.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/nugioi.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/congdong.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/dalieu.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/namgioi.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/nugioi.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/congdong.webp" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img width="100%" height="auto" loading="lazy" src="images/card/dalieu.webp" alt="...">
                        </div>
                    </div>

                </div>
                <hr>
                <div class="health__container-bottom">
                    <button class="health__container-bottom-left">
                        Xem tất cả chuyên đề
                        <img width="13px" height="13px" loading="lazy"
                            src="<?php echo $local ?>/images/icons/icon_next.webp" alt="...">
                    </button>
                    <div>
                        <button class="carousel-btn carousel-prev">←</button>
                        <button class="carousel-btn carousel-next">→</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="banner__ngang">
            <img width="100%" height="auto" src="<?php echo $local ?>/images/banner/banner_4.webp" alt="...">
        </section>

        <section class="health">
            <div class="health__container">
                <div class="health__container-title">Đội ngũ chuyên gia của chúng tôi</div>
                <div class="carousel-container">
                    <div class=" carousel-track-2">
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/namgioi.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/nugioi.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/congdong.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/dalieu.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/namgioi.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/nugioi.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/congdong.webp" alt="...">
                        </div>
                        <div class="carousel-item1">
                            <img width="100%" height="auto" loading="lazy" src="images/card/dalieu.webp" alt="...">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="health__container-bottom">
                    <button class="health__container-bottom-left">
                        Đặt lịch tư vấn
                        <img style="margin-left: 5px;" width="30px" height="30px" loading="lazy"
                            src="images/icons/icon_heat.webp" alt="...">
                    </button>
                    <div>
                        <button class="carousel-btn  carousel-prev-2">←</button>
                        <button class="carousel-btn  carousel-next-2">→</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="post" id="targetSection">
            <div class="post__list">
                <div class="post__list-item">
                    <div class="post__list-item-title">Bệnh xã hội</div>
                    <?php if (!empty($postSuckhoe)) {
                        foreach ($postSuckhoe as $post) {
                    ?>
                            <div data-slug="<?php echo $post['slug']; ?>" class="post-item post__list-item-card">
                                <div class="post__list-item-card-left">
                                    <h5><?php echo $post['title'] ?></h5>
                                    <span><?php echo $post['descriptions'] ?></span>
                                </div>
                                <div class="post__list-item-card-right">
                                    <img width="100%" height="auto" loading="lazy"
                                        src="<?php echo $local ?>/admin/uploads/<?php echo $post['img'] ?>" alt="...">
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 300px; ">Chưa có
                            bài viết nào</div>
                    <?php } ?>
                    <!-- <a href="<?php echo $local ?>?suckhoe=<?php echo $limitSuckhoe + 5 ?>&dinhduong=<?php echo $limitdinhDuong ?>#targetSection"
                        class="button">Xem thêm >></a> -->
                </div>
                <div class="post__list-item">
                    <div class="post__list-item-title">Nam khoa</div>
                    <?php if (!empty($postdinhDuong)) {
                        foreach ($postdinhDuong as $post) {
                    ?>

                            <div data-slug="<?php echo $post['slug']; ?>" class="post-item post__list-item-card">
                                <div class="post__list-item-card-left">
                                    <h5><?php echo $post['title'] ?></h5>
                                    <span><?php echo $post['descriptions'] ?></span>
                                </div>
                                <div class="post__list-item-card-right">
                                    <img width="100%" height="auto" loading="lazy"
                                        src="<?php echo $local ?>/admin/uploads/<?php echo $post['img'] ?>" alt="...">
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 300px; ">Chưa có
                            bài viết nào</div>
                    <?php } ?>
                    <!-- <a href="<?php echo $local ?>?suckhoe=<?php echo $limitSuckhoe ?>&dinhduong=<?php echo $limitdinhDuong  + 5 ?>#targetSection"
                        class="button">Xem thêm >></a> -->
                </div>
            </div>
        </section>

    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll(".post__ul-li");
            const contents = document.querySelectorAll(".tab-content");

            tabs.forEach(tab => {
                tab.addEventListener("click", function() {
                    // Xóa class active khỏi tất cả tabs
                    tabs.forEach(t => t.classList.remove("post__ul-li-active"));
                    contents.forEach(c => c.classList.remove("tab-content-active"));

                    // Thêm class active vào tab được click
                    this.classList.add("post__ul-li-active");

                    // Hiển thị nội dung tab tương ứng
                    const tabId = this.getAttribute("data-tab");
                    document.getElementById(tabId).classList.add(
                        "tab-content-active"); // Sửa lỗi ở đây
                });
            });
        });
    </script>
    <script defer src="<?php echo $local ?>/js/carousel.min.js"></script>
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
    <script>
        (function() {
            document.querySelectorAll(".post-item").forEach(function(item) {
                item.addEventListener("click", function(event) {
                    let slug = event.currentTarget.getAttribute("data-slug");
                    console.log("Slug:", slug);
                    handleClick(event, slug)
                });
            });
        })();
    </script>


    <?php include_once "./inc/footer.php" ?>