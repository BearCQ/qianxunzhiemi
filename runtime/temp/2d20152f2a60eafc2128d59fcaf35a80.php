<?php /*a:3:{s:72:"F:\aProjectDevelopment\qianxun\application\generate\view\view\table.html";i:1554892859;s:71:"F:\aProjectDevelopment\qianxun\application\generate\view\view\base.html";i:1554892859;s:71:"F:\aProjectDevelopment\qianxun\application\generate\view\view\head.html";i:1554892859;}*/ ?>
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


<h1 class="bd-title" id="content">添加数据表</h1>
<hr>

<div id="table_index">
    <form action="" id="table_form" class="row" onsubmit="table.save_table(event)">
        <div class="form-group col-6">
            <label>分组</label>
            <select class="form-control" name="group_id" required>
                <option v-for="list in group" :value="list.id">{{list.name}}</option>
            </select>
        </div>
        <div class="form-group col-6">
            <label>模块（数据库）</label>
            <select class="form-control" name="model_id" required>
                <option v-for="list in model" :value="list.id">{{list.model_name}} （zb_{{list.db_name}}）</option>
            </select>
        </div>
        <div class="form-group col-6">
            <label>数据库引擎</label>
            <select class="form-control" name="engine" required>
                <option v-for="list in engine" :value="list.name">{{list.name}}</option>
            </select>
        </div>
        <div class="form-group col-6">
            <label>负责人</label>
            <select class="form-control" name="person_id" required>
                <option v-for="list in person" :value="list.id">{{list.name}}</option>
            </select>
        </div>
        <div class="form-group col-6">
            <label>标题</label>
            <input type="text" class="form-control" name="table_title" placeholder="标题" required>
        </div>
        <div class="form-group col-6">
            <label>数据表名称</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">tp_</div>
                </div>
                <input type="text" class="form-control" name="table_name" placeholder="数据表名称" required>
            </div>
        </div>
        <button type="submit" id="table_form_submit" style="display: none"></button>
    </form>


    <!-- 字段列表 -->
    <div class="row">
        <div class="col-12 mt-3">
            <table class="table table-bordered" id="group_table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">备注</th>
                    <th scope="col">字段</th>
                    <th scope="col">类型</th>
                    <th scope="col">允许空</th>
                    <th scope="col">默认值</th>
                    <th scope="col">枚举注释</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(data,index) in fieldForm.field">
                    <td>{{data.comment}}</td>
                    <td>{{data.name}}</td>
                    <td>{{data.type}}({{data.length}})</td>
                    <td>{{data.not_null=='0'?'允许空':'不为空'}}</td>
                    <td>{{data.default==="AUTO_INCREMENT"?'自增长':data.default}}</td>
                    <td>
                        <select v-if="data.enum.length !==0 " class="form-control form-control-sm" name="type">
                            <option v-for="li in data.enum" :value="li.key">{{li.key}} - {{li.name}}</option>
                        </select>
                        <span v-if="data.enum.length === 0">—</span>
                    </td>
                    <td>
                        <!-- 枚举 按钮 -->
                        <span v-if="index === 0">主键</span>
                        <a v-if="index !== 0" :href="'javascript:table.set_enum_id('+index+')'">枚举</a>
                        <a v-if="index !== 0" :href="'javascript:table.del('+index+')'">删除</a>
                        <!-- 枚举 弹窗 -->
                        <div class="modal fade" id="enumModal" tabindex="-1" role="dialog" aria-labelledby="enumModelLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="enumModelLabel">枚举</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <!-- 添加枚举 表单 -->
                                            <form class="form-inline" id="enum_form" onsubmit="table.enum_add(event)">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="enum_key" placeholder="Key" required autocomplete="off">
                                                    <input type="text" class="form-control ml-2" name="enum_name" placeholder="Name" required autocomplete="off">
                                                </div>
                                                <button type="submit" class="btn btn-primary ml-2">添加</button>
                                            </form>
                                        </div>
                                        <table class="table table-bordered" id="enum_table" v-for="(list,index) in fieldForm.field" v-if="enum_modal_id === index">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">key</th>
                                                <th scope="col">value</th>
                                                <th scope="col">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="(li,index) in list.enum">
                                                <td>{{li.key}}</td>
                                                <td>{{li.name}}</td>
                                                <td><a :href="'javascript:table.enum_del('+index+')'">删除</a></td>
                                            </tr>
                                            <tr v-if="list.enum.length === 0">
                                                <td colspan="3">无数据</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 枚举 弹窗 --结束 -->
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <!-- 添加字段 按钮 -->
                        <button type="button" class="btn btn-light form-control" data-toggle="modal" data-target="#field">+</button>
                        <!-- 添加字段 弹出框 -->
                        <div class="modal fade" id="field" tabindex="-1" role="dialog" aria-labelledby="groupLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="" id="addField" onsubmit="table.add_field(event)">
                                        <div class="modal-header bg-db text-light">
                                            <h5 class="modal-title" id="groupLabel">添加字段</h5>
                                            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <div class="form-group">
                                                <label>备注</label>
                                                <input type="text" class="form-control" name="comment" placeholder="备注" autocomplete="off" required>
                                            </div>
                                            <div class="form-group">
                                                <label>字段名</label>
                                                <input type="text" class="form-control" name="name" placeholder="字段名" autocomplete="off" required>
                                            </div>
                                            <div class="form-group">
                                                <label>类型</label>
                                                <select class="form-control" v-model="fieldForm.type" name="type" required>
                                                    <option v-for="list in type" :value="list.name">{{list.name}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group" v-if="fieldForm.type == 'Int'| fieldForm.type == 'VarChar'| fieldForm.type == 'TinyInt'">
                                                <label>长度</label>
                                                <input v-for="list in type" v-if="list.name==fieldForm.type" type="text" class="form-control" name="length" placeholder="长度" :value="list.length" autocomplete="off" required>
                                            </div>
                                            <div class="form-group" v-if="fieldForm.type == 'Enum'">
                                                <label>值</label>
                                                <input v-for="list in type" v-if="list.name==fieldForm.type" type="text" class="form-control" name="length" placeholder="枚举，用（,）隔开" oninput="table.set_enum()" id="enum" autocomplete="off" required>
                                            </div>
                                            <div class="form-group">
                                                <label>允许空</label>
                                                <div class="form-row">
                                                    <div class="col-2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="not_null" value="0" id="not_null_true" required>
                                                            <label class="custom-control-label" for="not_null_true">允许</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="not_null" value="1" id="not_null_false" required checked>
                                                            <label class="custom-control-label" for="not_null_false">不允许</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" v-if="fieldForm.type !== 'Text'">
                                                <label>默认值</label>
                                                <div class="custom-control custom-checkbox mb-3" v-if="fieldForm.type == 'Int'">
                                                    <input type="checkbox" class="custom-control-input" name="default" value="AUTO_INCREMENT" id="auto_increment" onclick="table.default_hidden()">
                                                    <label class="custom-control-label" for="auto_increment">自增长</label>
                                                </div>
                                                <input v-for="list in type" type="text" class="form-control" v-if="default_show && fieldForm.type !== 'Enum' && list.name==fieldForm.type" :value="list.default" name="default" placeholder="默认值" autocomplete="off">

                                                <select v-if="fieldForm.type === 'Enum'" class="form-control" name="default" required>
                                                    <option v-for="list in enum_data" :value="list.name">{{list.name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                                            <button type="submit" class="btn btn-db">添加</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div>
            <button v-if="btn.btn_save" type="button" class="btn btn-db" onclick="table.set_submit_type()">保存并生成</button>
            <button v-if="!btn.btn_save" type="button" class="btn btn-db disabled">保存并生成</button>
        </div>
    </div>
</div>




        </main>
    </div>


</div>


<script type="text/javascript">
    //数据库表
    const table = new Vue({
        el: '#table_index',
        data: {
            fieldForm:{
                type:'VarChar',
                field:[
                    {'comment':'id','name':'id','type':'Int','length':'11','default':'AUTO_INCREMENT','not_null':'1','enum':[]}
                ]
            },
            btn: {
                btn_save:true,
            },
            submit_type: undefined,
            enum_modal_id:undefined,
            default_show:true,
            enum_data:[],
            group: [],
            table: [],
            model: [],
            person: [],
            engine: [{'name':'InnoDB'},{'name':'MyISAM'}],
            type: [
                {'name':'VarChar','length':'255','default':''},
                {'name':'Int','length':'11','default':'0'},
                {'name':'TinyInt','length':'3','default':'0'},
                {'name':'Enum','length':'','default':''},
                {'name':'Text','length':'','default':''},
                {'name':'Date','length':'','default':'0000-00-00'}
            ],
            character_set: [
                {
                    'name':'utf8',
                    'children': ['utf8_general_ci','utf8_unicode_ci']
                },{
                    'name':'gbk',
                    'children': ['gbk_bin','gbk_chinese_ci']
                }
            ]
        },
        created() {
            this.get_list();
        },
        methods: {
            get_list() {
                const that = this;
                $.ajax({
                    url:"<?php echo url('/generate/Api/get_model_list'); ?>",
                    type:"GET",
                    async:true,
                    success:function (res) {
                        if (res.status){
                            that.model = res.data;
                        }else{
                            that.model = [];
                        }
                    },
                });
                $.ajax({
                    url:"<?php echo url('/generate/Api/get_group_list'); ?>",
                    type:"GET",
                    async:true,
                    success:function (res) {
                        if (res.status){
                            that.group = res.data;
                        }else{
                            that.group = [];
                        }
                    },
                });
                $.ajax({
                    url:"<?php echo url('/generate/Api/get_person_list'); ?>",
                    type:"GET",
                    async:true,
                    success:function (res) {
                        if (res.status){
                            that.person = res.data;
                        }else{
                            that.person = [];
                        }
                    },
                });

                $.ajax({
                    url:"<?php echo url('/generate/Api/get_table_list'); ?>",
                    type:"GET",
                    async:true,
                    success:function (res) {
                        if (res.status){
                            that.table = res.data;
                        }else{
                            that.table = [];
                        }
                    },
                });
            },
            add_field(event){
                event.preventDefault();
                const form_data = $('#addField').serializeArray();
                const data = {};
                for(let i in form_data){
                    data[form_data[i]['name']]=form_data[i]['value'];
                }
                data['enum']=[];
                // this.fieldForm.field[Object.keys(this.fieldForm.field).length]=data;
                Vue.set(this.fieldForm.field,Object.keys(this.fieldForm.field).length,data);
                console.log(this.fieldForm);

                $('#addField')[0].reset();
                $('#field').modal('hide');
            },
            default_hidden(){
                // console.log();
                if($('#auto_increment').prop("checked")){
                    Vue.set(this,'default_show',false);
                }else{
                    Vue.set(this,'default_show',true);
                }
            },
            del(id){
                Vue.delete(this.fieldForm.field,id)
            },
            set_enum(){
                const data = $('#enum').val();
                const enum_data = data.split(",");
                const res = [];
                for (const i in enum_data) {
                    res.push({'name':enum_data[i]})
                }
                Vue.set(this,'enum_data',res);
            },
            set_enum_id(id){
                Vue.set(this,'enum_modal_id',id);
                $('#enumModal').modal('show')
                console.log(this.enum_modal_id);
            },
            enum_del(id){
                Vue.delete(this.fieldForm.field[this.enum_modal_id].enum,id);
            },
            enum_add(event){
                event.preventDefault();
                const form_data = $('#enum_form').serializeArray();
                const data = {};
                for(let i in form_data){
                    data[form_data[i]['name']]=form_data[i]['value'];
                }
                const res = {};
                res['key'] = data['enum_key'];
                res['name'] = data['enum_name'];
                const length = Object.keys(this.fieldForm.field[this.enum_modal_id].enum).length;
                Vue.set(this.fieldForm.field[this.enum_modal_id].enum,length,res);

                $('#enum_form')[0].reset();
            },
            set_submit_type(){
                Vue.set(this.btn,'btn_save',false);
                $('#table_form_submit').click();
            },
            save_table(event){
                event.preventDefault();
                //获取表单数据
                const data = $('#table_form').serializeArray();
                //表单添加字段的数据
                let field = {};
                field['name'] = 'field';
                field['value'] = JSON.stringify(this.fieldForm.field);
                data.push(field);

                $.ajax({
                    url:"<?php echo url('/generate/api/add_table'); ?>",
                    type:"POST",
                    data:data,
                    async:true,
                    success:function (res) {
                        if (res.status){
                            window.location.href="<?php echo url('/generate'); ?>"
                        }else{
                            alert(res.msg);
                        }
                    }
                })

            }
        }
    })


</script>

</body>
</html>