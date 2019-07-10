$(document).ready(function(){
    var table = $('.datatable').DataTable({
        responsive: true,
        scrollX:true,
    });

    $('.main_images').click(function () {
        $('#main_image').trigger( "click" );
    })


    $(document).on('click','.GalleryUpdate',function () {
        $(this).parents('.col-md-3').find('.product_gallery').trigger( "click" );
    })

    $(document).on('change','.product_gallery',function () {
        var token = $('meta[name="token"]').attr('content');
        var id = $(this).parent().find('.GalleryImage').attr('data-id')

        var data = new FormData;
        data.append('image_for_gallery', $(this)[0].files[0]);
        data.append('id', id);
        data.append('_token', token);

        var url = $('meta[name="url"]').attr('content');
        var _this = this;
        $.ajax({
            type:'post',
            url: url+'/admin/GalleryUpdate',
            data:data,
            processData: false,
            contentType: false,
            success: function(r){
                if (r.success) {
                    var image = $(_this).parent().find('.GalleryImage')
                    image.hide("slow", function(){ image.attr('src',url+"/images/product_gallery/"+r.image) })
                    image.show("slow")
                    toastr.success('success')
                }else{
                    toastr.error('something is wrong');
                }
            }
        })
    })


    $(document).on('click','.GalleryRemove',function () {
        var id = $(this).parents('.col-md-3').find('.GalleryImage').attr('data-id')
        var token = $('meta[name="token"]').attr('content');
        var url = $('meta[name="url"]').attr('content');
        var _this = this;
        $.ajax({
            type:'post',
            url: url+'/admin/GalleryRemove',
            data:{id:id,_token:token},
            success: function(r){
                if (r.success) {
                    toastr.success('success')
                    var target = $(_this).parents('.col-md-3')
                    target.hide("slow", function(){ target.remove(); })
                }else{
                    toastr.error('something is wrong');
                }
            }
        })
    })






})