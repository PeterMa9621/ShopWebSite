function operate(self, operateType) {
    var uid = $(self).parents("tr").find("#uid").text();

    var form = document.createElement("form");
    form.setAttribute("method", "post");
    if(operateType=="delete"){
        form.setAttribute("action", "../users/delete");
    } else {
        form.setAttribute("action", "../users/detail");
    }

    var uidInput = document.createElement("input");
    uidInput.setAttribute("name", "uid");
    uidInput.setAttribute("type", "hidden");
    uidInput.value = uid;
    form.appendChild(uidInput);

    var submitType = document.createElement("input");
    submitType.setAttribute("name", "submitType");
    submitType.setAttribute("type", "hidden");
    submitType.value = operateType;
    form.appendChild(submitType);
    /*
    var submitButton = document.createElement("input");
    submitButton.setAttribute("name", operateType);
    submitButton.setAttribute("type", "submit");
    form.appendChild(submitButton);
     */

    document.body.appendChild(form);
    form.submit();
}

function modify() {
    $.ajax({
        type: "POST",
        url: "../../index.php/users/modify",
        data: 'uid=' + $('#uid').val() + '&psw=' + $('#psw').val() + '&email=' + $('#email').val(),

        success:function (result) {
            //alert(result);
            document.getElementById("message").innerHTML = result;
            //$('#msg').innerHTML = result;
        },
        error: function () {
            document.getElementById("message").innerHTML = "Something wrong";
        }
    });
}