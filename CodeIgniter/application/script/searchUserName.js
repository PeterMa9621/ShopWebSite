var xmlHttp;

function searchName(name) {
    if(name.length<=0){
        document.getElementById("name_result").innerHTML = "A";
        return;
    }

    xmlHttp = getXmlHttpObject();
    if(xmlHttp==null){
        alert("Your browser does not support HTTP Request");
        return;
    }

    var url = "register.php";
    url += "?name=" + name;
    url += "&sid=" + Math.random();
    xmlHttp.onreadystatechange = onStateChange;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function onStateChange() {
    if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
        document.getElementById("name_result").innerHTML = xmlHttp.responseText;
    }
}

function getXmlHttpObject()
{
    var xmlHttp=null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}