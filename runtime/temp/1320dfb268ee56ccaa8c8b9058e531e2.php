<?php /*a:3:{s:82:"F:\aProjectDevelopment\qianxun\application\generate\view\view\controller_list.html";i:1554892859;s:71:"F:\aProjectDevelopment\qianxun\application\generate\view\view\base.html";i:1554892859;s:71:"F:\aProjectDevelopment\qianxun\application\generate\view\view\head.html";i:1554892859;}*/ ?>
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

<div id="controller">
<h1 class="bd-title" id="content">控制器</h1>
<hr>
<div class="mb-3">
    <a class="btn btn-primary" href="<?php echo url('/generate/Index/add_controller'); ?>">添加接口</a>
    <button v-if="function_list.length==0"  type="button" class="btn btn-primary ml-2" onclick="controller.auto_create_function()">一键添加</button>
    <button v-if="function_list.length!==0" type="button" class="btn btn-primary ml-2 disabled">一键添加</button>
    <button type="button" class="btn btn-danger ml-2" onclick="controller.build()">生成代码</button>
</div>
<table class="table table-bordered">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th scope="col">方法</th>
        <th scope="col">请求方法</th>
        <th scope="col">负责人</th>
        <th scope="col">名称</th>
        <th scope="col">备注</th>
        <th scope="col">操作</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="(list,index) in function_list">
        <th scope="row">{{list.id}}</th>
        <td>{{list.function_name}}</td>
        <td>{{list.method_type}}</td>
        <td>{{list.person_name}}</td>
        <td>{{list.function_title}}</td>
        <td>{{list.function_desc}}</td>
        <td>
            <button type="button" class="btn btn-sm btn-link":onclick="'controller.edit('+list.id+')'">修改</button>
            <button type="button" class="btn btn-sm btn-link" :onclick="'controller.del('+list.id+')'">删除</button>
        </td>
    </tr>
    <tr v-if="function_list.length==0">
        <td colspan="7">无数据</td>
    </tr>
    </tbody>
</table>
</div>



        </main>
    </div>


</div>


<script type="text/javascript">
    const controller = new Vue({
        el: '#controller',
        data: {
            table_id:0,
            base_data: [],
            function_list: [],
        },
        created() {
            this.get_list();
        },
        methods: {
            get_list() {
                const that = this;
                if(window.sessionStorage.getItem("controller_table_id") === null){
                    window.location.href="<?php echo url('/generate'); ?>";
                }
                that.table_id = window.sessionStorage.getItem("controller_table_id");

                $.ajax({
                    url:"<?php echo url('/generate/Api/get_validate_base'); ?>",
                    type:"POST",
                    data:{
                        id:that.table_id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            Vue.set(that,'base_data',res.data);
                        }else{
                            that.base = [];
                        }
                    }
                });
                $.ajax({
                    url:"<?php echo url('/generate/Api/get_function_list'); ?>",
                    type:"POST",
                    data:{
                        table_id:that.table_id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            Vue.set(that,'function_list',res.data);
                        }else{
                            that.function_list = [];
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
                const that = this;
                $.ajax({
                    url:"<?php echo url('/generate/Api/del_function'); ?>",
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
            },
            edit(id){
                window.sessionStorage.setItem("function_id", id);
                window.location.href="<?php echo url('/generate/Index/edit_function'); ?>";
            },
            to_validate(id){
                window.sessionStorage.setItem("validate_table_id", id);
                window.location.href="<?php echo url('/generate/Index/validate_list'); ?>";
            },
            build(){
                const that = this;
                $.ajax({
                    url:"<?php echo url('/generate/Create/build'); ?>",
                    type:"POST",
                    data:{
                        table_id:that.table_id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            alert("创建成功！");
                        }
                    }
                })
            },
            auto_create_function(){
                const that = this;
                $.ajax({
                    url:"<?php echo url('/generate/Index/auto_create_function'); ?>",
                    type:"POST",
                    data:{
                        table_id:that.table_id
                    },
                    async:true,
                    success:function (res) {
                        if (res.status){
                            that.get_list();
                            alert("添加成功！");
                        }else{
                            alert("添加失败！");
                        }
                    }
                })
            }

        }
    });


</script>

</body>
</html>