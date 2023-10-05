$(document).ready(function() {
  $.ajax({
    url: '/product/items/json',
    method: 'GET',
    dataType: 'json',
    success: function(data) {
      var choices = [];
      var priceMap = {};

      data.forEach(function(item) {
        choices.push(item.name);
        priceMap[item.name] = item.price;
      });

      var selectField = $('#invoice_lines_description');
      var quantityField = $('#invoice_lines_quantity');
      var vatField = $('#invoice_lines_vat_amount');
      var totalWithVatField = $('#invoice_lines_total_with_vat');

      selectField.change(updateFields);
      quantityField.change(updateFields);
      vatField.change(updateFields);

      function updateFields() {
        var selectedOption = selectField.find('option:selected').text();
        var selectedQuantity = parseInt(quantityField.val());
        var selectVat = parseFloat(vatField.val());
        var price = priceMap[selectedOption];

        var amount = price * selectedQuantity;
        var totalWithVat = amount + amount * selectVat / 100;

        $('#invoice_lines_amount').val(amount);
        totalWithVatField.val(totalWithVat);
      }
    },
    error: function() {
      console.log('Error loading items');
    }
  });
});

