<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
	SwapTab(0);
});
function dr_to_code(name) {
	var throughBox	= $.dialog.through;
	var dr_Dialog = throughBox({title: "生成结果"});
	var _data = $("#"+name).serialize();
	$.ajax({type: "POST", url:"<?php echo dr_url($furi.'tag'); ?>", dataType:'text', data:_data,
	    success: function (text) {
			dr_Dialog.content(text);
	    },
	    error: function(HttpRequest, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + HttpRequest.statusText + "\r\n" + HttpRequest.responseText);
		}
	});
}
</script>
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?>
	</div>
	<div class="bk10"></div>
	<div class="table-list col-tab" id="myform">
		<ul class="tabBut cu-li">
			<li onclick="SwapTab(0)">网站导航</li>
			<li onclick="SwapTab(1)">单网页循环</li>
			<li onclick="SwapTab(2)">单网页输出</li>
			<li onclick="SwapTab(3)">联动菜单循环</li>
			<li onclick="SwapTab(4)">表单列表循环</li>
		</ul>
		<div class="contentList pad-10">
			<div id="cnt_0" style="display:none" class="dr_hide">
				<form action="" id="navigator" name="navigator" method="post">
       			<input name="action" type="hidden" value="navigator" />
				<table width="100%" class="table_form">
				<tr>
					<th width="200">导航类型： </th>
					<td>
                    <select name="data[type]">
                    <?php if (is_array($navigator)) { $count=count($navigator);foreach ($navigator as $i=>$name) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $name; ?></option>
                    <?php } } ?>
                    </select>
					</td>
				</tr>
                <tr>
					<th>显示数量： </th>
					<td>
                    <input class="input-text" type="text" name="data[num]" size="10" />
					</td>
				</tr>
                <tr>
					<th>返回变量： </th>
					<td>
                    <input class="input-text" type="text" name="data[return]" value="<?php echo $return_var; ?>" size="10" />
					</td>
				</tr>
                <tr>
					<th>参考语法： </th>
					<td>
                    <a href="<?php echo SYS_HELP_URL; ?>13.html" target="_blank"><?php echo SYS_HELP_URL; ?>13.html</a>
					</td>
				</tr>
                <tr>
                    <th style="border:none;">&nbsp;</th>
                    <td><input class="button" type="button" name="button" onclick="dr_to_code('navigator')" value="生成代码" /></td>
                </tr>
				</table>
				</form>
			</div>
			<div id="cnt_1" style="display:none" class="dr_hide">
				<form action="" id="page_list" name="page_list" method="post">
       			<input name="action" type="hidden" value="page_list" />
       			<input name="data[module]" type="hidden" value="index" />
				<table width="100%" class="table_form">
				<tr>
					<th width="200">单页类型： </th>
					<td>
                    主站单页（内容相关里面的单页）
					</td>
				</tr>
                <tr>
					<th>上级单页： </th>
					<td>
                    <input class="input-text" id="pid" type="text" name="data[pid]" value="0" size="10" />
                    <select onchange="$('#pid').val(this.value)">
                    <option value="0">顶级单页</option>
                    <?php $return = $this->list_tag("action=page module=index pid=0"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) {  if ($t['child']) { ?><option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option><?php }  } } ?>
                    </select>
					</td>
				</tr>
                <tr>
					<th>显示数量： </th>
					<td>
                    <input class="input-text" type="text" name="data[num]" size="10" />
					</td>
				</tr>
                <tr>
					<th>返回变量： </th>
					<td>
                    <input class="input-text" type="text" name="data[return]" value="<?php echo $return_var; ?>" size="10" />
					</td>
				</tr>
                <tr>
					<th>参考语法： </th>
					<td>
                    <a href="<?php echo SYS_HELP_URL; ?>24.html" target="_blank"><?php echo SYS_HELP_URL; ?>24.html</a>
					</td>
				</tr>
                <tr>
                    <th style="border:none;">&nbsp;</th>
                    <td><input class="button" type="button" name="button" onclick="dr_to_code('page_list')" value="生成代码" /></td>
                </tr>
				</table>
				</form>
			</div>
			<div id="cnt_2" style="display:none" class="dr_hide">
				<form action="" id="page_show" name="page_show" method="post">
       			<input name="action" type="hidden" value="page_show" />
       			<input name="data[module]" type="hidden" value="index" />
				<table width="100%" class="table_form">
				<tr>
					<th width="200">单页类型： </th>
					<td>
                    主站单页（内容相关里面的单页）
					</td>
				</tr>
                <tr>
					<th>选择单页： </th>
					<td>
                    <select name="data[id]">
                    <?php $return = $this->list_tag("action=page module=index"); if ($return) extract($return); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                    <option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
                    <?php } } ?>
                    </select>
					</td>
				</tr>
                <tr>
					<th>参考语法： </th>
					<td>
                    <a href="<?php echo SYS_HELP_URL; ?>29.html" target="_blank"><?php echo SYS_HELP_URL; ?>29.html</a>
					</td>
				</tr>
                <tr>
                    <th style="border:none;">&nbsp;</th>
                    <td><input class="button" type="button" name="button" onclick="dr_to_code('page_show')" value="生成代码" /></td>
                </tr>
				</table>
				</form>
			</div>
			<div id="cnt_3" style="display:none" class="dr_hide">
				<form action="" id="linkage_list" name="linkage_list" method="post">
       			<input name="action" type="hidden" value="linkage_list" />
				<table width="100%" class="table_form">
				<tr>
					<th width="200">标识代码： </th>
					<td>
                    <select name="data[code]">
                    <?php if (is_array($linkage)) { $count=count($linkage);foreach ($linkage as $t) { ?>
                    <option value="<?php echo $t['code']; ?>"><?php echo $t['name']; ?></option>
                    <?php } } ?>
                    </select>
					</td>
				</tr>
                <tr>
					<th>显示数量： </th>
					<td>
                    <input class="input-text" type="text" name="data[num]" size="10" />
					</td>
				</tr>
                <tr>
					<th>返回变量： </th>
					<td>
                    <input class="input-text" type="text" name="data[return]" value="<?php echo $return_var; ?>" size="10" />
					</td>
				</tr>
                <tr>
					<th>参考语法： </th>
					<td>
                    <a href="<?php echo SYS_HELP_URL; ?>23.html" target="_blank"><?php echo SYS_HELP_URL; ?>23.html</a>
					</td>
				</tr>
                <tr>
                    <th style="border:none;">&nbsp;</th>
                    <td><input class="button" type="button" name="button" onclick="dr_to_code('linkage_list')" value="生成代码" /></td>
                </tr>
				</table>
				</form>
			</div>
			<div id="cnt_4" style="display:none" class="dr_hide">
				<form action="" id="form_list" name="form_list" method="post">
       			<input name="action" type="hidden" value="form_list" />
				<table width="100%" class="table_form">
				<tr>
					<th width="200">选择表单： </th>
					<td>
                    <select name="data[form]">
                    <?php if (is_array($form)) { $count=count($form);foreach ($form as $t) { ?>
                    <option value="<?php echo $t['id']; ?>" table="<?php echo $t['table']; ?>"><?php echo $t['name']; ?></option>
                    <?php } } ?>
                    </select>
					</td>
				</tr>
                <tr>
					<th>显示数量： </th>
					<td>
                    <input class="input-text" type="text" name="data[num]" size="10" />
					</td>
				</tr>
                <tr>
					<th>返回变量： </th>
					<td>
                    <input class="input-text" type="text" name="data[return]" value="<?php echo $return_var; ?>" size="10" />
					</td>
				</tr>
                <tr>
					<th>参考语法： </th>
					<td>
                    <a href="<?php echo SYS_HELP_URL; ?>65.html" target="_blank"><?php echo SYS_HELP_URL; ?>65.html</a>
					</td>
				</tr>
                <tr>
                    <th style="border:none;">&nbsp;</th>
                    <td><input class="button" type="button" name="button" onclick="dr_to_code('form_list')" value="生成代码" /></td>
                </tr>
				</table>
				</form>
			</div>
			<div id="cnt_5" style="display:none" class="dr_hide">
				
			</div>
			<div id="cnt_6" style="display:none" class="dr_hide">
				
			</div>
			<div id="cnt_7" style="display:none" class="dr_hide">
				
			</div>
			<div id="cnt_8" style="display:none" class="dr_hide">
				
			</div>
		</div>
	</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>