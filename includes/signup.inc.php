<?php

    require "../Core/connect.core.php";
    require "../Helper.php";


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
        }else {
            $sql = "SELECT id, email FROM allusers WHERE email = ?";
            /* which is easier to identify a user email or id */
            $pdo = Connection::connectToDb();
            /* for everytime i need the database i don't want to make a new
            instance of the connection i only want to connect once*/
            $statement = $pdo->prepare($sql);


            if(!$statement){
                header("Location: ../signup.php?sqlerror=sqlerror");
            }
            else{
                $statement->bindParam(1 , $email );
                $statement->execute();
                $CheckResult =  $statement->FETCHAll(PDO::FETCH_ASSOC);

                if(count($CheckResult) > 0){
                    header("Location: ../signup.php?error=email already taken by another user");
                }
                else {
                    Helpers::insertToDb();

                    if(!(Helpers::$statement)){
                        header("Location: ../signup.php?error=sqlerror");
                    }else {
                        $hashpassword =  password_hash($password , PASSWORD_DEFAULT);

                        $statement->bindParam(1 , $firstname);
                        $statement->bindParam(2 , $lastname);
                        $statement->bindParam(3 , $email);
                        $statement->bindParam(4 , $Date);
                        $statement->bindParam(5 , $gender);
                        $statement->bindParam(6 , $hashpassword);
                        $statement->execute();

                        header("Location: ../login.php?signup successful");
                        exit();

                    }

                }
            }
        }
    }
    else{
        header("Location: ../signup.php");
        exit();
    }

    ?>
    <p>lololo</p>