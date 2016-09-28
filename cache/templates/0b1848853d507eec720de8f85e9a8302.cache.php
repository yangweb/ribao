<section>
    <div class="row">
        <div class="small-12 columns">
            <ul class="topic-list">
                <li class="topic-list__item"><?php echo $cat['name'];  echo MODULE_NAME; ?></li>
            </ul>
            <h1 class="article__headline"><?php echo $title; ?></h1>
            <div class="article__lead-image">
                <figure class="st__content-block st__content-block--image">
                    <img alt="<?php echo $title; ?>" src="<?php echo man_thumb($thumb); ?>" />
                    <div class="image__credit">
                        Image: <?php echo $tupianlaiyuan; ?>
                    </div>
                </figure>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 medium-4 columns">
            <div class="article-details--small">
                <p><?php echo $inputtime; ?></p>
            </div>
            <div class="article-details--large">
                <div class="article-details__meta">
                    <div class="article-details__header">
                        已发布
                    </div>
                    <div>
                        <?php echo $inputtime; ?>
                    </div>
                </div>
                <div class="article-details__meta">
                    <div class="article-details__header">
                        分享
                    </div>
                    <div>
                    <?php if ($fn_include = $this->_include("layout/share-a.html")) include($fn_include); ?>
                    </div>
                </div>
            </div>
            <div class="further-reading-group">
                <div class="list-group__header">
                    <div class="further-reading__header-title">
                        最新文章
                    </div>
                </div>
               <?php if ($fn_include = $this->_include("side.html")) include($fn_include); ?>
            </div>
        </div>
        <div class="article-show-container">
            <div class="article-body">
                <?php echo $content; ?>
            </div>
            <div class="post-article">
                <div class="post-article__share">
                    分享
                </div>
                <div>
                    <?php if ($fn_include = $this->_include("layout/share-a.html")) include($fn_include); ?>
                </div>
                <div class="article-source">
                </div>
            </div>
            <!--<div class="post-article">
                <div class="newsletter">
                    <div class="newsletter__callout">
                        <b>订阅最新动态</b>
                        <div class="newsletter__callout__description">
                            全球议题一周更新
                        </div>
                    </div>
                    <form action="" method="post" target="_blank" class="newsletter__form">
                        <div class="newsletter__form__field">
                            <input type="email" name="EMAIL" placeholder="电子邮箱" class="newsletter__form__input" />
                            <input type="submit" value="订阅" name="subscribe" class="newsletter__form__submit" />
                        </div>
                    </form>
                </div>
            </div>-->
        </div>
    </div>
</section>