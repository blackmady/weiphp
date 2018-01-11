<?php

namespace Addons\Invite\Controller;

use Think\ManageBaseController;

class InviteController extends ManageBaseController {
	public function lists( $order = 'id desc') {
	    $isAjax = I ( 'isAjax' );
	    $isRadio = I ( 'isRadio' );
		// 获取模型信息
		$model = $this->getModel (  );
		
		$list_data = $this->_get_model_list ( $model, 0, $order );
		if (! empty ( $list_data ['list_data'] )) {
			$coupon_ids = array_unique ( getSubByKey ( $list_data ['list_data'], 'coupon_id' ) );
			$map ['id'] = array (
					'in',
					$coupon_ids 
			);
			$list = M ( 'coupon' )->where ( $map )->field ( 'id,title' )->select ();
			$couponArr = makeKeyVal ( $list );
			foreach ( $list_data ['list_data'] as &$v ) {
				$v ['coupon_name'] = $couponArr [$v ['coupon_id']];
			}
		}
		if ($isAjax) {
		    $this->assign('isRadio',$isRadio);
		    $this->assign ( $list_data );
		    $this->display ( 'ajax_lists_data' );
		}else{
		    $this->assign ( $list_data );
		    
		    $this->display (  );
		}
	}
	function preview(){
		$vote_id = I ( 'id', 0, 'intval' );
		$url = addons_url('Invite://Wap/index',array('id'=>$vote_id));
		$this -> assign('url',$url);
		$this->display ( 'Home@Addons/preview' );
	}
	
}
