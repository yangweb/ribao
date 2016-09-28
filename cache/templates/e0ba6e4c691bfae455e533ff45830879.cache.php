<section>
    <div class="row page">
        <h1 class="page-title columns"> <?php echo MODULE_NAME; ?> </h1>
        <div class="columns">
            <div class="tout-list tout-list--grid">
                <div class="tout-list--grid__container">
                     <?php if ($fn_include = $this->_include("data/article-data.html", "/")) include($fn_include); ?>
                </div>
            </div>
        </div>
         <?php if ($fn_include = $this->_include("layout/pagination.html")) include($fn_include); ?>
    </div>
</section>