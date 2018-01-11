<?php

namespace Addons\Feedback\Controller;

use Think\ManageBaseController;

class FeedbackController extends ManageBaseController {
	// 通用插件的列表模型
	public function lists() {
		// 通用表单的控制开关
		$this->assign ( 'add_button', false );
		$this->assign ( 'del_button', true );
		$this->assign ( 'check_all', true );
		
		parent::common_lists ( );
	}
}
