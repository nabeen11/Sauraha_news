jQuery(document).ready(function($) {
    jQuery(".button-holder").on('click', '.btn', function(event) {
        event.preventDefault();

        var dataOffset = $("#append-news").data("offset");
        // var postPerPage = $("#append-news").data("postperpage");
        var title = $("#append-news").data("title");
        var dataType = $("#append-news").data("type");
        var data = {

            'action': 'get_additional_news',

            'offset': dataOffset,

            'title': title,

            'type': dataType


        }
        console.log(data);
        jQuery.post(ajax_object.ajax_url, data, function(response) {
            datas = JSON.parse(response);
            var count = 0;
            if (datas['data'] != 0) {
                jQuery.each(datas['data'], function(index, data) {
                    var htmlToAdd = '';

                    htmlToAdd += '<div class="col-md-4 col-sm-6 col-xs-6">';
                    htmlToAdd += '<div class="news">';
                    htmlToAdd += '<a href="' + data.permalink + '"><fig style="background-image: url(' + data.image + ')"></fig></a>';
                    htmlToAdd += '<div class="news-info">';
                    htmlToAdd += '<span>' + data.date + '</span>';
                    htmlToAdd += ' <h3><a href="' + data.permalink + '">' + data.title + '</a></h3>';
                    htmlToAdd += '<p>' + data.content + '</p>';
                    htmlToAdd += '</div></div></div>';

                    jQuery("#append-news").append(htmlToAdd);
                    htmlToAdd = '';
                    count++;
                    // if (count === 3)
                    //     jQuery("#append-news").append('<div class = "clearfix"></div>');

                });

                var num = data.offset;

                // parseInt(datas['offset']);

                num = num + count;
                $("#append-news").data("offset", num);
                if (totalData - num < 0) {
                    jQuery(".button-holder").hide();
                }

            } else {
                jQuery(".button-holder").hide();
            }
        })
    })
})