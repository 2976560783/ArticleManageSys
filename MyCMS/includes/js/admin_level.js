function level_name_check(){
    var level_name_tag=document.getElementsByName('level_name');
    var name=level_name_tag[0].value;
    if (name.length<2 || name.length >10) {
        alert("等级名长度不符合要求!");
        window.event.returnValue = false;
    }
}