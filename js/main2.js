(function($) {
    document.writeln("<script type='text/javascript' src='js/demo1.js'></script>");

    var form = $("#signup-form");
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous : 'Précédent',
            next : 'Suivant',
            finish : 'Terminer',
            current : ''
        },
        titleTemplate : '<h3 class="title">#title#</h3>',
        onFinished: function (event, currentIndex)
        {

            var formData = $("#signup-form").serializeArray();
            console.log(formData);
            $.ajax({
                url : 'update_para.php',
                type : 'POST', // Le type de la requête HTTP, ici devenu POST
                data : $("#signup-form").serialize(),
                dataType : 'JSON',
                success : function(response){
                if(response.msg == "success") {

                    // console.log("youpi");
                    demo.showNotiST('top','center');
        }else{
                    demo.showNotiET('top','center');
        }
                }

                // success : function(data){ // code_html contient le HTML renvoyé
                //     demo.showNotiST('top','center');
                // },
                // error: function (xhr, ajaxOptions, thrownError) {
                //     demo.showNotiET('top','center');
                // }

            });
        }
    });

    $('#country').parent().append('<ul id="newcountry" class="select-list" name="country"></ul>');
    $('#country option').each(function(){
        $('#newcountry').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#country').remove();
    $('#newcountry').attr('id', 'country');
    $('#country li').first().addClass('init');
    $("#country").on("click", ".init", function() {
        $(this).closest("#country").children('li:not(.init)').toggle();
    });
    
    var allOptions = $("#country").children('li:not(.init)');
    $("#country").on("click", "li:not(.init)", function() {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#country").children('.init').html($(this).html());
        allOptions.toggle();
    });

    $('#daily_budget').parent().append('<ul id="newdaily_budget" class="select-list" name="daily_budget"></ul>');
    $('#daily_budget option').each(function(){
        $('#newdaily_budget').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#daily_budget').remove();
    $('#newdaily_budget').attr('id', 'daily_budget');
    $('#daily_budget li').first().addClass('init');
    $("#daily_budget").on("click", ".init", function() {
        $(this).closest("#daily_budget").children('li:not(.init)').toggle();
    });
    
    var DailyOptions = $("#daily_budget").children('li:not(.init)');
    $("#daily_budget").on("click", "li:not(.init)", function() {
        DailyOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#daily_budget").children('.init').html($(this).html());
        DailyOptions.toggle();
    });
    
    
})(jQuery);
