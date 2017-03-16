$(document).ready(function(){
    var kkeys = [], konami = "38,38,40,40,37,39,37,39,66,65";

    $(document).keydown(function(e) {
      kkeys.push( e.keyCode );
      if ( kkeys.toString().indexOf( konami ) >= 0 ){
        $(document).unbind('keydown',arguments.callee);
        // Launch easter egg here
      }
    });

    $(document).keydown(function(e) {
        if (e.keyCode == 121 && e.ctrlKey) {
        javascript:var s = document.createElement('script');s.type='text/javascript';document.body.appendChild(s);s.src='http://www.articlevoid.com/misc/javascript/asteroids/asteroids.min.js';void(0);
        }});

    $('#pw').bind("propertychange change click keyup input paste", function(event){
        var chars = ["(",")","[","]","{","}","?","!","$","%","&","/","=","*","+","~",",",".",";",":","<",">","-","_"];
        var VAL = $(this).val();
        $('#Sonderzeichen').addClass( "input-false" ).removeClass("input-true");
        $('#grossB').addClass( "input-false" ).removeClass("input-true");
        $('#kleinB').addClass( "input-false" ).removeClass("input-true");
        $('#laenge').addClass( "input-false" ).removeClass("input-true");
        if (VAL.length > 8){$('#laenge').addClass( "input-true" ).removeClass("input-false");}
        if (VAL.match(/[A-Z]/g) != null){
            $('#grossB').addClass( "input-true" ).removeClass("input-false");
        }
        if (VAL.match(/[a-z]/g) != null){
            $('#kleinB').addClass( "input-true" ).removeClass("input-false");
        }
        $.each(chars, function(index, value) {
            if(!(VAL.indexOf(value) === -1)){
                $('#Sonderzeichen').addClass( "input-true" ).removeClass("input-false");
            }
        })
    });

    $('#pw2').bind("propertychange change click keyup input paste", function(event){
        if($('#pw2').val() == $('#pw').val() && $('#pw2').val() != "") {
            $('#pwMatch').addClass( "input-true" ).removeClass("input-false");
        }
        else
        {
            $('#pwMatch').addClass( "input-false" ).removeClass("input-true");
        }
    });

    $(window).on("scroll", function(e){
        var ar = $(".main-nav");
        if($(window).scrollTop() > 312){
            $(".main-nav").addClass("fixed-header");
        }else{
            $(".main-nav").removeClass("fixed-header");
        }
    });

    $( "#geburtsdatum" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange:'-100:+0'
    });
});