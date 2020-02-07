$( document ).ready(function() {

    const activeAuthTab = "active-auth-tab";
    const reg_auth_tab = $('.reg-tab');
    const login_auth_tab = $('.login-tab');
    const reg_auth_form = $('.register-form');
    const login_auth_form = $('.login-form');

    // highlights auth tab with server page load
    const HighlightAuthTab = () => {
        let auth_tab = titleCase( $('#auth_tab').val() );
        // let auth_type = titleCase( $('#auth_type').val() );
        // console.log(auth_tab, auth_type);

        let auth_tabs = [].slice.call( $('.auth-tabs').children() );

        if (auth_tab.toLowerCase().indexOf('login') !== -1) {
            reg_auth_form.addClass('d-none');
            login_auth_form.removeClass('d-none');
        } else {
            login_auth_form.addClass('d-none');
            reg_auth_form.removeClass('d-none');
        }

        auth_tabs.forEach(element => {
            if (element.innerText.indexOf(auth_tab) !== -1) {
                $(element).addClass('active-auth-tab');
            }
        });
    }
    HighlightAuthTab();

    const makeAuthFormActive = (divToShow, divToHide) => {
        divToShow.removeClass('d-none');
        divToHide.addClass('d-none');
    }

    // handle auth tab and click
    reg_auth_tab.click(() => {
        reg_auth_tab.addClass(activeAuthTab);
        login_auth_tab.removeClass(activeAuthTab);
        makeAuthFormActive(reg_auth_form, login_auth_form);
    });

    login_auth_tab.click(() => {
        reg_auth_tab.removeClass(activeAuthTab);
        login_auth_tab.addClass(activeAuthTab);
        makeAuthFormActive(login_auth_form, reg_auth_form);
    });

    // handle form submits
    function register_submit (e) {
        e.preventDefault();
        console.log( "ready!" );
    }

});