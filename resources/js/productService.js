export default {
    getAllProducts() {
       return axios.get('/api/products');
    },

    getPaginated(params) {
      return axios.get('api/products', {params : params})
    },

    getSorted(sorting) {
        console.log('in get sorted sorting:', JSON.stringify(sorting));
        return axios.get('api/products', {params : {
                sort : sorting.sort,
                order : sorting.order,
            }})
    },
    isCartExist(order, product) {
      return axios.get('/carts?order_id='+order
                            +'&product_id='+product);
    },
    getSingleProduct(id) {
        console.log('in service, id is: ', id);
      return axios.get('/api/products/'+id);
    },

    getProductOptions(id) {
      return axios.get('/api/product-options', {product: id});
    },

    getReviewsAmount(product_id) {
       return axios.get('/api/reviews', {params : {product_id : product_id}});
    },
    createProduct(product) {
       return axios.post('api/products', {
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
        console.log('parameters, catched in servise: ', product_id, options, image);
       return axios.post('api/product-options', {
            image : image,
            name: options,
            product_id: product_id
        });
    },
    editProduct(product) {
      return axios.put('api/products/'+product.id, {
          name: product.name,
          price: product.price,
          code: product.code,
          brand: product.brand,
          description: product.description
      })
    },
    addToCart(order, product, amount=1) {
        if ( confirm('Add this product to the cart?') ) {
            console.log(JSON.stringify(this.isCartExist(order, product)));
            //if ( this.isCartExist(order, product).data !== '') return;
            console.log('come through if');
            axios.post('/api/carts?product='
                + product + '&amount='
                + amount + '&order=' + order
            )
                .then(response => {
                    let name = response.data.product.name;
                    alert(name+' was added to the cart');
                })
                .catch(errors => console.log(errors));
        }
    }
}
