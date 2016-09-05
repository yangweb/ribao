<section>
    <div class="global-challenges-index-page">
        <?php $imgid = $ci->get_cache('module-1-challenges', 'category', 2, 'thumb'); 
            $image = man_thumb($imgid);
            $cname = $ci->get_cache('module-1-challenges', 'category', 2, 'name');
            $description = $ci->get_cache('module-1-challenges', 'category', 2, 'description'); 
         ?>
        <div class="row">
            <div class="global-challenges-description">
                <h1 class="page-title"><?php echo $cname; ?></h1>
                <p><?php echo $description; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="columns">
                <div class="row">
                    <?php $return = $this->list_tag("action=module catid=2 field=title,url,thumb order=updatetime"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                    <div class="global-agenda-summary">
                        <a href="<?php echo $t['url']; ?>" title="<?php echo $t['title']; ?>">
                            <div class="global-agenda-summary__image">
                                <img class="image" src="<?php echo man_thumb($t['thumb']); ?>" alt="<?php echo $t['title']; ?>" />
                            </div>
                            <div class="global-agenda-summary__title summary__title">
                               <?php echo $t['title']; ?>
                            </div>
                        </a>
                    </div>
                    <?php } } ?>
                    <div class="global-agenda-summary">
                        <a href="<?php echo $ci->get_cache('module-1-challenges', 'category', 3, 'url'); ?>">
                            <div class="global-agenda-summary__image">
                                <img class="image" src="<?php echo HOME_THEME_PATH; ?>build/imgs/more-projects-aad472c052fac052b43594bd6baeb04586e28519b391eee12ea8d7e455ba3458.jpg" alt="More" />
                            </div>
                            <div class="global-agenda-summary__title summary__title">
                                更多论坛项目
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>