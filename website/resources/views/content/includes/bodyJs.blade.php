
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.21.6/js/uikit.min.js" integrity="sha512-72UQAm55liyRxQH3d//nHZlDDUdv9cqxUtaV0DAme4qPn9sYvExRVSL8PT0DoYTtf7cNQFIDLvYd4tljV25B0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.6/dist/js/uikit-icons.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const minusButton = document.querySelector('.ux-quantity__button--minus');
        const plusButton = document.querySelector('.ux-quantity__button--plus');
        const quantityInput = document.getElementById('quantity');

        if (minusButton && plusButton && quantityInput) {
            minusButton.addEventListener('click', function () {
                let value = parseInt(quantityInput.value, 10);
                if (value > 0) {
                    quantityInput.value = value - 1;
                }
            });

            plusButton.addEventListener('click', function () {
                let value = parseInt(quantityInput.value, 10);
                quantityInput.value = value + 1;
            });
        }
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        UIkit.util.on('#offcanvas-cart', 'beforeshow', function () {
            loadCartSummary();
        });
    });

    function loadCartSummary() {
        fetch('{{ route('cart.summary.data') }}')
            .then(response => response.json())
            .then(data => {
                renderCartSummary(data);
            })
            .catch(error => {
                console.error('Error fetching cart summary:', error);
            });
    }
    // function renderLoginPrompt() {
    //     let cartSummaryElement = document.getElementById('widget_shopping_cart_content');
    //     cartSummaryElement.innerHTML = `
    //     <p>Bạn cần phải đăng nhập để sử dụng giỏ hàng</p>
    //     <div class="ux-mini-cart-footer uk-margin-top">
    //         <p class="woocommerce-mini-cart__buttons buttons uk-text-center">
    //             <a href="/login" class="button wc-forward uk-button uk-button-primary">Đăng nhập</a>
    //         </p>
    //     </div>
    // `;
    // }
    function renderCartSummary(data) {

        let cartSummaryElement = document.getElementById('widget_shopping_cart_content');


        if (data.cartItems.length === 0) {
            return cartSummaryElement.innerHTML = `
            <p>không có sản phẩm nào</p>
            <div class="ux-mini-cart-footer uk-margin-top">

                <p class="woocommerce-mini-cart__buttons buttons uk-text-center">
                    <a href="/cart/" class="button wc-forward uk-button uk-button-primary">Xem giỏ hàng</a>
                </p>
            </div>

                `;
        } else {
            cartSummaryElement.innerHTML = `
            <ul class="uk-list uk-list-divider">
                ${Object.keys(data.cartItems).map(key => {
                let item = data.cartItems[key];
                return `
                    <li class="uk-flex uk-flex-middle">
                        <a href="/cart/remove/${item.id}" class="uk-icon-link uk-margin-right" aria-label="Remove ${item.name} from cart" data-product_id="${item.id}" data-cart_item_key="${item.id}" data-product_sku="${item.attributes.sku}">×</a>
                        <a href="${item.attributes.url}">
                            <img src="${item.attributes.image}" alt="${item.name}" class="uk-border-rounded">

                        </a>
                        <div class="uk-margin-left">
                             <a href="${item.attributes.url}" class="uk-link-reset">${item.name}</a>

                             <div class="uk-margin uk-flex" style="width: 70px;">
                                  <div class="uk-width-auto">
                                       <button type="button" class="ux-quantity__button ux-quantity__button--minus uk-button uk-button-default" style="padding-right: 3px; padding-left: 3px;" onclick="decrementQuantity(${item.id})">-</button>
                                  </div>
                                  <div class="uk-width-expand">
                                       <input type="number" name="quantity" id="quantity-${item.id}" value="${item.quantity}" aria-label="Product quantity" min="0" step="1" class="uk-input" style="text-align: center;">
                                  </div>
                                  <div class="uk-width-auto">
                                       <button type="button" class="ux-quantity__button ux-quantity__button--plus uk-button uk-button-default" style="padding-right: 3px; padding-left: 3px;" onclick="incrementQuantity(${item.id})">+</button>
                                  </div>
                             </div>
                            <span class="uk-margin-top" data-title="Subtotal">
                                <span class="uk-text-bold"><span class="uk-text-primary">${(item.quantity * item.price).toFixed(2)}&nbsp;₫</span></span>
                            </span>
                        </div>
                    </li>
                `})}
            </ul>
            <div class="uk-width-1-1">
                <p class="">
                    <strong>Tổng số phụ:</strong>
                    <span class="woocommerce-Price-amount amount">
                        <bdi>${data.subtotal.toFixed(2)}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></bdi>
                    </span>
                </p>
                <p class=" uk-text-center" style="color: #0A0A0A">
                    <a href="/cart/" class="uk-width-1-1 uk-button uk-border-pill uk-button-primary">Xem giỏ hàng</a>
                    <a href="/checkout/" class="uk-width-1-1 uk-margin-top uk-border-pill uk-button uk-button-secondary">Thanh toán</a>
                </p>
            </div>
            `;
        }
    }
</script>
<script>
    // Function to increase the quantity of an item
    function incrementQuantity(id) {
        var quantityInput = document.getElementById('quantity-' + id);
        if (quantityInput) {
            quantityInput.value = Math.max(0, parseInt(quantityInput.value) + 1);
            updateCartQuantity(id);
        } else {
            console.error('Quantity input not found for ID:', id);
        }
    }

    // Function to decrease the quantity of an item
    function decrementQuantity(id) {
        var quantityInput = document.getElementById('quantity-' + id);
        if (quantityInput) {
            quantityInput.value = Math.max(0, parseInt(quantityInput.value) - 1);
            updateCartQuantity(id);
        } else {
            console.error('Quantity input not found for ID:', id);
        }
    }

    // Function to update the cart quantity on the server
    function updateCartQuantity(id) {
        var quantityInput = document.getElementById('quantity-' + id);
        if (quantityInput) {
            var quantity = quantityInput.value;

            fetch("{{ url('cart/update') }}/" + id, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ quantity: quantity })
            })
                .then(response => response.json())
                .then(data => {
                    // Update UI with new subtotal and total if needed
                    if (document.querySelector('#subtotal')) {
                        document.querySelector('#subtotal').innerText = data.subtotal + ' ₫';
                    }
                    if (document.querySelector('#total')) {
                        document.querySelector('#total').innerText = data.total + ' ₫';
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            console.error('Quantity input not found for ID:', id);
        }
    }

    // Attach event listeners to quantity inputs for immediate updates
    document.querySelectorAll('input[name="quantity"]').forEach(input => {
        input.addEventListener('change', function() {
            var id = this.id.split('-')[1]; // Extract item ID from input ID
            updateCartQuantity(id);
        });
    });
</script>

<!-- Wishlist JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize wishlist buttons
    initWishlistButtons();
});

function initWishlistButtons() {
    const wishlistButtons = document.querySelectorAll('.wishlist-btn');

    wishlistButtons.forEach(button => {
        const productId = button.dataset.productId;
        const isAuthenticated = button.dataset.authenticated === 'true';

        // Check initial wishlist status if authenticated
        if (isAuthenticated && productId) {
            checkWishlistStatus(productId, button);
        }

        // Add click listener
        button.addEventListener('click', function(e) {
            e.preventDefault();
            handleWishlistClick(button);
        });
    });
}

function checkWishlistStatus(productId, button) {
    fetch(`{{ url('wishlist/check') }}?product_id=${productId}`)
        .then(response => response.json())
        .then(data => {
            if (data.in_wishlist) {
                button.classList.add('wishlist-active');
            }
        })
        .catch(error => console.error('Error checking wishlist:', error));
}

function handleWishlistClick(button) {
    const productId = button.dataset.productId;
    const isAuthenticated = button.dataset.authenticated === 'true';

    if (!isAuthenticated) {
        // Show notification and redirect to login
        UIkit.notification({
            message: 'Vui lòng đăng nhập để thêm vào danh sách yêu thích',
            status: 'warning',
            pos: 'top-center',
            timeout: 3000
        });
        setTimeout(() => {
            window.location.href = '{{ route("login") }}';
        }, 1500);
        return;
    }

    // Toggle wishlist
    fetch('{{ route("wishlist.toggle") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ product_id: productId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (data.in_wishlist) {
                button.classList.add('wishlist-active');
            } else {
                button.classList.remove('wishlist-active');
            }
            UIkit.notification({
                message: data.message,
                status: data.in_wishlist ? 'success' : 'primary',
                pos: 'top-center',
                timeout: 2000
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        UIkit.notification({
            message: 'Có lỗi xảy ra, vui lòng thử lại',
            status: 'danger',
            pos: 'top-center',
            timeout: 2000
        });
    });
}
</script>

<style>
.wishlist-btn.wishlist-active {
    background: #990d23 !important;
    color: #fff !important;
    border-color: #990d23 !important;
}
.wishlist-btn.wishlist-active .wishlist-icon svg {
    fill: #fff;
}
</style>

