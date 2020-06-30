<template>
  <div class="app-container">
    <div class="filter-container">
      {foreach $table_comment as $key=>$comment }
      <el-input @keyup.enter.native="handleFilter" style="width: 200px;" class="filter-item" v-if="formThead.{$key}" placeholder="{$comment['COLUMN_COMMENT']}" v-model="listQuery.{$key}"></el-input>
      {/foreach}
      <el-button class="filter-item" type="primary" v-waves icon="el-icon-search" @click="handleFilter">搜索</el-button>
      <addPage @getLists="getLists"></addPage>
    </div>

    <div class="filter-container">
      {foreach $table_comment as $keys=>$result}
      <el-checkbox  v-model="formThead.{$keys}" label="{$result['COLUMN_COMMENT']}">{$result['COLUMN_COMMENT']}</el-checkbox>
      {/foreach}
    </div>

    <el-table :key='tableKey' :data="list" v-loading="listLoading" border fit highlight-current-row style="width: 100%;">
      {foreach $table_comment as $key=>$comment }
      <el-table-column align="center" v-if="formThead.{$key}" label="{$comment['COLUMN_COMMENT']}">
        <template slot-scope="scope">
          <span>{{scope.row.{$key}}}</span>
        </template>
      </el-table-column>
      {/foreach}

      <el-table-column align="center" label="操作" class-name="small-padding fixed-width">
        <template slot-scope="scope">
          <editPage v-bind:row_data="scope.row" @getLists="getLists"></editPage>
          <el-button  @click="del(scope.row.id)">删除</el-button>
        </template>
      </el-table-column>
    </el-table>

    <div class="pagination-container">
      <el-pagination background @size-change="handleSizeChange" @current-change="handleCurrentChange" :current-page="listQuery.page" :page-sizes="[10,20,30, 50]" :page-size="listQuery.limit" layout="total, sizes, prev, pager, next, jumper" :total="total">
      </el-pagination>
    </div>
  </div>
</template>

<script>
  import { getList, del } from '@/api/{$module_name}/{:parse_name($table_name)}'
  import store from '@/store'
  import waves from '@/directive/waves' // 水波纹指令
  import addPage from './addPage'
  import editPage from './editPage'
  export default {
    name: 'complexTable',
    directives: {
      waves
    },
    components: { addPage, editPage },
    data() {
      return {
        tableKey: 0,
        list: null,
        total: null,
        listLoading: true,
        listQuery: {
        {foreach $table_comment as $key=>$comment }
          {$key}: undefined,
        {/foreach}
         page: 1,
         limit: 20
        },
        formThead: {
        {foreach $table_comment as $key=>$comment }
        {php}
        static $count = 0;
         $len = count($table_comment);
        {/php}
        {if ($count < 9) }
        {$key}: true,
         {elseif ($count == $len-1) /}
          {$key}: false
        {else /}
        {$key}: false,
        {/if}
         {php}$count++;{/php}
         {/foreach}
        }
      }
    },
    created() {
      this.getLists()
    },
    methods: {
      getLists() {
        this.listLoading = true
        getList(store.getters.token, this.listQuery).then(response => {
          this.list = response.data.list.data
          this.total = response.data.list.total
          this.listLoading = false
        })
      },
      handleFilter() {
        this.listQuery.page = 1
        this.getLists()
      },
      handleSizeChange(val) {
        this.listQuery.limit = val
        this.getLists()
      },
      handleCurrentChange(val) {
        this.listQuery.page = val
        this.getLists()
      },
      del(id) {
            this.$confirm('此操作将会删除该记录,是否继续', '提示', {
                confirmButtonText: '是',
                cancelButtonText: '否',
                type: 'warning'
            }).then(() => {
                del(store.getters.token, { id: id }).then(res => {
                this.$message({
                type: 'success',
                message: '删除成功!'
            })
            this.getLists()
        })
        }).catch(() => {
                this.$message({
                type: 'info',
                message: '删除失败!'
            })
        })
      }
    }
  }
</script>
