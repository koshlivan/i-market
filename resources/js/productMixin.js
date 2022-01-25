import productService from "./productService";

export default  {
    data () {
        return {
            products : []
        }
    },
    created() {
       // productService.getAllProducts()
        axios.get('/api/products')
            .then((response) => {this.products = response.data});
    }
}
