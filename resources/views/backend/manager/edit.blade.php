@extends('backend.common.common')
@section('content')
    <article class="page-container">
        <form class="form form-horizontal" id="form-admin-add"
              action="{{ url('System/Manager/Save') }}/{{$id}}" method="post">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{--把Id和name属性去掉，免得会提交--}}
                    <input type="text" class="input-text" placeholder="" readonly="readonly"
                           value="{{$manager->username}}" style="background: #ccc;border:1px solid #ccc;color:#ebebeb">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        @if($manager->mg_sex=='男')
                        <input name="mg_sex" type="radio" id="sex-1" value="男" checked>
                        @else
                        <input name="mg_sex" type="radio" id="sex-1" value="男">
                        @endif
                        <label for="sex-1">男</label>
                    </div>
                    <div class="radio-box">
                        @if($manager->mg_sex=='女')
                        <input type="radio" id="sex-2" value="女" name="mg_sex" checked>
                        @else
                            <input type="radio" id="sex-2" value="女" name="mg_sex" >
                        @endif
                        <label for="sex-2">女</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$manager->mg_phone or ''}}" placeholder="" id="mg_phone" name="mg_phone">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" placeholder="@" name="mg_email" id="mg_email" value="{{$manager->mg_email or ''}}">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">角色：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="mg_role_ids" size="1">
				<option value="1">超级管理员</option>
				<option value="2">php学科老师</option>
				<option value="3">java学科老师</option>
				<option value="4">全栈学科老师</option>
			</select>
			</span> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">备注：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea name="mg_remark" cols="" rows="" class="textarea"
                              placeholder="说点什么...100个字符以内" dragonfly="true"
                              onKeyUp="$.Huitextarealength(this,100)">{{$manager->mg_remark or ''}}</textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </article>
@endsection


@section('footer-js')
    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
    <script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
    <script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.skin-minimal input').iCheck({
                checkboxClass: 'icheckbox-blue',
                radioClass: 'iradio-blue',
                increaseArea: '20%'
            });

            $("#form-admin-add").validate({
                rules:{
                    /*
                    adminName:{
                        required:true,
                        minlength:4,
                        maxlength:16
                    },
                    password:{
                        required:true,
                    },
                    password2:{
                        required:true,
                        equalTo: "#password"
                    },
                    sex:{
                        required:true,
                    },
                    phone:{
                        required:true,
                        isPhone:true,
                    },
                    email:{
                        required:true,
                        email:true,
                    },
                    adminRole:{
                        required:true,
                    },*/
                },
                onkeyup:false,
                focusCleanup:true,
                success:"valid",
                submitHandler:function(form){
                    $(form).ajaxSubmit(function(msg){
                        if( msg.status ){
                            // 关闭当前layer弹窗
                            layer.msg(msg.message,{icon:6,time:2000},function(){
                                parent.location.reload(); // 父级页面刷新
                            });
                        }else{
                            // 提示错误
                            layer.alert(msg.message,{icon:5,time:3000});
                        }
                    });

                }
            });
        });
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
@endsection