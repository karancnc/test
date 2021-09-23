

$('#play-video').on('click', function(e) {
    var $video = $('#video');
    src = $video.attr('src');
    $video.attr('src', src + '?autoplay=1');
    $(this).children('.video_img').css({'z-index' : 1, 'opacity': 0 });
    $(this).children('#video').css({'z-index' : 3,'opacity': 1});
    $(this).children().trigger('play');
    $(".video_box span").fadeOut()
});