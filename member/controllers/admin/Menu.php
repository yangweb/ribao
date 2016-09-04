<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Mantob Website Management System
 *
 * @since		version 2.2.2
 * @author		mantob <kefu@mantob.com>
 * @license     http://www.mantob.com/license
 * @copyright   Copyright (c) 2013 - 9999, mantob.Com, Inc.
 */
	
class Menu extends M_Controller {

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
		$this->template->assign('menu', $this->get_menu(array(
		    lang('234') => 'member/admin/menu/index',
		)));
		$this->load->model('member_menu_model');
    }
	
	/**
     * 菜单管理
     */
    public function index() {
	
		if (IS_POST) {
		
			$ids = $this->input->post('ids', TRUE);
			if (!$ids) {
                exit(man_json(0, lang('013')));
            }
			
			if ($this->input->post('action') == 'order') {
				$_data = $this->input->post('data');
				foreach ($ids as $id) {
					$this->db
						 ->where('id', $id)
						 ->update('member_menu',  array('displayorder' => (int)$_data[$id]['displayorder']));
				}
				$this->member_menu_model->cache();
				exit(man_json(1, lang('339')));
			} else {
				$this->db
					 ->where_in('id', $ids)
					 ->delete('member_menu');
				$this->member_menu_model->cache();
				exit(man_json(1, lang('339')));
			}
		}
		
		$this->load->library('dtree');
		$this->dtree->icon = array('&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
		$this->dtree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$left = $this->member_menu_model->get_left_id();
		$data = $this->db
					 ->order_by('displayorder ASC,id ASC')
					 ->get('member_menu')
					 ->result_array();
		$tree = array();
		
		if ($data) {
			foreach($data as $t) {
				$t['option'] = '';
				if ($this->is_auth('member/admin/menu/add') && !@in_array($t['pid'], $left)) {
					$t['option'].= '<a class="add" title="'.lang('add').'" href="'.man_dialog_url(man_url('member/menu/add', array('pid' => $t['id'])), 'add').'"></a>&nbsp;&nbsp;';
					$t['target'] = '';
				} else {
					$t['option'].= '<a class="add" style="background:none" href="javascript:;"></a>&nbsp;&nbsp;';
					$t['target'] = '<img src="'.SITE_URL.'mantob/statics/images/'.$t['target'].'.gif" />';
				}
				if ($this->is_auth('member/admin/menu/edit')) {
					$t['option'].= '<a class="edit" title="'.lang('edit').'" href="'.man_dialog_url(man_url('member/menu/edit', array('id' => $t['id'])), 'edit').'"></a>&nbsp;&nbsp;';
                    $t['name'] = '<a title="'.lang('edit').'" href="'.man_dialog_url(man_url('member/menu/edit', array('id' => $t['id'])), 'edit').'">'.$t['name'].'</a>&nbsp;&nbsp;';
                }
				if ($this->is_auth('member/admin/menu/del')) {
					$t['option'].= '<a class="del" title="'.lang('del').'" href="javascript:;" onClick="return man_dialog_del(\''.lang('015').'\',\''.man_url('member/menu/del',array('id' => $t['id'])).'\');"></a>&nbsp;&nbsp;';
				}
				$tree[$t['id']] = $t;
			}
		}
		
		$str = "<tr>
					<td align='right'><input name='ids[]' type='checkbox' class='man_select' value='\$id' />&nbsp;</td>
					<td align='center'><input class='input-text displayorder' type='text' name='data[\$id][displayorder]' value='\$displayorder' /></td>
					<td>\$spacer\$name</td>
					<td align='center'>\$target</td>
					<td align='left'>\$option</td>
				</tr>";
		$this->dtree->init($tree);
		
		$this->template->assign(array(
			'list' => $this->dtree->get_tree(0, $str),
		));
		$this->template->display('menu_index.html');
    }
	
	/**
     * 添加
     */
    public function add() {
	
		if (IS_POST) {
			exit(man_json(1, lang('014'), $this->member_menu_model->add($this->input->post('data', TRUE))));
		}
		
		$top = $this->member_menu_model->get_top_id();
		$menu_name = $menu_type	= '';
		$data['pid'] = (int)$this->input->get('pid');
		if ($data['pid']) {
			if (in_array($data['pid'], $top)) {
				$menu_type = 0;
				$menu_name = lang('017');
			} else {
				$menu_type = 1;
				$menu_name = lang('018');
			}
		} else {
			$menu_type = 0;
			$menu_name = lang('016');
		}
		
		$this->template->assign(array(
			'data' => $data,
			'menu_url' => 2,
			'menu_type' => $menu_type,
			'menu_name'	=> $menu_name
		));
		$this->template->display('menu_add.html');
    }

	/**
     * 修改
     */
    public function edit() {
	
		$id = (int)$this->input->get('id');
		$data = $this->db
					 ->where('id', $id)
					 ->limit(1)
					 ->get('member_menu')
					 ->row_array();
		if (!$data) exit(lang('019'));
		
		if (IS_POST) {
			exit(man_json(1, lang('014'), $this->member_menu_model->edit($id, $this->input->post('data', TRUE))));
		}
		
		$top = $this->member_menu_model->get_top_id();
		$uri = $this->duri->uri2ci($data['uri']);
		$uri['dir']	= $uri['app'] ? $uri['app'] : ($uri['path'] ? $uri['path'] : '');
		$menu_name = $menu_type = '';
		$select = '<select name="data[pid]">';
		if ($data['pid']) {
			if (in_array($data['pid'], $top)) { // 分组菜单
				$menu_type = 0;
				$menu_name = lang('017');
				$select = $this->member_menu_model->parent_select(1, $data['pid']);
			} else { // 链接菜单
				$menu_type = 1;
				$menu_name = lang('018');
				$select = $this->member_menu_model->parent_select(2, $data['pid']);
			}
		} else { // 顶级菜单
			$menu_type = 0;
			$menu_name = lang('016');
			$select = $this->member_menu_model->parent_select(0, $data['pid']);
		}
		$this->template->assign(array(
			'uri' => $uri,
			'data' => $data,
			'select' => $select,
			'menu_url' => $data['uri'] ? 2 : 1,
			'menu_name'	=> $menu_name,
			'menu_type'	=> $menu_type
		));
		$this->template->display('menu_add.html');
    }
	
	/**
     * 删除
     */
    public function del() {
        $this->member_menu_model->delete((int)$this->input->get('id'));
        $this->member_menu_model->cache();
        exit(man_json(1, lang('339')));
	}
	
	/**
     * 初始化菜单
     */
    public function init() {
		$this->member_menu_model->init();
		$this->member_menu_model->cache();
		$this->admin_msg(lang('000'), man_url('member/menu/index'), 1);
	}
	
	
	/**
     * 缓存
     */
    public function cache() {
		$admin = $this->input->get('admin') ? $this->input->get('admin') : $this->input->get('admin');
		$this->member_menu_model->cache();
		$admin or $this->admin_msg(lang('000'), isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '', 1);
	}
}