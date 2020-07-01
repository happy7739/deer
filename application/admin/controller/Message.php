<?php
// +----------------------------------------------------------------------
// | 海豚PHP框架 [ DolphinPHP ]
// +----------------------------------------------------------------------
// | 版权所有 2016~2019 广东卓锐软件有限公司 [ http://www.zrthink.com ]
// +----------------------------------------------------------------------
// | 官方网站: http://dolphinphp.com
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\common\builder\ZBuilder;
use app\index\model\Message as MessageModel;

/**
 * 前台留言控制器
 * @package app\admin\controller
 */
class Message extends Admin
{
    /**
     * 消息中心
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $data_list = MessageModel::where($this->getMap())
            ->order($this->getOrder('id DESC'))
            ->paginate();

        $btn_access = [
            'title' => '详情',
            'icon'  => 'fa fa-fw fa-file-text-o',
            'href'  => url('details', ['id' => '__id__'])
        ];

        return ZBuilder::make('table')
            ->setTableName('home_aboutus_message')
            //->addTopButton('enable', ['title' => '设置已阅读'])
            ->addTopButton('delete')
            ->addRightButton('enable', ['title' => '设置已阅读'])
            ->addRightButton('details', $btn_access)
            ->addRightButton('delete')
            ->replaceRightButton(['status' => ['in', '1']], '', ['enable'])
            ->addColumns([
                ['id', 'ID'],
                ['name', '姓名'],
                ['mobile', '电话'],
                ['create_time', '申请时间', 'datetime'],
                ['status', '状态', 'status', '', ['未读', '已读']],
                ['read_time', '阅读时间', 'datetime'],
                ['right_button', '操作', 'btn'],
            ])
            ->addFilter('status', ['未读', '已读'])
            ->setRowList($data_list)
            ->fetch();
    }

    /**
     * 设置已阅读
     * @param array $ids
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function enable($ids = [])
    {
        empty($ids) && $this->error('参数错误');
        $map = [
            ['id', 'in', $ids]
        ];
        $result = MessageModel::where($map)
            ->update(['status' => 1, 'read_time' => $this->request->time()]);
        if (false !== $result) {
            $this->success('设置成功');
        } else {
            $this->error('设置失败');
        }
    }

    /**查看详情
     * @param $id
     */
    public function details($id){
        $info = MessageModel::get($id);
        if($info['status']){
            $class = '';
        }else{
            $class = 'hidden';
        }
        $info['ip'] = long2ip($info['where_ip']);
        // 显示页面
        return ZBuilder::make('form')
            ->addFormItems([
                ['text', 'id', 'ID'],
                ['text', 'name', '姓名'],
                ['text', 'mobile', '电话'],
                ['text', 'email', '邮箱[: ]'],
                ['textarea', 'content', '消息内容[: ]'],
                ['text', 'ip', 'IP地址'],
                ['radio', 'status', '状态', '', ['未读', '已读']]
            ])
            ->addTime('create_time', '申请时间','','','YYYY-MM-DD HH:mm:ss')
            ->addTime('read_time', '阅读时间', '', '','YYYY-MM-DD HH:mm:ss','',$class)
            ->hideBtn('submit')
            ->setFormdata($info)
            ->fetch();
    }
}