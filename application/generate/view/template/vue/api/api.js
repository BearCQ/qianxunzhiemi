import request from '@/utils/request'

export function add(token, data) {
  return request({
    url: '{$module_name}/{:parse_name($table_name)}/add',
    method: 'post',
    params: { token },
    data
  })
}
export function edit(token, data) {
  return request({
    url: '{$module_name}/{:parse_name($table_name)}/edit',
    method: 'post',
    params: { token },
    data
  })
}
export function del(token, data) {
  return request({
    url: '{$module_name}/{:parse_name($table_name)}/delete',
    method: 'post',
    params: { token },
    data
  })
}
export function info(token, data) {
  return request({
    url: '{$module_name}/{:parse_name($table_name)}/info',
    method: 'post',
    params: { token },
    data
  })
}
export function getList(token, data) {
  return request({
    url: '{$module_name}/{:parse_name($table_name)}/get_list',
    method: 'post',
    params: { token },
    data
  })
}
