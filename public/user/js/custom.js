$(document).ready(function () {
    $('.SeeMore').click(function () {
        var url = decodeURIComponent($(this).attr('data_url'));
        var page = url.replace('#', '')
        page = page.split("page=")[1];
        var _this = this;
        $.ajax({
            type:'get',
            url: url,
            success: function(r){
                $('.more_content').append(r);
                $('.more_content>div').show('slow')
                if ($(_this).attr('count') == page) {
                    $(_this).remove()
                }else{
                    $(_this).attr('data_url',url.replace(page,Number(page)+1))
                }
            }
        })
    })

    $('.SeeMoreNew').click(function () {
        var url = decodeURIComponent($(this).attr('data_url'));
        var page = url.replace('#', '')
        page = page.split("page=")[1];
        var _this = this;
        $.ajax({
            type:'get',
            url: url,
            data:{new:true},
            success: function(r){
                $('.more_content_new_pr').append(r);
                $('.more_content_new_pr>div').show('slow')
                if ($(_this).attr('count') == page) {
                    $(_this).remove()
                }else{
                    $(_this).attr('data_url',url.replace(page,Number(page)+1))
                }
            }
        })
    })
})