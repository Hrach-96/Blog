$(document).ready(function(){
    var table = $('.datatable').DataTable({
        responsive: true,
        scrollX:true,
    });

    $('.main_images').click(function () {
        $('#main_image').trigger( "click" );
    })
})