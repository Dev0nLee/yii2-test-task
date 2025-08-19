$(document).ready(function() {
    $('.topic-item').click(function() {
        $('.topic-item').removeClass('active');
        $(this).addClass('active');
        var topicId = $(this).data('id');
        $.ajax({
            url: (window.appRoutes && window.appRoutes.undertopics) || 'index.php?r=site/undertopics',
            data: {topic_id: topicId},
            success: function(data) {
                $('#undertopics').html(data);
                var $firstSub = $('#undertopics .subtopic-item').first();
                if ($firstSub.length) {
                    $('.subtopic-item').removeClass('active');
                    $firstSub.addClass('active');
                    var initialSubId = $firstSub.data('id');
                    $.ajax({
                        url: (window.appRoutes && window.appRoutes.content) || 'index.php?r=site/content',
                        data: {undertopic_id: initialSubId},
                        success: function(contentHtml) {
                            $('#content').html(contentHtml);
                        }
                    });
                } else {
                    $('#content').html('');
                }
            }
        });
    });

    $(document).on('click', '.subtopic-item', function() {
        $('.subtopic-item').removeClass('active');
        $(this).addClass('active');
        var subtopicId = $(this).data('id');
        $.ajax({
            url: (window.appRoutes && window.appRoutes.content) || 'index.php?r=site/content',
            data: {undertopic_id: subtopicId},
            success: function(data) {
                $('#content').html(data);
            }
        });
    });


    var $firstTopic = $('#topics .topic-item').first();
    if ($firstTopic.length) {
        $('.topic-item').removeClass('active');
        $firstTopic.addClass('active');
        var initialTopicId = $firstTopic.data('id');
        $.ajax({
            url: (window.appRoutes && window.appRoutes.undertopics) || 'index.php?r=site/undertopics',
            data: {topic_id: initialTopicId},
            success: function(data) {
                $('#undertopics').html(data);
                var $firstSub = $('#undertopics .subtopic-item').first();
                if ($firstSub.length) {
                    $('.subtopic-item').removeClass('active');
                    $firstSub.addClass('active');
                    var initialSubId = $firstSub.data('id');
                    $.ajax({
                        url: (window.appRoutes && window.appRoutes.content) || 'index.php?r=site/content',
                        data: {undertopic_id: initialSubId},
                        success: function(contentHtml) {
                            $('#content').html(contentHtml);
                        }
                    });
                } else {
                    $('#content').html('');
                }
            }
        });
    }
});