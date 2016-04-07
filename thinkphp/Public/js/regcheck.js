$(document).ready(function(){
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
    })
})