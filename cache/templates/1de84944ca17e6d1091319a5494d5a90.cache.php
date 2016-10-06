<div class="meganav-content" data-pane="challenges">
    <div class="meganav-content__description">
        <div class="row">
            <div class="small-12 columns">
               <?php echo man_block(7); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-4 columns">
            <div class="gutter-marking"></div>
            <div class="mega-list-group__header">
                <span class="list-group__title">“应对全球挑战”行动倡议</span>
            </div>
            <ul class="mega-list-group">
                <?php $return_t = $this->list_tag("action=module  module=challenges  catid=2   return=t"); if ($return_t) extract($return_t); $count_t=count($return_t); if (is_array($return_t)) { foreach ($return_t as $key_t=>$t) { ?>
                <li class="mega-list-group__item"> <a href="<?php echo $t['url']; ?>"><?php echo $t['title']; ?></a> </li>
                <?php } } ?>
            </ul>
        </div>
        <div class="small-8 columns">
            <div class="mega-list-group__header">
                <span class="list-group__title">最新活动</span>
            </div>
            <div class="row">
                <div class="columns">
                    <div class="tout-list tout-list--grid tout-list--grid-x2">
                        <div class="tout-list--grid__container">
                            <?php $return = $this->list_tag("action=module flag=1 module=challenges order=updatetime num=10"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                            <article class="tout tout--default tout--project">
                                <a class="tout__link" href="<?php echo $t['url']; ?>" title="<?php echo $t['title']; ?>">
                                    <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                                    <div class="tout__details">
                                        <div class="tout__topic caption"></div>
                                        <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                                    </div>
                                </a>
                            </article>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="meganav-section-end">
                <a href="<?php echo $ci->get_cache('module-1-challenges', 'category', 3, 'url'); ?>"> <span>更多</span> <img src="<?php echo HOME_THEME_PATH; ?>build/imgs/link-arrow-9adfe464cd987bc5b3097b1218678552fcdd94a3e6cb7b3664bd1f75205873cc.svg" alt="Link" /> </a>
            </div>
        </div>
    </div>
</div>