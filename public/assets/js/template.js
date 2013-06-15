function ShowCurrentTime() {
var dt = new Date();
var d=dt.getDate();
var m=dt.getMonth();
var da=dt.getDay();
var days=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var months=["January","February","March","April", "May", "June","July","August","September", "October", "Novemeber","Decemeber"];
var Month=months[m];
var Day=days[da];
var Y=dt.getFullYear();
//console.log(d);
document.getElementById("time").innerHTML = Month+" "+d+"<sup>th</sup> "+Y+", "+Day+", " + dt.toLocaleTimeString();
window.setTimeout("ShowCurrentTime()", 1000); 
}
