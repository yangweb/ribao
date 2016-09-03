<section>
    <div class="page row">
        <div class="page__sidebar">
            <nav class="about-page__nav">
                <ul class="page__items">
                    <li class="list-group__header"> <span><?php echo $ci->get_cache('page-1', 'data', 'index', 1, 'name'); ?></span> </li>
                    <?php $return = $this->list_tag("action=page module=index pid=1"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                    <li class="page__item <?php if (($t['child'] &&  (strpos($t['childids'], $id))) || ($t['child'] && $id == $t['id'])) { ?>page__item--active-parent<?php } ?>">
                        <?php if (($id == $t['id']) ||($id && strpos($t['childids'], $id))) { ?>
                        <div class="<?php if ($t['child']) { ?>page__item--active-container<?php } ?>">
                            <?php if ($id == $t['id']) { ?>
                            <div class="bold">
                                <?php echo $t['name']; ?>
                            </div>
                            <?php } else { ?>
                                 <a class="page__item" href="<?php echo $t['url']; ?>"><?php echo $t['name']; ?></a> 
                            <?php } ?>
                        </div>
                        <?php } else { ?>
                        <a class="page__item" href="<?php echo $t['url']; ?>"><?php echo $t['name']; ?></a> 
                        <?php }  if (($t['child'] &&  (strpos($t['childids'], $id))) || ($t['child'] && $id == $t['id'])) { ?>
                        <ul class="page__items">
                            <?php $return_t2 = $this->list_tag("action=page module=index pid=$t[id]  return=t2"); if ($return_t2) extract($return_t2); $count_t2=count($return_t2); if (is_array($return_t2)) { foreach ($return_t2 as $key_t2=>$t2) { ?>
                            <li class="page__item">
                                <img src="<?php echo HOME_THEME_PATH; ?>build/imgs/thin-chevron-8a1b04b5181ea90a0b42486358eb215e5c907b3aba8d6e1fb852d05d2eda620b.svg" alt="" />
                                <?php if ($t2['id'] == $id) { ?>
                                <span class="bold"><?php echo $t2['name']; ?></span>
                                <?php } else { ?>
                                <a href="<?php echo $t2['url']; ?>"><?php echo $t2['name']; ?></a> 
                                <?php } ?>
                            </li>
                            <?php } } ?>
                        </ul>
                        <?php } ?>
                    </li>
                    
                    <?php } } ?>
                </ul>
            </nav>
        </div>
        <div class="page__content">
            <div class="dropdown">
                <div class="dropdown__title">
                    <span><?php echo $name; ?></span>
                </div>
                <img class="dropdown__control-down" src="<?php echo HOME_THEME_PATH; ?>build/imgs/chevron-down-3f9ca003482f23b97e2bd52dedee52d7ce7b4e34b7a9f97b62440d1c4e9c969d.svg" alt="Chevron down" />
                <img class="dropdown__control-up" src="<?php echo HOME_THEME_PATH; ?>build/imgs/chevron-up-3f22c2182c5866d2b046ed3d172aeddd1825f0b38bae9b6d9f099ae35731ea88.svg" alt="Chevron up" />
                <div class="dropdown__choices">
                    <?php if (is_array($related)) { $count=count($related);foreach ($related as $t) { ?>
                    <div class="dropdown__choice">
                        <a href="<?php echo $t['url']; ?>"><?php echo $t['name']; ?></a>
                    </div>
                    <?php } } ?>
                </div>
            </div>
            <div class="page__header">
               <?php echo $name; ?>
            </div>
            <div>
                <?php echo $content; ?>
            </div>
            <div>
            </div>
        </div>
    </div>
</section>