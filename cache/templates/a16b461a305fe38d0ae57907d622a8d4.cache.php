<section>
    <div class="report">
        <div class="row">
            <div class="small-12 medium-12 large-8 columns">
                <div class="report__title">
                    <?php echo $title; ?>
                </div>
            </div>
        </div>
        <div class="row report__display-info">
            <div class="small-12 medium-8 columns">
                <img class="image" src="<?php echo man_thumb($thumb); ?>" alt="Large" />
                <div class="st__content-block st__content-block--text">
                    <p>
                    <?php echo $content; ?>
                    </p>
                </div>
            </div>
            <div class="report__meta">
                <div class="report-inline"></div>
                <div class="report__meta-header">
                    已发布
                </div>
                <div class="caption">
                    <?php echo $inputtime; ?>
                </div>
                <div class="report__actions-container">
                    <a class="report__link--pdf" target="_blank" href="<?php echo man_down_file($file); ?>">
                        <div class="report__action">
                            下载PDF文件
                            <img src="<?php echo HOME_THEME_PATH; ?>build/imgs/download-0269c57098f4e3ea086723eb50d43ae58f79a894e7607ffe3353693e916f46b6.svg" alt="Download" />
                        </div>
                    </a>
                </div>
                <div class="report__social-sharing">
                    <div class="column-bottom-border"></div>
                    <div class="report-inline"></div>
                    <div class="report__meta-header">
                        分享
                    </div>
                    <div class="report__social-icons">
                        <div>
                            <?php if ($fn_include = $this->_include("layout/share-a.html")) include($fn_include); ?>
                            <a href="mailto:?subject=<?php echo $title; ?>&body=<?php echo $content; ?>" class="social-share--email"></a>
                        </div>
                    </div>
                </div>
                <!-- Related links -->
            </div>
        </div>
    </div>
</section>