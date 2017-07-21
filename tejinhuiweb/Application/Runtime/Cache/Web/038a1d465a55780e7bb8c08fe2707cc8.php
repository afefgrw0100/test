<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
<!-- 引入相关的js文件，相对路径  -->
<script src="<?php echo tempurl('/static/js/jquery-1.11.1.js');?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo tempurl('/static/js/ajaxfileupload.js');?>"></script>
<!-- 执行上传文件操作的函数 -->
<script type="text/javascript">
    function ajaxFileUpload(){
        $.ajaxFileUpload(
                {
                    url:"<?php echo U('Portal/Upload/load');?>",            //需要链接到服务器地址
                    secureuri:false,
                    fileElementId:'houseMaps',                        //文件选择框的id属性
                    dataType: 'json',                                     //服务器返回的格式，可以是json
                    success: function (data, status)            //相当于java中try语句块的用法
                    {
                        $('#result').html('添加成功');
                    },
                    error: function (data, status, e)            //相当于java中catch语句块的用法
                    {
                        $('#result').html('添加失败');
                    }
                }

        );

    }
</script>
</head>
<body>
<form method="post" action="update.do?method=uploader" enctype="multipart/form-data">
    <input type="file" id="houseMaps" name="houseMaps"/>
    <input type="button" value="提交" onclick="ajaxFileUpload()"/>
</form>
<div id="result"></div>

</body>
</html>