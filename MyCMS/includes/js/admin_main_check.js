function admin_main_check(){
 if (!confirm("确认要删除？")) {
    window.event.returnValue = false;
    }
}
window.onload=function admin_main_level(){
    var level=document.getElementById('level').value;
    var options=document.getElementsByTagName('option');
    for (var i = 0; i < options.length; i++) {
        if (options[i].value == level) {
            options[i].setAttribute('selected','selected');
        }
    }
}
