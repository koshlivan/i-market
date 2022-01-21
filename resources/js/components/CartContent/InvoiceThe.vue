<template>
    <div class="invoice-the">
        <table>
            <tr>
                <td>
                    Sub-Total:
                </td>
                <td>
                    {{'$'+orderTotal.totalSum}}
                </td>
            </tr>
            <tr>
                <td>
                    {{'Eco Tax ('+orderTotal.ecoTax+')'}}
                </td>
                <td>
                    {{'$'+orderTotal.ecoTax}}
                </td>
            </tr>
            <tr>
                <td>
                    {{'VAT ('+orderTotal.vat+')'}}
                </td>
                <td>
                    {{'$'+orderTotal.vat}}
                </td>
            </tr>
            <tr>
                <td>
                    Total:
                </td>
                <td>
                    {{'$'+orderTotal.entireCost}}
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    name: "invoice-the",
    props: [
        'orderTotal'
    ]
}
</script>

<style scoped>
    .invoice-the {
        width: 100%;
        margin-top: 2rem;
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        align-items: stretch;
    }

    td {
        border: solid 2px white;
        border-collapse: collapse;
        width: 10rem;
        height: 3rem;
        text-align: center;
        padding: 0.5rem 1.5rem;
        color: white;
        font-weight: bolder;
    }
</style>
