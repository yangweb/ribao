<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Mantob Website Management System
 *
 * @since		version 2.3.2
 * @author		mantob <kefu@mantob.com>
 * @license     http://www.mantob.com/license
 * @copyright   Copyright (c) 2013 - 9999, mantob.Com, Inc.
 */
	
class Pm extends M_Controller {

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
		$this->load->model('pm_model');
    }

    /**
     * 消息管理
     */
    public function index() {
		
		if (IS_POST) {
			if ($this->input->post('action') == 'read') {
				$this->pm_model->set_read($this->uid, $this->input->post('ids'));
				exit(man_json(1, lang('000')));
			} else {
				$this->pm_model->deletes($this->uid, $this->input->post('ids'));
				exit(man_json(1, lang('000')));
			}
		}
		
		if ($this->input->get('action') == 'more') {
		    // ajax更多数据
			list($touid, $list) = $this->pm_model->limit_page($this->uid, max(1, (int)$this->input->get('page')));
			if (!$list) {
                exit('null');
            }
			$this->template->assign(array(
				'list' => $list
			));
			$this->template->display('pm_data.html');
			exit;
		}
		
		$list = $this->pm_model->limit_page($this->uid, max(1, (int)$this->input->get('page')));
		
		$this->template->assign(array(
			'list' => $list,
			'searchurl' => 'index.php?c='.$this->router->class.'&m='.$this->router->method.'&action=more'
		));
		$this->template->display('pm_index.html');
    }
	
	/**
     * 发送消息
     */
    public function send() {
	
		$data['username'] = $this->input->get('username', TRUE);
		
		if (IS_POST) {
			$data = $this->input->post('data', TRUE);
			$error = $this->pm_model->send($this->uid, $this->member['username'], $data);
			if ($error === NULL) {
				$this->member_msg(lang('000'), man_url('pm/index'), 1);
			}
		}
	
		$this->template->assign(array(
			'data' => $data,
			'result_error' => $error,
		));
		$this->template->display('pm_send.html');
    }
	
	/**
     * 阅读消息页
     */
    public function read() {
		
		$uid = (int)$this->input->get('uid');
		
		if ($this->input->get('action') == 'more') {
		    // ajax更多数据
			list($touid, $list) = $this->pm_model->read_limit_page($uid, max(1, (int)$this->input->get('page')));
			if (!$list) {
                exit('null');
            }
			$this->template->assign(array(
				'list' => $list
			));
			$this->template->display('pm_read_data.html');
			exit;
		}
		
		list($touid, $list) = $this->pm_model->read_limit_page($uid, max(1, (int)$this->input->get('page')));
		$username = get_member_value($touid);
		
		if (IS_POST) {
			$data = $this->input->post('data', TRUE);
			$data['username'] = $username;
			$error = $this->pm_model->send($this->uid, $this->member['username'], $data);
			if ($error === NULL) {
				$this->member_msg(lang('000'), man_url('pm/read', array('uid' => $uid)), 1);
			}
		}
		
		$this->template->assign(array(
			'list' => $list,
			'username' => $username,
			'searchurl' => 'index.php?c='.$this->router->class.'&m='.$this->router->method.'&uid='.$uid.'&plid='.$plid.'&action=more',
            'result_error' => $error,
		));
		$this->template->display('pm_read.html');
    }
	
	/**
     * 在线聊天部分
     */
	public function webchat() {

		$uid = (int)$this->input->get('uid');
		$username = $this->input->get('username');
        $callback = isset($_GET['callback']) ? $_GET['callback'] : 'callback';
		
		if ($this->input->get('action') == 'more') {
			ob_start();
			list($touid, $list) = $this->pm_model->read_limit_page($uid, 1);
			$this->template->assign(array(
				'list' => $list,
				'touid' => $uid,
				'action' => 'more',
			));
			$this->template->display('pm_webchat.html');
			$html = ob_get_contents();
			ob_clean();
		} elseif ($this->input->get('action') == 'send') {
			$data['message'] = $this->input->get('msg', TRUE);
			$data['username'] = $username;
			$error = $this->pm_model->send($this->uid, $this->member['username'], $data);
			if ($error) {
				exit($callback . '(' . json_encode(array('status' => 0, 'msg' => $error)) . ')');
			}
			exit($callback . '(' . json_encode(array('status' => 1)) . ')');
		} else {
			ob_start();
			$this->template->assign(array(
				'touid' => $uid,
				'action' => 0,
				'syntime' => 10 * 1000,
				'username' => $username,
			));
			$this->template->display('pm_webchat.html');
			$html = ob_get_contents();
			ob_clean();
		}
		exit($callback . '(' . json_encode(array('html' => $html)) . ')');
	}
}