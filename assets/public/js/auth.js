$( document ).ready(function() {

    const activeAuthTab = "active-auth-tab";
    const reg_auth_tab = $('.reg-tab');
    const login_auth_tab = $('.login-tab');
    const reg_auth_form = $('.register-form');
    const login_auth_form = $('.login-form');

    const register_form = $('#register-form')
    // const login = $('#login-form')

    // displays form accordinly
    const makeAuthFormActive = (divToShow, divToHide) => {
        divToShow.removeClass('d-none');
        divToHide.addClass('d-none');
    }

    // highlights auth tab with server page load
    const HighlightAuthTab = () => {
        let auth_tab = titleCase( $('#auth_tab').val() );
        // let auth_type = titleCase( $('#auth_type').val() );
        // console.log(auth_tab, auth_type);

        let auth_tabs = [].slice.call( $('.auth-tabs').children() );

        if (auth_tab.toLowerCase().indexOf('login') !== -1) {
            login_auth_tab.addClass('active-auth-tab');
            reg_auth_tab.removeClass('active-auth-tab');
            reg_auth_form.addClass('d-none');
            login_auth_form.removeClass('d-none');
        } else {
            login_auth_tab.removeClass('active-auth-tab');
            reg_auth_tab.addClass('active-auth-tab');
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
    
    // partner register link toogle
    // $("#partner-register-link").click( function() {
    //     let inputElem = $("input[name='regSubmit']");
    //     inputElem.before(`<input type='hidden' name='is_partner' value='1'>`);
    //     $('.preference-div').hide();
    //     $(this).attr('id', 'customer-register-link')
    //     $(this).children('small').text('Customer Register Link');
    // });

    // handle form submits
    register_form.validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                maxlength: 50
            },
            phone: {
                required: true,
                minlength:10,
                maxlength:10
            },
            email: {
                required: true,
                email: true
            },
            pw: {
                required: true,
                minlength: 5
            },
            pw1: {
                required: true,
                minlength: 5,
                equalTo: "#pw"
            }
        },
        submitHandler: (form, event) => {
            event.preventDefault();
            // let url = $('#url_register').val();
            let url = window.location.href;
            
            register_form.addClass('blurForm');
            $(centeredLoader).removeClass('d-none');
            url = url.replace("?tab=login", "?tab=sign");
            form.action = url;
            form.submit();
            register_form.removeClass('blurForm');
            $(centeredLoader).addClass('d-none');
        }
    })
});