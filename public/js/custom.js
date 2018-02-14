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
    $('.cart-button-remove').on('click', function () {
        var id = $(this).attr('data-id'),
            parentEl = $('tr[data-id ='+id+' ]');
        console.log(parentEl);
        $.post('/cart/removeAjax/'+id,{},function () {
            parentEl.remove();
        });
        return false;
    });
});

/*change product quantity in cart*/
$(function() {
    $('.cart-button-decrease').on('click', function () {
        var input = $(this).parent().find('.cart-count-input');
        var count = parseInt(input.val()) - 1;
        count = count < 1 ? 1 : count;
        input.val(count);
        input.change();
        return false;
    });

    $('.cart-button-increase').click(function () {
        var input = $(this).parent().find('.cart-count-input');
        input.val(parseInt(input.val()) + 1);
        input.change();
        return false;
    });
});
