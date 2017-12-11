<?php
namespace app\common\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
	public $param;

    public function _initialize()
    {
        parent::_initialize();

        $this->param = Request::instance()->param();

        $this->event_cc_save();
	}

	/**
	 * [event_cc_save 事件保存]
	 * @return [boolean] [执行结果]
	 */
	private function event_cc_save($module = null, $controller = null, $action = null)
	{
		$module || $module = Request::instance()->module();
		$controller || $controller = Request::instance()->controller();
		$action || $action = Request::instance()->action();

		$action_zh = get_cc_desc($module, $controller, $action);
	}
}