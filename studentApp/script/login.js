
function redirect_page() {
    if (localStorage.getItem('email')) {
        window.location.replace('index.html');
    }
}

redirect_page();

$(document).ready(function () {

    $('#loginForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Get form data
        const formData = {
            email: $('#email').val(),
            password: $('#password').val()
        };

        $.post("student/api-login.php", formData).then(res => {
            if (res.status === true) {
                localStorage.setItem('email',formData.email)
                redirect_page();
            } else {
                alert(res.message)
            }
        })
    })

})

