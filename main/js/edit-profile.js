$(function () {
    $.get('management/getspecificuser.php',function (data) {
        var info = JSON.parse(data);
        if(typeof info.data.profile_pic == 'undefined') {
            $("#avatar").attr("src", "../images/avatar.png");
        }else{
            $("#avatar").attr("src", info.data.profile_pic);
        }
        $('#emailtext').html(info.data.email);
        $('#phonetext').html(info.data.phone);
        $('#addresstext').html(info.data.address);
        $('#username').html(info.data.name);
        $("#inputName").val(info.data.name);
        $("#inputEmail").val(info.data.email);
        $("#inputAddress").val(info.data.address);
        $("#inputPhone").val(info.data.phone);
    });
    $("#inputName").keyup(function (){
        $('#username').html($("#inputName").val());
    });
    $("#inputEmail").keyup(function (){
        $('#emailtext').html($("#inputEmail").val());
    });
    $("#inputAddress").keyup(function (){
        $('#addresstext').html($("#inputAddress").val());
    });
    $("#inputPhone").keyup(function (){
        $('#phonetext').html($("#inputPhone").val());
    });
    $("#submit").click(function (e){
        e.preventDefault();
        $.ajax({
            url:'management/userinfoupdate.php',
            type:'POST',
            data:{
                'name':$("#inputName").val(),
                'email':$("#inputEmail").val(),
                'address':$("#inputAddress").val(),
                'phone':$("#inputPhone").val(),
                'password':$("#inputPassword").val()
            },

        }).done(function (msg) {
            location.reload();
        });
    });
    //console.log(data);
});