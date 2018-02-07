$(function () {
    $('.add-to-cart').on('click', function () {
        var id = $(this).attr('data-id');
        $.post('/cart/addAjax/'+id,{},function (data) {
            $('#cart-count').html(data);
        });
        return false;
    });
});