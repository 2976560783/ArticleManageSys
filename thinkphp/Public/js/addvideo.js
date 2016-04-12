 $(document).ready(function(){
            // $('.form-control').popover('show'); //右弹窗
            
            //视频分类下拉框
            var videoflobj = $('#videofl').children();
            var videofl = videoflobj.children('a');
            for (var i = 0; i < videofl.length; i++) {
                $(videofl[i]).bind('click',function() {
                    $('#ivideofl').val(this.innerHTML);
                });
            }

            //内容分类下拉框
            var contentflobj = $('#contentfl').children();
            var contentfl = contentflobj.children('a');
            for (var i = 0; i < contentfl.length; i++) {
                $(contentfl[i]).bind('click',function() {
                    $('#icontentfl').val(this.innerHTML);
                });
            }

            //地区选择下拉框
            var areaflobj = $('#areafl').children();
            var areafl = areaflobj.children('a');
            for (var i = 0; i < areafl.length; i++) {
                $(areafl[i]).bind('click',function() {
                    $('#iareafl').val(this.innerHTML);
                });
            }

            //语言选择下拉框
            var languageflobj = $('#languagefl').children();
            var languagefl = languageflobj.children('a');
            for (var i = 0; i < languagefl.length; i++) {
                $(languagefl[i]).bind('click',function() {
                    $('#ilanguagefl').val(this.innerHTML);
                });
            }

            //检查每个下拉框输入不为空
            $('.submit').click(function() {
                if ($('#ivideofl').val() == '') {
                    $('#ivideofl').popover('show');
                    return false;
                }else{
                    $('#ivideofl').popover('hide');
                }
                if ($('#icontentfl').val() == '') {
                    $('#icontentfl').popover('show');
                    return false;
                }else{
                    $('#icontentfl').popover('hide');
                }
                if ($('#iareafl').val() == '') {
                    $('#iareafl').popover('show');
                    return false;
                }else{
                    $('#iareafl').popover('hide');
                }
                if ($('#ilanguagefl').val() == '') {
                    $('#ilanguagefl').popover('show');
                    return false;
                }else{
                    $('#ilanguagefl').popover('hide');
                }
            });
         }
        )
       