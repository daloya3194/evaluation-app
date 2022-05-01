function verifyImage(image_id, submit_url, next_question) {
    let form_data = new FormData();
    form_data.append('_token', $('input[name="_token"]').val());
    form_data.append('question_id', $('#question_id').val());
    form_data.append('participant_id', $('#participant_id').val());
    form_data.append('image_id', image_id);
    form_data.append('next_question', next_question);
    $.ajax({
        url: submit_url,
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (result) {
            if (result.response) {
                if (parseInt(next_question) === 1) {
                    window.location.href = $('#route_ready_to_start').val()
                } else if (parseInt(next_question) === 7){
                    window.location.href = $('#route_ready_to_start').val()
                } else if (parseInt(next_question) === 13) {
                    window.location.href = $('#ending').val()
                } else {
                    window.location.href = result.url
                }
            } else {
                const error_div = $('#error')
                error_div.removeClass('hidden')
                setTimeout(function () {
                    error_div.addClass('hidden')
                }, 1000)
            }
        }
    })
}
