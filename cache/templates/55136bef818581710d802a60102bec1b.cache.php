<footer>
    <div class="footer__wrapper">
        <div class="row">
            <div class="footer__newsletter">
                <div class="newsletter">
                    <div class="newsletter__callout">
                        <div class="newsletter__callout__description">全球议题一周更新</div>
                    </div>
                </div>
            </div>

            <div class="footer__socialmedia">
                <div class="footer__socialmedia-title">关注我们</div>
                <div class="footer__socialmedia-group">
                    <a href="<?php echo man_block(9); ?>" class="social-share--linkedin" target="_blank"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="footer__list-group">
            <div class="list-group">
                <div class="list-group__header">
                    <span><?php echo $ci->get_cache('page-1', 'data', 'index', 1, 'name'); ?></span>
                </div>
                <div class="list-group__items">
                    <?php $return = $this->list_tag("action=page module=index pid=1"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                    <div class="list-group__item">
                        <a href="<?php echo $t['url']; ?>"><?php echo $t['name']; ?></a>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
        <div class="footer__list-group">
            <div class="list-group">
                <div class="list-group__header">
                    <span>媒体</span>
                </div>
                <div class="list-group__items">
                    <?php $return_t = $this->list_tag("action=category module=agenda pid=8  return=t"); if ($return_t) extract($return_t); $count_t=count($return_t); if (is_array($return_t)) { foreach ($return_t as $key_t=>$t) { ?>
                    <div class="list-group__item">
                        <a href="<?php echo $t['url']; ?>"><?php echo $t['name']; ?></a>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
        <!--<div class="footer__list-group">
            <div class="list-group">
                <div class="list-group__header">
                    <span>会员和合作伙伴</span>
                </div>
                <div class="list-group__items">
                    
                    <div class="list-group__item">
                        <a href="">合作机构</a>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="footer__info-container">
                <div class="footer__info-group">
                   <?php echo man_block(2); ?>
                </div>
                <div class="footer__info-group">
                    <a href="<?php echo $ci->get_cache('page-1', 'data', 'index', 11, 'url'); ?>"><?php echo $ci->get_cache('page-1', 'data', 'index', 11, 'name'); ?></a>
                </div>
            </div>
        </div>
    </div>
</footer>