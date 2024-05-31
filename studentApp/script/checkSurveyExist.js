
// Get form data
const formData = {
    email: localStorage.getItem('email')
};

$.post("student/api-get-survey.php", formData).then(res => {
    if (res.status === true) {
        $('.questionnaire').hide();
        $('.sub-questionnaire').hide()
        $('body').addClass("body-color")

        res.data.forEach(element => {
            updateAnswers.push(element.questionID+"radio_"+element.answer)
            selectedAnswers[element.questionID]=element.answer
        });

        
      
    } else {
        
       $('.message').hide(); 

    }
})