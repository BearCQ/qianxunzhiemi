<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function get_table_comment($table)
{
    $table = Db::name($table)->getTable();
    $re = Db::query("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '" . $table . "'");
    $comments = [];
    if (is_array($re)) {
        foreach ($re as $key => $item) {
            if ($item['COLUMN_COMMENT']) {
                $comments[$item['COLUMN_NAME']] = $item;
            } else {
                $item['COLUMN_COMMENT'] = $item['COLUMN_NAME'];
                $comments[$item['COLUMN_NAME']] = $item;
            }

        }
    } else {
        return false;
    }

    return $comments;
}

function get_curl($model, $action, $params = [])
{
    $model_api = Config("model_api.{$model}");
    //$model_api = Config('model_api.'.$model);
    $url = $model_api . "/" . $action;
    $result = \tools\curl\Curl::get($url, $params);
    if (!$result) {
        $result['status'] = false;
        $result['msg'] = '请求失败';
    } else {
        $result = \tools\curl\Curl::json2arr($result);
        if ($result['status'] === false)
            $result['data'] = '数据不存在';
    }
    return $result;
}

/**
 * 生成,保存并返回token
 * @param $user_id  用户id
 */
function save_token($user_id, $user_type = 'user')
{
    //随机生成20位字符串
    $token_str = substr(str_shuffle('abcedfghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 20);

    //token表需要的字段
    $token['user_id'] = $user_id;
    $token['user_type'] = $user_type;
    $token['token'] = $token_str;
    $token['expires_in'] = 3600;             //有效期60分钟
    $token['create_time'] = time();
    $token['end_time'] = $token['create_time'] + $token['expires_in'];

    //写入token表
    get_curl('login', '/token/add', $token);

    return $token_str;
}

//字段tinyint 1转true 0转false
function tobool(&$list, $columns)
{
    foreach ($list as $key => $item) {
        foreach ($columns as $column) {
            if ($list[$key][$column]) {
                $list[$key][$column] = true;
            } else {
                $list[$key][$column] = false;
            }
        }
    }
}

/**
 * 获取当前页面完整URL地址
 */
function get_url() {
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self . (isset($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : $path_info);
    return $sys_protocal . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '') . $relate_url;
}

function get_host(){
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    return $sys_protocal . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '') ;
}

/**
 * 记录log
 */
function logs($name, $data) {
    file_put_contents(\think\facade\Env::get('root_path') . 'log/' . $name . "_log.txt", var_export($data, TRUE), FILE_APPEND);
    file_put_contents(\think\facade\Env::get('root_path') . 'log/' . $name . "2_log.txt", print_r($data, TRUE), FILE_APPEND);
    file_put_contents(\think\facade\Env::get('root_path') . 'log/' . $name . "_log.txt", "\r\n", FILE_APPEND);
    file_put_contents(\think\facade\Env::get('root_path') . 'log/' . $name . "2_log.txt", "\r\n", FILE_APPEND);
}