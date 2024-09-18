
function formAction(elem) {
    event.preventDefault();
    var action = $(elem).attr('action');
    var method = $(elem).attr('method');
    if (method == 'GET') {
        var dataform = $(elem).serialize();
    }
    else {
        var dataform = new FormData($(elem)[0]);
    }
    $.ajax
        ({
            url: action,
            type: method,
            data: dataform,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.message != '') {
                    toasterSuccess(data.message);
                }
                setTimeout(
                    function () {
                        window.location.href = data.data
                    }, 50);
            }
            , error: function (data) {
                toasterError(Object.values(data.responseJSON.errors)[0]);
            }
        })
}


function quickView(elem) {
    event.preventDefault();
    let url = $(elem).attr('data-id');
    $.ajax
        ({
            url: url,
            type: 'GET',
            dataType: 'HTML',
            success: function (data) {
                $('#ModalQuickview').modal('show');
                $('#quickViewContent').html(data);
            }
            , error: function (data) {
                toasterError(Object.values(data.responseJSON.errors)[0]);
            }
        })
}

function toggleFavorite(elem) {
    event.preventDefault();
    let id = $(elem).attr('data-id');
    if (user_auth == null) {
        window.location.href = login_page
    }
    else {
        $.ajax
            ({
                url: url_toggle_fav,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'product_id=' + id,
                dataType: 'json',
                success: function (data) {
                    if (data.message != '') {
                        toasterSuccess(data.message);
                    }
                    let check_fav = $(elem).hasClass("favorited");
                    if (check_fav) {
                        let image = base_url + '/assets/web/ASSETS/imgs/template/icons/wishlist.svg';
                        $(elem).css('background', "url(" + image + ") no-repeat center");
                    }
                    else {
                        let image = base_url + '/assets/web/ASSETS/imgs/template/icons/wishlist-hover.svg';
                        $(elem).css('background', "url(" + image + ") no-repeat center");
                    }
                    $(elem).toggleClass('favorited');
                    viewFavorite();
                    viewCart()
                }
                , error: function (data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            })
    }
}
function toggleFavoriteProduct(elem) {
    event.preventDefault();
    let id = $(elem).attr('data-id');
    if (user_auth == null) {
        window.location.href = login_page
    }
    else {
        $.ajax
            ({
                url: url_toggle_fav,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'product_id=' + id,
                dataType: 'json',
                success: function (data) {
                    if (data.message != '') {
                        toasterSuccess(data.message);
                    }
                    viewFavorite();
                    viewCart()

                }
                , error: function (data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            })
    }
}
function toggleFavoriteCart(elem) {
    event.preventDefault();
    let id = $(elem).attr('data-id');
    if (user_auth == null) {
        window.location.href = login_page
    }
    else {
        $.ajax
            ({
                url: url_toggle_fav,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'product_id=' + id,
                dataType: 'json',
                success: function (data) {
                    if (data.message != '') {
                        toasterSuccess(data.message);
                    }
                    let check_fav = $(elem).hasClass("favorited");
                    if (check_fav) {
                        $(elem).removeClass('favorited');
                        $(elem).find('i').removeClass('fas').addClass('far').css('color', ''); // Use empty color to reset
                    } else {
                        $(elem).addClass('favorited');
                        $(elem).find('i').removeClass('far').addClass('fas').css('color', 'red'); // Set color to red
                    }
                    viewFavorite();
                    viewCart()

                }
                , error: function (data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            })
    }
}
function addCompare(elem) {
    event.preventDefault();
    let id = $(elem).attr('data-id');
    if (user_auth == null) {
        window.location.href = login_page
    }
    else {
        $.ajax
            ({
                url: url_add_compare,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'product_id=' + id,
                dataType: 'json',
                success: function (data) {
                    if (data.message != '') {
                        toasterSuccess(data.message);
                    }
                }
                , error: function (data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            })
    }
}

function addCart(elem) {
    event.preventDefault();
    let id = $(elem).attr('data-id');


    console.log($('.count'));
    let count = 1;
    if ($('.count').length > 0) {
        count = parseFloat($('.count').val());
    }

    if (user_auth == null) {
        window.location.href = login_page
    }
    else {
        $.ajax
            ({
                url: url_add_cart,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'product_id=' + id + '&count=' + count,
                dataType: 'json',
                success: function (data) {
                    if (data.message != '') {
                        toasterSuccess(data.message);
                    }
                    viewCart();
                    viewCartInside();
                }
                , error: function (data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            })
    }
}

function buynow(elem) {
    event.preventDefault();
    let id = $(elem).attr('data-id');

    console.log($('.count'));
    let count = 1;
    if ($('.count').length > 0) {
        count = parseFloat($('.count').val());
    }

    if (user_auth == null) {
        window.location.href = login_page
    }
    else {
        $.ajax
            ({
                url: url_add_cart,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'product_id=' + id + '&count=' + count,
                dataType: 'json',
                success: function (data) {
                    if (data.message != '') {
                        toasterSuccess(data.message);
                    }
                    viewCart();
                    window.location.href = url_cart;
                }
                , error: function (data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            })
    }
}
function deleteCart(elem) {
    event.preventDefault();
    let cart_id = $(elem).attr('data-id');
    let delete_url = url_delete_cart.replace(':cart_id', cart_id);
    $.ajax({
        url: delete_url,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: '',
        dataType: 'json',
        success: function (data) {
            if (data.message != '') {
                toasterSuccess(data.message);
            }
            $(elem).closest('.item').fadeOut(1000)
            viewCart()

        },
        error: function (data) {
            toasterError(Object.values(data.responseJSON.errors)[0]);
        }
    })
}


function viewCart() {
    $.ajax
        ({
            url: url_view_cart,
            type: 'GET',
            data: '',
            dataType: 'json',
            success: function (data) {
                $('#count_carts').html(data.data.count_products);
                $('#total_cart').html(data.data.total_cart);
                $('#carts').html(data.data.products);
            }
            , error: function (data) {
                toasterError(Object.values(data.responseJSON.errors)[0]);
            }
        })
}

function viewFavorite() {
    $.ajax
        ({
            url: url_view_favorite,
            type: 'GET',
            data: '',
            dataType: 'json',
            success: function (data) {
                $('#count_favorites').html(data.data);
            }
            , error: function (data) {
                toasterError(Object.values(data.responseJSON.errors)[0]);
            }
        })
}

function update_cart(elem) {
    event.preventDefault();
    let cart_id = $(elem).closest('.input-quantity').find('input').data('id');
    let edit_cart = edit_cart_action.replace(':cart_id', cart_id);

    let count = parseInt($(elem).closest('.input-quantity').find('input').val()) + 1;

    $.ajax({
        url: edit_cart,
        type: 'PUT',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { count: count },
        dataType: 'json',
        success: function (data) {
            if (data.message != '') {
                toasterSuccess(data.message);
            }
            $(elem).closest('.input-quantity').find('input').val(count);
            viewCart();
        },
        error: function (data) {
            toasterError(Object.values(data.responseJSON.errors)[0]);
        }
    });
}


function decrease_cart(elem) {
    event.preventDefault();
    let cart_id = $(elem).closest('.input-quantity').find('input').data('id');
    edit_cart_action = edit_cart_action.replace(':cart_id', cart_id);

    let currentCount = parseInt($(elem).closest('.input-quantity').find('input').val());

    // Ensure quantity doesn't go below 1
    let count = Math.max(currentCount - 1, 1);

    $.ajax({
        url: edit_cart_action,
        type: 'PUT',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { count: count },
        dataType: 'json',
        success: function (data) {
            if (data.message != '') {
                toasterSuccess(data.message);
            }
            $(elem).closest('.input-quantity').find('input').val(count);
            viewCart();
            viewCartInside();
        },
        error: function (data) {
            toasterError(Object.values(data.responseJSON.errors)[0]);
        }
    });
}


