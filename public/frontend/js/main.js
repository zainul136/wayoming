(function ($) {

    "use strict";



    /*---------------------------

       Commons Variables

    ------------------------------ */

    var $window = $(window),

        $body = $("body");



    /* window.addEventListener("resize", function() {

         "use strict"; window.location.reload();

     });*/



    /*-----  Hover Dropdown Navigation Start -----*/

    if (window.innerWidth > 992) {

        document.querySelectorAll('.navbar .nav-item').forEach(function (everyitem) {

            everyitem.addEventListener('mouseover', function (e) {

                let el_link = this.querySelector('a[data-bs-toggle]');

                if (el_link != null) {

                    let nextEl = el_link.nextElementSibling;

                    el_link.classList.add('show');

                    nextEl.classList.add('show');

                    nextEl.setAttribute("data-bs-popper", "static");

                }

            });

            everyitem.addEventListener('mouseleave', function (e) {

                let el_link = this.querySelector('a[data-bs-toggle]');

                if (el_link != null) {

                    let nextEl = el_link.nextElementSibling;

                    el_link.classList.remove('show');

                    nextEl.classList.remove('show');

                    nextEl.removeAttribute("data-bs-popper");

                }

            })

        });







        // Attach Parsley validation rules to your form fields

        // Example:

        // $('input[name="email"]').attr('data-parsley-type', 'email');

    }

    /*-----  Hover Dropdown Navigation End  -----*/



    /*-----  enable Tooltip start -----*/

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))

    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {

        return new bootstrap.Tooltip(tooltipTriggerEl)

    })

    /*-----  enable Tooltip end -----*/



    /*-----  Tab List Mobile -----*/
    let showNavLink = false
    const navlink = document.querySelectorAll('.nav_tabs.nav_tabs_steps .nav-item .nav-link')
const PanelFunc = ()=>{
    showNavLink = !showNavLink
    console.log(navlink)
    navlink.forEach(element => {
        if(showNavLink){
            element.style.display = "flex"    
            console.log(true)   
        }else{
            console.log(false)   
            element.style.display = "none"       
            element.classList.contains("active") ? element.style.display = "flex" : element.style.display = "none";
        } 
    });
    
}
if (window.innerWidth < 992) {
    
    navlink.forEach(element => {
        element.classList.contains("active") ? element.style.display = "flex" : element.style.display = "none";
        element.addEventListener("click", PanelFunc)
    });
}
window.addEventListener("resize", ()=>{
if (window.innerWidth < 992) {
    // console.log(true)
    navlink.forEach(element => {
        element.classList.contains("active") ? element.style.display = "flex" : element.style.display = "none";
        element.addEventListener("click", PanelFunc)
    });
}else{
    // console.log(false)
    navlink.forEach(element => {
        element.style.display = "flex";
        element.removeEventListener("click", PanelFunc)
    });

}
})


$('.ham').click(()=>{
    document.querySelector('.headerContainer').classList.toggle('active')
})
    /*-----  Tab List Mobile -----*/



    /*-----  Help Text Model -----*/

    const helpModal = document.getElementById('helpModal');

    if (typeof (helpModal) != 'undefined' && helpModal != null) {

        helpModal.addEventListener('show.bs.modal', event => {

            const button = event.relatedTarget;

            const helpText = button.getAttribute('data-bs-helpText');

            const helpTitle = button.getAttribute('data-bs-helpTitle');

            const modalTitle = helpModal.querySelector('.modal-title');

            const modalBody = helpModal.querySelector('.modal-body');



            modalTitle.innerHTML = helpTitle;

            modalBody.innerHTML = helpText;

        })

    }

    /*-----  Help Text Model -----*/



    /*-----  Continue/Done Button -----*/

    $('.btn_continue').click(function () {

        $('.nav_tabs_steps.nav_tabs .nav-link.active').parents('.nav-item').next('.nav-item').find('button').trigger('click');

        if (window.innerWidth < 992) {

            $('.nav_tabs.nav_tabs_steps .nav-item .nav-link').not('.active').hide();

        }

        $window.scrollTop(0);

    });



    const lastTab = document.querySelector('.nav_tabs_steps.nav_tabs .nav-item:last-child button[data-bs-toggle="tab"]');



    if (typeof (lastTab) != 'undefined' && lastTab != null) {

        lastTab.addEventListener('shown.bs.tab', event => {

            //$('.btn_continue').addClass('justify-content-center').html('DONE');

            //$('.btn_continue').attr('id','test');

            // $('.btn_continue').prop("type", "submit");

            $('.btn_continue').hide();

            $('.btn_done').show();

            $('.terms-p').show();

        })

        lastTab.addEventListener('hidden.bs.tab', event => {

            //$('.btn_continue').removeClass('justify-content-center').html('Continue <i class="fa fa-angle-right" aria-hidden="true"></i>');

            //$('.btn_continue').prop("type", "button");

            //$('.btn_continue').attr('id','my-button');

            $('.btn_continue').show();

            $('.btn_done').hide();

            $('.terms-p').hide();

        })

    }





    /*----- Continue/Done Button -----*/



    /*----- Country button Button -----*/

    $('.verifiable_address_field').each(function () {

        if ($(this).children("option:selected").val() == 'US') {

            $(this).parents('.group_address').find('.usa-data').show();

            $(this).parents('.group_address').find('.non-usa-data').hide();

        }

    });

    $('.verifiable_address_field').change(function () {

        if ($(this).val() == 'US') {

            $(this).parents('.group_address').find('.usa-data').show();

            $(this).parents('.group_address').find('.non-usa-data').hide();

        } else {

            $(this).parents('.group_address').find('.usa-data').hide();

            $(this).parents('.group_address').find('.non-usa-data').show();

        }

    });

    /*----- Country button Button -----*/



    /*----- Specify Address Select  Start -----*/

    $('body').on('change', '.person-address-select', function () {

        var value = $(this).val();

        if ($(this).val() == 'Specify Address') {

            $(this).parent().parent().find('textarea').show();

        } else {

            $(this).parent().parent().find('textarea').hide();

        }

    });













    /*----- Specify Address Select  End -----*/

    // $("body").on("click", ".btn_done", function (e) {

    //     e.preventDefault();



    //     var first_name = $('#first_name').val();

    //     var last_name = $('#last_name').val();

    //     var mailing_address = $('#mailing_address_address_line1').val();

    //     var zip_code = $('#mailing_zip_code').val();

    //     var city = $('#mailing_address_city').val();

    //     var phone_no = $('#phone_number').val();

    //     var email = $('#email').val();







    //     if (first_name.length < 1

    //         || last_name.length < 1

    //         || mailing_address.length < 1

    //         || zip_code.length < 1

    //         || city.length < 1

    //         || phone_no.length < 1

    //         || email.length < 1

    //         || company_name.length < 1

    //     ) {



    //         $(".error").html('');

    //         $(".error").removeClass("error");





    //         $('#errors').after('<span class="error" style="color:red;">Please make the * Required </span>');

    //         document.getElementById('contact-tab').click();





    //     }



    //     if (first_name.length < 1) {

    //         $("#error").val("");

    //         $('#first_name').after('<span class="error" style="color:red;">First name field is required</span>');

    //     }



    //     if (last_name.length < 1) {

    //         $('#last_name').after('<span class="error" style="color:red;">Last Name field is required</span>')

    //     }



    //     if (mailing_address.length < 1) {

    //         $('#mailing_address_address_line1').after('<span class="error" style="color:red;">Mailing field is required</span>');

    //     }



    //     if (zip_code.length < 1) {

    //         $('#mailing_zip_code').after('<span class="error" style="color:red;">Zip Code field is required</span>');

    //     }



    //     if (city.length < 1) {

    //         $('#mailing_address_city').after('<span class="error" style="color:red;">City field is required</span>');





    //     }



    //     if (phone_no.length < 1) {

    //         $('#phone_number').after('<span class="error" style="color:red;">Phone number field is required</span>');

    //     }



    //     if (email.length < 1) {

    //         $('#email').after('<span class="error" style="color:red;">Email field is required</span>');

    //     }





    //     else {

    //         $(this).submit();

    //     }





    // });



}(jQuery));



// main.js







