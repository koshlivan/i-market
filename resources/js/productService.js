export default {
    getAllProducts() {
        return axios.get('/api/products');
    },

    getPaginated(params) {
        return axios.get('/api/products', {params: params})
    },

    getSorted(sorting) {
        return axios.get('/api/products', {
            params: {
                sort: sorting.sort,
                order: sorting.order,
            }
        })
    },
    getSingleProduct(id) {
        return axios.get('/api/products/' + id);
    },

    getProductOptions(id) {
        return axios.get('/api/product-options', {params: {product: id}});
    },

    getReviewsAmount(product_id) {
        return axios.get('/api/reviews', {params: {product_id: product_id}});
    },
    createProduct(product) {
        return axios.post('/api/products', {
            name: product.name,
            price: product.price,
            category_id: product.category_id,
            code: product.code,
            brand: product.brand,
            rating: product.rating,
            description: product.description
        });
    },
    createProductOption(product_id, image, options) {
        return axios.post('/api/product-options', {
            image: image,
            name: options,
            product_id: product_id
        });
    },
    editProduct(product) {
        return axios.put('/api/products/' + product.id, {
            name: product.name,
            price: product.price,
            code: product.code,
            brand: product.brand,
            description: product.description
        })
    },
    addToCart(order, product, amount = 1) {
        if (!confirm('Add this product to the cart?')) {
            return;
        }
        //todo refactore to params
        axios.post('/api/carts', {
            product: product,
            amount: amount,
            order: order
        })
            .then(response => {
                let name = response.data.product.name;
                alert(name + ' was added to the cart');
            })
            .catch(errors => console.log(errors.response.data.message));
    },
    addToCartLocal(product, amount = 1) {
        let orders = [];
        if ( !localStorage.getItem('order') ) {
            orders = [];
        } else {
            orders = JSON.parse( localStorage.getItem('order') );
        }
        //todo investigate difference between var let const and how to use
        let cart = {
            product_id: product,
            amount: amount
        }
        let exist = orders.findIndex( cart => cart.product_id === product );
        if (exist < 0) {
            orders.push(cart);
        } else {
            orders[exist].amount = Number.parseInt(orders[exist].amount) + Number.parseInt(amount);
        }
        localStorage.setItem('order', JSON.stringify(orders));
    },
    async cartItems() {
        let orders = [];
        if ( !localStorage.getItem('order') ) return orders;

        let carts = JSON.parse(localStorage.getItem('order'));
        for (let i = 0; i < carts.length; i++) {
            let id = Number.parseInt(carts[i].product_id);
            let product = await this.getSingleProduct(id);
            let order = {
                product: product.data,
                amount: carts[i].amount
            }
            orders.push(order);
        }
        return orders;
    },
    getCategoryWithProducts(category) {
        return axios.get('/api/categories/' + category, {params :{
                products: true
            }});
    }
    //todo remove

    // encrypt(someString) {
    //     return CryptoJS.AES.encrypt(someString, '123').toString();
    // },
    // decrypt(someString) {
    //     return CryptoJS.AES.decrypt(someString, '123').toString(CryptoJS.enc.Utf8);
    // },

}
