<section>

    <div class="homepage">
        <div class="row">
            <div class="small-12 columns">
                <div class='sangar-slideshow-container' id='sangar-example'>
                    <div class='sangar-content-wrapper'>
                        <?php $return = $this->list_tag("action=navigator type=1"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                        <div class='sangar-content'>
                            <img src='<?php echo man_thumb($t['thumb']); ?>' alt="<?php echo $t['name']; ?>" title="<?php echo $t['title']; ?>" />
                            <a href='<?php echo $t['url']; ?>' target="_blank" title="<?php echo $t['title']; ?>"></a>
                            <div class="sangar-textbox">
                                <div class="sangar-textbox-inner sangar-position-sticky-bottom">
                                    <div class="sangar-textbox-content" style="width: 40%;background: url(<?php echo HOME_THEME_PATH; ?>build/imgs/background.png) repeat scroll 0% 0% transparent !important;">
                                        <!--<p class="sangar-slide-title" style="color:#ffffff;font-size:22px;">Title</p>-->
                                        <div style="color:#ffffff;">

                                            <p><?php echo $t['name']; ?></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>

                    </div>
                </div>
            </div>
        </div>
        <!--banner end-->
    </div>

    <div class="highlights-section border-bottom">

        <div class="row">
            <div class="small-12 large-8 columns">
                <!--<div class="gutter-marking"></div>-->
                <div class="sbs-section-header">
                    <span>媒体</span>
                </div>
                <?php $return = $this->list_tag("action=module flag=1 module=agenda order=updatetime num=3"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                <article class="tout tout--large tout--article">
                    <a class="tout__link" href="<?php echo $t['url']; ?>">
                        <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                        <div class="tout__details">
                            <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                            <div class="tout__meta">
                                <div class="caption">
                                    <span class="article__author bold"><?php echo $t['author']; ?></span>
                                    <span><?php echo man_date($t['_updatetime'],null,''); ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>

                <?php } } ?>
            </div>
            <div class="small-12 medium-12 large-4 columns">
                <div class="row">
                    <div class="small-12 columns">
                        <div class="sbs-section-header">
                            <span>会议</span>
                        </div>
                        <?php $return = $this->list_tag("action=module flag=4 module=events order=updatetime num=3"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                        <article class="tout tout--default tout--article">
                            <a class="tout__link" href="<?php echo $t['url']; ?>">
                                <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                                <div class="tout__details bhide">
                                    <div class="tout__topic caption"></div>
                                    <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                                        <div class="tout__meta">
                                            <div class="caption">
                                                <span class="article__author bold"><?php echo $t['author']; ?></span>
                                                <span><?php echo man_date($t['_updatetime'],null,''); ?></span>
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
            <div class="small-12 large-12 columns">
                <div class="sbs-section-header">
                    <span>学术</span>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="columns">

                <div class="tout-list tout-list--grid tout-list--grid-x2">
                    <div class="tout-list--grid__container">
                        <?php $return = $this->list_tag("action=module flag=1 module=reports order=updatetime num=4"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                        <article class="tout tout--default tout--event">
                            <a class="tout__link" href="<?php echo $t['url']; ?>">
                                <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                                <div class="tout__details">
                                    <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                                    <p class="tout__description"><?php echo $t['description']; ?></p>
                                    <div class="tout__meta">
                                        <div class="caption">
                                            <span><?php echo man_date($t['_updatetime'],null,''); ?></span>
                                            
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
            <div class="small-12 large-12 columns">
                <div class="sbs-section-header">
                    <span>合作</span>

                </div>
            </div>
            <div class="columns tout-list tout-list--grid">
                <div class="tout-list--grid__container">
                    <?php $return = $this->list_tag("action=module flag=2 module=challenges order=updatetime num=4"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                    <article class="tout tout--default tout--article">
                        <a class="tout__link" href="<?php echo $t['url']; ?>">
                            <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                            <div class="tout__details">
                                <div class="tout__topic caption"></div>
                                <h3 class="tout__title"><?php echo $t['title']; ?></h3>
                                <div class="tout__meta">
                                    <div class="caption">
                                        <span class="article__author bold"><?php echo $t['author']; ?></span>
                                        <span><?php echo man_date($t['_updatetime'],null,''); ?></span>
                                    </div>
                                </div>
                            </div></a>
                    </article>
                    <?php } } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 large-12 columns">
                <div class="sbs-section-header">
                    <span>关于</span>
                </div>
            </div>
            <div class="columns tout-list tout-list--grid">
                <div class="tout-list--grid__container">
                    <?php $return = $this->list_tag("action=page module=index pid=1"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                    <article class="index-page--article">
                        <a class="tout__link" href="<?php echo $t['url']; ?>">
                            <?php if ($fn_include = $this->_include("data/image.html")) include($fn_include); ?>
                            <div class="tout__details">
                                <div class="tout__topic caption"></div>
                                <h3 class="tout__title"><?php echo $t['name']; ?></h3>
                            </div>
                        </a>
                    </article>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>

</section>
<script type='text/javascript'>
    $(document).ready(function($) {
        $('#sangar-example').sangarSlider({
            timer: false, // true or false to have the timer
            width: 1050, // slideshow width
            height: 500, // slideshow height
            directionalNav: 'show',
            pagination: 'bullet', // bullet, content-horizontal, content-vertical, none
            paginationContent: ["Lorem Ipsum Dolor", "Dolor Sit Amet", "Consectetur", "Do Eiusmod", "Magna Aliqua"],
            paginationContentWidth: 200, // slideshow width
        });
    })
</script>