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
 * 前台品牌动态控制器
 * @package app\index\controller
 */
class News extends Home
{
    public function index()
    {
        $param = request()->param();
        $is_cat = array_key_exists('id', $param);
        if($is_cat == true){
            $id = $param['id'];
            $details = Db::table('dp_home_news')->where(['id'=>$id])->find();
            $this->assign('details',$details);
        }else{
            $data = Db::table('dp_home_news')->where(['status'=>1])->order('sort')->paginate(7);
            $render = $data->render();
            $this->assign(['data' => $data, 'render' => $render]);
        }
        return view();
    }
    //渲染文章详情
    public function details($id){
        $data = Db::table('dp_home_news')->where(['id'=>$id])->find();
        return view('',[
            'title'    => '品牌动态',
            'data'     => $data,
        ]);
    }
}
