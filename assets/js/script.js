function wts_toggle_class(elem, classname) {
    if (elem !== null) {
        if (elem.classList.contains(classname)) {
            elem.classList.remove(classname);
        } else {
            elem.classList.add(classname);
        }
    }
}

document.addEventListener('DOMContentLoaded', function (ev) {
    const mobileMenuToggler = document.querySelector('.wts-mobile-top-bar .wts-toggler');
    const mobileMenuContainer = document.querySelector('.wts-mobile-menu-container');
    const mobileSubMenuToggler = document.querySelectorAll('.wts-mobile-menu-link-has-dropdown');

    // Toggle Mobile Menu Visibility
    if (mobileMenuToggler !== null) {
        mobileMenuToggler.addEventListener('click', function (ev) {
            ev.stopPropagation();
            wts_toggle_class(mobileMenuContainer, 'show');
        });
    }

    // Toggle Mobile Sub-Menu Visibility
    if (mobileSubMenuToggler !== null) {
        mobileSubMenuToggler.forEach(function (element, index, nodeList) {
            element.addEventListener('click', function (ev) {
                ev.preventDefault();
                ev.stopPropagation();
                wts_toggle_class(ev.currentTarget.nextElementSibling, 'show');
            });
        })
    }
});