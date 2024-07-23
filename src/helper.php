<?php

if (! function_exists('filter_correct_name')) {
    /**
     * 获得一个只含数字字母和-线的string.
     */
    function filter_correct_name($value) {
        return preg_replace('|[^0-9a-zA-Z_/-]|', '', $value);
    }
}

if (! function_exists('laket_configs')) {
    /**
     * 配置
     *
     * @param string $name
     * @return mix
     */
    function laket_configs(string $name) {
        return app('laket-admin.configs')->config($name);
    }
}
