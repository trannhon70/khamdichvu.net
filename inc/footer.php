<footer id="footer" class="footer">
    <div class="footer__container">
        <div class="footer__container-title">đặt lịch tư vấn ngay</div>
        <div class="footer__container-text">Để giải đáp những thắc mắc về sức khỏe</div>
        <div class="footer__container-body">
            <div class="footer__container-body-left">
                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/users/chuyenmuc.webp"
                    alt="...">
            </div>
            <div class="footer__container-body-right">
                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/users/bacsi.webp"
                    alt="...">
            </div>
        </div>
        <div class="footer__container-bottom">
            <a href="<?php echo $local ?>">
                <img loading="lazy" width="250px" height="auto" src="<?php echo $local ?>/images/icons/icon_dangky.webp"
                    alt="...">
            </a>
            <a href="<?php echo $local ?>">
                <img loading="lazy" width="250px" height="auto" src="<?php echo $local ?>/images/icons/icon_tuvan.webp"
                    alt="...">
            </a>
            <a href="<?php echo $local ?>">
                <img loading="lazy" width="250px" height="auto"
                    src="<?php echo $local ?>/images/icons/icon_chatzalo.webp" alt="...">
            </a>
        </div>
    </div>
    <div class="footer__bg">

    </div>
</footer>

<footer id="footer__mobile" class="footer__mobile">
    <div class="footer__mobile-title">
        Đặt lịch tư vấn ngay
    </div>
    <div class="footer__mobile-body">
        <span>Để giải đáp những thắc mắc về sức khỏe</span>
        <div class="footer__mobile-body-list">
            <div class="footer__mobile-body-list-item">
                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/background/camket.webp"
                    alt="...">
            </div>
            <div class="footer__mobile-body-list-item">
                <img loading="lazy" width="100%" height="auto"
                    src="<?php echo $local ?>/images/background/tructuyen.webp" alt="...">
            </div>
        </div>
        <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/background/group_bacsi.webp"
            alt="...">
    </div>
    <div class="footer__mobile-bottom">
        <div class="footer__mobile-bottom-list">
            <div class="footer__mobile-bottom-list-item">
                <div style="background-color: #FF7E00;" class="footer__mobile-bottom-list-item-card">
                    <img loading="lazy" width="35px" height="35px"
                        src="<?php echo $local ?>/images/icons/icon_book.webp" alt="...">
                    Đăng kí khám online
                </div>
                <div style="background-color: #FA326A;" class="footer__mobile-bottom-list-item-card">
                    <img loading="lazy" width="35px" height="35px"
                        src="<?php echo $local ?>/images/icons/icon_phone.webp" alt="...">
                    Nhận tư vấn online
                </div>
                <div style="background-color: #3F7AFF;" class="footer__mobile-bottom-list-item-card">
                    <img loading="lazy" width="35px" height="35px"
                        src="<?php echo $local ?>/images/icons/icon_zalo.webp" alt="...">
                    chat zalo cùng bác sĩ
                </div>
            </div>
            <div class="footer__mobile-bottom-list-item">
                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/users/user_2.webp"
                    alt="...">
            </div>
        </div>
    </div>
    <div style="background-color: #131A85; height:50px; width: 100%;"></div>
</footer>
<!-- <a href="javascript:void(0)" onclick="openZoosUrl('chatwin'); return false;" style="position: fixed; bottom: 35%; right: 0; z-index: 1000;">
    <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/logo/chat-with-bs.gif"
        alt="...">
</a> -->

<section style="height: auto; position: fixed; bottom: 0; left: 0; width: 100%; z-index: 10000;" id="footer_mobileFix">
    <div style="position: relative; background: white; box-shadow:
        rgb(60 64 67 / 84%) 0px 1px 2px 0px,
        rgba(60, 64, 67, 0.15) 0px 2px 6px 2px; ">
        <img style="position: absolute; top: 3px; right: 40%;" loading="lazy" width="50px" height="auto"
            src="<?php echo $local ?>/images/icons/icon_footer_animation.gif" alt="..." layout="responsive">
        </img>
        <img style="width: 100%; height: auto;" loading="lazy"
            src="<?php echo $local ?>/images/background/footer_mobile.gif" alt="...">
        <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 60px; display: flex;">
            <a href="javascript:void(0)" onclick="openZoosUrl('chatwin'); return false;" style="display: block; width: 50%; ; height: 60px;"></a>
            <a style="display: block; width: 50%; ; height: 60px;" href="tel:0901869945"></a>
        </div>
    </div>
</section>

<div class="footer_list_icon">
    <a class="" href="javascript:void(0)" onclick="openZoosUrl('chatwin'); return false;">
        <amp-img src="<?php echo $local ?>/images/icons/icon_12.gif" height="107px" width="40px" alt="...">
        </amp-img>
    </a>
</div>

<!-- <script language="javascript" src="https://kuk.zoosnet.net/JS/LsJS.aspx?siteid=KUK38256576&float=1&lng=en"></script> -->
<script defer>
    function updateHeaderScripts() {
        // Xóa các script cũ nếu có
        const existingMobileScripts = document.querySelectorAll('script[id^="mobile-"]');
        const existingDesktopScripts = document.querySelectorAll('script[id^="desktop-"]');
        existingMobileScripts.forEach(script => script.remove());
        existingDesktopScripts.forEach(script => script.remove());

        // Thêm script mới dựa trên kích thước cửa sổ
        if (window.innerWidth < 1000) {
            const mobileScripts = [{
                src: '<?php echo $local ?>/js/checkImgMobile.min.js',
                id: 'mobile-0'
            }, ];
            mobileScripts.forEach(({
                src,
                id
            }) => {
                const script = document.createElement('script');
                script.src = src;
                script.id = id;
                script.defer = true;
                document.body.appendChild(script);
            });
        } else {
            const desktopScripts = [
                // {
                //     src: 'js/slider.min.js',
                //     id: 'desktop-0'
                // },

            ];
            desktopScripts.forEach(({
                src,
                id
            }) => {
                const script = document.createElement('script');
                script.src = src;
                script.id = id;
                document.body.appendChild(script);
            });
        }
    }

    updateHeaderScripts();

    window.addEventListener('resize', () => {
        console.log('Window resized to:', window.innerWidth);
        updateHeaderScripts();

    });
</script>
</body>

</html>