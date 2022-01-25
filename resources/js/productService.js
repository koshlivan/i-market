export default {
    getAllProducts() {
       return axios.get('/api/products');
    },

    getReviewsAmount(product_id) {
       return axios.get('/api/reviews', {params : {product_id : product_id}});
    },

    // createProduct(product) {
    //     return axios.post('api/products?name='+product.name+
    //         '&price='+product.price+
    //         '&category_id='+product.category_id+
    //         '&code='+product.code+
    //         '&brand='+product.brand+
    //         '&description='+product.description);
    // },
    createProduct(product) {
        return axios.post('api/products', {
                name: product.name,
                price: product.price,
                category_id: product.category_id,
                code: product.code,
                brand: product.brand,
                description: product.description
        })
    },
    createProductOption(option) {
        return axios.post('api/product-options', {
            image : option.image,
            name: option.name,
            product_id: option.master
        })
    }
}
