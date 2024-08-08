$(document).ready(function (){
    $('.remove-fav-btn').on('click', function (){
        let product_id = $(this).data('product_id')
        $.ajax({
            'type':'POST',
            'url':'/user/remove-favorite',
            'data':{'product_id':product_id},
            'success':function (res){
                $('.product-favorite-'+product_id).addClass('d-none')
            },
            'error':function (error){
                console.log(error.responseText)
            }
        })
    })

    $('.btn-fav').on('click', function (){
        let btn = $(this)
        let product_id = $(this).data('product_id')

        $.ajax({
            'type':'POST',
            'url':'/user/add-favorite',
            'data':{'product_id':product_id},
            'success':function (){
                btn.prev().removeClass('d-none')
                btn.addClass('d-none')
            },
            'error':function (error){
                console.log(error.responseText)
            }
        })
    })

    $('.btn-fav-active').on('click', function (){
        let btn = $(this)

        let product_id = $(this).data('product_id')
        $.ajax({
            'type':'POST',
            'url':'/user/remove-favorite',
            'data':{'product_id':product_id},
            'success':function (res){
                btn.next().removeClass('d-none')
                btn.addClass('d-none')
            },
            'error':function (error){
                console.log(error.responseText)
            }
        })
    })

})