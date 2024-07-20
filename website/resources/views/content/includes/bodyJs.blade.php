
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
