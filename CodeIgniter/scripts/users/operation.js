function operate(uid, path) {
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", path);
    var uidInput = document.createElement("input");
    uidInput.setAttribute("name", uid);
    form.appendChild(uidInput);

    document.body.appendChild(form);
    form.submit();
}