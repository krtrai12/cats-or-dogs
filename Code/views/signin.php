<?php require('header.php'); ?>
    <body>
        <header>
            <h1>SIGN IN</h1>
        </header>
        <div id='container'>
            <fieldset>
                <input type='text' name='username' placeholder='username'>
                <input type='text' name='password' placeholder='password'>
                <ul>
                    <li><a href='main.php'></a>SIGN IN</li>
                    <li><a href='login.php'></a>Back</li>
                </ul>
            </fieldset>
        </div>
        <?php require('footerSignedOut.php'); ?>