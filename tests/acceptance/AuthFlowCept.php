<?php

$I = new AcceptanceTester($scenario);

$I->wantTo("Register and Login");

$I->amOnPage("/");
$I->see("Register");
$I->click("Register");

$I->fillField("name", "Code Cept");
$I->fillField("email", "codecept@gmail.com");
$I->fillField("password", "password");
$I->fillField("password_confirmation", "password");
$I->click("#registerBtn");

$I->amOnPage("/");
$I->see("Login");
$I->click("Login");
$I->fillField("email", "codecept@gmail.com");
$I->fillField("password", "password");
$I->click("#loginBtn");

$I->see("Logged in as: Code Cept");
