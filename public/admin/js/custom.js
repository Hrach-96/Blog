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

    $('.GalleryAdd').click(function () {
        $('#product_gallery_add').trigger( "click" );
    })

    $(document).on('change','#product_gallery_add',function () {
        var token = $('meta[name="token"]').attr('content');
        var id = $('input[name="id"]').val()
        var data = new FormData;
        for (var i = 0; i < $(this)[0].files.length; i++) {
            data.append('images_for_gallery[]', $(this)[0].files[i]);
        }
        data.append('_token', token);
        data.append('id', id);

        var url = $('meta[name="url"]').attr('content');
        var _this = this;
        $(this).val('')
        $.ajax({
            type:'post',
            url: url+'/admin/GalleryAdd',
            data:data,
            processData: false,
            contentType: false,
            success: function(r){
                if (r.success) {
                    for (var i = 0; i < r.images.length; i++) {
                        var content = `
                            <div class="col-md-3" style="display: none">
                                <input type="file"  class="hidden product_gallery">
                                <img src="${url}/images/product_gallery/${r.images[i]}" class="GalleryImage" data-id="${r.ids[i]}">
                                <div class="float-right">
                                    <i class="fa fa-upload text-info cursor_pointer GalleryUpdate" aria-hidden="true"></i>
                                    <i class="fa fa-remove text-danger mr-1 ml-2 cursor_pointer GalleryRemove" aria-hidden="true"></i>
                                </div>
                            </div>
                        `
                        var div = $(content)
                        $('.GalleryAdd').before(div)
                        div.show("slow")
                    }
                    toastr.success('success')
                }else{
                    toastr.error('something is wrong');
                }
            }
        })
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
        $(this).val('')
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