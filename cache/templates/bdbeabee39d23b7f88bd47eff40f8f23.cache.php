<section>
    <div class="page row">
        <?php if ($fn_include = $this->_include("data/page-sidebar.html")) include($fn_include); ?>
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