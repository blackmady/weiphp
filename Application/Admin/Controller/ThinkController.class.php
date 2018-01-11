<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 凡星
// +----------------------------------------------------------------------
namespace Admin\Controller;

/**
 * 模型数据管理控制器
 *
 * @author 凡星
 */
class ThinkController extends AdminController {
	
	/**
	 * 显示指定模型列表数据
	 *
	 * @param String $model
	 *        	模型标识
	 * @author 凡星
	 */
	public function lists() {
		$model = $this->getModel ( );
		
		$list_data = $this->_get_model_list ( $model );
		$this->assign ( $list_data );
		
		$this->meta_title = $model ['title'] . '列表';
		
		$this->display ();
	}
	public function edit() {
		parent::common_edit ();
	}
	public function add() {
		$model = $this->getModel ( $model );
		$this->meta_title = '新增' . $model ['title'];
		parent::common_add ( $model );
	}
	public function del($model = null, $ids = null) {
		parent::common_del ( $model, $ids );
	}
}