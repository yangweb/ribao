<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo dr_lang('html-001', SITE_NAME); ?></title>
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" href="<?php echo SITE_PATH; ?>mantob/statics/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo SITE_PATH; ?>mantob/statics/css/font-awesome/css/font-awesome.css" />
<link href="<?php echo SITE_PATH; ?>mantob/statics/css/login/metro.css" rel="stylesheet" />
<link href="<?php echo SITE_PATH; ?>mantob/statics/css/login/style.css?V2" rel="stylesheet" />

</head>
<body class='login login-1'>
    <script type="text/javascript">var siteurl = "<?php echo SITE_PATH;  echo SELF; ?>";var memberpath = "<?php echo MEMBER_PATH; ?>";</script>
    <script type="text/javascript" src="<?php echo SITE_PATH; ?>member/statics/js/<?php echo SITE_LANGUAGE; ?>.js"></script>
    <script type="text/javascript" src="<?php echo SITE_PATH; ?>member/statics/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo SITE_PATH; ?>member/statics/js/validate.js"></script>
    <script type="text/javascript" src="<?php echo SITE_PATH; ?>mantob/statics/libs/js/artDialog.js"></script>
    <script type="text/javascript" src="<?php echo SITE_PATH; ?>member/statics/js/admin.js"></script>
    <script type="text/javascript" src="<?php echo SITE_PATH; ?>member/statics/js/mantob.js"></script>
    <script type="text/javascript">
    $(function() {
        <?php if ($username) { ?>
        $("#password").focus();
        <?php } else { ?>
        $("#username").focus();
        <?php } ?>
        top.$('.page-loading').remove();
    });
    </script>


    <div class="logo">
    
  </div>
  <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
  <div class="content">
    <!-- BEGIN LOGIN FORM -->
<form action="" method='post' class='form-validate'>
<h3 class="form-title"><em><i style="color:#219805;">Ma</i>n<i style="color:#219805;">To</i>b</em>
后台管理中心</h3>
      <div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>
       
      </div>
      <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
       
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-user"></i>
           
            <input id="username" type="text" name="username" value="<?php echo $username; ?>" placeholder="用户名" class='m-wrap placeholder-no-fix' required />
          </div>
          <span class="help-block"><span class="field-validation-valid" data-valmsg-for="username" data-valmsg-replace="true"></span></span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-lock"></i>
          
            <input type="password" id="password" name="password" placeholder="<?php echo lang('html-061'); ?>" class='m-wrap placeholder-no-fix' required />
          </div>
           <span class="help-block"><span class="field-validation-valid" data-valmsg-for="password" data-valmsg-replace="true"></span></span>
        </div>
      </div>
      <div class="form-actions">

              
                 <?php if (SITE_ADMIN_CODE) { ?>
       <input id="verifycode" name="code" placeholder="验证码" style="width:90px;height:35px;;float:left;margin-right:9px;" type="text" value="" class='input-block-level' />
       <?php echo dr_code(100, 35);  } ?>
        <button type="submit" class="btn green pull-right">
        登录 <i class="m-icon-swapright m-icon-white"></i>
        </button>   
        <div><span class="field-validation-valid" data-valmsg-for="error" data-valmsg-replace="true"></span> </div>
      </div>
     <!--  <div class="forget-password">
        <h4>忘记密码 ?</h4>

        <p>
          
        </p>
      </div> -->
    
</form>    <!-- END LOGIN FORM -->        
    
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div class="copyright">
    2013 © Mantob Design from <a href="http://www.zanjs.com" target="_blank"> zan</a>
  </div>
</body>

</html>
