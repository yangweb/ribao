<div class="meganav-content" data-pane="reports">
    <div class="meganav-content__description">
        <div class="row">
            <div class="small-12 columns">  
               <?php echo man_block(6); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="columns">
            <div class="tout-list tout-list--grid">
                <div class="tout-list--grid__container">
                     <?php $return_t = $this->list_tag("action=module  module=reports num=3 catid=1   return=t"); if ($return_t) extract($return_t); $count_t=count($return_t); if (is_array($return_t)) { foreach ($return_t as $key_t=>$t) { ?>
                    <article class="tout tout--default tout--report">
                        <a class="tout__link" href="<?php echo $t['url']; ?>">
                            <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                            <div class="tout__details">
                                <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                                <div class="tout__meta">
                                    <div class="caption">
                                        <span><?php echo man_date($t['_updatetime'],'Y-m-d',''); ?></span>
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
    <div class="row">
        <div class="small-12 columns">
            <div class="meganav-section-end">
                <a href="<?php echo $ci->get_cache('module-1-reports', 'category', 1, 'url'); ?>"> <span>更多</span> <img src="<?php echo HOME_THEME_PATH; ?>build/imgs/link-arrow-9adfe464cd987bc5b3097b1218678552fcdd94a3e6cb7b3664bd1f75205873cc.svg" alt="Link arrow" /> </a>
            </div>
        </div>
    </div>
</div>