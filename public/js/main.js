$(function () {
    //Show current nav
    /*
    var url = window.location.href.substring(window.location.href.indexOf('/')+2);
    alert(url);
    var nav = url.substring(url.indexOf('/')+1);
    nav = nav.split('/')[0];
    if (nav == "loaihoso" || nav.indexOf("ncc") >= 0) {
        $("#navncc").addClass('active');
        $("#navncc ul").addClass('in');
    }
    if (nav.indexOf("thannhan") >= 0) {
        $("#navthannhan").addClass('active');
        $("#navthannhan ul").addClass('in');
    }
    if (nav == "trocap" || nav == "phucap") {
        $("#navtrocap").addClass('active');
        $("#navtrocap ul").addClass('in');
    }
    if (nav.indexOf("user") >= 0) {
        $("#navtaikhoan").addClass('active');
        $("#navtaikhoan ul").addClass('in');
    }
    if (nav.indexOf("district") >= 0) {
        $("#navhuyen").addClass('active');
        $("#navhuyen ul").addClass('in');
    }
    if (nav.indexOf("town") >= 0) {
        $("#navxa").addClass('active');
        $("#navxa ul").addClass('in');
    }
    if (nav.indexOf("dieuduong") >= 0) {
        $("#navdieuduong").addClass('active');
        $("#navdieuduong ul").addClass('in');
    }
    if (nav.indexOf("phuongtien") >= 0) {
        $("#navphuongtien").addClass('active');
        $("#navphuongtien ul").addClass('in');
    }
     */

    //còn pải tính toán
    var url = window.location.href.substring(window.location.href.indexOf('/')+2);
    var nav = url.substring(url.indexOf('/')+1);
    nav = nav.split('/')[0];
    if(nav !='') {
        var element = $('ul.sub-menu a').filter(function () {
            return this.href.indexOf('/' + nav) > 1
        }).parent().addClass('active').parent().parent().addClass('active').addClass('open');
        if (element.is('li')) {
            element.parent().parent().addClass('active').addClass('open');
        }
    }
});



