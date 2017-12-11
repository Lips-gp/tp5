<?php
/**
 * 应用公共方法
 */


/**
 * [get_cc_desc description 获取标记有“@cc”的action注释名]
 * @param  [type] $module     [description]
 * @param  [type] $controller [description]
 * @param  [type] $action     [description]
 * @return [type]             [description]
 */
function get_cc_desc($module,$controller,$action)
{
    $desc  = 'app\\'.$module.'\Controller\\'.$controller;

    $func  = new \ReflectionMethod($desc, $action);
    $tmp   = $func->getDocComment();
    $flag  = preg_match_all('/@cc(.*?)\n/',$tmp,$tmp);
    $tmp   = trim($tmp[1][0]);
    $tmp   = $tmp !='' ? $tmp:'无';
    return $tmp;
}