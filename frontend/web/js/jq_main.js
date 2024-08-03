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

    let slide = $('.slide');
    let slide_length = slide.length;
    let active_slide = 0;


    if(slide_length){
        roughness_slide()
    }

    function roughness_slide(){
        slide[active_slide].classList.add('active-slide')
    }
    function remove_slide(){
        slide[active_slide].classList.remove('active-slide')
    }

    $('.slider-pre').on('click', function (){
        remove_slide()
        if(active_slide-1 >= 0){
            active_slide -= 1;
        }else {
            active_slide = slide_length-1;
        }
        roughness_slide()
    })
    $('.slider-nex').on('click', function (){
        remove_slide()
        if(active_slide+1 <= slide_length-1){
            active_slide += 1;
        }else {
            active_slide = 0;
        }
        roughness_slide()
    })

    $('.mini-slide').on('click', function (){
        remove_slide()
        let id = $(this).data('id');
        let sliders = $('.slide');
        for (let i=0; i <=sliders.length-1; i++){
            if(sliders[i].getAttribute('data-id')==id){
                active_slide = i;
                roughness_slide();
            }
        }
    })
    $('.logout-profile-btn').on('click', function (){
        $('.logout-menu-container').addClass('d-flex')
    })
    $('.align-items-center').on('click', function (){
        $('.logout-menu-container').removeClass('d-flex')
    })
})