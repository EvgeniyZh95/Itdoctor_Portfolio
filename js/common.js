$(document).ready(function () {
    /*Инициализация swiper*/
    var swiper1 = new Swiper('#swiperOne', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        parallax: true,
        speed: 600,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 13000,
        autoplayDisableOnInteraction: false,
        loop: true
    });
    /*Инициализация swiper2 команда*/
    var swiper2 = new Swiper('#swiperTwo', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        speed: 1000,
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        autoplay: 0
    });
    /*Плавный скролл по id*/
    $(function () {
        $('a[href^="#"]').on('click', function (event) {
            event.preventDefault();
            var sc = $(this).attr("href"),
                dn = $(sc).offset().top - 80;
            $('html, body').animate({
                scrollTop: dn
            }, 500);
        });
    });
    /*Галерея с портфолио*/
    $(".item").magnificPopup({
        type: 'image',
        tLoading: 'Загрузка изображения №%curr%',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
        }
    });
    /*Навигация при скроле*/
    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
        target: '#mainNav',
        offset: 85
    });
    /*ajax отправка формы задать вопрос*/
    $("#form1").submit(function () {
        $.ajax({
            type: "POST",
            url: "libs/fiedback/send.php",
            data: $("#form1").serialize()
        }).done(function () {
            if (($('#capcha').val()) === "56") alert("Спасибо за заявку.");
            else alert("Вы не правильно ответили на вопрос");
        });
        return false;
    });
    /*ajax отправка формы заказ услуги*/
    $("#form2").submit(function () {
        $.ajax({
            type: "POST",
            url: "libs/fiedback/recall.php",
            data: $("#form2").serialize()
        }).done(function () {
            if (($('#capcha2').val()) === "18") alert("Спасибо за заявку! В ближайшее время с вами свяжится наш сециалист.");
            else alert("Вы не правильно ответили на вопрос");
        });
        return false;
    });
});