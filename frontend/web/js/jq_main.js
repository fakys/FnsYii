$(document).ready(function (){
    $('.main-navbar-container').on('click', function (){
        $('.main-navbar-container').removeClass('open-navbar')
        $('.main-navbar-background').css({'display':'none'})
    })
    $('.close-btn-navbar').on('click', function (){
        $('.main-navbar-container').removeClass('open-navbar')
        $('.main-navbar-background').css({'display':'none'})
    })
    $('.btn-catalog-header').on('click', function (){
        $('.main-navbar-container').addClass('open-navbar')
        $('.main-navbar-background').css({'display':'block'})
    })

})