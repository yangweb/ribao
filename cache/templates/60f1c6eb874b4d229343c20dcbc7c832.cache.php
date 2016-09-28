<div class="meganav-content" data-pane="agenda">
    <?php if ($fn_include = $this->_include("layout/description.html")) include($fn_include); ?>
    <div class="row meganav-agenda-subpane" data-subpane="global">
        <div class="columns">
            <div class="tout-list tout-list--grid tout-list--grid-">
                <div class="tout-list--grid__container">
                        <?php $return_t = $this->list_tag("action=module  module=agenda num=3 catid=5  return=t"); if ($return_t) extract($return_t); $count_t=count($return_t); if (is_array($return_t)) { foreach ($return_t as $key_t=>$t) {  if ($fn_include = $this->_include("layout/nav-article.html")) include($fn_include);  } } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row meganav-agenda-subpane" data-subpane="regional">
        <div class="columns">
            <div class="tout-list tout-list--grid tout-list--grid-">
                <div class="tout-list--grid__container">
                        <?php $return_t = $this->list_tag("action=module  module=agenda num=3 catid=6   return=t"); if ($return_t) extract($return_t); $count_t=count($return_t); if (is_array($return_t)) { foreach ($return_t as $key_t=>$t) {  if ($fn_include = $this->_include("layout/nav-article.html")) include($fn_include);  } } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row meganav-agenda-subpane" data-subpane="industry">
        <div class="columns">
            <div class="tout-list tout-list--grid tout-list--grid-">
                <div class="tout-list--grid__container">
                        <?php $return_t = $this->list_tag("action=module  module=agenda num=3 catid=7  return=t"); if ($return_t) extract($return_t); $count_t=count($return_t); if (is_array($return_t)) { foreach ($return_t as $key_t=>$t) {  if ($fn_include = $this->_include("layout/nav-article.html")) include($fn_include);  } } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="meganav-section-end">
                <a href="<?php echo SITE_URL; ?>agenda"> <span>更多</span> <img src="<?php echo HOME_THEME_PATH; ?>build/imgs/link-arrow-9adfe464cd987bc5b3097b1218678552fcdd94a3e6cb7b3664bd1f75205873cc.svg" alt="Link arrow" /> </a>
            </div>
        </div>
    </div>
</div>