// const name = document.getElementById('name');
// const color = document.getElementById('color');
// const password = document.getElementById('password');
// const password2 = document.getElementById('password2');
//
// let data = {
//     'name':name,
//     'color':color,
//     'password':password,
//     'password2':password2
// }
//
// let jsonData = JSON.stringify(data);

$(document).ready(function(){

    $("#button").click(function () {
        const name = $("#name").val();
        const color = $("#color").val();
        const password = $("#password").val();
        const password2 = $("#password2").val();

        let data = {
            'name': name,
            'color': color,
            'password': password,
            'password2': password2
        };

        let dataJSON = JSON.stringify(data);

        //alert(dataJSON);

        $.ajax({
            url: '../Chat/registration.php',
            method: 'post',
            dataType: 'json',
            data:{data : dataJSON},
            success: function (data) {
                if (data['msg'] !== '') {
                    alert(data['msg']);
                } else {
                    window.location.href = 'auth.html';
                }

            }
        });
    });
});