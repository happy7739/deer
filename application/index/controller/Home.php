<?php
// +----------------------------------------------------------------------
// | 海豚PHP框架 [ DolphinPHP ]
// +----------------------------------------------------------------------
// | 版权所有 2016~2019 广东卓锐软件有限公司 [ http://www.zrthink.com ]
// +----------------------------------------------------------------------
// | 官方网站: http://dolphinphp.com
// +----------------------------------------------------------------------

namespace app\index\controller;

use app\admin\model\Configuration as ConfigurationModel;
use app\admin\model\Navigation as NavigationModel;
use app\common\controller\Common;
use think\Db;

/**
 * 前台公共控制器
 * @package app\index\controller
 */
class Home extends Common
{
    public function __construct()
    {
        parent::__construct();
        //action class 标题
        $path = request()->path();
        if($path == ''){
            $path = "index/index/index";
        }
        $param = request()->param();
        $is_cat = array_key_exists('cat', $param);
        if($is_cat == true){
            $str = 'cat='.$param['cat'];
            $now_nav = Db::table('dp_admin_navigation')
                ->where('url_value',$path)
                ->where("find_in_set('$str',params)")
                ->field(['id','title','url_value','params'])
                ->find();
        }else{
            $now_nav = Db::table('dp_admin_navigation')
                ->where(['url_value'=>$path])
                ->field(['id','title','url_value','params'])
                ->find();
        }
        $this->assign(
            [
                'configuration'     => $this->configuration(),
                'nav'               => $this->nav(),
                'now_nav'           => $now_nav
            ]
        );
    }
    /**
     * 初始化方法
     */
    protected function initialize()
    {
        // 系统开关
        if (!config('web_site_status')) {
            $this->error('站点已经关闭，请稍后访问~');
        }
    }
    //查询基本配置数据
    public function configuration(){
        return ConfigurationModel::where('id', 1)->find();
    }
    //查询前台导航栏数据
    public function nav(){
        return NavigationModel::where(['pid'=>0,'status'=>1])
            ->order('sort')
            ->field(['id','title','url_value','params'])
            ->select();
    }
}
