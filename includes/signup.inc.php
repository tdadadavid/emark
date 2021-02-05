<?php


use Cassandra\Date;

if (isset($_POST['signup'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $Date = $_POST['Date'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $passwordConfirmation = $_POST['passwordConfirmation'];

        if(empty($firstname) || empty($lastname) || empty($email) || empty($Date) || empty($gender) || empty($password) || empty($passwordConfirmation)){
            header("Location: ../signup.php?error=emptyFields&firstname=" . $firstname . "&lastname=" . $lastname . "&email=" . $email . "&Date=" . $Date . "&gender=" . $gender . "&password=" . $password);
            exit();
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=InvalidEmail&firstname=" . $firstname . "&lastname=" .$lastname . "&gender=" . $gender);
            exit();
        }
        else if ($password != $passwordConfirmation){
            header("Location: ../signup.php?error=Passwords don't match&email=" . $email ."&lastname=" . $lastname);
            exit();
        }

    }