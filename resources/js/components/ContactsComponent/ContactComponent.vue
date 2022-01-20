<template>
    <div class="right-content">
        <div class="contacts">
            <div class="contacts-group">
                <div class="contact-info">
                    <h5>our location</h5>
                    <p>office address 123,
                    kalitka 24, mad dog</p>
                    <a><i class="fas fa-phone-alt"></i> (012)-456-78-90</a>
                </div>
                <div class="contact-info">
                    <h5>Careers</h5>
                    <p>dummy text ever since the 1500s, simply dummy text of the typesetting industry. </p>
                    <a><i class="fas fa-envelope"></i> office@jizni.net</a>
                </div>
                <div class="contact-info">
                    <h5>say hello</h5>
                    <p>simply dummy text of the printing and typesetting industry.</p>
                    <a><i class="fas fa-envelope"></i> other_mail@jizni.net</a>
                </div>
            </div>
            <form class="form-self">
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email Address">
                <input type="tel" placeholder="Phone Number">
                <input type="text" placeholder="Subject">
                <textarea placeholder="Message"></textarea>
                <input type="submit" value="send message">
            </form>
        </div>
        <div id="google-map">
            Google Maps
            <div class="spinner">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "contact-component",

}
</script>

<style scoped>
.right-content {
    width: 100%;
    padding-top: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
.contacts {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
}
.contacts-group {
    max-width: 33%;
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: stretch;
}
.contact-info {
    margin: 1.5rem 0;
}
h5 {
    text-transform: capitalize;
    font-weight: 600;
}
.form-self {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: stretch;
    min-width: 60%;
}
input {
    min-height: 3rem;
}
input[type='submit'] {
    padding: 0.5rem 1rem;
    background-color: rgb(66, 66 ,66);
    color: white;
    text-transform: uppercase;
    font-size: 1.2rem;
}
#google-map {
    width: 100%;
    height: 25rem;
    background-color: white;
    margin: 2rem auto;
    position: relative;
}
.spinner {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
