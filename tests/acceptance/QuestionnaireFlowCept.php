<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo("create a questionnaire after logging in");

$I->amOnPage("/");
$I->see("Login");
$I->click("Login");
$I->fillField("email", "codecept@gmail.com");
$I->fillField("password", "password");
$I->click("#loginBtn");

$I->amOnPage("/");
$I->see("Create a new questionnaire");
$I->click("#createNewQuestionnaireBtn");

$I->see("Create a questionnaire");
$I->fillField("title", "Code Cept - Test");
$I->fillField("description", "This questionnaire is for testing purposes.");
$I->click("#createQuestionnaireBtn");

$I->see("Code Cept - Test");
$I->see("View as admin");
$I->see("Questions");