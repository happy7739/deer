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
use think\Request;
use app\index\model\Message as MessageModel;
use app\index\validate\Aboutus as AboutusValidate;

/**
 * 关于我们控制器
 * @package app\index\controller
 */
class Aboutus extends Home
{
    public function index()
    {
        return view();
    }

    //新增在线留言处理
    public function insert_message(Request $request){
        if($request->isPost()) {
            $param = $request->post();
            // 验证
            $validate = new AboutusValidate();
            if(!$validate->check($param)){
                return ['code'=>0,'msg'=>$validate->getError()];
            }else{
                // 添加数据
                $param['ip'] = ip2long($_SERVER["REMOTE_ADDR"]);
                if(MessageModel::create($param)){
                    return json(['code'=>1,'msg'=>'申请成功']);
                }else{
                    return  json(['code'=>0,'msg'=>'申请失败']);
                }
            }
        }
    }
}
