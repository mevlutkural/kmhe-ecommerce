function addToCart(product_id, customer_id, url, token) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            _token: token,
            product_id: product_id,
            quantity: 1,
            customer_id: customer_id,
            person: customer_id
        },
        success: function(res) {
            alert('eklendi');
        },
        error: function(res) {
            alert('hata');
        }
    });
}
