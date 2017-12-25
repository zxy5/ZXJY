@extends('backend.common.common')
@section('content')

    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>
        管理员模块管理 <span class="c-gray en">&gt;</span> 管理员列表
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
    </nav>
    <div class="page-container">
        <div class="cl pd-5 bg-1 bk-gray">
		 <span class="l"> <!--a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a-->
	<a class="btn btn-primary radius" href="javascript:;" onclick="manager_add('添加管理员','{{ url('System/Manager/Add') }}','800')">
	<i class="Hui-iconfont">&#xe600;</i> 添加管理员
	</a>
		</span>
        </div>


        <!-- 在h-ui框架中使用datatables插件显示数据 -->
        <table class="table table-border table-bordered table-hover table-bg list-data">
            <thead>
            <tr>
                <th scope="col" colspan="9">管理员列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" value="" name=""></th>
                <th width="40">ID</th>
                <th width="200">管理员账号</th>
                <th>角色</th>
                <th>性别</th>
                <th>Email</th>
                <th>电话号码</th>
                <th>创建时间</th>
                <th width="70">操作</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>



    </div>
@endsection

@section('footer-js')
    <!--请在下方写此页面业务相关的脚本-->
    <script src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script>

        // Datatables数据表格显示插件
        $('.list-data').DataTable({
            // 设置单页实现的数据量
            "lengthMenu": [ [5,10,15,-1],[5,10,15,'全部'] ], // -1表示全部
            // 是否开启分页功能
            "paging": true,
            // 是否显示分页辅助信息
            "info": false,
            // 是否开启搜索功能
            "searching": true,
            // 是否开启排序功能
            "ordering": true,
            // 设置默认排序的列
            "order": [[ 1, "asc" ]], // 默认以第二列正序来排列数据
            // 设置指定列开启排序
            "columnDefs": [{
                "targets": [0,-1], //0 表示第一列； -1 表示倒数第一列
                "orderable": false,
            }],
            // 是否保存排序的状态[就是页面关闭了以后，在打开还是否保持上一次的排序状态]
            "stateSave": true,
            // "serverSide": true, // 是否开启服务端的端口
            // ajax获取服务端的数据
            "ajax": {
                "url": "{{ url('System/Manager/ApiList') }}", // ajax的请求地址
                "type": "POST",
                // 在Laravel中发送post请求必须保证附带csrf的token值
                'headers': { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
            },
            // ajax发送请求到控制器以后，返回的数据需要显示，使用columns来实现
            // columns 的值是一个数组，数组中每一个json对象就是一列数据
            "columns": [
                // {'data':'字段名称',"defaultContent": "默认值",'className':'类名'},
                // 如果字段不存在，则显示默认值，如果没有默认值，则页面空白！
                {'data':'a',"defaultContent": "",'className':"text-c"},
                {'data':'id',"defaultContent": "",'className':"text-c"},
                {'data':'username',"defaultContent": "",'className':"text-c"},
                {'data':'role.role_name',"defaultContent": "",'className':"text-c"},
                {'data':'mg_sex',"defaultContent": "",'className':"text-c"},
                {'data':'mg_email',"defaultContent": "",'className':"text-c"},
                {'data':'mg_phone',"defaultContent": "",'className':"text-c"},
                {'data':'created_at',"defaultContent": "",'className':"text-c"},
                {'data':'b',"defaultContent": "",'className':"text-c"},
            ],
            // 对一些复杂的要求的字段列，在回调方法中解决
            "createdRow": function(row,data,index){
                // 左起第一列的单选框
                $(row).children().eq(0).html('<input type="checkbox" value="'+ data.mg_id +'" name="id">');
                $(row).children().eq(-1).html(`<a title="编辑" href="javascript:;" onclick="manager_edit('编辑管理员信息','{{url('/System/Manager/Edit')}}/`+ data.id +`' ,'`+ data.id +`')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
				<a title="删除" href="javascript:;" onclick="manager_del(this,`+data.id+`)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>`);
            },
        });
        /*学科-添加*/
        function manager_add(title,url,w,h){
            layer_show(title,url,w,h);
        }
        /*管理员-编辑*/
        function manager_edit(title,url,id,w,h){
            layer_show(title,url,w,h);
        }
        /*管理员删除*/
        function manager_del(obj,id){
            layer.confirm('您确认要删除该管理员吗？',function(index){
                $.ajax({
                    type: 'POST',
                    url: '{{ url('System/Manager/Remove') }}/'+id,
                    dataType: 'json',
                    data: {
                        _token:'{{ csrf_token() }}',
                    },
                    success: function(data){
                        if( data.status ){
                            $(obj).parents("tr").remove();
                            layer.msg(data.message,{icon:1,time:1000});
                        }else{
                            layer.msg(data.message,{icon:2,time:1000});
                        }
                    },
                    error:function(data) {

                        layer.msg('删除失败!'+id,{icon:1,time:1000});
                    },
                });
            });
        }
    </script>
@endsection