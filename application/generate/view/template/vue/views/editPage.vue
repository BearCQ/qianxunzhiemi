<template>
    <div style="display: inline-block;">
        <el-button type="primary" @click="dialogTableVisible = true">编辑</el-button>
        <el-dialog v-el-drag-dialog title="编辑" :visible.sync="dialogTableVisible" @close='close'>
          <el-form  ref="row_data" label-position="left" label-width="70px" style='width: 400px; margin-left:50px;'>
            {foreach $table_comment as $key=>$comment }
            <el-form-item :label="'{$comment[\'COLUMN_COMMENT\']}'" prop="{$key}">
              <el-input placeholder="{$comment['COLUMN_COMMENT']}" v-model="row_data.{$key}"></el-input>
            </el-form-item>
            {/foreach}
            <el-form-item>
              <el-button type="primary" @click="submitForm()">编辑</el-button>
              <el-button @click="close()">取消</el-button>
            </el-form-item>
          </el-form>
        </el-dialog>
    </div>
</template>

<script>
  import elDragDialog from '@/directive/el-dragDialog' // base on element-ui
  import store from '@/store'
  import { edit } from '@/api/{$module_name}/{:parse_name($table_name)}'

  export default {
    name: 'dragDialog-demo',
    directives: { elDragDialog },
    props: ['row_data'],
    data() {
      return {
        dialogTableVisible: false
      }
    },
    created: function() {
      console.log(this.row_data)
    },
    methods: {
      submitForm() {
        edit(store.getters.token, this.row_data).then(res => {
          this.close()
        })
      },
      close() {
        this.$emit('getLists')
        this.dialogTableVisible = false
      }
    }
  }
</script>
