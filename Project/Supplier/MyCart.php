<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <style>
            .product-img {
                width: 100px;
                height: auto;
            }

            .product-line-price {
                text-align: right;
                font-weight: bold;
            }

            .checkout-btn {
                background-color: #28a745;
                color: white;
                font-size: 20px;
                border-radius: 5px;
                padding: 10px 30px;
            }

            .checkout-btn:hover {
                background-color: #218838;
            }

            .switch2 {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 32px;
            }

            .switch2 input {
                display: none;
            }

            .switch2 div {
                position: absolute;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background-color: white;
                top: -4px;
                left: 0px;
                box-shadow: 0px 0px 0.5px 0.5px rgb(170, 170, 170);
                transition: all 0.2s;
            }

            .switch2-checked {
                background-color: #28a745;
            }

            .switch2 input:checked + div {
                left: calc(100% - 40px);
            }

            .product-details {
                font-size: 14px;
            }
        </style>
    </head>

    <?php
        if (isset($_POST["btn_checkout"])) {        
                 $amt = $_POST["carttotalamt"];
				$selC = "select * from tbl_booking where supplier_id='" .$_SESSION["sid"]. "'and booking_status='0'";
                $rs = $Con->query($selC);
                $row=$rs->fetch_assoc();
                $upQry1 = "update tbl_booking set booking_date=curdate(),booking_amount='".$amt."',booking_status='1' where supplier_id='" .$_SESSION["sid"]. "'";
                if($Con->query($upQry1))
                {
					$upQry1s = "update tbl_cart set cart_status='1' where booking_id='" .$row["booking_id"]. "'";
					if($Con->query($upQry1s))
					{
					  $_SESSION["bid"] = $row["booking_id"];
					  ?>
					  <script>
						 window.location="Payment.php";
					  </script>
					  <?php
					}    
                }
			}
	?>

    <body onload="recalculateCart()">
        <div class="container mt-5">
            <h1 class="text-center mb-4">Your Cart</h1>
            <div class="row">
                <div class="col-12">
                    <div class="d-none d-md-flex justify-content-between mb-3">
                        <div class="col-md-2 text-center">Image</div>
                        <div class="col-md-4">Details</div>
                        <div class="col-md-2 text-center">Price</div>
                        <div class="col-md-2 text-center">Qty</div>
                        <div class="col-md-2 text-center">Total</div>
                    </div>

                    <form method="post">
                        <?php
                            $sel = "select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id where b.supplier_id='" .$_SESSION["sid"]. "' and booking_status='0' and cart_status=0";
                            $res = $Con->query($sel);
                            while ($row=$res->fetch_assoc()) {
                                $selPr = "select * from tbl_product where product_id='" .$row["product_id"]. "'";
                                $respr = $Con->query($selPr);
                                if ($rowpr=$respr->fetch_assoc()) {
                                    $selstock = "select sum(stock_count) as stock from tbl_stock where product_id='".$rowpr["product_id"]."'";
                                    $selstock1="select sum(cart_qty) as quantity from tbl_cart where product_id='".$rowpr["product_id"]."' and cart_status >'0'";
                                    $chk=$Con->query($selstock1)->fetch_assoc();
                                    $resst = $Con->query($selstock);
                                    if ($rowst=$resst->fetch_assoc()) {
                        ?>
                        <div class="row product mb-4 p-3 border-bottom">
                            <div class="col-md-2 text-center mb-3 mb-md-0">
                                <img
                                    src="../Assets/Files/Product/<?php echo $rowpr["product_photo"] ?>"
                                    class="img-fluid product-img"
                                    alt="Product Image"
                                />
                            </div>
                            <div class="col-md-4">
                                <h6 class="product-title"><?php echo $rowpr["product_name"] ?></h6>
                                <p class="product-details"><?php echo $rowpr["product_description"] ?></p>
                            </div>
                            <div class="col-md-2 text-center mb-2">
                                ₹<?php echo $rowpr["product_price"] ?>
                            </div>
                            <div class="col-md-2 text-center mb-2">
                                <select id="<?php echo $row["cart_id"] ?>" class="form-select w-auto mx-auto">
                                    <?php
                                        for ($k=1;$k<=($rowst["stock"]-$chk["quantity"]);$k++) {
                                    ?>
                                    <option <?php if($row["cart_qty"]==$k){ echo "selected";} ?> value="<?php echo $k ?>"><?php echo $k ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2 text-center">
                                <span class="product-line-price">
                                    ₹<?php echo (int)$rowpr["product_price"] * (int)$row["cart_qty"]; ?>
                                </span>
                                <button class="btn btn-danger btn-sm remove-product mt-2" value="<?php echo $row["cart_id"] ?>">Remove</button>
                            </div>
                        </div>
                        <?php
                                    }
                                }
                            }
                        ?>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between mb-4">
                                    <span>Grand Total:</span>
                                    <strong class="totals-value" id="cart-total">₹0</strong>
                                    <input type="hidden" id="cart-totalamt" name="carttotalamt" value="" />
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="form-check form-switch">
                                        <span>COD</span>
                                        <label class="switch2 ms-3">
                                            <input type="checkbox" name="cb_checkout" checked />
                                            <div></div>
                                        </label>
                                        <span class="ms-3">Card Payment</span>
                                    </div>
                                </div>

                                <button type="submit" class="btn checkout-btn" name="btn_checkout">Checkout</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            /* Set rates + misc */
            var fadeTime = 300;

            $(".product-quantity select").change(function() {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxCart.php?action=Update&id=" + this.id + "&qty=" + this.value
                });
                updateQuantity(this);
            });

            $(".product-removal button").click(function() {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxCart.php?action=Delete&id=" + this.value
                });
                removeItem(this);
            });

            function recalculateCart() {
                var subtotal = 0;
                $(".product").each(function() {
                    subtotal += parseFloat($(this).find(".product-line-price").text().replace('₹', ''));
                });
                var total = subtotal;

                $(".totals-value").fadeOut(fadeTime, function() {
                    $("#cart-total").html('₹' + total.toFixed(2));
                    document.getElementById("cart-totalamt").value = total.toFixed(2);
                    $(".totals-value").fadeIn(fadeTime);
                });
            }

            function updateQuantity(quantityInput) {
                var productRow = $(quantityInput).closest(".product");
                var price = parseFloat(productRow.find(".product-price").text().replace('₹', ''));
                var quantity = $(quantityInput).val();
                var linePrice = price * quantity;

                productRow.find(".product-line-price").fadeOut(fadeTime, function() {
                    $(this).text("₹" + linePrice.toFixed(2));
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            }

            function removeItem(removeButton) {
                var productRow = $(removeButton).closest(".product");
                productRow.slideUp(fadeTime, function() {
                    productRow.remove();
                    recalculateCart();
                });
            }

            $(".switch2 input").on("change", function() {
                var dad = $(this).parent();
                if ($(this).is(":checked"))
                    dad.addClass("switch2-checked");
                else
                    dad.removeClass("switch2-checked");
            });
        </script>
    </body>
    <?php
    include("Foot.php");
    ob_flush();
    ?>
</html>
