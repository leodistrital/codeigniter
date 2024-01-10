// Interface
$(document).ready(function () {
    loadMaxScrollTop();
    loadBtnMainMenu();
    loadSubmenus();
    loadSubmenusYear();
    loadBtnGToggle();
    loadClockPage();
    loadSliderHome();
    loadSliderDisc();
    loadSliderVWork();
    loadSliderJury();
    loadSliderCerem();
    loadFancyMulti();
    loadGeneralScroll();
    loadGAccordion();
    scrollAnimation('load');
});

var lastScrollTop = 0;
$(window).on({
    'load': function () {
        pageLoading();
        loadHeightJury();
    },
    'resize': function () {
        loadMaxScrollTop();
        loadSliderJury();
        loadHeightJury();
        resizeFancy();
    },
    'scroll': function () {
        var scrollTop = $(this).scrollTop();
        if (scrollTop < lastScrollTop || scrollTop <= 0) {
            smallHeaderPC('up');
        }
        else {
            smallHeaderPC('down');
        }
        lastScrollTop = scrollTop;
        if (lastScrollTop > maxScrollTop) { lastScrollTop = maxScrollTop }
        scrollAnimation('scroll');
    }
});

// Scroll animation
function scrollAnimation(event) {
    var gAnimated = $('.gAnimated');
    if (gAnimated.length) {
        gAnimated.each(function () {
            var posAni = $(this).offset().top, topW = $(window).scrollTop(), hWin = ($(window).height() / 4) * 3.5;
            if (isMobileDevice() === true || event == 'load') { hWin = $(window).height(); }
            if (posAni < topW + hWin) {
                $(this).addClass('fadeIn');
            }
        });
    }
}

// General accordion
function loadGAccordion() {
    var gAccordion = $('.gAccordion');
    if (gAccordion.length) {
        gAccordion.accordion({ heightStyle: 'content', collapsible: true, active: false, animate: 200 });
    }
}

// General scrollbar
function loadGeneralScroll(div) {
    var gScroll = $('.gScroll');
    if (div) { gScroll = div.find('.gScroll'); }
    if (gScroll.length) {
        if (isMobileDevice() === false) {
            gScroll.mCustomScrollbar({ axis: 'y', scrollInertia: 0, scrollButtons: { enable: false } });
        }
    }
}



/////---------------------------------  ACA ESTA EL ERROR -----------------------------------------------

// Fancy multimedia
function loadFancyMulti() {
    var openImage = $('.openImage'), openVideo = $('.openVideo'), openFancy = $('.openFancy'), openPdf = $('.openPdf');

    if (openImage.length) {
        openImage.colorbox({
            maxWidth: '100%', maxHeight: '100%', className: 'fImages',
            initialWidth: '100px', initialHeight: '100px', fixed: true, opacity: 0.8, transition: 'fade', speed: 300, fadeOut: 300, returnFocus: false, overlayClose: false, escKey: true, closeButton: true, current: false, imgError: "Error al cargar la imagen.", rel: getRelFancy, title: getTitleFancy,
            onComplete: function () { loadBtnsFancy('open'); }, onClosed: function () { loadBtnsFancy('close'); }
        });
    }
    if (openVideo.length) {
        openVideo.colorbox({
            iframe: true, className: 'fVideos', width: '790px', height: '470px', maxWidth: '100%', maxHeight: '100%',
            initialWidth: '100px', initialHeight: '100px', fixed: true, opacity: 0.8, transition: 'fade', speed: 300, fadeOut: 300, returnFocus: false, overlayClose: false, escKey: true, closeButton: true, current: false, rel: getRelFancy, title: getTitleFancy,
            onComplete: function () { loadBtnsFancy('open'); }, onClosed: function () { loadBtnsFancy('close'); }
        });
    }
    if (openPdf.length) {
        if (isMobileDevice() === false) {
            openPdf.colorbox({
                iframe: true, className: 'fPdf', width: '940px', height: '100%', maxWidth: '100%',
                initialWidth: '100px', initialHeight: '100px', fixed: true, opacity: 0.8, transition: 'fade', speed: 300, fadeOut: 300, returnFocus: false, overlayClose: false, escKey: true, closeButton: true, current: false, rel: false, title: getTitleFancy,
                onComplete: function () { loadBtnsFancy('open'); }, onClosed: function () { loadBtnsFancy('close'); }
            });
        }
        else { openPdf.attr('target', '_blank'); }
    }
    if (openFancy.length) {
        openFancy.colorbox({
            width: '100%', height: '100%', className: 'fContent',
            initialWidth: '100px', initialHeight: '100px', fixed: true, opacity: 0.8, transition: 'fade', speed: 300, fadeOut: 300, returnFocus: false, overlayClose: false, escKey: true, closeButton: false, current: false, rel: false, title: false,
            onComplete: function () {
                loadBtnsFancy('open'); loadGeneralScroll($('#cboxLoadedContent'));
                loadBtnFacebook();
            },
            onClosed: function () {
                loadBtnsFancy('close');
            }
        });
    }
}



function loadFancyContent(url) {
    if (url) {
        $.colorbox({
            href: url, width: '100%', height: '100%', className: 'fContent',
            initialWidth: '100px', initialHeight: '100px', fixed: true, opacity: 0.8, transition: 'fade', speed: 300, fadeOut: 300, returnFocus: false, overlayClose: false, escKey: true, closeButton: false, current: false, rel: false, title: false,
            onComplete: function () {
                loadBtnsFancy('open'); loadGeneralScroll($('#cboxLoadedContent'));
                loadBtnFacebook();
            },
            onClosed: function () {
                loadBtnsFancy('close');
            }
        });
    }
}

function loadBtnsFancy(event) {
    var btnCF = $('#cboxLoadedContent .btnCF'), btnClose = $('#cboxClose'), classShow = "show";
    if (btnCF.length) { btnCF.on('click', function (e) { e.preventDefault(); $.colorbox.close(); }); }
    if (event == "open") { btnClose.addClass(classShow); /*$('body').css('overflow', 'hidden');*/ }
    else { btnClose.removeClass(classShow); /*$('body').css('overflow', 'auto');*/ }
}

function resizeFancy() {
    var fancyContent = $('#colorbox.fContent'), fancyVideos = $('#colorbox.fVideos'), fancyImages = $('#colorbox.fImages'), fancyPdf = $('#colorbox.fPdf');
    if (fancyContent.length) { $.colorbox.resize({ width: '100%', height: '100%' }); }
    if (fancyVideos.length) {
        var widthWindow = $(window).width();
        if (widthWindow < 790) { $.colorbox.resize({ width: '100%', height: '100%' }); }
        else { $.colorbox.resize({ width: '790px', height: '470px' }); }
    }
    if (fancyPdf.length) {
        var widthWindow = $(window).width();
        if (widthWindow < 940) { $.colorbox.resize({ width: '100%', height: '100%' }); }
        else { $.colorbox.resize({ width: '940px', height: '100%' }); }
    }
    if (fancyImages.length) { $.colorbox.resize(); }
}
function getRelFancy() {
    var rel = $(this).data('rel');
    if (rel !== undefined) { return rel; }
    else { return false; }
}
function getTitleFancy() {
    var title = $(this).data('title');
    if (title !== undefined) {
        var htmlTitle = '<div class="titleFancy">' + title + '</div>';
        return htmlTitle;
    }
    else { return false; }
}
// ----------------------------------------  HASTA ACA VA EL ERROR ----------------------------------------




// Slider banner home
function loadSliderHome() {
    var sliderHome = $('.sliderHome');
    if (sliderHome.length) {
        var contArrows = $('<div class="slick-contarrows"></div>');
        sliderHome.append(contArrows);
        sliderHome.slick({
            slide: '.gSlide', arrows: true, dots: false, speed: 600, autoplay: true, autoplaySpeed: 10000, pauseOnFocus: false, pauseOnHover: false, appendArrows: $('.sliderHome .slick-contarrows'),
            responsive: [
                { breakpoint: 768, settings: { speed: 400, autoplay: false } }
            ]
        });
    }
}

// Slider jury
function loadSliderJury() {
    var sliderJury = $('.sliderJury');
    if (sliderJury.length) {
        var widthWindow = $(window).width();
        var parameters = { slide: '.gSlide', slidesToShow: 3, slidesToScroll: 3, arrows: true, dots: false, adaptiveHeight: true };
        var parameters2 = { slide: '.gSlide', slidesToShow: 1, slidesToScroll: 1, arrows: true, dots: false, adaptiveHeight: true };
        if (sliderJury.hasClass('slick-initialized')) { sliderJury.slick('unslick'); }
        if (widthWindow < 568) { sliderJury.slick(parameters2); }
        else if (widthWindow < 1024) { sliderJury.slick(parameters); }
    }
}
// Height Desc Jury
function loadHeightJury() {
    var descJury = $('.sliderJury .gSlide > div');
    if (descJury.length) {
        descJury.removeAttr('style');
        descJury.equalizeHeights();
    }
}
$.fn.equalizeHeights = function () {
    var maxHeight = this.map(function (i, e) {
        return $(e).height();
    }).get();
    return this.height(Math.max.apply(this, maxHeight));
};

// Slider discursos
function loadSliderDisc() {
    var sliderDisc = $('.sliderDisc');
    if (sliderDisc.length) {
        sliderDisc.slick({
            slide: '.gSlide', slidesToShow: 5, slidesToScroll: 5, arrows: true, dots: false, speed: 500, adaptiveHeight: true,
            responsive: [
                { breakpoint: 1180, settings: { slidesToShow: 4, slidesToScroll: 4 } },
                { breakpoint: 940, settings: { slidesToShow: 3, slidesToScroll: 3 } },
                { breakpoint: 568, settings: { slidesToShow: 1, slidesToScroll: 1 } }
            ]
        });
    }
}

// Slider ceremonia
function loadSliderCerem() {
    var sliderCerem = $('.sliderCerem'), sliderBG = $('.sliderBG');
    if (sliderCerem.length && sliderBG.length) {
        sliderCerem.slick({ slide: '.gSlide', arrows: false, dots: true, speed: 500, adaptiveHeight: true, asNavFor: '.sliderBG' });
        sliderBG.slick({ slide: '.gSlide', fade: true, arrows: false, dots: false, speed: 700, asNavFor: '.sliderCerem' });
    }
}

// Slider videos trabajos
function loadSliderVWork() {
    var sliderVWork = $('.sliderVWork');
    if (sliderVWork.length) {
        sliderVWork.slick({
            slide: '.gSlide', slidesToShow: 3, slidesToScroll: 3, arrows: true, dots: false, speed: 500,
            responsive: [
                { breakpoint: 1024, settings: { slidesToShow: 2, slidesToScroll: 2 } },
                { breakpoint: 568, settings: { slidesToShow: 1, slidesToScroll: 1 } }
            ]
        });
    }
}

// Clock page
function loadClockPage() {
    var gClock = $('.gClock');
    if (gClock.length) {
        var currentDate = new Date(), futureDate = new Date(gClock.data('time'));
        var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;
        gClock.FlipClock(diff, { clockFace: 'DailyCounter', countdown: true, showSeconds: false, language: 'es' });
    }
}

// Max scrollTop
var maxScrollTop;
function loadMaxScrollTop() {
    maxScrollTop = $('#mainWrapper').innerHeight() - $(window).height();
}

// Fixed header
function smallHeaderPC(direction) {
    var wrapper = $('#mainWrapper');
    if (wrapper.length) {
        var widthWindow = $(window).width(), classToggle = 'smallHeader';
        if (widthWindow >= 1024) {
            var scrollTop = $(window).scrollTop(), topMax = parseInt(wrapper.css('padding-top')) / 2;
            if (scrollTop > topMax) { wrapper.addClass(classToggle); }
            else { wrapper.removeClass(classToggle); }
        }
        else {
            if (direction == 'up') { wrapper.removeClass(classToggle); }
            else { wrapper.addClass(classToggle); }
        }
    }
}

// Toggle div
function loadBtnGToggle() {
    var btnToggle = $('.toggleDiv');
    if (btnToggle.length) {
        btnToggle.each(function () {
            var btnT = $(this), divToggle = $('#' + btnT.data('id'));
            btnT.on('click', function (e) { e.preventDefault(); toggleGeneralDiv(btnT, divToggle, ''); });
            if (btnT.hasClass('cw')) {
                btnT.on('click', function (e) { e.stopPropagation(); });
                $('body').on('click', function (e) { toggleGeneralDiv(btnT, divToggle, 'close'); });
                divToggle.on('click', function (e) { e.stopPropagation(); });
            }
        });
    }
}
function toggleGeneralDiv(btn, divToggle, event) {
    var claseT = "divActive", claseB = "btnActive";
    if (event == "close") { divToggle.removeClass(claseT); btn.removeClass(claseB); }
    else { divToggle.toggleClass(claseT); btn.toggleClass(claseB); }
}

// Main menu
function loadBtnMainMenu() {
    var btnMMenu = $('#btnMMenu');
    if (btnMMenu.length) {
        btnMMenu.on('click', function (e) { e.preventDefault(); toggleMMenu($(this), 'toggle'); });
    }
}
function toggleMMenu(btn, evento) {
    var wrapper = $('#mainWrapper'), claseM = "menuOpen", claseB = "active";
    if (evento == "close") { wrapper.removeClass(claseM); btn.removeClass(claseB); }
    else { wrapper.toggleClass(claseM); btn.toggleClass(claseB); }
}

// Submenus
function loadSubmenus() {
    var submenu1 = $('.mainMenu > ul > li > ul');
    if (submenu1.length) {
        var parent = submenu1.parent('li'), btnS1 = parent.find('> a');
        parent.addClass('sm1'); btnS1.addClass('btnS1');
        $('.btnS1').on('click', function (e) { e.preventDefault(); toggleSubmenu($(this), '.sm1'); });
    }
}
function loadSubmenusYear() {
    var submenu1 = $('#divEMenu > ul > li > ul');
    if (submenu1.length) {
        var parent = submenu1.parent('li'), btnS1 = parent.find('> a');
        parent.addClass('smYear'); btnS1.addClass('btnSYear');
        $('.btnSYear').on('click', function (e) { e.preventDefault(); toggleSubmenu($(this), '.smYear'); });
    }
}
function toggleSubmenu(btn, classSM) {
    var classActive = "smActive", submenuActive = $(classSM + '.' + classActive), parent = btn.parent(classSM);
    if (parent.hasClass(classActive)) { submenuActive.removeClass(classActive); }
    else { submenuActive.removeClass(classActive); parent.addClass(classActive); }
}

// Page loading
function pageLoading() {
    var pLoading = $('#pageLoading');
    if (pLoading.length) {
        pLoading.fadeOut(500);
    }
}

// Type device
function isMobileDevice() {
    var wrapper = $('#mainWrapper');
    if (wrapper.hasClass('isMobile')) { return true; }
    else { return false; }
}

// Loading general
function toggleLoading(event) {
    var body = $('body');
    if (event == "open") {
        var loadExist = body.find('.gLoading');
        if (!loadExist.length) { var div = "<div class='gLoading'></div>"; body.append(div); }
    }
    else {
        var loadExist = body.find('.gLoading');
        if (loadExist.length) { loadExist.remove(); }
    }
}

// General alert
(function ($) {
    $.createAlert = function (opt_user) {
        var opt_default = {
            title: 'Titulo Alerta', content: 'Texto Alerta', closeButton: true, acceptButton: true, labelAccept: 'Aceptar', cancelButton: true, labelCancel: 'Cancelar',
            onAccept: function () { }, onCancel: function () { }, onClosed: function () { }
        }
        var options = $.extend(opt_default, opt_user), conBtnClose = '', conTitulo = '', conButtons = '';
        if (options.closeButton === true) { conBtnClose = '<button class="btnCF" type="button">close</button>'; }
        if (options.title !== false) { conTitulo = '<div class="gATitle"><h2>' + options.title + '</h2></div>'; }
        if (options.cancelButton === true || options.acceptButton === true) {
            conButtons = '<div class="gACBtns">';
            if (options.cancelButton === true) {
                conButtons = conButtons + '<button id="btnCancel" class="gBtn txtUp" type="button">' + options.labelCancel + '</button>';
            }
            if (options.acceptButton === true) {
                conButtons = conButtons + '<button id="btnAccept" class="gBtn txtUp" type="button">' + options.labelAccept + '</button>';
            }
            conButtons = conButtons + '</div>';
        }
        function loadBtnFunctions() {
            var btnA = $('#btnAccept'), btnC = $('#btnCancel');
            if (btnA.length) { btnA.on('click', function () { options.onAccept(); /*$.colorbox.close();*/ }); }
            if (btnC.length) { btnC.on('click', function () { options.onCancel(); $.colorbox.close(); }); }
        }
        var htmlAlert = '<div class="contFancy gAlert">' + conBtnClose + conTitulo + '<div class="gADesc">' + options.content + '</div>' + conButtons + '</div>';
        $.colorbox({
            html: htmlAlert, width: '100%', height: '100%', className: 'fContent', initialWidth: '100px', initialHeight: '100px', fixed: true, opacity: 0.8, transition: 'fade', speed: 200, fadeOut: 200, returnFocus: false, overlayClose: false, escKey: false, closeButton: false, current: false, rel: false, title: false,
            onComplete: function () {
                loadBtnsFancy('open'); toggleLoading('close'); loadBtnFunctions();
            },
            onClosed: function () {
                loadBtnsFancy('close'); options.onClosed();
            }
        });
    };
})(jQuery);
function closeAlert() {
    $.colorbox.close();
}
//Compartir facebook
function loadBtnFacebook(div) {
    var btnFacebook = $('#shareFacebook');
    if (btnFacebook.length) {
        btnFacebook.on('click', function (e) {
            e.preventDefault();
            var urlShare = $(this).data('url'), tituloShare = $(this).data('tit'), contentShare = $(this).data('des'), imgShare = $(this).data('img');
            FB.ui({ method: 'share', href: urlShare, title: tituloShare, description: contentShare, type: 'website', image: imgShare, picture: imgShare });
        });
    }
}