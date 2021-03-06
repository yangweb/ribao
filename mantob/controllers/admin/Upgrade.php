<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Mantob Website Management System
 *
 * @since		version 2.1.1
 * @author		mantob <kefu@mantob.com>
 * @license     http://www.mantob.com/license
 * @copyright   Copyright (c) 2013 - 9999, mantob.Com, Inc.
 */
 
class Upgrade extends M_Controller {

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * 升级环境
     */
    public function index() {
		$this->template->assign(array(
			'url' => 'http://update.mantob.com/index.php?&id='.MAN_VERSION_ID.'&site='.urlencode(SITE_URL).'&admin='.SELF,
			'menu' => $this->get_menu(array(
				lang('115') => 'admin/upgrade/index'
			))
		));
		$this->template->display('online.html');
	}
	
	/**
     * 检查下载程序
     */
    public function update() {
    	
    	if (MAN_VERSION_ID != $this->input->get('id') - 1) {
            $this->admin_msg('对不起，您的系统版本不满足升级条件');
        }
    	
    	$data = man_catcher_data(urldecode($this->input->get('fid')));
    	if (!$data) {
            $this->admin_msg('对不起，您的服务器不支持远程下载');
        }
    	
    	$save = FCPATH.'cache/down/update.zip';
    	$check = FCPATH.'cache/down/update/';
		if (!@file_put_contents($save, $data)) {
            $this->admin_msg('目录/cache/down/没有写入权限');
        }
		
		// 解压缩文件
		$this->load->helper('file');
		$this->load->library('Pclzip');
		$this->pclzip->PclFile($save);
		if ($this->pclzip->extract(PCLZIP_OPT_PATH, $check, PCLZIP_OPT_REPLACE_NEWER) == 0) {
			@unlink($save);
			delete_files(FCPATH.'cache/down/', TRUE);
			$this->admin_msg("Error : " . $this->pclzip->errorInfo(true));
		}
		
		// 检查版本文件
    	if (!is_file($check.'config/version.php') || !filesize($check.'config/version.php')) {
			delete_files(FCPATH.'cache/down/', TRUE);
    		$this->admin_msg('升级文件不完整，没有找到版本文件');
    	}
    	$config = require $check.'config/version.php';
		
    	// 覆盖至网站根目录
    	$this->pclzip->extract(PCLZIP_OPT_PATH, FCPATH, PCLZIP_OPT_REPLACE_NEWER);
    	$this->dcache->set('install', TRUE);
    	delete_files(FCPATH.'cache/down/', TRUE);
    	
    	// 运行SQL语句
    	if (is_file(FCPATH.'update.sql')) {
    		$sql = file_get_contents(FCPATH.'update.sql');
			$sql = str_replace('{dbprefix}', $this->db->dbprefix, $sql);
			$sql_data = explode(';SQL_mantob_EOL', trim(str_replace(array(PHP_EOL, chr(13), chr(10)), 'SQL_mantob_EOL', $sql)));
			foreach($sql_data as $query){
				if (!$query) continue;
				$queries = explode('SQL_mantob_EOL', trim($query));
				$ret = '';
				foreach($queries as $query) {
					$ret .= $query[0] == '#' || $query[0].$query[1] == '--' ? '' : $query; 
				}
				if (!$ret) continue;
				$this->db->query($ret);
			}
			@unlink(FCPATH.'update.sql');
    	}
    	
    	//检查update控制器
		if (is_file(FCPATH.'mantob/controllers/admin/Update.php')) {
            $this->admin_msg('正在升级数据，请稍候...', man_url('update/index'), 2);
        }
		
		$this->admin_msg('升级完成，请按F5刷新整个页面<script src="http://www.mantob.com/index.php?c=sys&m=updated&site='.SITE_URL.'&vid='.$config['MAN_VERSION_ID'].'"></script>', man_url('home/main'), 1);
    }
}