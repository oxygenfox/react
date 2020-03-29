<script>
  $(document).ready(function() {

    $('.add_cart').click(function() {
      var product_id = $(this).data("productid");
      var product_name = $(this).data("productname");
      var product_price = $(this).data("price");
      var quantity = $('#' + product_id).val();
      if (quantity != '' && quantity > 0) {
        $.ajax({
          url: "<?php echo base_url(); ?>shopping_cart/add",
          method: "POST",
          data: {
            product_id: product_id,
            product_name: product_name,
            product_price: product_price,
            quantity: quantity
          },
          success: function(data) {
            alert("Product Added into Cart");
            $('#cart_details').html(data);
            $('#' + product_id).val('');
          }
        });
      } else {
        alert("Please Enter quantity");
      }
    });

    $('#cart_details').load("<?php echo base_url(); ?>shopping_cart/load");

    $(document).on('click', '.remove_inventory', function() {
      var row_id = $(this).attr("id");
      if (confirm("Are you sure you want to remove this?")) {
        $.ajax({
          url: "<?php echo base_url(); ?>shopping_cart/remove",
          method: "POST",
          data: {
            row_id: row_id
          },
          success: function(data) {
            alert("Product removed from Cart");
            $('#cart_details').html(data);
          }
        });
      } else {
        return false;
      }
    });

    $(document).on('click', '#clear_cart', function() {
      if (confirm("Are you sure you want to clear cart?")) {
        $.ajax({
          url: "<?php echo base_url(); ?>shopping_cart/clear",
          success: function(data) {
            alert("Your cart has been clear...");
            $('#cart_details').html(data);
          }
        });
      } else {
        return false;
      }
    });

  });
</script>