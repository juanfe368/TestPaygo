
var objForm = new Object();
var objtRespuest = new Object();

function validateForm(){
    objForm.txtNombre = document.getElementById("txtNombre");
    objForm.txtApellido = document.getElementById("txtApellido");
    objtRespuest.respuest = false;
    if(objForm.txtNombre.value==""){
        alert("Complete el nombre por favor");
        respuestForm()
    }
    else if(objForm.txtApellido==""){
        alert("Complete el apellido");
        respuestForm()
    }
    else if(objForm.txtNombre.value!=""&&objForm.txtApellido!=""){
        document.getElementById("hidVal").value = 1;
        objtRespuest.respuest = true;
        respuestForm()
    }
}

function respuestForm(){
    return objtRespuest.respuest;
}


