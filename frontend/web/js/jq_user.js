$(document).ready(function (){
    $('.btn-fav').on('click', function (){
        if(!$(this).hasClass('btn-fav-active')){
            let product_id = $(this).data('product_id')
            $.ajax({
                'type':'POST',
                'url':'/user/add-favorite',
                'data':{'product_id':product_id},
                'success':function (res){
                    $(this).addClass('btn-fav-active')
                },
                'error':function (error){
                    console.log(error.responseText)
                }
            })
        }
    })
    $('.remove-fav-btn').on('click', function (){
        let product_id = $(this).data('product_id')

        $.ajax({
            'type':'POST',
            'url':'/user/remove-favorite',
            'data':{'product_id':product_id},
            'success':function (res){
                console.log(product_id)
                $('.product-favorite-'+res).addClass('d-none')
            },
            'error':function (error){
                console.log(error.responseText)
            }
        })
    })
})