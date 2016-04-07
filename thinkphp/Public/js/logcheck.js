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
        var code = $('#code').val();
        if (code.length != 4) {
            alert('验证必须为四位!');
            return false;
        }
    });
    $('.code').click(function () {
         this.src =  'captche/'+Math.random();
    })
})