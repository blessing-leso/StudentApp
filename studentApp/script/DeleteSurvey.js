// Submit button click event
$('#delete-survey').click(function () {


    const formData = {
        email: localStorage.getItem('email'),
    };

    $.post("student/api-delete-survey.php", formData).then(res => {

        if (res.status === true) {
            alert(res.message)
            window.location.replace('index.html');
        } else {
            alert(res.message)
        }
    })

});