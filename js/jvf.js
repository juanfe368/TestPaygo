
var objForm = new Object();
var objtRespuest = new Object();

function validateForm(){
    objForm.inputFile = document.getElementById("inputFile");
    objForm.inputNumReg = document.getElementById("inputNumberRegistros");
    objForm.inputRadOrdernAsc = document.getElementById("inputRadOrdernAsc");
    objForm.inputRadOrdernDsc = document.getElementById("inputRadOrdernDsc");
    objtRespuest.respuest = false;
    
    if(objForm.inputFile.value==""){
        alert("Escoja el archivo CSV");
        respuestForm();
    }
    else if(objForm.inputNumReg.value==""){
        alert("No se ha escogido la cantidad de registros a mostrar");
        respuestForm();
    }
    else if(!objForm.inputRadOrdernAsc.checked&&!objForm.inputRadOrdernDsc.checked){
        alert("No se ha escogido el orden de los registros");
        respuestForm();
    }
    else if(objForm.inputFile.value!=""&&objForm.inputNumReg.value!=""){
        document.getElementById("hidVal").value = 1;
        objtRespuest.respuest = true;
        respuestForm();
    }
}

function respuestForm(){
    return objtRespuest.respuest;
}

function control(f){
    var ext=['csv'];
    var v=f.value.split('.').pop().toLowerCase();
    for(var i=0,n;n=ext[i];i++){
        if(n.toLowerCase()==v)
            return
    }
    var t=f.cloneNode(true);
    t.value='';
    f.parentNode.replaceChild(t,f);
    alert('extensión no válida');
}


