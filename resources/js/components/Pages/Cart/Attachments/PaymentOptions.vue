<template>
    <div class="payment-option">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Use Coupon Code
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                     data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col">
                                <h6>Enter your coupon here</h6>
                            </div>
                            <div class="col">
                                <input type="text" placeholder="Enter your coupon here">
                            </div>
                            <div class="col">
                                <button>APPLY COUPON</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Use Gift Voucher
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                     data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col">
                                <h6>Enter your gift voucher here</h6>
                            </div>
                            <div class="col">
                                <input type="text" placeholder="Enter your gift voucher here">
                            </div>
                            <div class="col">
                                <button>APPLY VOUCHER</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                        Estimate Shipping & Taxes
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                     data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <h6>Enter your destination to get a shipping estimate.</h6>
                        <div class="row">
                            <div class="col">
                                <h5>Country</h5>
                            </div>
                            <div class="col">
                                <input type="text" placeholder="United Kingdom">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Region/State</h5>
                            </div>
                            <div class="col">
                                <input type="text" placeholder="State">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>Post Code</h5>
                            </div>
                            <div class="col">
                                <input type="text" placeholder="Post Code">
                            </div>
                        </div>
                        <button>GET QUOTES</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "payment-options"
}
</script>

<style scoped>
.payment-option {
    width: 100%;
}
</style>
