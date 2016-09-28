<section>
    <div class="homepage">
        <div class="row">
            <div class="small-12 columns">
                <?php $return = $this->list_tag("action=module flag=1 module=agenda order=updatetime num=3"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                <article class="tout tout--hero tout--article">
                    <a class="tout__link" href="<?php echo $t['url']; ?>">
                        <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                        <div class="tout__details">
                            <div class="tout__topic caption"></div>
                            <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                            <div class="tout__meta">
                                <div class="caption">
                                    <span class="article__author bold"><?php echo $t['author']; ?></span>
                                    <span><?php echo man_date($t['_updatetime'],null,''); ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>
                <?php } } ?>
            </div>
        </div>
        <div class="row">
            <div class="columns tout-list tout-list--grid">
                <div class="tout-list--grid__container">
                    <?php $return = $this->list_tag("action=module flag=2 module=agenda order=updatetime num=6"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                    <article class="tout tout--default tout--article">
                        <a class="tout__link" href="<?php echo $t['url']; ?>">
                            <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                            <div class="tout__details">
                                <div class="tout__topic caption"></div>
                                <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                                <div class="tout__meta">
                                    <div class="caption">
                                        <span class="article__author bold"><?php echo $t['author']; ?></span>
                                        <span><?php echo man_date($t['_updatetime'],null,''); ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php } } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="bottom-border"></div>
            </div>
            <div class="small-12 columns">
                <div class="strapline">
                   <?php echo man_block(1); ?>
                </div>
            </div>
            <div class="small-12 columns">
                <div class="press-release-container">
                    <?php $return_t = $this->list_tag("action=module module=press num=1  return=t"); if ($return_t) extract($return_t); $count_t=count($return_t); if (is_array($return_t)) { foreach ($return_t as $key_t=>$t) { ?>
                    <div class="press-release__content">
                        <div class="press-release__caption">
                            <span class="bold"><?php echo $ci->get_cache('module-1-press', 'category', $t['catid'], 'name'); ?>通稿</span>
                            <span><?php echo man_fdate($t['_updatetime']); ?> 发布</span>
                        </div>
                        <a class="press-release__text" href="<?php echo $t['url']; ?>"><?php echo $t['title']; ?></a>
                    </div>
                    <div class="press-release__more">
                        <a class="press-release__trigger" href="<?php echo $ci->get_cache('module-1-press', 'category', 1, 'url'); ?>">
                            <span>所有<?php echo $ci->get_cache('module-1-press', 'category', 1, 'name'); ?></span>
                            <img src="<?php echo HOME_THEME_PATH; ?>build/imgs/thin-chevron-8a1b04b5181ea90a0b42486358eb215e5c907b3aba8d6e1fb852d05d2eda620b.svg" alt="more" />
                        </a>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="highlights-section border-bottom">
        <div class="row">
            <div class="small-12 columns">
                <div class="events-header">
                    议题表
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 large-8 columns">
                <div class="gutter-marking"></div>
                <div class="sbs-section-header">
                    <span>全球议题</span>
                </div>
                <?php $return = $this->list_tag("action=module flag=3 module=agenda order=updatetime num=6"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                <article class="tout tout--large tout--article">
                    <a class="tout__link" href="<?php echo $t['url']; ?>">
                        <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                        <div class="tout__details">
                            <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                            <div class="tout__meta">
                                <div class="caption">
                                    <span class="article__author bold"><?php echo $t['author']; ?></span>
                                    <span><?php echo man_date($t['_updatetime'],null,''); ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>
                <?php } } ?>
            </div>
            <div class="small-12 medium-6 large-4 columns">
                <div class="row">
                    <div class="small-12 columns">
                        <div class="sbs-section-header">
                            <span>地区议题</span>
                        </div>
                        <?php $return = $this->list_tag("action=module flag=4 module=agenda order=updatetime num=6"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                        <article class="tout tout--mini tout--article">
                            <a class="tout__link" href="<?php echo $t['url']; ?>">
                                <?php if ($fn_include = $this->_include("data/image-tiny.html")) include($fn_include); ?>
                                <div class="tout__details">
                                    <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                                    <div class="tout__meta">
                                        <div class="caption">
                                            <span class="article__author bold"></span>
                                            <span>10 Aug 2016</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                        <?php } } ?>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-6 large-4 columns">
                <div class="row">
                    <div class="small-12 columns">
                        <div class="sbs-section-header">
                            <span>行业议题</span>
                        </div>
                        <?php $return = $this->list_tag("action=module flag=5 module=agenda order=updatetime num=6"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                        <article class="tout tout--mini tout--article">
                            <a class="tout__link" href="<?php echo $t['url']; ?>">
                                <?php if ($fn_include = $this->_include("data/image-tiny.html")) include($fn_include); ?>
                                <div class="tout__details">
                                    <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                                    <div class="tout__meta">
                                        <div class="caption">
                                            <span class="article__author bold"></span>
                                            <span>25 Jul 2016</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>