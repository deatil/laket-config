<?php

declare (strict_types = 1);

namespace Laket\Admin\Config\Facade;

use think\Facade;

/**
 * 配置
 *
 * @create 2024-7-23
 * @author deatil
 */
class Config extends Facade
{
    /**
     * 获取当前Facade对应类名（或者已经绑定的容器对象标识）
     * @access protected
     * @return string
     */
    protected static function getFacadeClass()
    {
        return 'laket-admin.configs';
    }
}
