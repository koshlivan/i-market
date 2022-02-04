import productService from "./productService";

export default  {
    data () {
        return {
            products : [],
            currentPage: 1,
            amount: 1
        }
    },
    created() {
       // productService.getAllProducts()
        axios.get('/api/products')
            .then((response) => {
                this.products = response.data.data;
                this.amount = response.data.last_page;
                this.currentPage = response.data.current_page;
            });
    }
}
