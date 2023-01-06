$("#kt_datepicker_leave_range").flatpickr({
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
    mode: "range",
    minDate: "today"
});

var today = new Date(); 
var dd = today.getDate(); 
var mm = today.getMonth()+1; //January is 0! 
var yyyy = today.getFullYear(); 
if(dd<10){ dd='0'+dd } 
if(mm<10){ mm='0'+mm } 
var today = mm+'/'+dd+'/'+yyyy; 
$("#kt_daterangepicker").daterangepicker({minDate:today});