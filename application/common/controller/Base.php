<?php
/**
 * tpAdmin [a web admin based ThinkPHP5]
 *
 * @author    yuan1994 <tianpian0805@gmail.com>
 * @link      http://tpadmin.yuan1994.com/
 * @copyright 2016 yuan1994 all rights reserved.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 */

namespace app\common\controller;

use think\App;
use think\Model;
use think\View;
use think\Request;
use think\Session;
use think\Db;
use think\Config;
use think\Loader;
use think\Exception;
use think\exception\HttpException;
use Elasticsearch\ClientBuilder;

class Base extends \think\Controller
{
    function successJson($data)
    {
        $default = array(
            "status" => true,
            "msg" => "成功",
        );

        $data = array_merge($default, $data);
        return json($data);
    }

    function errorJson($data)
    {
        $default = array(
            "status" => false,
            "msg" => "失败",
        );
        $data = array_merge($default, $data);
        return json($data);
    }

}
