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
use app\admin\model\Configuration as ConfigurationModel;

/**
 * 公共配置控制器
 * @package app\admin\controller
 */
class Configuration extends Admin
{
    /**
     * 公共配置
     * @return string
     */
    public function index()
    {
        // 保存数据
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $data['keywords'] == '' && $this->error('关键词不能为空');
            $data['id'] = 1;

            $ConfigurationModel = new ConfigurationModel();
            if ($Configuration = $ConfigurationModel->allowField(['keywords', 'description', 'mobile','tel','logo','address','ico'])->update($data)) {
                // 记录行为
                action_log('configuration_edit', 'admin_configuration', UID, UID, get_nickname(UID));
                $this->success('编辑成功');
            } else {
                $this->error('编辑失败');
            }
        }

        // 获取数据
        $info = ConfigurationModel::where('id', 1)->find();

        // 使用ZBuilder快速创建表单
        return ZBuilder::make('form')
            //->addImage('image', 'icon', 'icon','','','ico')
            ->addFormItems([ // 批量添加表单项
                ['text', 'keywords', '关键词', ''],
                ['text', 'description', '描述', ''],
                ['text', 'tel', '400电话', ''],
                ['text', 'mobile', '手机号码', ''],
                //['images', 'icon', 'icon'],
                ['image', 'logo', 'logo'],
                ['text', 'address', '地址']
            ])
            ->setFormData($info) // 设置表单数据
            ->fetch();
    }

}