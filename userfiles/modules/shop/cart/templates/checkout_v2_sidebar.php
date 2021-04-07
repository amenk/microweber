<?php

/*

type: layout

name: Checkout V2

description: Checkout V2

*/
?>

<?php if (is_ajax()) : ?>

    <script>
        function check_qty(el) {

            if(el.value <= 0) {
                el.value = 1;
            }
        }

        $(document).ready(function () {

            //   cartModalBindButtons();

        });
    </script>

    <style>
        .mw-order-custom-fields ul {
            list-style-type: none;
            margin-bottom: 0.4rem;
        }

        .mw-order-custom-fields ul li {
            margin-bottom: 3px;
        }
    </style>
<?php endif; ?>

<?php
$total = cart_total();
?>
       <div class="checkout-modal-products-wrapper">
           <?php if (is_array($data) and $data) : ?>
               <?php foreach ($data as $item) :?>
                   <div class="form-row checkout-modal-product-list-item pb-5">
                       <div class="col-lg-3 col-auto d-flex">
                           <?php if (isset($item['item_image']) and $item['item_image'] != false): ?>
                               <?php $p = $item['item_image']; ?>
                           <?php else: ?>
                               <?php $p = get_picture($item['rel_id']); ?>
                           <?php endif; ?>
                           <?php if ($p != false): ?>
                               <img style="max-width:70px; max-height:70px;" src="<?php print thumbnail($p, 70, 70, true); ?>" alt=""/>
                           <?php endif; ?>

                           <div class="mw-order-custom-fields font-weight-bold align-self-center mx-4">
                               <?php if (isset($item['custom_fields']) and $item['custom_fields'] != false): ?>
                                   <?php print $item['custom_fields'] ?>
                               <?php endif ?>
                           </div>
                       </div>

                       <div class="col-auto col-lg">
                           <div class="form-row h-100">
                               <div class="col-10">
                                   <div class="form-row align-items-md-center h-100 ">
                                       <div class="col-12 col-md-5">
                                           <h6><?php _e($item['title']) ?></h6>
                                       </div>
                                       <div class="col-6 col-md-3 align-self-center justify-content-md-center">
                                           <h6><?php print currency_format($item['price']); ?></h6>
                                       </div>
                                       <div class="col-6 col-md-2 align-self-center justify-content-md-center mw-qty-field">
                                           <input min=1 type="number" class="form-control input-sm" name="qty" value="<?php print $item['qty'] ?>"  oninput="check_qty(this)" onchange=" mw.cart.qty('<?php print $item['id'] ?>', this.value)" style="width: 70px;"/>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-2 justify-content-center align-self-center">
                                   <a data-toggle="tooltip" title="<?php _e("Remove"); ?>" href="javascript:mw.cart.remove('<?php print $item['id'] ?>');"><i class="mdi mdi-delete-outline text-dark d-flex justify-content-center justify-content-md-end" style="font-size: 24px"></i></a>
                               </div>
                           </div>
                       </div>
                   </div>
               <?php endforeach; ?>
           <?php else: ?>
               <h5><?php _e("Your cart is empty. Please add some products in the cart."); ?></h5>
           <?php endif; ?>

       </div>

        <module type="shop/cart" template="totals" />
