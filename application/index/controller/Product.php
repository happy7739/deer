<?php
// +----------------------------------------------------------------------
// | 海豚PHP框架 [ DolphinPHP ]
// +----------------------------------------------------------------------
// | 版权所有 2016~2019 广东卓锐软件有限公司 [ http://www.zrthink.com ]
// +----------------------------------------------------------------------
// | 官方网站: http://dolphinphp.com
// +----------------------------------------------------------------------

namespace app\index\controller;

use think\Db;

/**
 * 前台产品中心控制器
 * @package app\index\controller
 */
class Product extends Home
{
    public function index()
    {
        $data = Db::table('dp_home_product')->where(['status'=>1])->order('sort')->paginate(9);
        $render = $data->render();
        return view('',[
            'title'    => '产品中心',
            'data'     => $data,
            'render'   => $render,
        ]);
    }
}
