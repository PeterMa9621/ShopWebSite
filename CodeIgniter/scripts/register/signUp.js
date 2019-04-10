function signUp() {
    let name = document.getElementById("name").value;
    let psw = document.getElementById("psw").value;
    if(document.getElementById("name_result").innerHTML!==""){
        alert("Your user name has existed!");
        return;
    }
    if(psw.length<6){
        alert("Your password is too short!");
        return;
    }

    let form = document.getElementById("form");
    form.submit();
}