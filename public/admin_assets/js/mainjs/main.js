// common used data
var Ve_Price_arr = [180000,30000,25000,20000,15000,10000,5000];
var Ve_Ordermeter_arr = ['all',50000,75000,100000,125000,150000,200000];



function vbShowMessage(message,type){
  title = ''; 
  errData = null;
  notifyinfo(title,message,type,errData);
}

function notifyinfo(title,message,type,errData){
  if(errData && errData.length > 0){
    toastr_errData = errData;
  } else
    toastr_errData = null;

  	toastr.options = {
      closeButton: true,
      debug: false,
      positionClass: 'toast-bottom-right',
      onclick: null
  }; 
  var $toast = toastr[type](message, title);
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};
