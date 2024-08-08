$(document).ready(function (){
    $('.btn-delete').on('click', function (){
        let id = $(this).data('id')
        $('.delete-panel-'+id).css({'display':'flex'})
    })
    $('.close-delete-panel').on('click',function (){
        let id = $(this).data('id')
        $('.delete-panel-'+id).css({'display':'none'})
    })
})