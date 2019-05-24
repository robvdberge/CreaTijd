window.onload = function(){
    $('#mob-menu__btn').on('click',function(){ /*----------klik op menu/hamburger knop----------*/
        $('.nav-lijst').toggleClass('menu-hidden');
        const navKnop = $('#mob-menu__btn'); 
        if (navKnop.css('color') == 'rgb(59, 57, 57)'){
            navKnop.css('color', '#ffffff');
            $('body').css('overflow','hidden');
        }else {
            navKnop.css('color', '#3b3939');
            $('body').css('overflow','auto');
            $('.groepen-lijst').css('display', 'none');
        } 
    });

    $('#mob-set__btn').on('click', function(){
        window.location = '/login/instellingen.php';
    });

    $('#groep-submenu').on('click', function(e){ /*-----------klik op groepen-lijst-----------*/
        const subMenu = $('nav .groepen-lijst'); 
            subMenu.slideToggle();
            e.stopPropagation();
    });

    $(window).on('click', function(){
        $('.groepen-lijst').hide();
    });

    /*------------------------Carrousel gedeelte/slider-----------------------------------*/
    var curIndex, targetIndex;
    var slideTimer = 8000; //  slidetimer = 8 sec
    var fotos = Array.from($('.foto'));
    var btnRechts = $('.button-rechts');
    var btnLinks = $('.button-links');

    btnRechts.on('click', function(){
        autoSlider.stop();
        bepaalIndex();
        targetIndex = curIndex + 1;
        vervangFoto(targetIndex);
        autoSlider.start();
    });

    btnLinks.on('click', function(){
        autoSlider.stop();
        bepaalIndex();
        targetIndex = curIndex - 1;
        vervangFoto(targetIndex);
        autoSlider.start();
    });

    var autoSlider = new slider(function(){
        bepaalIndex();
        targetIndex = curIndex + 1;
        vervangFoto(targetIndex);
    }, slideTimer);

    function slider(fn, tijd){
        var timer = setInterval(fn, tijd);

        this.stop = function(){
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
            return this;
        };

        this.start = function(){
            if (!timer){
                this.stop();
                timer = setInterval(fn, tijd);
            }
            return this;
        }
    };

    function bepaalIndex(){
        for (i in fotos){
            if (fotos[i].children[0].className === 'active'){
                curIndex = parseInt(i);
            };
        }return curIndex;
    };

    function vervangFoto(nieuweIndex){
        if (nieuweIndex < 0){
            nieuweIndex = fotos.length - 1
        }else if (nieuweIndex == fotos.length){
            nieuweIndex = 0;
        };
        
        $('#fotolijst li .active').fadeOut(250, function(){ 
            $('#fotolijst li .active').removeClass('active');
            $('#fotolijst li')[nieuweIndex].children[0].className = 'active';
            $('#fotolijst li .active').fadeIn(700);
        });
    };

    /* contactformuliermodal */
    var contactModal = $('#openContactModal');
    contactModal.on('click', function(e){
        e.stopPropagation();
        if ($('#contactForm').css('display') == 'none'){
            window.scrollTo(0,0);
            $('#contactForm').css('display', 'block');
            console.log('display is none');
            $('body').css('overflow','hidden');
            $('nav').css('opacity', '.35');
        };
    });
    // Meldingvenster onder de navbar
    if ( $('.melding')[0].innerHTML.length > 0 ){
        showMelding(1000);
    }else{
        $('#meldingContainer').css('height', '0');
        // console.log( $('.meldingContainer')[0]);
    }
    function showMelding(timer){
        $('#meldingContainer').slideDown(timer,function(){
            $('#meldingContainer').delay(4000).slideUp(timer);
        });
        
    }

}