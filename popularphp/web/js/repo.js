$(document).ready(function() {

    $('#fetch-more').click(function() {
        event.preventDefault();

        $.ajax({
            url: '/repo/refresh-repo-list',

            success: function(json, textStatus, jqXHR) {
                location.reload();
            },

            beforeSend: function(jqXHR, settings) {
                $('#fetch-more').attr('disabled', 'disabled');
                $('#loading-gif').show();
            },

            complete: function(jqXHR, textStatus) {
                $('#loading-gif').hide();
                $('#fetch-more').removeAttr('disabled');
            },

            error: function(jqXHR, textStatus, errorThrown) {
                $('#loading-gif').hide();
                $('#fetch-more').removeAttr('disabled');
                alert('Whoops! Try again later.');
            }
        });
    });
});
