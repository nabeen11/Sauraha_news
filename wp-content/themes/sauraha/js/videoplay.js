jQuery(".video-list").click(function(event) {
    event.preventDefault();
    jQuery(".video-list-img-wrap").find('#playing').html('');
    jQuery(this).closest(".video-list-img-wrap").find('#playing').html('Now playing');
    var id = jQuery(this).data("id");
    var title = jQuery(this).find('.video-list-content').html();
    jQuery('.video-list-content').html(title);
    jQuery("#bussinessplus-video").attr("src", "https://www.youtube.com/embed/" + id + "?autoplay=1");
});