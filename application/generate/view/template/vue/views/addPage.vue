<template>
  <div>
    <el-button type="primary" @click="dialogTableVisible = true">添加</el-button>
    <el-dialog v-el-drag-dialog title="添加" :visible.sync="dialogTableVisible">
      <el-form  ref="row_data" label-position="left" label-width="70px" style='width: 400px; margin-left:50px;'>
        {foreach $table_comment as $key=>$comment }
        <el-form-item label="{$comment[\'COLUMN_COMMENT\']}'" prop="{$key}">
          <el-input placeholder="{$comment['COLUMN_COMMENT']}" v-model="row_data.{$key}"></el-input>
        </el-form-item>
        {/foreach}
        <el-form-item>
          <el-button type="primary" @click="submitForm()">添加</el-button>
          <el-button @click="close()">取消</el-button>
        </el-form-item>
      </el-form>
    </el-dialog>
  </div>
</template>

<script>
  import elDragDialog from '@/directive/el-dragDialog' // base on element-ui
  import { add } from '@/api/{$module_name}/{:parse_name($table_name)}'
  import store from '@/store'
  export default {
    name: 'dragDialog-demo',
    directives: { elDragDialog },
    data() {
      return {
        dialogTableVisible: false,
        row_data: {
        }
      }
    },
    methods: {
      submitForm() {
        add(store.getters.token, this.row_data).then(res => {
          this.$emit('getLists')
          this.close()
        })
      },
      close() {
        this.dialogTableVisible = false
      }
    }
  }
</script>
