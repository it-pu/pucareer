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

function readURL(input){ 
if(input.files && input.files[0])
{ 
  var reader = new FileReader(); 
  reader.onload = function(e)
  { 
    $('#previewpic img').attr('src', e.target.result); 
  }; 
  reader.readAsDataURL(input.files[0]); 
} 
} 
  $(document).on('change','input[type="file"]',function()
  { readURL(this); }
);

function fileValidation()
{
    var fl = 'file';
    var fileInput = document.getElementById(fl);
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath))
    {
        alert('Format yang diperbolehkan .jpeg/.jpg/.png only.');
        fileInput.value = '';
        return false;
    }
}

function fileValidation2pdf()
{
    var fl = 'file';
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

var _validFileExtensions = [".jpg", ".jpeg", ".png", "pdf"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}