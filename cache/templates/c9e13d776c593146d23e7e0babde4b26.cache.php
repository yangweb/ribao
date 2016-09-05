<!doctype html>
<html class="no-js" lang="zh-CN" build="Julian">
<head>
    <title><?php echo $meta_title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-param" content="authenticity_token" />
    <meta name="csrf-token" content="" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
    <meta property="og:title" content="<?php echo $meta_title; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://nnn.li/" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="<?php echo $meta_keywords; ?>" />
    <meta property="og:site_name" content="<?php echo $meta_title; ?>" />
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>" />
    <meta name="description" content="<?php echo $meta_description; ?>" />
    <meta name="twitter:title" content="<?php echo $meta_title; ?>" />
    <meta name="twitter:card" content="Julian" />
    <meta name="twitter:url" content="https://nnn.li/" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:description" content="<?php echo $meta_description; ?>" />
    <link rel="stylesheet" media="all" href="<?php echo HOME_THEME_PATH; ?>build/css/application.css" />
    <link rel="stylesheet" media="print" href="<?php echo HOME_THEME_PATH; ?>build/css/print.css" />
    <link rel="canonical" href="https://nnn.li/" />
    <link rel="alternate" type="application/atom+xml" title="ATOM" href="https://nnn.li/feed" />
    <script src="<?php echo HOME_THEME_PATH; ?>build/js/application.js"></script>
    <script>
        var siteUrl = '<?php echo SITE_URL; ?>',
            md5 = '<?php echo md5(SYS_KEY); ?>';
     
    </script>
    <?php $return = $this->list_tag("action=navigator type=0 id=2"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
    <link rel="apple-touch-icon" type="image/png" href="<?php echo man_thumb($t['thumb']); ?>" sizes="144x144" />
    <?php } }  $return = $this->list_tag("action=navigator type=0 id=3"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
    <link rel="icon" type="image/png" href="<?php echo man_thumb($t['thumb']); ?>" sizes="192x192" />
    <?php } } ?>
</head>
<body>
<?php if ($fn_include = $this->_include("layout/share.html")) include($fn_include); ?>