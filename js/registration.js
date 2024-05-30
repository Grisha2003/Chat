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

        

        $.ajax({
            url: '../Chat/registration.php',
            method: 'post',
            dataType: 'json',
            data:{data : dataJSON},
            success: function (data) {
                if (data['result'] == 1) {
                    window.location.href = 'auth.html';
                } else {
                    alert(data['result']);
                }

            }
        });
    });
});