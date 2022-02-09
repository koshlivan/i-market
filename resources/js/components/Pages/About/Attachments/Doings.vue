<template>
    <div class="holder col-6">
        <about-cap>what we do?</about-cap>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseOne"
                            aria-expanded="true"
                            aria-controls="collapseOne">
                        What is HTML?
                    </button>
                </h2>
                <div id="collapseOne"
                     class="accordion-collapse collapse show"
                     aria-labelledby="headingOne"
                     data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>HTML is a computer language devised to can then b the Internet.
                            It is relatively easy to learn, with the basics being accessible.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo"
                            aria-expanded="false"
                            aria-controls="collapseTwo">
                        What is Bootstrap?
                    </button>
                </h2>
                <div id="collapseTwo"
                     class="accordion-collapse collapse"
                     aria-labelledby="headingTwo"
                     data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>Bootstrap is the most popular HTML, CSS,
                            and JS frameen I discovered Bootstrap a
                            few was still gaining in popularity, addition to HTML, CSS and JS.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseThree"
                            aria-expanded="false"
                            aria-controls="collapseThree">
                        What is CSS?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                     data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>Cascading Style Sheets, fondly referred to as CSS,
                            is a simple design language intended to simplify
                            the procrt of a web page. Using CSS.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AboutCap from "./Cap";

export default {
    name: "about-doings",
    components: {AboutCap}
}
</script>

<style scoped>

</style>
