//this is where you will put your update

$().ready(function() {
    $sidebar = $('.sidebar');

    $sidebar_img_container = $sidebar.find('.sidebar-background');

    $full_page = $('.full-page');

    $sidebar_responsive = $('body > .navbar-collapse');

    window_width = $(window).width();

    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

    if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('show');
        }

    }

    $('.fixed-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
                event.stopPropagation();
            } else if (window.event) {
                window.event.cancelBubble = true;
            }
        }
    });

    $('.fixed-plugin .background-color span').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
        }

        if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
        }
    });

    $('.fixed-plugin .img-holder').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');


        var new_image = $(this).find("img").attr('src');

        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $sidebar_img_container.fadeIn('fast');
            });
        }

        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                $full_page_background.fadeIn('fast');
            });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }

        if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
    });

    $('.switch input').on("switchChange.bootstrapSwitch", function() {

        $full_page_background = $('.full-page-background');

        $input = $(this);

        if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn('fast');
                $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
                $full_page_background.fadeIn('fast');
                $full_page.attr('data-image', '#');
            }

            background_image = true;
        } else {
            if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr('data-image');
                $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
                $full_page.removeAttr('data-image', '#');
                $full_page_background.fadeOut('fast');
            }

            background_image = false;
        }
    });
});

type = ['primary', 'info', 'success', 'warning', 'danger'];

demo = {
    initPickColor: function() {
        $('.pick-class-label').click(function() {
            var new_class = $(this).attr('new-class');
            var old_class = $('#display-buttons').attr('data-class');
            var display_div = $('#display-buttons');
            if (display_div.length) {
                var display_buttons = display_div.find('.btn');
                display_buttons.removeClass(old_class);
                display_buttons.addClass(new_class);
                display_div.attr('data-class', new_class);
            }
        });
    },


    showNotification: function(from, align) {
        color = Math.floor((Math.random() * 4) + 1);

        $.notify({
            icon: "nc-icon nc-planet",

            message: "Bienvenue  <b>sur votre espace !</b>"

        }, {
            type: type[color],
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    },

    showNotificationHuawei: function(from, align) {
        color = Math.floor((Math.random() * 4) + 1);

        $.notify({
            icon: "nc-icon nc-bell-55",

            message: "Bienvenue  sur votre Dashboard <br><b> Conçu pour le data logger Huawei!</b>"

        }, {
            type: type[color],
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    },


    showNotificationback: function(from, align) {


        $.notify({
            url:"authentification.php",
            icon: "nc-icon nc-stre-left",

            message: "Cliquer ici pour retourner!</b>"

        }, {
            type: 'success',
            timer: '',
            placement: {
                from: from,
                align: align
            }
        });
    },

    showNotificationSMA: function(from, align) {
        color = Math.floor((Math.random() * 4) + 1);

        $.notify({
            icon: "nc-icon nc-bell-55",

            message: "Bienvenue  sur votre Dashboard <br><b>Conçu pour le data logger SMA!</br></b> "

        }, {
            type: type[color],
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    },
    showNotificationFronius: function(from, align) {
        color = Math.floor((Math.random() * 4) + 1);

        $.notify({
            icon: "nc-icon nc-bell-55",

            message: "Bienvenue  sur votre Dashboard <br><b>Conçu pour le data logger Fronius!</br></b> "

        }, {
            type: type[color],
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    },

    showNotiET: function(from, align) {


        $.notify({


            message: "Oups !Une erreur est survenue lors de la modification!</b>"

        }, {
            type: 'danger',
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    },

    showNotiST: function(from, align) {


        $.notify({


            message: "Modification effectuée avec succès !</b>"

        }, {
            type: 'success',
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    },


    showNotiS: function(from, align) {


        $.notify({


            message: "Upload effectué avec succès !</b>"

        }, {
            type: 'success',
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    },
    showNoti1: function(from, align) {

        $.notify({

            message: "Vous devez uploader une image de type png, gif, jpg, jpeg ... !</b>"

        }, {
            type: 'danger',
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    },
    showNoti2: function(from, align) {

        $.notify({

            message: "Veuillez sélectionner une image  !</b>"

        }, {
            type: 'danger',
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    },
    showNoti3: function(from, align) {

        $.notify({


            message: "La taille de votre image est trop grande, la taille maximum autorisée est de  500Ko...! </b>"

        }, {
            type: 'danger',
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    },
    showNotialrtn: function(from, align) {

        $.notify({

            message: "Echec de l'upload !</b>"

        }, {
            type: 'danger',
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    },





}