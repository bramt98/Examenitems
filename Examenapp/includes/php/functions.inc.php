<?php

//Function to check if password is to short
function passwordToShort($password): bool
{
    return strlen($password) < 8;
}

//Function to check if fields are empty
function emptyFields($userName, $userEmail, $password, $repeatPassword): bool
{
    return (empty($userName) || empty($userEmail) || empty($password)  || empty($repeatPassword));
}

//Function to check if password repeat isn't correct
function wrongRepeat($password, $repeatPassword): bool
{
    return $password !== $repeatPassword ;
}

