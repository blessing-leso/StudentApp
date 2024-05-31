// Submit button click event
$('.update-survey').click(function () {
    canUpdate = true
    $('.questionnaire').show();
    $('.sub-questionnaire').show()
    $('body').removeClass("body-color")
    $('.message').hide();

    
    updateAnswers.forEach(element => {
        $(`.${element}`).prop('checked', true); 
    });
    
});