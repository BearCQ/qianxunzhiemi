<?php /*a:3:{s:72:"F:\aProjectDevelopment\qianxun\application\generate\view\view\index.html";i:1554892859;s:71:"F:\aProjectDevelopment\qianxun\application\generate\view\view\base.html";i:1554892859;s:71:"F:\aProjectDevelopment\qianxun\application\generate\view\view\head.html";i:1554892859;}*/ ?>
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


<h1 class="bd-title" id="content">基础数据</h1>
<hr>
<div class="mb-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#group">添加分组</button>
    <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#person">添加负责人</button>
    <button type="button" class="btn btn-db ml-2" data-toggle="modal" data-target="#model" onclick="model.load_base()">添加模块</button>
    <a href="<?php echo url('/generate/Index/table'); ?>" class="btn btn-db ml-2">添加数据表</a>
    <!-- Modal -->
    <div class="modal fade" id="group" tabindex="-1" role="dialog" aria-labelledby="groupLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="groupLabel">添加分组</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <form class="form-inline" id="group_form" action="">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="group_name" placeholder="分组名称" required>
                            </div>
                            <button type="submit" class="btn btn-primary ml-2" onclick="group.add(event)">添加</button>
                        </form>
                    </div>
                    <table class="table table-bordered" id="group_table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">名称</th>
                            <th scope="col">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="data in table">
                            <td>{{data.id}}</td>
                            <td>{{data.name}}</td>
                            <td><a :href="'javascript:group.del('+data.id+')'">删除</a></td>
                        </tr>
                        <tr v-if="table.length === 0">
                            <td colspan="3">暂无分组数据</td>
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
    <div class="modal fade" id="person" tabindex="-1" role="dialog" aria-labelledby="personLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="personLabel">添加负责人</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <form class="form-inline" id="person_form" action="">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="负责人" required>
                            </div>
                            <button type="submit" class="btn btn-primary ml-2" onclick="person.add(event)">添加</button>
                        </form>
                    </div>
                    <table class="table table-bordered" id="person_table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">负责人</th>
                            <th scope="col">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="data in table">
                            <td>{{data.id}}</td>
                            <td>{{data.name}}</td>
                            <td><a :href="'javascript:person.del('+data.id+')'">删除</a></td>
                        </tr>
                        <tr v-if="table.length === 0">
                            <td colspan="3">暂无负责人数据</td>
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
    <div class="modal fade" id="model" tabindex="-1" role="dialog" aria-labelledby="modelLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-db text-light">
                    <h5 class="modal-title" id="modelLabel">添加模型</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="model_table">
                    <div class="mb-3">
                        <form class="" id="model_form" action="">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>模块名称</label>
                                    <input type="text" class="form-control" name="model_name" placeholder="模块名称" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>数据库名称</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">zb_</div>
                                        </div>
                                        <input type="text" class="form-control" v-model="db_name" name="db_name"  placeholder="数据库名称" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>命名空间</label>
                                    <input v-if="db_name" type="text" class="form-control" :value="'app\\'+db_name+'\\controller'" placeholder="命名空间" disabled>
                                    <input v-if="!db_name" type="text" class="form-control" value="" placeholder="命名空间" disabled>
                                </div>
                                <div class="form-group col-12">
                                    <button type="submit" class="btn btn-db float-right" onclick="model.add(event)">添加</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">名称</th>
                            <th scope="col">数据库</th>
                            <th scope="col">命名空间</th>
                            <th scope="col">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="data in table">
                            <td>{{data.id}}</td>
                            <td>{{data.model_name}}</td>
                            <td>zb_{{data.db_name}}</td>
                            <td>{{data.model_namespace}}</td>
                            <td><a :href="'javascript:model.del('+data.id+')'">删除</a></td>
                        </tr>
                        <tr v-if="table.length === 0">
                            <td colspan="7">暂无模块数据</td>
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
</div>
<table class="table table-bordered" id="base_data">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th scope="col">分组</th>
        <th scope="col">模块（数据库）</th>
        <th scope="col">负责人</th>
        <th scope="col">数据表</th>
        <th scope="col">操作</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="(list,index) in table">
        <th scope="row">{{index+1}}</th>
        <td>{{list.group_name}}</td>
        <td>{{list.model_name}}（zb_{{list.db_name}}）</td>
        <td>{{list.person_name}}</td>
        <td>{{list.table_title}}（tp_{{list.table_name}}）</td>
        <td>
            <button type="button" class="btn btn-sm btn-link" :onclick="'table.to_controller('+list.id+')'">控制器</button>
            <button type="button" class="btn btn-sm btn-link" :onclick="'table.to_validate('+list.id+')'">验证器</button>
            <button type="button" class="btn btn-sm btn-link" :onclick="'table.to_table_edit('+list.id+')'">修改</button>
            <button type="button" class="btn btn-sm btn-link" :onclick="'table.del('+list.id+')'">删除</button>
        </td>
    </tr>
    </tbody>
</table>



        </main>
    </div>


</div>


<script type="text/javascript">
    const table = new Vue({
        el: '#base_data',
        data: {
            table: []
        },
        created() {
            this.get_list();
        },
        methods: {
            get_list() {
                const that = this;
                $.ajax({
                    url:"<?php echo url('/generate/Api/get_base_data'); ?>",
                    type:"GET",
                    async:true,
                    success:function (res) {
                        if (res.status){
                            that.table = res.data;
                        }else{
                            that.table = [];
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
            del(id){
                if (confirm("是否要删除数据表？")){
                    const that = this;
                    $.ajax({
                        url:"<?php echo url('/generate/Api/del_table'); ?>",
                        type:"POST",
                        data:{
                            id:id
                        },
                        async:true,
                        success:function (res) {
                            if (res.status){
                                that.get_list();
                            }
                        }
                    })
                }
            },
            to_validate(id){
                window.sessionStorage.setItem("validate_table_id", id);
                window.location.href="<?php echo url('/generate/Index/validate_list'); ?>";
            },
            to_controller(id){
                window.sessionStorage.setItem("controller_table_id", id);
                window.location.href="<?php echo url('/generate/Index/controller_list'); ?>";
            },
            to_table_edit(id){
                window.sessionStorage.setItem("table_edit_id", id);
                window.location.href="<?php echo url('/generate/Index/table_edit'); ?>";
            }

        }
    });
    //分组
    const group = new Vue({
        el: '#group_table',
        data: {
            table: []
        },
        created() {
            this.get_list();
        },
        methods: {
            get_list() {
                const that = this;
                $.ajax({
                    url:"<?php echo url('/generate/Api/get_group_list'); ?>",
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
            add(event) {
                const that = this;
                event.preventDefault();
                $.ajax({
                    url:"<?php echo url('/generate/Api/add_group'); ?>",
                    type:"POST",
                    data:{
                        'name': $('#group_name').val()
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            $('#group_name').val("");
                            that.get_list();
                        }else{
                            console.log(res);
                        }
                    }
                });
            },
            del(id){
                const that = this;
                $.ajax({
                    url:"<?php echo url('/generate/Api/del_group'); ?>",
                    type:"POST",
                    data:{
                        'id': id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            that.get_list();
                        }else{
                            console.log(res);
                        }
                    }
                });
            }
        }
    })
    //负责人
    const person = new Vue({
        el: '#person_table',
        data: {
            table: []
        },
        created() {
            this.get_list();
        },
        methods: {
            get_list() {
                const that = this;
                $.ajax({
                    url:"<?php echo url('/generate/Api/get_person_list'); ?>",
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
            add(event) {
                const that = this;
                event.preventDefault();
                $.ajax({
                    url:"<?php echo url('/generate/Api/add_person'); ?>",
                    type:"POST",
                    data:$('#person_form').serializeArray(),
                    async:true,
                    success:function (res) {
                        if (res.status){
                            $('#person_form')[0].reset();
                            that.get_list();
                        }else{
                            console.log(res);
                        }
                    }
                });
            },
            del(id){
                const that = this;
                $.ajax({
                    url:"<?php echo url('/generate/Api/del_person'); ?>",
                    type:"POST",
                    data:{
                        'id': id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            that.get_list();
                        }else{
                            console.log(res);
                        }
                    }
                });
            }
        }
    })
    //模型
    const model = new Vue({
        el: '#model_table',
        data: {
            db_name:'',
            table: [],
            group: [],
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
        },
        methods: {
            load_base(){
                const that = this;
                this.get_list();
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
            },
            get_list() {
                const that = this;
                $.ajax({
                    url:"<?php echo url('/generate/Api/get_model_list'); ?>",
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
            add(event) {
                const that = this;
                event.preventDefault();
                $.ajax({
                    url:"<?php echo url('/generate/Api/add_model'); ?>",
                    type:"POST",
                    data:$('#model_form').serializeArray(),
                    async:true,
                    success:function (res) {
                        if (res.status){
                            $('#model_form')[0].reset();
                            that.get_list();
                        }else{
                            console.log(res);
                        }
                    }
                });
            },
            del(id){
                const that = this;
                $.ajax({
                    url:"<?php echo url('/generate/Api/del_model'); ?>",
                    type:"POST",
                    data:{
                        'id': id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            that.get_list();
                        }else{
                            console.log(res);
                        }
                    }
                });
            }
        }
    })


</script>

</body>
</html>