$(document).ready(function(){

    var flag = true;
    //检测用户名是否存在
    $('#userName').blur(function(){
        if ($(this).val().length != 0) {
            $.post('ajaxUserName',{userName:$(this).val()},function (data,status) {
                 if (status == 'success') {
                    if (data == '1') {
                        $('#warname').removeAttr('hidden');
                        flag = false;
                    }else{
                        $('#warname').attr('hidden', '');
                        flag = true;
                    }
                 }
                
            })
        }
    });

    $('.submit').click(function(){
        var userName = $('#userName').val();
        if (userName.length <2 || userName.length >20) {
            alert('用户名至少两位!');
            return false;
        }
        var password = $('#password').val();
        if (password.length < 6) {
            alert('密码至少六位!');
            return false;
        }
        var rpassword = $('#rpassword').val();
        if (password != rpassword) {
            alert('两次输入密码不一致');
            return false;
        }
        return flag;
    })
})