<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
function man_confirm_move() {
	art.dialog.confirm("<?php echo lang('015'); ?>", function(){
		$('#action').val('move');
		var _data = $("#myform").serialize();
		var _url = window.location.href;
		if ((_data.split('ids')).length-1 <= 0) {
			$.dialog.tips(lang['select_null'], 2);
			return true;
		}
		// 将表单数据ajax提交验证
		$.ajax({type: "POST",dataType:"json", url: _url, data: _data,
			success: function(data) {
				//验证成功
				if (data.status == 1) {
					$.dialog.tips(data.code, 3, 1);
					$("input[name='ids[]']:checkbox:checked").each(function(){
						$.post("<?php echo SITE_URL;  echo APP_DIR; ?>/index.php?c=show&m=create_html&id="+$(this).val(), {}, function(){});
					});
                    $.post("<?php echo SITE_URL;  echo APP_DIR; ?>/index.php?c=home&m=create_list_html&id="+$('#move_id').val(), {}, function(){});
					setTimeout('window.location.reload(true)', 3000); // 刷新页
				} else {
					$.dialog.tips(data.code, 3, 2);
					return true;
				}
			},
			error: function(HttpRequest, ajaxOptions, thrownError) {
				alert(HttpRequest.responseText);
			}
		});
		return true;
	});
	return false;
}
// 复制内容
function man_copy_content(id) {
    art.dialog.confirm("<?php echo lang('html-768'); ?>", function(){
        // 将表单数据ajax提交验证
        $.ajax({type: "POST",dataType:"json", url: "<?php echo man_url(APP_DIR.'/home/copy/'); ?>&id="+id,success: function(data) {
                if (data.status == 1) {
                    man_tips(data.code, 3, 1);
                    setTimeout('window.location.reload(true)', 3000); // 刷新页
                } else {
                    man_tips(data.code);
                }
            },
            error: function(HttpRequest, ajaxOptions, thrownError) {
                alert(HttpRequest.responseText);
            }
        });
        return true;
    });
}
</script>
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?>
	</div>
	<div class="bk10"></div>
	<div class="explain-col">
		<?php if ($flag) { ?>
		<font color="gray"><?php echo lang('html-490'); ?></font>
		<?php } else { ?>
        <form method="post" action="" name="searchform" id="searchform">
		<input name="search" id="search" type="hidden" value="1" />
		<?php if ($is_category) {  echo $select2; ?>
		&nbsp;
		<?php } ?>
		<select name="data[field]">
			<option value="id" <?php if ($param['field']=='id') { ?>selected<?php } ?>>Id</option>
			<?php if (is_array($field)) { $count=count($field);foreach ($field as $t) {  if ($t['ismain']) { ?>
			<option value="<?php echo $t['fieldname']; ?>" <?php if ($param['field']==$t['fieldname']) { ?>selected<?php } ?>><?php echo $t['name']; ?></option>
			<?php }  } } ?>
		</select> ：
		<input type="text" class="input-text" value="<?php echo $param['keyword']; ?>" size="30" placeholder="<?php echo lang('html-249'); ?>" name="data[keyword]" />&nbsp;
		<?php echo lang('105'); ?> ：
		<?php echo man_field_input('start', 'Date', array('option'=>array('format'=>'Y-m-d','width'=>80)), (int)$param['start']); ?>
		-&nbsp;
		<?php echo man_field_input('end', 'Date', array('option'=>array('format'=>'Y-m-d','width'=>80)), (int)$param['end']); ?>
		&nbsp;
		<input type="submit" value="<?php echo lang('search'); ?>" class="button" name="search" />
		</form>
		<?php } ?>
	</div>
	<div class="bk10"></div>
	<div class="table-list">
		<form action="" method="post" name="myform" id="myform">
        <input name="action" id="action" type="hidden" value="" />
		<table width="100%">
		<thead>
		<tr>
			<th width="20" align="right"><input name="man_select" id="man_select" type="checkbox" onClick="man_selected()" />&nbsp;</th>
			<th width="30" align="center"><?php echo lang('order'); ?></th>
			<th hide="1" class="<?php echo ns_sorting('id'); ?>" name="id" width="50" align="center">Id</th>
			<th class="<?php echo ns_sorting('title'); ?>" name="title" align="left"><?php echo lang('mod-35'); ?></th>
			<?php if ($is_category) { ?><th class="<?php echo ns_sorting('catid'); ?>" name="catid" width="100" align="center"><?php echo lang('cat-00'); ?></th><?php } ?>
			<th hide="1" class="<?php echo ns_sorting('author'); ?>" name="author" width="80" align="center"><?php echo lang('101'); ?></th>
			<th class="<?php echo ns_sorting('updatetime'); ?>" name="updatetime" width="120" align="left"><?php echo lang('105'); ?></th>
			<th align="left" class="man_option"><?php echo lang('option'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php if (is_array($list)) { $count=count($list);foreach ($list as $t) { ?>
		<tr id="man_row_<?php echo $t['id']; ?>">
			<td align="right"><input name="ids[]" type="checkbox" class="man_select" value="<?php echo $t['id']; ?>" />&nbsp;</td>
			<td align="center"><input class="input-text displayorder" type="text" name="data[<?php echo $t['id']; ?>][displayorder]" value="<?php echo $t['displayorder']; ?>" /></td>
			<td hide="1" align="center"><?php echo $t['id']; ?></td>
			<td align="left"><a class="onloading" href="<?php echo man_url(APP_DIR.'/home/edit',array('id'=>$t['id'])); ?>"><?php if ($t['thumb']) { ?><font color="#FF0000"><?php echo lang('html-387'); ?></font><?php }  echo man_keyword_highlight($t['title'], $param['keyword']); ?></a></td>
			<?php if ($is_category) { ?><td align="center"><a href="<?php if ($flag) {  echo man_url(APP_DIR.'/home/index', array('flag'=>$flag,'catid'=>$t['catid']));  } else {  echo man_url(APP_DIR.'/home/index', array('catid'=>$t['catid']));  } ?>"><?php $cache = $this->_cache_var('CATEGORY'); eval('echo $cache'.$this->_get_var('$t[catid].name').';');unset($cache); ?></a></td><?php } ?>
			<td hide="1" align="center"><a href="javascript:;" onclick="man_dialog_member('<?php echo $t['uid']; ?>')"><?php echo man_strcut($t['author'], 10); ?></a></td>
			<td align="left"><?php echo man_date($t['updatetime'], NULL, 'red'); ?></td>
			<td align="left" class="man_option">
			<?php if ($is_category) { ?><a href="<?php echo $t['url']; ?>" target="_blank"><?php echo lang('go'); ?></a><?php }  if ($this->ci->is_auth(APP_DIR.'/admin/home/edit')) { ?><a class="onloading" href="<?php echo man_url(APP_DIR.'/home/edit',array('id'=>$t['id'])); ?>"><?php echo lang('edit'); ?></a><?php }  if ($this->ci->is_auth(APP_DIR.'/admin/home/edit')) { ?><a onclick="man_copy_content(<?php echo $t['id']; ?>)" href="javascript:;"><?php echo lang('html-767'); ?></a><?php }  if ($extend) { ?><a class="onloading" href="<?php echo man_url(APP_DIR.'/extend/index',array('cid'=>$t['id'],'catid'=>$get['catid'])); ?>" style="color:#00F"><?php echo lang('mod-29'); ?></a><?php }  if (is_array($app)) { $count=count($app);foreach ($app as $a) { ?><a class="onloading" href="<?php echo $a['url']; ?>&cid=<?php echo $t['id']; ?>&catid=<?php echo $t['catid']; ?>&module=<?php echo APP_DIR; ?>"><?php echo $a['name'];  if ($a['field']!='null') { ?>(<?php echo $t[$a['field']]; ?>)<?php } ?></a><?php } }  if (is_array($form)) { $count=count($form);foreach ($form as $a) { ?><a class="onloading" href="<?php echo $a['url']; ?>&cid=<?php echo $t['id']; ?>"><?php echo $a['name']; ?></a><?php } } ?>
			</td>
		</tr>
		<?php } } ?>
		<tr>
			<th width="20" align="right"><input name="man_select" id="man_select" type="checkbox" onClick="man_selected()" />&nbsp;</th>
			<td colspan="8" align="left" style="border:none">
			<?php if (!$get['flag']) {  if ($this->ci->is_auth(APP_DIR.'/admin/home/del')) { ?><input type="button" class="button" value="<?php echo lang('del'); ?>" name="option" onClick="$('#action').val('del');man_confirm_set_all('<?php echo lang('015'); ?>', 1)" /><?php }  }  if ($this->ci->is_auth(APP_DIR.'/admin/home/edit')) { ?>
			<input type="button" class="button" value="<?php echo lang('order'); ?>" name="option" onClick="$('#action').val('order');man_confirm_set_all('<?php echo lang('015'); ?>')" />
            <div class="onShow"><?php echo lang('html-565'); ?></div>
			<?php if ($is_category) { ?>
			<input type="button" class="button" value="<?php echo lang('html-265'); ?>" name="option" onClick="man_confirm_move();" />
			<?php echo $select; ?>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<?php } ?>
			<input type="button" class="button" value="<?php echo lang('html-266'); ?>" name="option" onClick="$('#action').val('flag');man_confirm_set_all('<?php echo lang('015'); ?>')" />
			<select name="flagid">
            <option value=""> --- </option>
            <?php if ($get['flag']) { ?><option value="-<?php echo $get['flag']; ?>"><?php echo lang('html-391'); ?></option><?php }  if (is_array($flags)) { $count=count($flags);foreach ($flags as $i=>$t) {  if ($t['name']) { ?><option value="<?php echo $i; ?>"><?php echo $t['name']; ?></option><?php }  } } ?>
			</select>
			<?php } ?>
			</td>
		</tr>
		</tbody>
		</table>
		</form>
        <div id="pages"><a><?php echo man_lang('html-346', $param['total']); ?></a><?php echo $pages; ?></div>
	</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>