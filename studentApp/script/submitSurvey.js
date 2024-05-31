// Submit button click event
$('#submit').click(function () {

    var size = Object.keys(selectedAnswers).length
    if (questions.length !== size) {
        return alert("Please Answer All Questions")
    }

    var data = [];

    Object.keys(selectedAnswers).forEach(e => {
        data.push({ "question": e, answer: selectedAnswers[e] })
    })

    const formData = {
        email: localStorage.getItem('email'),
        questions: data
    };


    if (canUpdate === false) {
        $.post("student/api-fill-survey.php", formData).then(res => {

            if (res.status === true) {
                alert(res.message)
                window.location.replace('index.html');
            } else {
                alert(res.message)
            }
        })

    }
    else{
        $.post("student/api-fill-update-survey.php", formData).then(res => {

            if (res.status === true) {
                alert(res.message)
                window.location.replace('index.html');
            } else {
                alert(res.message)
            }
        })
    }





    // var size = Object.keys(selectedAnswers).length
    // if (questions.length !== size) {
    //     return alert("Please Answer All Questions")
    // }
    // console.log(selectedAnswers);
    // You can perform further actions with the selected answers here
});