$(document).ready(function() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear().toString();
    var currentMonth = (currentDate.getMonth() + 1).toString().padStart(2, '0');
    var randomCode = Math.floor(Math.random() * (9999 - 1000 + 1) + 1000).toString();
    var combined = currentYear + currentMonth + randomCode;

    $('#invoice_lines_invoice_customer_id').val(randomCode);
    $('#invoice_lines_invoice_invoice_number').val(combined);
});