<?php

namespace app\http\middleware;

class Check
{
    public function handle($request, \Closure $next)
    {
        header("Access-Control-Allow-Origin:*");
        header('Access-Control-Allow-Credentials: true');
        header("Access-Control-Allow-Methods:*");
        header("Access-Control-Allow-Headers:Content-Type,Access-Token,X-Token");
        header("Access-Control-Expose-Headers:*");

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit;
        }

        define('ROOT_TOKEN', 'os2rftxaXgM0vWL1QzOH');
        $module = $request->module();//模块名
        $controller = $request->controller();//控制器名
        $action = $request->action();//方法名

        $is_except = in_array($module . '/' . $controller . '/' . $action, Config('except_check.'));

        if (!$is_except && $module!=='generate') {
            //获取订单用户user_id
            $login_model_api = Config('model_api.login');
            $url = $login_model_api . "/token/info";
            $token['token'] = input('token');

            $token = \tools\curl\Curl::post($url, $token);
            $token = \tools\curl\Curl::json2arr($token);

            if ($token && !isset($token['error_id'])) {
                $token = $token['data'];
                define('USERID', $token['user_id']);
                define('USERTYPE', $token['user_type']);
            } else {
                $data['status'] = false;
                $data['msg'] = 'token不正确';
                echo \tools\curl\Curl::arr2json($data);
                die;
            }
        } else {
            define('USERID', null);
            define('USERTYPE', null);
        }

        $pagesize = input('pagesize') ? input('pagesize') : input('limit');
        if ($pagesize) {
            Config('paginate.list_rows', $pagesize);
        }
        return $next($request);
    }
}
