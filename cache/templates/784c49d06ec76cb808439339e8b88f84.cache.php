<section>
    <div class="event-title__container dark-tint" style="background-image: url('<?php echo man_thumb($thumb); ?>');background-size: cover;">
        <div class="row">
            <div class="event-details__header-container">
                <div class="event-details__content-box">
                    <h1 class="event-details__title"><?php echo $title; ?></h1>
                    <div class="event-details__support-text">
                        <span><?php echo man_date($_updatetime, 'Y-m-d', ''); ?></span>
                        <span><?php echo $address; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="event-links__container">
            <div class="row">
                <div class="event-links__content">
                    <ul class="event-links__list">
                        <!--<li class="event-links__item"> <a class="" href="">关于</a> </li>-->
                        <li class="event-links__item"> <a class="" href="">会议日程</a> </li>
                    </ul>
                </div>
                <div class="event-social-container">
                    <ul class="event-social-list">
                        <li></li>
                        <li>
                            <a href="<?php echo $weibolink; ?>&title=<?php echo $title; ?>" class="js-social-share" target="_blank">
                            <img src="<?php echo HOME_THEME_PATH; ?>build/imgs/weibo-icon-0720aff1983df591f2cfe49eca92919dcb1e6d8e143ec10c1a29ce0c3a0d17b5.svg" alt="Weibo icon" /> </a>
                        </li>
                        <li>
                            <a href="<?php echo $inlink; ?>&title=<?php echo $title; ?>" class="js-social-share" target="_blank"> <img src="<?php echo HOME_THEME_PATH; ?>build/imgs/linkedin-icon-32402f8cfdc7e565995289208d7984d95952a46a3795825550a60fe3c96869bb.svg" alt="Linkedin icon" /> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="stream-widget-block stream-widget-block--alt">
        <div class="row">
            <div class="small-12 columns">
                <div class="stream-widget">
                   <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>
</section>