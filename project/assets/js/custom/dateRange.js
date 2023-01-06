$("#kt_datepicker_leave_range").flatpickr({
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
    mode: "range",
    minDate: "today"
});

var today = new Date(); 
let yesterday =  new Date()
yesterday.setDate(today.getDate() - 1)
var dd = yesterday.getDate(); 
var mm = yesterday.getMonth()+1; //January is 0! 
var yyyy = yesterday.getFullYear(); 
if(dd<10){ dd='0'+dd } 
if(mm<10){ mm='0'+mm } 
var yesterday1 = mm+'/'+dd+'/'+yyyy; 
$("#kt_daterangepicker").daterangepicker({minDate:yesterday1});