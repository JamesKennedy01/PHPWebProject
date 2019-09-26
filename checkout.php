<?php include '../view/header.php'; ?>
        <?php if (empty($_SESSION['cart12']) || 
                  count($_SESSION['cart12']) == 0) : ?>
            <p>There are no items in your cart.</p>
        <?php else: ?>
            <h1>Thank you for shopping with us. Here is your order.</h1>
            <form action="." method="post">
            <input type="hidden" name="action" value="update">
            <table>
                <tr id="cart_header">
                    <th class="left">Item</th>
                    <th class="right">Item Cost</th>
                    <th class="right">Quantity</th>
                    <th class="right">Item Total</th>
                </tr>

            <?php foreach( $_SESSION['cart12'] as $key => $item ) :
                $cost  = number_format($item['cost'],  2);
                $total = number_format($item['total'], 2);
            ?>
                <tr>
                    <td>
                        <?php echo $item['name']; ?>
                    </td>
                    <td class="right">
                        $<?php echo $cost; ?>
                    </td>
                    <td class="right">
                        <input type="text" class="cart_qty"
                            name="newqty[<?php echo $key; ?>]"
                            value="<?php echo $item['qty']; ?>">
                    </td>
                    <td class="right">
                        $<?php echo $total; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
                <tr id="cart_footer">
                    <td colspan="3"><b>Subtotal</b></td>
                    <td>$<?php echo get_subtotal(); ?></td>
                </tr>

            </table>

            </form>

        <?php endif; ?>
        <p><a href=".?action=show_add_item">Back to Catalog</a></p>
    </main>
<?php include '../view/footer.php'; ?>