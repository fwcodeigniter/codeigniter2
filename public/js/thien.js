function file_change(f, id) {
    var reader = new FileReader();
    reader.onload = function (e) {
        // var img = document.getElementById(id);
        id.src = e.target.result;
        id.style.display = "inline";
    };
    reader.readAsDataURL(f.files[0]);
}
function notify_success() {
    var txt = document.getElementById('success').innerHTML;
    // alert(txt);
    if (txt) {

        $.notify(txt, "success");
    }
    var txt = document.getElementById('fail').innerHTML;
    // alert(txt);
    if (txt) {
        $.notify(txt, "error");
    }
}
function showPass() {
    $('input[name="txtPass"]').attr('type', 'text');
}
function hidePass() {
    $('input[name="txtPass"]').attr('type', 'password');
}
//Phân cách phần ngàn
function format_curency(a) {
  	a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
}
$(document).ready(notify_success);