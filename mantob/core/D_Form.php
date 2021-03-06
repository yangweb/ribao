<?php

/**
 * Mantob Website Management System
 *
 * @since		version 2.1.1
 * @author		mantob <kefu@mantob.com>
 * @license     http://www.mantob.com/license
 * @copyright   Copyright (c) 2013 - 9999, mantob.Com, Inc.
 */

class D_Form extends M_Controller {
	
	public $mid;
	public $form;
    protected $field;
    protected $uriprefix;
	
    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
		$form = str_replace('form_', '', $this->router->class);
		list($sid, $mid) = explode('_', $form);
		
		$this->mid = (int)$mid;
		$this->form = $this->get_cache('form-'.(int)$sid, $this->mid);
		
		if (!$this->form) {
			if (!IS_ADMIN) {
				exit($this->call_msg(lang('m-304')));
			} elseif (IS_AJAX) {
				exit(man_json(0, lang('247')));
			} else {
				$this->admin_msg(lang('247'));
			}
		}

        $this->load->model('form_model');
        if (IS_ADMIN) {
            $this->field = array(
                'inputtime' => array(
                    'name' => lang('104'),
                    'ismain' => 1,
                    'fieldtype' => 'Date',
                    'fieldname' => 'inputtime',
                    'setting' => array(
                        'option' => array(
                            'width' => 140
                        ),
                        'validate' => array(
                            'required' => 1,
                            'formattr' => '',
                        )
                    )
                ),
                'inputip' => array(
                    'name' => lang('106'),
                    'ismain' => 1,
                    'fieldname' => 'inputip',
                    'fieldtype' => 'Text',
                    'setting' => array(
                        'option' => array(
                            'width' => 157,
                            'value' => $this->input->ip_address()
                        ),
                        'validate' => array(
                            'formattr' => ' /><input type="button" class="button" value="'.lang('107').'" onclick="man_dialog_ip(\'inputip\')" name="ip"',
                        )
                    )
                )
            );
            $this->uriprefix = 'admin/form_'.SITE_ID.'_'.$this->mid.'/';
        }
    }
	
	/**
     * 查看内容维护
     */
	protected function _listc() {
		
		if (!$this->is_auth('admin/form/listc')) {
			if (IS_AJAX) {
				exit('<img src='.SITE_URL.'member/statics/js/skins/icons/error.png>'.man_lang('049', 'admin/form/listc'));
			} else {
				$this->admin_msg(man_lang('049', 'admin/form/listc'));
			}
		}
	
		if (IS_POST && $this->input->post('action')) {
			if ($this->input->post('action') == 'del') {
				// 删除
				$this->load->model('attachment_model');
				$_ids = $this->input->post('ids');
				foreach ($_ids as $id) {
					$this->form_model
						 ->link
						 ->where('id', (int)$id)
						 ->delete($this->form_model->prefix.'_'.$this->form['table']);
					$this->attachment_model->delete_for_table($this->form_model->prefix.'_'.$this->form['table'].'-'.$id);
				}
			} elseif ($this->input->post('action') == 'order') {
				// 修改
				$_ids = $this->input->post('ids');
				$_data = $this->input->post('data');
				foreach ($_ids as $id) {
					$this->form_model
						 ->link
						 ->where('id', (int)$id)
						 ->update($this->form_model->prefix.'_'.$this->form['table'], $_data[$id]);
				}
				unset($_ids, $_data);
			}
			exit(man_json(1, lang('000')));
		}

        // 重置页数和统计
        if (IS_POST) {
            $_GET['page'] = $_GET['total'] = 0;
        }

		// 根据参数筛选结果
		$param = $this->input->get(NULL);
		unset($param['s'],$param['c'],$param['m'],$param['d'],$param['page']);
		if ($this->input->post('search')) {
			$search = $this->input->post('data');
			$param['keyword'] = $search['keyword'];
			$param['start'] = $search['start'];
			$param['end'] = $search['end'];
		}

		// 数据库中分页查询
		list($data, $total)	= $this->form_model->limit_page($this->form['table'], $param, max((int)$_GET['page'], 1), (int)$_GET['total']);
		
		$param['total'] = $total;

        $tpl = APPPATH.'templates/admin/form_listc_'.SITE_ID.'_'.$this->mid.'.html';
		$this->template->assign(array(
			'mid' => $this->mid,
            'tpl' => str_replace(FCPATH, '/', $tpl),
			'menu' => $this->get_menu(array(
				lang('245') => 'admin/form/index',
				$this->form['name'] => $this->uriprefix.'index',
				lang('add') => $this->uriprefix.'add',
				lang('331') => SITE_URL.'index.php?c=form_'.SITE_ID.'_'.$this->mid.'" target="_blank',
                
			)),
			'list' => $data,
			'form' => 'form_'.SITE_ID.'_'.$this->mid,
			'param'	=> $param,
			'pages'	=> $this->get_pagination(man_url($this->router->class.'/index', $param), $param['total']),
		));

        $this->template->display(is_file($tpl) ? basename($tpl) : 'form_listc.html');
	}
	

    /**
     * 查看留言
     */
    protected function _listshow() {
        
        if (!$this->is_auth('admin/form/listc')) {
            if (IS_AJAX) {
                exit('<img src='.SITE_URL.'member/statics/js/skins/icons/error.png>'.man_lang('049', 'admin/form/listc'));
            } else {
                $this->admin_msg(man_lang('049', 'admin/form/listc'));
            }
        }
    
        if (IS_POST && $this->input->post('action')) {
            if ($this->input->post('action') == 'del') {
                // 删除
                $this->load->model('attachment_model');
                $_ids = $this->input->post('ids');
                foreach ($_ids as $id) {
                    $this->form_model
                         ->link
                         ->where('id', (int)$id)
                         ->delete($this->form_model->prefix.'_'.$this->form['table']);
                    $this->attachment_model->delete_for_table($this->form_model->prefix.'_'.$this->form['table'].'-'.$id);
                }
            } elseif ($this->input->post('action') == 'order') {
                // 修改
                $_ids = $this->input->post('ids');
                $_data = $this->input->post('data');
                foreach ($_ids as $id) {
                    $this->form_model
                         ->link
                         ->where('id', (int)$id)
                         ->update($this->form_model->prefix.'_'.$this->form['table'], $_data[$id]);
                }
                unset($_ids, $_data);
            }
            exit(man_json(1, lang('000')));
        }

        // 重置页数和统计
        if (IS_POST) {
            $_GET['page'] = $_GET['total'] = 0;
        }

        // 根据参数筛选结果
        $param = $this->input->get(NULL);
        unset($param['s'],$param['c'],$param['m'],$param['d'],$param['page']);
        if ($this->input->post('search')) {
            $search = $this->input->post('data');
            $param['keyword'] = $search['keyword'];
            $param['start'] = $search['start'];
            $param['end'] = $search['end'];
        }

        // 数据库中分页查询
        list($data, $total) = $this->form_model->limit_page($this->form['table'], $param, max((int)$_GET['page'], 1), (int)$_GET['total']);
        
        $param['total'] = $total;

        $tpl = APPPATH.'templates/admin/form_listc_'.SITE_ID.'_'.$this->mid.'.html';
        $this->template->assign(array(
            'mid' => $this->mid,
            'tpl' => str_replace(FCPATH, '/', $tpl),
            'menu' => $this->get_menu(array(
                lang('245') => 'admin/form/index',
                $this->form['name'] => $this->uriprefix.'index',
                lang('add') => $this->uriprefix.'add',
                lang('331') => SITE_URL.'index.php?c=form_'.SITE_ID.'_'.$this->mid.'" target="_blank',
                
            )),
            'list' => $data,
            'form' => 'form_'.SITE_ID.'_'.$this->mid,
            'param' => $param,
            'pages' => $this->get_pagination(man_url($this->router->class.'/index', $param), $param['total']),
        ));

        $this->template->display(is_file($tpl) ? basename($tpl) : 'form_listshow.html');
    }
    
	/**
     * 添加内容
     */
	protected function _addc() {
		
		if (!$this->is_auth('admin/form/listc')) {
			if (IS_AJAX) {
				exit('<img src='.SITE_URL.'member/statics/js/skins/icons/error.png>'.man_lang('049', 'admin/form/listc'));
			} else {
				$this->admin_msg(man_lang('049', 'admin/form/listc'));
			}
		}
		
		if (IS_POST) {
			
			$data = $this->validate_filter($this->form['field'] + $this->field);
			
			// 验证出错信息
			if (isset($data['error'])) {
				$error = $data;
				$data = $this->input->post('data', TRUE);
			} else {
				// 设定文档默认值
				$data[1]['displayorder'] = 0;
				// 发布文档
				if (($id = $this->form_model->addc($this->form['table'], $data[1])) != FALSE) {
					// 附件归档到文档
					$this->attachment_handle($this->uid, $this->form_model->prefix.'_'.$this->form['table'].'-'.$id, $this->form['field']);
					$this->member_msg(lang('000'), man_url($this->router->class.'/index'), 1);
				}
			}
			$data = $data[1];
			unset($data['id']);
		}

        $tpl = APPPATH.'templates/admin/form_addc_'.SITE_ID.'_'.$this->mid.'.html';
		$this->template->assign(array(
            'tpl' => str_replace(FCPATH, '/', $tpl),
			'menu' => $this->get_menu(array(
				lang('245') => 'admin/form/index',
				$this->form['name'] => $this->uriprefix.'index',
				lang('add') => $this->uriprefix.'add/'
			)),
            'data' => $data,
			'error' => $error,
			'myfield' => $this->field_input($this->form['field'] + $this->field, $data)
		));
        $this->template->display(is_file($tpl) ? basename($tpl) : 'form_addc.html');
	}
	
	/**
     * 修改内容
     */
	protected function _editc() {
		
		if (!$this->is_auth('admin/form/listc')) {
			if (IS_AJAX) {
				exit('<img src='.SITE_URL.'member/statics/js/skins/icons/error.png>'.man_lang('049', 'admin/form/listc'));
			} else {
				$this->admin_msg(man_lang('049', 'admin/form/listc'));
			}
		}
		
		$id = (int)$this->input->get('id');
		$table = $this->form_model->prefix.'_'.$this->form['table'];
		$data = $this->form_model->link->where('id', (int)$id)->get($table)->row_array();
		if (!$data) {
            $this->admin_msg(lang('019'));
        }
			
		if (IS_POST) {
			$data = $this->validate_filter($this->form['field'] + $this->field);
			// 验证出错信息
			if (isset($data['error'])) {
				$error = $data;
				$data = $this->input->post('data', TRUE);
			} else {
				// 发布文档
				if (($id = $this->form_model->editc($id, $this->form['table'], $data[1])) != FALSE) {
					// 附件归档到文档
					$this->attachment_handle($this->uid, $table.'-'.$id, $this->form['field']);
					$this->attachment_replace($this->uid, $id, $table);
					$this->member_msg(lang('000'), man_url($this->router->class.'/index'), 1);
				}
			}
			$data = $data[1];
			unset($data['id']);
		}

        $tpl = APPPATH.'templates/admin/form_addc_'.SITE_ID.'_'.$this->mid.'.html';
		$this->template->assign(array(
            'tpl' => str_replace(FCPATH, '/', $tpl),
			'menu' => $this->get_menu(array(
				lang('245') => 'admin/form/index',
				$this->form['name'] => $this->uriprefix.'index',
				lang('add') => $this->uriprefix.'add',
				lang('edit') => $this->uriprefix.'edit/id/'.$id,
			)),
            'data' => $data,
			'error' => $error,
			'myfield' => $this->field_input($this->form['field'] + $this->field, $data)
		));
        $this->template->display(is_file($tpl) ? basename($tpl) : 'form_addc.html');
	}
	
	/**
     * 提交内容
     */
    protected function _post() {
		
		if (!$this->form['setting']['post']) {
			if (IS_POST) {
				exit($this->call_msg(lang('m-114')));
			} else {
				$this->msg(lang('m-114'));
			}
		}
		
		if (IS_POST) {
		
			if ($this->form['setting']['code'] && !$this->check_captcha('code')) {
                exit($this->call_msg(lang('m-000')));
            }
			
			$data = $this->validate_filter($this->form['field']);
				
			// 验证出错信息
			if (isset($data['error'])) {
                exit($this->call_msg($data['msg']));
            }
			
			$data[1]['inputip'] = $this->input->ip_address();
			$data[1]['inputtime'] = SYS_TIME;
			$data[1]['displayorder'] = 0;
			
			$this->load->model('form_model');
			$this->form_model->addc($this->form['table'], $data[1]);
			
			if ($this->form['setting']['send'] && $this->form['setting']['template']) {
				// 兼容php5.5
				if (version_compare(PHP_VERSION, '5.5.0') >= 0) {
                    $rep = new php5replace($data[1]);
					$content = preg_replace_callback('#{(.*)}#U', array($rep, 'php55_replace_data'), $this->form['setting']['template']);
                    unset($rep);
                } else {
                    @extract($data[1]);
                    unset($data[1]);
					$content = preg_replace("/{(.*)}/Ue", "\$\\1", $this->form['setting']['template']);
				}
				$this->sendmail_queue($this->form['setting']['send'], man_lang('m-306', $this->form['name']), nl2br($content));
			}
			
			$this->call_msg(lang('m-305'), 1);
			
		} else {
            $tpl = FCPATH.'mantob/templates/'.SITE_TEMPLATE.'/form_'.SITE_ID.'_'.$this->mid.'.html';
			$this->template->assign(array( 
				'form' => $this->form,
				'code' => $this->form['setting']['code'],
				'myfield' => $this->field_input($this->form['field']),
				'meta_title' => $this->form['name'].SITE_SEOJOIN.SITE_NAME
			));
			$this->template->display(is_file($tpl) ? basename($tpl) : 'form.html');
		}
    }
	
	/**
     * 回调方法
     */
	protected function call_msg($msg, $code = 0) {
		
		$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
		
		if (IS_AJAX) {
			exit(man_json($code, $msg, $url)); // AJAX请求时返回json格式
		} else {
			if ($code) {
              
				$this->msg($msg, $url, 1,5); // 成功
			} else {
				$this->msg($msg,$url, 3,2); // 错误
			}
		}
	}
	
}