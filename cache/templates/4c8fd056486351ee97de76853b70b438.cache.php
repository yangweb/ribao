<div class="meganav-content" data-pane="events">
    <div class="meganav-content__description">
        <div class="row">
            <div class="small-12 columns">
                <?php echo man_block(5); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-6 columns">
            <div class="mega-list-group__header">
                <span>会议预告</span>
            </div>
            <div class="mega-event-summary">
                <div class="gutter-marking"></div>
                <?php $return = $this->list_tag("action=module flag=2 module=events order=updatetime num=1"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                <article class="tout tout--default tout--event">
                    <a class="tout__link" href="<?php echo $t['url']; ?>">
                        <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                         <div class="tout__details">
                         <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                         <div class="tout__meta">
                            <div class="caption">
                                <span><?php echo man_date($t['_starttime']); ?></span>
                                <span><?php echo $t['address']; ?></span>
                            </div>
                         </div>
                    </div>
                    </a>
                </article>
                <?php } } ?>
            </div>
        </div>
        <div class="small-6 columns">
            <div class="mega-list-group__header">
                <span>会议回顾</span>
            </div>
            <?php $return = $this->list_tag("action=module flag=3 module=events order=updatetime num=4"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
            <article class="tout tout--mini tout--event">
                <a class="tout__link" href="<?php echo $t['url']; ?>">
                    <figure class="placeholder tiny">
                        <img class="image" alt="" src="<?php echo man_thumb($t['thumb']); ?>" />
                        <img class="tiny-fallback" src="<?php echo man_thumb($t['thumb'],97,72); ?>" alt="<?php echo $t['title']; ?>" />
                    </figure>
                    <div class="tout__details">
                        <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                        <div class="tout__meta">
                            <div class="caption">
                                <span><?php echo man_date($t['_starttime']); ?></span>
                                <span><?php echo $t['address']; ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            <?php } } ?>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="meganav-section-end">
                <a href=""> <span>更多会议</span> <img src="<?php echo HOME_THEME_PATH; ?>build/imgs/link-arrow-9adfe464cd987bc5b3097b1218678552fcdd94a3e6cb7b3664bd1f75205873cc.svg" alt="Link" /> </a>
            </div>
        </div>
    </div>
</div>