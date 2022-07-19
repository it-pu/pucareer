function numbersonly(ini, e){
  if (e.keyCode>=49){
  if(e.keyCode<=57){
  a = ini.value.toString().replace(".","");
  b = a.replace(/[^\d]/g,"");
  b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
  ini.value = tandaPemisahTitik(b);
  return false;
  }
  else if(e.keyCode<=105){
  if(e.keyCode>=96){
  //e.keycode = e.keycode - 47;
  a = ini.value.toString().replace(".","");
  b = a.replace(/[^\d]/g,"");
  b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
  ini.value = tandaPemisahTitik(b);
  //alert(e.keycode);
  return false;
  }
  else {return false;}
  }
  else {
  return false; }
  }else if (e.keyCode==48){
  a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
  b = a.replace(/[^\d]/g,"");
  if (parseFloat(b)!=0){
  ini.value = tandaPemisahTitik(b);
  return false;
  } else {
  return false;
  }
  }else if (e.keyCode==95){
  a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
  b = a.replace(/[^\d]/g,"");
  if (parseFloat(b)!=0){
  ini.value = tandaPemisahTitik(b);
  return false;
  } else {
  return false;
  }
  }else if (e.keyCode==8 || e.keycode==46){
  a = ini.value.replace(".","");
  b = a.replace(/[^\d]/g,"");
  b = b.substr(0,b.length -1);
  if (tandaPemisahTitik(b)!=""){
  ini.value = tandaPemisahTitik(b);
  } else {
  ini.value = "";
  }

  return false;
  } else if (e.keyCode==9){
  return true;
  } else if (e.keyCode==17){
  return true;
  } else {
  //alert (e.keyCode);
  return false;
}

}

function tandaPemisahTitik(b){
var _minus = false;
if (b<0) _minus = true;
b = b.toString();
b=b.replace(".","");
b=b.replace("-","");
c = "";
panjang = b.length;
j = 0;
for (i = panjang; i > 0; i--){
j = j + 1;
if (((j % 3) == 1) && (j != 1)){
c = b.substr(i-1,1) + "." + c;
} else {
c = b.substr(i-1,1) + c;
}
}
if (_minus) c = "-" + c ;
return c;
}

 function cumanomer(event) {
                        var key = window.event ? event.keyCode : event.which;
                        if (event.keyCode == 8 || event.keyCode == 46
                         || event.keyCode == 37 || event.keyCode == 39) {
                            return true;
                        }
                        else if ( key < 48 || key > 57 ) {
                            return false;
                        }
                        else return true;
                        };

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function preview_img(id_frame) 
{
    document.getElementById(id_frame).src=URL.createObjectURL(event.target.files[0]);
}

function fileValidationImage(id, preview = false, id_preview = null)
{
    var fl = id;
    var fileInput = document.getElementById(fl);
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath))
    {
        alert('Format yang diperbolehkan .jpeg/.jpg/.png only.');
        fileInput.value = '';
        return false;
    }

    if (preview == true) 
    {
        preview_img(id_preview);
    }
}

function fileValidationPdf(id)
{
    var fl = id;
    var fileInput = document.getElementById(fl);
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
    if(!allowedExtensions.exec(filePath))
    {
        alert('Format yang diperbolehkan .jpeg/.jpg/.png/.pdf only.');
        fileInput.value = '';
        return false;
    }
}

function validateSize(input, id, size = 8) 
{
  const fileSize = input.files[0].size / 1024 / 1024; // in MiB
  if (fileSize > size) {
    document.getElementById(id).value="";
    alert('File size exceeds '+size+' MB');
    // $(file).val(''); //for clearing with Jquery
  } else {
    // Proceed further
  }
}