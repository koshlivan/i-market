<template>
    <div id="cart-dropdown" class="cart-menu collapse">
        <ul>
            <li>
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td class="text-center"><a href="#"><img src="images/product/70x84.jpg" alt="iPod Classic" title="iPod Classic"></a></td>
                        <td class="text-left product-name"><a href="#">MacBook Pro</a> <span class="text-left price">$20.00</span>
                            <input class="cart-qty" name="product_quantity" min="1" value="1" type="number">
                        </td>
                        <td class="text-center"><a class="close-cart"><i class="fa fa-times-circle"></i></a></td>
                    </tr>
                    <tr>
                        <td class="text-center"><a href="#"><img src="images/product/70x84.jpg" alt="iPod Classic" title="iPod Classic"></a></td>
                        <td class="text-left product-name"><a href="#">MacBook Pro</a> <span class="text-left price">$20.00</span>
                            <input class="cart-qty" name="product_quantity" min="1" value="1" type="number">
                        </td>
                        <td class="text-center"><a class="close-cart"><i class="fa fa-times-circle"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </li>
            <li>
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="text-right"><strong>Sub-Total</strong></td>
                        <td class="text-right">$2,100.00</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                        <td class="text-right">$2.00</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>VAT (20%)</strong></td>
                        <td class="text-right">$20.00</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Total</strong></td>
                        <td class="text-right">$2,122.00</td>
                    </tr>
                    </tbody>
                </table>
            </li>
            <li>
                <form action="cart_page.html">
                    <input class="btn pull-left mt_10" value="View cart" type="submit">
                </form>
                <form action="checkout_page.html">
                    <input class="btn pull-right mt_10" value="Checkout" type="submit">
                </form>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "cart-dropdown"
}
</script>

<style scoped>

</style>
