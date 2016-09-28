<div class="row collapse">
     <!-- 最新数据 -->
     <?php $return = $this->list_tag("action=module catid=$catid order=updatetime num=8"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
    <article class="tout tout--mini tout--article">
        <a class="tout__link" href="<?php echo $t['url']; ?>" title="<?php echo $t['title']; ?>">
            <?php if ($fn_include = $this->_include("data/image-tiny.html")) include($fn_include); ?>
            <div class="tout__details">
                <h3 class="tout__title"><?php echo man_strcut($t['title'], 18); ?></h3>
                <div class="tout__meta">
                    <div class="caption">
                        <span class="article__author bold"><?php echo $t['author']; ?></span>
                        <span><?php echo man_date($t['_updatetime']); ?></span>
                    </div>
                </div>
            </div>
        </a>
    </article>
    <?php } } ?>                            
    <div class="further-reading__more">
        <a href="<?php echo MODULE_URL; ?>">
            <span class="further-reading__more-link">了解更多<?php echo MODULE_NAME; ?></span>
            <span class="further-reading__more-arrow">
                 <img src="<?php echo HOME_THEME_PATH; ?>build/imgs/further-reading-arrow-984f0b2d46101716e9c621b9fc9e0192e3e5be4e69b301ddf6e866ef4108d8db.svg" alt="Further" /> 
             </span>
        </a>
    </div>
</div>