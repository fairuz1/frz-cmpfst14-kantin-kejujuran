        // modal focus
        var myModal = document.getElementById('register');
        var myInput = document.getElementById('register_form');

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus();
        })

        // registerations data verification
        var register_button = document.getElementById("register_submit");
        var student_id = document.getElementById("student_id");
        var password = document.getElementById("password_register");
        var confirm_password = document.getElementById("password_confirmation");
        
        var state = false;

        //verify student id
        function verification() {
            var name = document.getElementById("student_name");

            var x = parseInt(student_id.value.substring(0, 1));
            var y =  parseInt(student_id.value.substring(1, 2));
            var z =  parseInt(student_id.value.substring(2, 3));
            var i = parseInt(student_id.value.substring(3));

            if (i != (x + y + z)) {
                document.getElementById("student_id_validation").innerHTML = `Student ID ${student_id.value} is not a valid ID`;
                password.disabled = true;
                confirm_password.disabled = true;
                state = false;
                validate();
            } else if (i === (x + y + z) && name.value !== "") {
                document.getElementById("student_id_validation").innerHTML = ` `;
                password.disabled = false;
                confirm_password.disabled = false;
                check_password();
            } else if (name.value === "") {
                password.disabled = true;
                confirm_password.disabled = true;
                state = false;
                validate();
            }
        }

        function reset_register_data() {
            register_button.disabled = true;
            state = false;
        }

        // validate data
        function validate() {
            if (state == true) {
                register_button.disabled = false;
            } else if (state == false) {
                register_button.disabled = true;
            }
        }

        // check password
        function check_password() {
            if (password.value != confirm_password.value) {
                document.getElementById("password_validation").innerHTML = "Password need to be the same!";
                state = false;
            } else {
                document.getElementById("password_validation").innerHTML = " ";
                state = true;
            }
            validate_password_security();
            validate();
        }

        // check password security
        function validate_password_security() {
            if (password.value.length < 8) {
                document.getElementById("password_validation").innerHTML = "Password must at least contain 8 characters!";
                state = false;
            } else if (isNaN(Number(password.value)) == false) {
                document.getElementById("password_validation").innerHTML = "Password must at least contain 1 letter!";
                state = false;
            } else {
                var data = password.value;
                var temp_state = false;
                for (let i = 0; i < data.length; i++) {
                    if (isNaN(data[i]) == false) {
                        document.getElementById("password_validation").innerHTML = " ";
                        temp_state = true;
                        break;
                    }    
                }
                if (temp_state == false) {
                    document.getElementById("password_validation").innerHTML = "Password must at least contain 1 Number!";
                    state = false;
                } else {
                    if (password.value != confirm_password.value) {
                        document.getElementById("password_validation").innerHTML = "Password need to be the same!";
                        state = false;
                    } else {
                        document.getElementById("password_validation").innerHTML = " ";
                        state = true;
                    }
                }
            }
        }

        // login data verification
        var login_button = document.getElementById("login_submit");
        var student_id_login = document.getElementById("student_id_login");
        var password_login = document.getElementById("password_login");
        var state_login = false;

        function login_verification() {
            var x = parseInt(student_id_login.value.substring(0, 1));
            var y = parseInt(student_id_login.value.substring(1, 2));
            var z = parseInt(student_id_login.value.substring(2, 3));
            var i = parseInt(student_id_login.value.substring(3));

            if (i != (x + y + z)) {
                document.getElementById("student_login_id_validation").innerHTML = `Student ID is not a valid ID`;
                password.disabled = true;
                confirm_password.disabled = true;
                state_login = false;
                validate_login();
            } else if (i === (x + y + z) && password_login.value !== "") {
                document.getElementById("student_login_id_validation").innerHTML = ` `;
                password.disabled = false;
                confirm_password.disabled = false;
                state_login = true;
                validate_login();
            } else if (password_login.value === "") {
                password.disabled = true;
                confirm_password.disabled = true;
                state_login = false;
                validate_login();
            }
        }

        function reset_login_data() {
            login_button.disabled = true;
        }

        function validate_login() {
            if (state_login == true) {
                login_button.disabled = false;
            } else if (state_login == false) {
                login_button.disabled = true;
            }
        }