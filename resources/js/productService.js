export default {
    getAllProducts() {
       return axios.get('/api/products');
    },

    getPaginated(perPage) {
      return axios.get('api/products', {params : {
          per_page : perPage
      }})
    },

    getSorted(sorting) {
        console.log('in get sorted sorting:', JSON.stringify(sorting));
        return axios.get('api/products', {params : {
                sort : sorting.sort,
                order : sorting.order,
            }})
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
    getOneProduct(id) {
        return axios.get('api/products/'+id);
    }
}
