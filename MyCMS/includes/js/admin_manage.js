function admin_main_check(){
 if (!confirm("确认要删除？")) {
    window.event.returnValue = false;
    }
}
window.onload=function admin_main_level(){
    var level=document.getElementById('level');
    var options=document.getElementsByTagName('option');
    if (level) {
        for (var i = 0; i < options.length; i++) {
            if (options[i].value == level.value) {
                options[i].setAttribute('selected','selected');
            }
        }
    }
    var title=document.getElementById('title').innerHTML;
    var ol=document.getElementsByTagName('ol');
    var a=ol[0].getElementsByTagName('a');
    for (var i = 0; i < a.length; i++) {
        a[i].className=null;
        if (a[i].innerHTML == title) {
            a[i].className='selected';
        }
    };
}
