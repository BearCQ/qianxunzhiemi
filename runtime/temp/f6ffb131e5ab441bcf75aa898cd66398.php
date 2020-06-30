<?php /*a:3:{s:80:"F:\aProjectDevelopment\qianxun\application\generate\view\view\validate_list.html";i:1554892859;s:71:"F:\aProjectDevelopment\qianxun\application\generate\view\view\base.html";i:1554892859;s:71:"F:\aProjectDevelopment\qianxun\application\generate\view\view\head.html";i:1554892859;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>代码生成</title>
    <!-- 引入Vue -->
    <script src="/../static/generate/vue.min.js"></script>

    <!--Bootstrap-->
    <link rel="stylesheet" href="/../static/generate/bootstrap.min.css" crossorigin="anonymous">
    <script src="/../static/generate/jquery.min.js" crossorigin="anonymous"></script>
    <script src="/../static/generate/popper.min.js" crossorigin="anonymous"></script>
    <script src="/../static/generate/bootstrap.min.js" crossorigin="anonymous"></script>
    <style type="text/css">
        body,.container-fluid{
            min-height: 100vh !important;
        }
        .bg-db{
            background-color:#4479a1;
        }
        .btn-db,.btn-db:hover {
            color: #fff;
            background-color: #4479a1;
            border-color: #4479a1;
        }
        .btn-db:not(:disabled):not(.disabled).active, .btn-db:not(:disabled):not(.disabled):active, .show>.btn-db.dropdown-toggle {
            color: #fff;
            background-color: #2b5d80;
            border-color: #2b5d80;
        }
        .btn:focus,
        .btn:active:focus,
        .btn.active:focus,
        .btn.focus,
        .btn:active.focus,
        .btn.active.focus {
            outline: none;
            box-shadow:none;
        }
        .bd-sidebar {
            position: -webkit-sticky;
            position: sticky;
            top: 56px;
            z-index: 1000;
            height: calc(100vh - 56px);
            -webkit-box-flex: 0;
            -ms-flex: 0 1 320px;
            flex: 0 1 320px;
            border-bottom: 1px solid rgba(0,0,0,.1);
            border-right: 1px solid rgba(0,0,0,.1);
        }
        .bd-links {
            display: block!important;
            max-height: 100%;
            overflow-y: auto;
            padding-top: 1rem;
            padding-bottom: 1rem;
            margin-right: -15px;
        }
        .bd-toc-item:not(:first-child) {
            margin-top: 1rem;
        }
        .bd-toc-item {
            margin-bottom: 1rem;
        }
        .bd-toc-item>.bd-toc-link {
            color: rgba(0,0,0,.85);
        }
        .bd-toc-link {
            display: block;
            padding: .25rem 1.5rem;
            font-weight: 500;
            color: rgba(0,0,0,.65);
        }
        .bd-toc-link:hover {
            color: rgba(0,0,0,.85);
            text-decoration: none;
        }
        .bd-sidebar .nav>li>a:hover {
            color: rgba(0,0,0,.85);
            text-decoration: none;
            background-color: transparent;
        }
        .nav {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }
        .bd-sidebar .nav>li{
            width: 100%;
        }
        .bd-sidebar .nav>li>a {
            display: block;
            padding: .25rem 1.5rem;
            font-size: 90%;
            color: rgba(0,0,0,.65);
        }
        .bd-title {
            font-size: 2rem;
            margin-top: 1rem;
            margin-bottom: .5rem;
            font-weight: lighter !important;
        }
        .bd-content{
            width: calc(100% - 50px);
        }
        .f_r_nav{
            position: fixed;
            right: 0;
            top: calc(50% - 180px);
            height: 362px;
            width:100px;
            background: #ffffff;
            border:1px solid #BFBFBF;
            border-right: none;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
            overflow: hidden;
        }
        .nav-pills.f_r_nav .nav_title {
            height: 40px;
            line-height: 40px;
            text-align: center;
            border-bottom: 1px solid #BFBFBF;
        }
        .nav-pills.f_r_nav .nav-link {
            transition: .3s;
            text-align: center;
            border-radius: unset;
        }
        .nav-pills.f_r_nav .nav-link:hover {
            color: #fff;
            background-color: #007bff;
        }
        .nav-pills.f_r_nav .submit {
            transition: .3s;
            text-align: center;
            border-radius: unset;
            text-decoration: none;
            height: 40px;
            line-height: 40px;
            border-top: 1px solid #BFBFBF;
            color: #2b5d80;
        }
        .nav-pills.f_r_nav .submit:hover {
            color: #fff;
            background-color: #2b5d80;
        }
        .c_module_content{
            padding-bottom: 300px;
        }
        .c_module_content .row{
            margin-top: 10px;
            padding-top: 16px;
            border: 1px solid #8cb2fb;
            background: #f7fcff;
        }
        .c_module_content table{
            background: #ffffff;
        }

    </style>


</head>

<style type="text/css">
    th, td {
        text-align: center !important;
    }
</style>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; top: 0; width: 100%;z-index: 1000;">
    <span class="navbar-brand mb-0 h1">Generate</span>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <button class="btn btn-sm btn-outline-light" role="button" aria-disabled="true">Powered By SXW</button>
            </li>
        </ul>
    </div>
</nav>
<div class="row container-fluid">
    <div class="col-3 col-md-3 col-xl-2 bd-sidebar">
        <nav class="bd-links" id="bd-docs-nav">
            <div class="bd-toc-item">
                <a class="bd-toc-link" href="<?php echo url('/generate/Index/index'); ?>">基础数据</a>
                <ul class="nav bd-sidenav">
                    <li><a href="<?php echo url('/generate/Index/index'); ?>">基础数据</a></li>
                    <li><a href="<?php echo url('/generate/Index/table'); ?>">添加数据表</a></li>
                    <!--<li><a href="<?php echo url('/generate/Index/add_controller'); ?>">添加控制器</a></li>-->
                </ul>
            </div>
        </nav>
    </div>
    <div class="col-9 col-md-9 col-xl-10" style="padding-top: 56px;">
        <main class="py-md-3 pl-md-5 bd-content" role="main">


<h1 class="bd-title" id="content">验证器</h1>
<hr>
<div id="validate">
    <div class="mb-3">
        <div class="row">
            <div class="col-2">
                <h3>验证字段</h3>
            </div>
            <div class="col-10">
                <button v-if="v_field.length===0" type="button" class="btn btn-primary" onclick="validate.auto_insert_validate()">一键添加</button>
                <button v-if="v_field.length!==0" type="button" class="btn btn-primary disabled">一键添加</button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#validate_field">添加</button>
                <!-- Modal -->
                <div class="modal fade" id="validate_field" tabindex="-1" role="dialog" aria-labelledby="validateFieldLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="validateFieldLabel">添加验证字段</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <form class="form-inline" id="field_form" action="">
                                        <div class="form-group">
                                            <label for="model_name">数据表</label>
                                            <input type="text" class="form-control ml-2" id="model_name" placeholder="数据库表" :value="'zb_'+base.db_name+'.'+base.table_prefix+base.table_name" disabled>
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="field_name">字段名</label>
                                            <select v-if="!validate_unlock" id="field_name" class="form-control  ml-2" v-model="validate_field" name="field_name" required>
                                                <option v-for="li in field" :value="li.id">{{li.name}} - {{li.comment}}</option>
                                            </select>
                                            <select v-if="validate_unlock" class="form-control  ml-2" v-model="validate_field" name="field_name" required disabled>
                                                <option v-for="li in field" :value="li.id">{{li.name}} - {{li.comment}}</option>
                                            </select>
                                            <button v-if="!validate_unlock" type="button" class="btn btn-primary ml-3" onclick="validate.validate_unlock=true">锁定字段</button>
                                            <button v-if="validate_unlock" type="button" class="btn btn-danger ml-3" onclick="validate.validate_unlock=false;validate.add_validate_form=[]">解锁并清空</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <form id="validate_form" action="" onsubmit="validate.add_rule(event)" v-if="validate_unlock">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group form-inline">
                                                    <label>规则</label>
                                                    <select class="form-control  ml-2" v-model="validate_rule" name="rule" required>
                                                        <option v-for="li in validate" :value="li.name">{{li.name}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4" v-if="validate_rule=='min' || validate_rule=='max' || validate_rule=='between'">
                                                <div class="form-group form-inline">
                                                    <label>值</label>
                                                    <input v-for="li in validate" v-if="li.name == validate_rule" type="text" name="value" class="form-control ml-2" :placeholder="li.desc" :value="li.value" required>

                                                </div>
                                            </div>
                                            <div class="col-4" v-if="validate_rule=='tel'">
                                                <div class="form-group form-inline">
                                                    <input v-for="li in validate" v-if="li.name == validate_rule" type="text" name="value" class="form-control" :placeholder="li.desc" :value="li.value" required readonly>
                                                </div>
                                            </div>
                                            <div class="col-8" v-if="validate_rule=='in'">
                                                <div class="form-group form-inline">
                                                    <label>值</label>
                                                    <select class="form-control  ml-3" v-model="validate_in_value" required>
                                                        <option value="0">从枚举中获取</option>
                                                        <option value="1">自定义</option>
                                                    </select>
                                                    <input v-if="validate_in_value=='0' && get_in_value(validate_field)" type="text" class="form-control ml-2" :value="rule_in_value" placeholder="值" name="value" required readonly>
                                                    <input v-if="validate_in_value=='1'" type="text" class="form-control ml-2" placeholder="用“,”隔开" name="value" required>
                                                </div>
                                            </div>
                                            <div class="col-12" v-for="li in validate" v-if="li.name == validate_rule">
                                                <div class="form-group" v-for="list in field" v-if="validate_field===list.id">
                                                    <textarea class="form-control" name="msg" rows="" placeholder="错误提示" required>{{list.comment}}{{li.msg}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6 ml-auto">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-db float-right">添加</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">规则</th>
                                            <th scope="col">值</th>
                                            <th scope="col">错误消息</th>
                                            <th scope="col">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(data,index) in add_validate_form">
                                            <td>{{data.rule}}</td>
                                            <td>{{data.value}}</td>
                                            <td>{{data.msg}}</td>
                                            <td><a :href="'javascript:validate.del_v_rule('+index+')'">删除</a></td>
                                        </tr>
                                        <tr v-if="add_validate_form.length === 0">
                                            <td colspan="4">暂无数据</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                <button v-if="validate_unlock" type="button" class="btn btn-primary" onclick="validate.add_validate_field()">添加验证字段</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">数据表</th>
                <th scope="col">字段名</th>
                <th scope="col">字段</th>
                <th scope="col">类型</th>
                <th scope="col">枚举</th>
                <th scope="col">规则</th>
                <th scope="col">操作</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(list,index) in v_field">
                <td>{{list.id}}</td>
                <td>{{list.table_prefix}}{{list.table_name}}</td>
                <td>{{list.comment}}</td>
                <td>{{list.name}}</td>
                <td>{{list.type}}</td>
                <td>
                    <select v-if="list.enum.length!==0" class="form-control form-control-sm" name="default" required>
                        <option v-for="li in list.enum" :value="li.key">{{li.key}} - {{li.name}}</option>
                    </select>
                </td>
                <td>
                    <select class="form-control form-control-sm" name="default" required>
                        <option v-for="li in list.validate" :value="li.rule">{{li.rule}}{{li.value?' =&gt; "'+li.value+'"':''}}</option>
                    </select>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-link" :onclick="'validate.edit_model('+index+')'">修改</button>
                    <button type="button" class="btn btn-sm btn-link" :onclick="'validate.del_validate_field('+index+')'">删除</button>
                </td>
            </tr>
            <tr v-if="v_field.length==0"><td colspan="8">暂无数据</td></tr>
        </tbody>
    </table>
    <!-- 修改 Modal -->
    <div class="modal fade" id="edit_validate_field" tabindex="-1" role="dialog" aria-labelledby="editValidateFieldLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editValidateFieldLabel">修改验证字段</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" v-for="(list,index) in v_field" v-if="index==edit_validate_field_index" >
                    <div class="mb-3">
                        <form class="form-inline" action="">
                            <div class="form-group">
                                <label>数据表</label>
                                <input type="text" class="form-control ml-2" placeholder="数据库表" :value="'zb_'+base.db_name+'.'+base.table_prefix+base.table_name" disabled>
                            </div>
                            <div class="form-group ml-3">
                                <label for="field_name">字段名</label>
                                <select class="form-control  ml-2" v-model="list.field_id" name="field_name" required disabled>
                                    <option v-for="li in field" :value="li.id">{{li.name}} - {{li.comment}}</option>
                                </select>
                            </div>
                        </form>
                        <hr>
                        <form action="" id="edit_validate_form" onsubmit="validate.edit_add_rule(event)">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group form-inline">
                                        <label>规则</label>
                                        <select class="form-control  ml-2" v-model="validate_rule" name="rule" required>
                                            <option v-for="li in validate" :value="li.name">{{li.name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4" v-if="validate_rule=='min' || validate_rule=='max' || validate_rule=='between'">
                                    <div class="form-group form-inline">
                                        <label>值</label>
                                        <input v-for="li in validate" v-if="li.name == validate_rule" type="text" name="value" class="form-control ml-2" :placeholder="li.desc" :value="li.value" required>

                                    </div>
                                </div>
                                <div class="col-4" v-if="validate_rule=='tel'">
                                    <div class="form-group form-inline">
                                        <input v-for="li in validate" v-if="li.name == validate_rule" type="text" name="value" class="form-control" :placeholder="li.desc" :value="li.value" required readonly>
                                    </div>
                                </div>
                                <div class="col-8" v-if="validate_rule=='in'">
                                    <div class="form-group form-inline">
                                        <label>值</label>
                                        <select class="form-control  ml-3" v-model="validate_in_value" required>
                                            <option value="0">从枚举中获取</option>
                                            <option value="1">自定义</option>
                                        </select>
                                        <input v-if="validate_in_value=='0' && get_in_value(list.id)" type="text" class="form-control ml-2" :value="rule_in_value" placeholder="值" name="value" required readonly>
                                        <input v-if="validate_in_value=='1'" type="text" class="form-control ml-2" placeholder="用“,”隔开" name="value" required>
                                    </div>
                                </div>
                                <div class="col-12" v-for="li in validate" v-if="li.name == validate_rule">
                                    <div class="form-group">
                                        <textarea class="form-control" name="msg" rows="" placeholder="错误提示" required>{{list.comment}}{{li.msg}}</textarea>
                                    </div>
                                </div>
                                <div class="col-6 ml-auto">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-db float-right">添加</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">规则</th>
                            <th scope="col">值</th>
                            <th scope="col">错误消息</th>
                            <th scope="col">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data,index) in list.validate">
                            <td>{{data.rule}}</td>
                            <td>{{data.value}}</td>
                            <td>{{data.msg}}</td>
                            <td><a :href="'javascript:validate.edit_del_v_rule('+index+')'">删除</a></td>
                        </tr>
                        <tr v-if="list.validate.length === 0">
                            <td colspan="4">暂无数据</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" onclick="validate.edit_validate_field()">修改</button>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-4">

    <div class="mb-3">
        <div class="row">
            <div class="col-2">
                <h3>验证场景</h3>
            </div>
            <div class="col-10">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#validate_scene">添加</button>
                <!-- Modal -->
                <div class="modal fade" id="validate_scene" tabindex="-1" role="dialog" aria-labelledby="validateSceneLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="validateSceneLabel">添加验证场景</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <form class="form-inline" id="scene_form" action="" onsubmit="validate.add_scene_submit(event)">
                                        <div class="form-group">
                                            <label for="scene_name">场景</label>
                                            <input type="text" class="form-control ml-2" id="scene_name" name="name" placeholder="场景名称" value="" required>
                                        </div>
                                        <button type="submit" id="btn-scene-submit" style="display: none;"></button>
                                    </form>
                                    <hr>
                                    <form id="validate_id_form" action="" onsubmit="validate.add_v_field_id(event)">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group form-inline">
                                                    <label for="field_name">验证字段</label>
                                                    <select id="s_field_name" class="form-control  ml-2" name="id" required>
                                                        <option v-for="li in v_field" :value="li.id">{{li.id}} - {{li.comment}} - {{li.name}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group form-inline">
                                                    <button type="submit" class="btn btn-primary">添加验证字段</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">字段名</th>
                                        <th scope="col">字段</th>
                                        <th scope="col">类型</th>
                                        <th scope="col">枚举</th>
                                        <th scope="col">规则</th>
                                        <th scope="col">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(list,index) in s_v_field_id_form">
                                        <td v-for="(li,index) in v_field" v-if="li.id==list">{{li.comment}}</td>
                                        <td v-for="(li,index) in v_field" v-if="li.id==list">{{li.name}}</td>
                                        <td v-for="(li,index) in v_field" v-if="li.id==list">{{li.type}}</td>
                                        <td v-for="(li,index) in v_field" v-if="li.id==list">
                                            <select v-if="li.enum.length!==0" class="form-control" name="default" required>
                                                <option v-for="data in li.enum" :value="data.key">{{data.key}} - {{data.name}}</option>
                                            </select>
                                        </td>
                                        <td v-for="(li,index) in v_field" v-if="li.id==list">
                                            <select class="form-control" name="default" required>
                                                <option v-for="data in li.validate" :value="data.rule">{{data.rule}}{{data.value?' =&gt; "'+data.value+'"':''}}</option>
                                            </select>
                                        </td>
                                        <td><a :href="'javascript:validate.del_v_rule('+index+')'">删除</a></td>
                                    </tr>
                                    <tr v-if="s_v_field_id_form.length === 0">
                                        <td colspan="6">暂无数据</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                <button type="button" class="btn btn-primary" onclick="validate.add_validate_scene()">添加验证字段</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">分组</th>
            <th scope="col">模块</th>
            <th scope="col">数据表</th>
            <th scope="col">负责人</th>
            <th scope="col">场景</th>
            <th scope="col">验证字段</th>
            <th scope="col">操作</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(list,index) in validate_scene">
            <td>{{list.id}}</td>
            <td>{{base.group_name}}</td>
            <td>{{base.model_name}}（zb_{{base.db_name}}）</td>
            <td>{{base.table_title}}（{{base.table_prefix}}{{base.table_name}}）</td>
            <td>{{base.person_name}}</td>
            <td>{{list.name}}</td>
            <td>
                <select class="form-control form-control-sm ml-2" name="id" required>
                    <template v-for="li in v_field">
                        <option  v-for="l in list.v_field_id" v-if="li.id == l">{{li.id}} - {{li.comment}} - {{li.name}}</option>
                    </template>
                </select>
            </td>
            <td>
<!--                <button type="button" class="btn btn-sm btn-link" :onclick="'validate.edit_validate_scene_modal('+index+')'">修改</button>-->
                <button type="button" class="btn btn-sm btn-link" :onclick="'validate.del_validate_scene('+index+')'">删除</button>
            </td>
        </tr>
        <tr v-if="validate_scene.length==0"><td colspan="8">暂无数据</td></tr>
        </tbody>
    </table>
    <!-- 修改 Modal -->

</div>


        </main>
    </div>


</div>


<script type="text/javascript">
    const validate = new Vue({
        el: '#validate',
        data: {
            table_id:0,
            v_field_id:0,
            validate:[
                {'name':'require','value':'','msg':'必须','desc':''},
                {'name':'in','value':'','msg':'不在列举中','desc':''},
                {'name':'between','value':'','msg':'不在范围内','desc':'min,max（用“,”隔开）'},
                {'name':'max','value':'0','msg':'不在范围内','desc':'最大值'},
                {'name':'min','value':'0','msg':'不在范围内','desc':'最小值'},
                {'name':'number','value':'','msg':'不是数字','desc':''},
                {'name':'email','value':'','msg':'邮件格式错误','desc':''},
                {'name':'tel','value':'/^1[3-9]\\d{9}$/','msg':'电话格式错误','desc':''},
            ],
            validate_unlock:false,
            validate_in_value:'0',
            validate_field:undefined,
            validate_rule:'require',
            rule_in_value:'',
            add_validate_form:[],
            edit_validate_field_index:0,
            base:[],
            field: [],
            v_field: [],
            //场景
            validate_scene: [],
            s_v_field_id_form:[],

        },
        created() {
            this.get_list();
        },
        methods: {
            get_list() {
                const that = this;
                if(window.sessionStorage.getItem("validate_table_id") === null){
                    window.location.href="<?php echo url('/generate'); ?>";
                }
                that.table_id = window.sessionStorage.getItem("validate_table_id");

                $.ajax({
                    url:"<?php echo url('/generate/Api/get_v_field_list'); ?>",
                    type:"POST",
                    data:{
                        id:that.table_id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            Vue.set(that,'v_field',res.data);
                        }else{
                            that.v_field = [];
                        }
                    }
                });
                $.ajax({
                    url:"<?php echo url('/generate/Api/get_field_list'); ?>",
                    type:"POST",
                    data:{
                        id:that.table_id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            Vue.set(that,'field',res.data);
                            Vue.set(that,'validate_field',res.data[0].id);
                        }else{
                            that.field = [];
                        }
                    }
                });
                $.ajax({
                    url:"<?php echo url('/generate/Api/get_validate_base'); ?>",
                    type:"POST",
                    data:{
                        id:that.table_id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            Vue.set(that,'base',res.data);
                        }else{
                            that.base = [];
                        }
                    }
                });
                $.ajax({
                    url:"<?php echo url('/generate/Api/get_validate_scene'); ?>",
                    type:"POST",
                    data:{
                        table_id:that.table_id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            Vue.set(that,'validate_scene',res.data);
                        }else{
                            that.base = [];
                        }
                    }
                });
            },
            auto_insert_validate(){
                const that = this;
                that.table_id = window.sessionStorage.getItem("validate_table_id");
                if (that.table_id === 0 || that.table_id ===""){
                    return;
                }
                $.ajax({
                    url:"<?php echo url('/generate/Api/auto_insert_validate'); ?>",
                    type:"POST",
                    data:{
                        id:that.table_id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            that.get_list();
                            Vue.set(that,'field',res.data);
                        }else{
                            that.field = [];
                        }
                    }
                });
            },
            modalAlert() {
                const that = this;
                this.$Modal.alert({
                    title: '这里是标题名称',
                    content: '这里是文本内容',
                    callback: function (action) {
                        that.$Message(action)
                    }
                })
            },
            get_in_value(field_id){
                const that = this;
                const field = this.field;
                let value = '';
                for (let i = 0;i<field.length;i++){
                    if (field[i]['id']===field_id){
                        for (let x = 0;x<field[i]['enum'].length; x++){
                            if (x!==0){
                                value+=",";
                            }
                            value+=field[i]['enum'][x]['key'];
                        }
                    }
                }
                Vue.set(that,'rule_in_value',value);
                return true;
            },
            add_rule(event) {
                event.preventDefault();
                const form_data = $('#validate_form').serializeArray();
                if (form_data.length===2){
                    form_data[2]={name:'value',value:''};
                }
                const data = {};
                for(let i in form_data){
                    data[form_data[i]['name']]=form_data[i]['value'];
                }
                Vue.set(this.add_validate_form,Object.keys(this.add_validate_form).length,data);
                $('#validate_form')[0].reset();
            },
            del_v_rule(index){
                Vue.delete(this.add_validate_form,index);
            },
            add_validate_field(){
                const that = this;
                $.ajax({
                    url:"<?php echo url('/generate/Api/add_validate_field'); ?>",
                    type:"POST",
                    data:{
                        table_id:that.table_id,
                        field_id:that.validate_field,
                        validate:JSON.stringify(that.add_validate_form)
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            that.add_validate_form=[]
                            Vue.set(this,'validate_unlock',false);
                            $('#validate_field').modal('hide');
                            that.get_list();
                        }
                    }
                });
            },
            del_validate_field(index){
                const that = this;
                const id = that.v_field[index].id;
                Vue.delete(that.v_field,index);
                $.ajax({
                    url:"<?php echo url('/generate/Api/del_validate_field'); ?>",
                    type:"POST",
                    data:{
                        'id': id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            console.log('删除验证字段成功 id:'+id);
                        }else{
                            that.get_list();
                        }
                    }
                });
            },
            edit_model(index){
                Vue.set(this,'edit_validate_field_index',index);
                $('#edit_validate_field').modal('show');
            },
            get_v_in_value(){
                const that = this;
                const field = this.field;
                let value = '';
                for (let i = 0;i<field.length;i++){
                    if (field[i]['id']===that.validate_field){
                        for (let x = 0;x<field[i]['enum'].length; x++){
                            if (x!==0){
                                value+=",";
                            }
                            value+=field[i]['enum'][x]['key'];
                        }
                    }
                }
                Vue.set(that,'rule_in_value',value);
                return true;
            },
            edit_add_rule(event) {
                event.preventDefault();
                const form_data = $('#edit_validate_form').serializeArray();
                if (form_data.length===2){
                    form_data[2]={name:'value',value:''};
                }
                const data = {};
                for(let i in form_data){
                    data[form_data[i]['name']]=form_data[i]['value'];
                }
                const v_f_id = this.edit_validate_field_index;
                Vue.set(this.v_field[v_f_id].validate,Object.keys(this.v_field[v_f_id].validate).length,data);
                $('#edit_validate_form')[0].reset();
            },
            edit_del_v_rule(index){
                const v_f_id = this.edit_validate_field_index;
                Vue.delete(this.v_field[v_f_id].validate,index);
            },
            edit_validate_field(){
                const that = this;
                const index = that.edit_validate_field_index
                $.ajax({
                    url:"<?php echo url('/generate/Api/edit_validate_field'); ?>",
                    type:"POST",
                    data:{
                        id:that.v_field[index].id,
                        validate:JSON.stringify(that.v_field[index].validate)
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            $('#edit_validate_field').modal('hide');
                        }else{
                            that.get_list();
                        }
                    }
                });
            },
            //场景验证
            del_validate_scene(index){
                const that = this;
                const id = that.validate_scene[index].id;
                Vue.delete(that.validate_scene,index);
                $.ajax({
                    url:"<?php echo url('/generate/Api/del_validate_scene'); ?>",
                    type:"POST",
                    data:{
                        id:id,
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                        }else{
                            that.get_list();
                        }
                    }
                });
            },
            add_v_field_id(event){
                event.preventDefault();
                const form_data = $('#validate_id_form').serializeArray();

                const data = {};
                for(let i in form_data){
                    data[form_data[i]['name']]=form_data[i]['value'];
                }
                Vue.set(this.s_v_field_id_form,this.s_v_field_id_form.length,data.id);
            },
            add_validate_scene(){
                $('#btn-scene-submit').click();
            },
            add_scene_submit(event){
                const that = this;
                event.preventDefault();
                const form_data = $('#scene_form').serializeArray();
                const data = {};
                for(let i in form_data){
                    data[form_data[i]['name']]=form_data[i]['value'];
                }
                let v_field_id='';
                for (let i = 0; i<that.s_v_field_id_form.length;i++){
                    if (i!==0){
                        v_field_id+=",";
                    }
                    v_field_id+=that.s_v_field_id_form[i];
                }
                $.ajax({
                    url:"<?php echo url('/generate/Api/add_validate_scene'); ?>",
                    type:"POST",
                    data:{
                        table_id:that.table_id,
                        name:data.name,
                        v_field_id:v_field_id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            that.get_list();
                            that.s_v_field_id_form=[];
                            $('#validate_scene').modal('hide');
                        }
                    }
                });

            }




        }
    });



</script>

</body>
</html>