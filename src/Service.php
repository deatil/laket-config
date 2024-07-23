<?php

declare (strict_types = 1);

namespace Laket\Admin\Config;

use Laket\Admin\Facade\Flash;
use Laket\Admin\Flash\Service as BaseService;

use Laket\Admin\Config\Config\Manager;

class Service extends BaseService
{
    /**
     * 包名
     */
    protected $pkg = 'laket/laket-config';
    
    /**
     * slug
     */
    protected $slug = 'laket-admin.flash.config';
    
    
    /**
     * 注册
     */
    public function register()
    {
        $this->registerBind();
    }
    
    /**
     * 启动
     */
    public function boot()
    {
        Flash::extend('laket/laket-config', __CLASS__);
    }
    
    /**
     * 在插件安装、插件卸载等操作时有效
     */
    public function action()
    {
        register_install_hook($this->pkg, [$this, 'install']);
        register_uninstall_hook($this->pkg, [$this, 'uninstall']);
    }

    /**
     * 开始，只有启用后加载
     */
    public function start()
    {
        // 启用时自动导入数据
        app('laket-admin.configs')->loadConfigs();
    }
    
    /**
     * 注册绑定
     *
     * @return void
     */
    protected function registerBind()
    {
        // 配置
        $this->app->bind('laket-admin.configs', Manager::class);
    }
    
    /**
     * 安装后
     */
    public function install()
    {
        // 数据库
        Flash::executeSql(__DIR__ . '/../resources/database/install.sql');
    }
    
    /**
     * 卸载后
     */
    public function uninstall()
    {
        // 数据库
        Flash::executeSql(__DIR__ . '/../resources/database/uninstall.sql');
    }
    
}
