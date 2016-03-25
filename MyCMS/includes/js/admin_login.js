function info_check(){
    var admin_name=document.getElementsByName('admin_name')[0].value;
    if (admin_name.length<2 || name.length >10) {
        alert("用户名为2至10位!");
        window.event.returnValue = false;
    }else{
        var admin_pass=document.getElementsByName('admin_pass')[0].value;
        if (admin_pass.length<6) {
            alert("密码至少6位");
            window.event.returnValue = false;
        }else{
            var code=document.getElementsByName('code')[0].value;
            if (code.length != 4) {
                alert("验证码必须为4位");
                window.event.returnValue = false;
            }
        }
    }

}