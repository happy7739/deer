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
 * 前台单页控制器
 * @package app\index\controller
 */
class Page extends Home
{
    public function index($cat)
    {
        $data = Db::table('dp_home_page')->where(['id'=>$cat])->find();
        return view('',[
            'title'         => '首页',
            'data'          => $data

        ]);
    }
}
