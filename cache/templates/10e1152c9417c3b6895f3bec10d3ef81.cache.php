<section>
    <div class="highlights-section row">
        <div class="small-12 columns">
            <div class="events-header">
                即将开始
            </div>
            <?php $return = $this->list_tag("action=module flag=2 field=thumb,title,url,address,starttime order=displayorder,updatetime num=5"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  if ($fn_include = $this->_include("article-info.html")) include($fn_include);  } } ?>
        </div>
    </div>
    <div class="list-group row">
        <div class="columns">
            <h2 class="events-header"><?php echo MODULE_NAME; ?>预告</h2>
            <div class="tout-list tout-list--grid tout-list--grid-x2">
                <div class="tout-list--grid__container">
                    <?php $return = $this->list_tag("action=module flag=1 field=thumb,title,url,address,starttime order=displayorder,updatetime num=10"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  if ($fn_include = $this->_include("article-info.html")) include($fn_include);  } } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="list-group row">
        <div class="columns">
            <h2 class="events-header"><?php echo MODULE_NAME; ?>回顾 <?php $time = time(); ?></h2>
            <div class="tout-list tout-list--grid tout-list--grid-x2">
                <div class="tout-list--grid__container">
                    <?php $sqlold = 'select * from @#1_events where id>1 order by id desc limit 10';
                         $now = time();
                      $return = $this->list_tag("action=sql sql='select * from @#1_events where starttime<$now order by id desc limit 10' "); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  if ($fn_include = $this->_include("article-info.html")) include($fn_include);  } } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <a href="<?php echo $ci->get_cache('module-1-events', 'category', 1, 'url'); ?>">
                <div class="past-events-button">
                    更多会议回顾
                    <img class="link-nub__right-icon" src="<?php echo HOME_THEME_PATH; ?>build/imgs/link-arrow-9adfe464cd987bc5b3097b1218678552fcdd94a3e6cb7b3664bd1f75205873cc.svg" alt="Link arrow" />
                </div>
            </a>
        </div>
    </div>
</section>