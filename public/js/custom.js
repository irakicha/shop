/*add product to cart*/
$(function () {
    $('.add-to-cart').on('click', function () {
        var id = $(this).attr('data-id');
        $.post('/cart/addAjax/'+id,{},function (data) {
            if (!data){
                window.location.href = '/auth/login';
            }
            $('#cart-count').html(data);
            console.log(data);
        });
        return false;
    });
});

/*remove product from cart*/
$(function () {
    $('.product__button-remove').on('click', function () {
        var id = $(this).attr('data-id'),
            parentEl = $('tr[data-id ='+id+' ]');
        console.log(parentEl);
        $.post('/cart/removeAjax/'+id,{},function () {
            parentEl.remove();
        });
        return false;
    });
});