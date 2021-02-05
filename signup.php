<?php
    require "Display/partials/header.php";
?>

<DOCTYPE html>

    <html lang="en">

    <body>
        <form class="form-group" action="includes/signup.inc.php" method="POST">
            <label class="control-label d-inline-flex">
                <input type="text" class="form-control" name="firstname" placeholder="firstname">
                <input type="text" class="form-control" name="lastname" placeholder="lastname">
            </label>

            <label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </label>

            <label>
                <input type="date" class="form-control" name="Date" placeholder="DOB">
            </label>

            <label>
                <input type="text" class="form-control dropdown" name="gender"  placeholder="Gender">
<!--               how to do dropdown for an input-->
            </label>

            <label class="control-label d-inline-flex">
                <input type="text" class="form-control" name="password" placeholder="password">
                <input type="text" class="form-control" name="passwordConfirmation" placeholder="passwordConfirmation">
            </label>


            <label class="">
                I accept <a href="TaR.html">Terms and regulation</a>
                <input type="checkbox" class="form-check-input">
            </label>

            <button type="submit" name="signup" class="btn btn-outline-primary">Sign up</button>
        </form>

    </body>


    </html>
