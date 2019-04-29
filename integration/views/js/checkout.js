function test_zip()
{
    var zip=document.getElementById("zip").value;
   var longueur=zip.length;
if(longueur!==4) {
return false;
}
chiffres='0123456789';
if(chiffres.indexOf(zip.charAt(0))<0){
return false;
}
if(chiffres.indexOf(zip.charAt(1))<0){
return false;
}
if(chiffres.indexOf(zip.charAt(2))<0){
return false;
}
if(chiffres.indexOf(zip.charAt(3))<0){
return false;
}
    document.getElementById("zip").style.borderWidth="20px";
    document.getElementById("zip").style.borderColor="d"; //maw lebes mate5demech ! 
return true;
}

function telephone()
{
    var tel=document.getElementById("tel").value;
    var long=tel.length;
if(long!==8) {
alert("wrong number");
return false;
}
chif='0123456789';
if(chif.indexOf(tel.charAt(0))<0){
alert("wrong number");
return false;

}
if(chif.indexOf(tel.charAt(1))<0){
alert("wrong number");
return false;
}
if(chif.indexOf(tel.charAt(2))<0){
alert("wrong number");
return false;
}
if(chif.indexOf(tel.charAt(3))<0){
alert("wrong number");
return false;
}
if(chif.indexOf(tel.charAt(4))<0){
alert("wrong number");
return false;
}
if(chif.indexOf(tel.charAt(5))<0){
alert("wrong number");
return false;
}
if(chif.indexOf(tel.charAt(6))<0){
alert("wrong number");
return false;
}
if(chif.indexOf(tel.charAt(7))<0){
alert("wrong number");
return false;
}
return true;
}
function test_ville(){
    var city=document.getElementById("ville").value;
    if(city!==0)
    {
        return true;}
    }

function test_num_carte()
{
    var num=document.getElementById("num_carte").value;
    var num_length=num.length;
    if(num_length<15 || num_length>15)
        {alert('numero incorect');}
}
function test_code()
{
    var code=document.getElementById("code").value;
    var code_length=code.length;
    if(code_length>3)
        {alert('code doit etre 3 chiffres max');}
}