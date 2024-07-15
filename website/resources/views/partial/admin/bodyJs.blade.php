<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
<script src="{{asset('backend/dist/js/app.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var currentUrl = window.location.href;

        var menuItems = document.querySelectorAll('#side-menu .side-menu');
        var categoryMenu = document.getElementById('category-menu');

        console.log(categoryMenu)

        menuItems.forEach(function (menuItem) {
            var href = menuItem.getAttribute('href');

            if (currentUrl.includes(href)) {
                menuItem.classList.add('side-menu--active');
            }
            if (currentUrl.includes('category')) {
                categoryMenu.classList.add('side-menu--active')
            }

        });
    });
</script>
