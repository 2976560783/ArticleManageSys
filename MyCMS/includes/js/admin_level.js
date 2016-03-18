function level_name_check(){
    var level_name_tag=document.getElementsByName('level_name');
    var name=level_name_tag[0].value;
    if (name.length<2 || name.length >10) {
        alert("等级名长度不符合要求!");
        window.event.returnValue = false;
    }
}
window.onload=function admin_main_level(){
    var title=document.getElementById('title').innerHTML;
    var ol=document.getElementsByTagName('ol');
    var a=ol[0].getElementsByTagName('a');
    for (var i = 0; i < a.length; i++) {
        a[i].className=null;
        if (a[i].innerHTML == title) {
            a[i].className='selected';
            a[i].href='#';
        }
    };
}