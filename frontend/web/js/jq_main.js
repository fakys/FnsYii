$(document).ready(function (){
    $('.close-btn-navbar').on('click', function (){
        $('.main-navbar-container').removeClass('open-navbar')
        $('.main-navbar-background').css({'display':'none'})
    })
    $('.btn-catalog-header').on('click', function (){
        $('.main-navbar-container').addClass('open-navbar')
        $('.main-navbar-background').css({'display':'block'})
    })

})