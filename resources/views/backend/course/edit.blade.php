@extends('backend.common.common')
@section('content')
    <article class="page-container">
        <form class="form form-horizontal" id="form-admin-add" action="{{ url('System/Course/Save') }}/{{$course->id}}" method="post">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$course->course_name}}" placeholder="" id="course_name" name="course_name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">所属专业：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
		<select class="select" name="profession_id" size="1">
			<option value="1" {{$course->profession_id=='1'?"selected='selected'":""}}>PHP入门班</option>
			<option value="2" {{$course->profession_id=='2'?"selected='selected'":""}}>PHP进阶班</option>
			<option value="3" {{$course->profession_id=='3'?"selected='selected'":""}}>PHP高级班</option>
			<option value="4" {{$course->profession_id=='4'?"selected='selected'":""}}>PHP就业班</option>
		</select>
		</span> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>授课老师：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$course->teacher_id}}" placeholder="" id="teacher_id" name="teacher_id">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">课程简介：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea name="course_desc" cols="" rows="" class="textarea"  placeholder="专业详情介绍" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)">{{$course->course_desc}}</textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>价格：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$course->price}}" placeholder="" id="price" name="price">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>优惠价：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$course->sale_price}}" placeholder="" id="sale_price" name="sale_price">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程时长（单位：小时）：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$course->duration}}" placeholder="" id="duration" name="duration">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程封面：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="hidden" name="cover" value="{{$course->cover}}">
                    {{--图片预览图	--}}
                    <div id="webuploader-img" style="margin-bottom:1px">
                        <img src="/uploads/{{$course->cover?$course->cover:'../home/uploader.jpg'}}" style="width:150px;height:150px;" alt="">
                    </div>
                    {{--进度条--}}
                    <div id="processing">
                        <div class="progress" style="width:400px;margin-bottom: 5px">
			<span class="progress-bar">
				<span class="sr-only" style="width:0%"></span>
			</span>
                        </div>
                        <span id="progressed">上传完成0%</span>
                    </div>
                    {{--选择图片按钮	--}}
                    <div id="webuploader-btn">选择文件</div>
                    <div class="btn btn-primary radius" id="webuploader-start">上传文件</div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>有效时间（单位：天）：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$course->duration}}" placeholder="" id="expire_at" name="expire_at">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>点击量：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$course->click}}" placeholder="" id="click" name="click">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>学习人数：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$course->number}}" placeholder="" id="number" name="number">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>排序：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$course->sort}}" placeholder="" id="sort" name="sort">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">课程详情：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea name="content" cols="" rows="" class="textarea"  placeholder="专业详情介绍" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)">{{$course->content}}</textarea>
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
    <script src="/admin/lib/webuploader/0.1.5/webuploader.js"></script>
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
            // webuploader上传文件插件的配置代码
            var uploader = WebUploader.create({
                // 开启自动上传
                auto:false,
                // 点击哪个按钮上传
                pick: "#webuploader-btn",
                // 上传文件的处理地址
                server:"{{url('System/Uploader/Upload')}}",
                // 附带的表单信息
                formData:{
                    '_token':'{{csrf_token()}}',
                },
                // 上传文件的name值
                fileVal:'uploader',
                // 是否开启压缩上传
                resize:false,
                // 限制上传文件的格式
                accept:{
                    extensions:'gif,jpg,jpeg,png'
                }
            });
            var preview = $('#webuploader-img');
            uploader.on('fileQueued',function (file) {
                uploader.makeThumb(file,function (error, src) {
                    preview.empty();
                    if(error){
                        layer.alert("无法生成预览图片",{icon:5,time:3000});
                        return false;
                    }
                    preview.html("<img src='" + src +"'/>");
                },150,150)
            });
            // 点击上传按钮的时候，触发上传
            $('#webuploader-start').on('click',function () {
                uploader.upload();
            });
            // 上传未完成，整个上传的进度都会被uploadProgress监听
            uploader.on('uploadProgress',function (file, percentage) {
                $('#processing .sr-only').css('width',percentage*100+'%');
                $('#progressed').html('上传完成'+percentage*100+'%');
            });
            // 接收文件上传处理结果
            uploader.on('uploadSuccess',function (file, msg) {
                if(msg.status){
                    layer.msg('上传文件成功',{icon:6,time:1500});
                    $('input[name=cover]').val(msg.file);
                }else{
                    layer.msg('上传文件失败',{icon:5,time:1500});
                    uploader.reset();
                    $('#processing .sr-only').css('width','0%');
                    $('#progressed').html('上传完成：0%');
                    preview.empty();
                }
            });
            $("#form-admin-add").validate({
                rules:{},
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