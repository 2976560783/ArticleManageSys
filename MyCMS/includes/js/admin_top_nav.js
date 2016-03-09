
function admin_top_nav(j){
    for (var i = 1; i < 5; i++) {
        document.getElementById('nav'+i).style.backgroundColor="#3E7DBA";
        document.getElementById('nav'+i).style.color="white";
         }
    document.getElementById('nav'+j).style.backgroundColor="white";
    document.getElementById('nav'+j).style.color="black";
}