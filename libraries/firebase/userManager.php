<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

echo "Please pass in a specific function and parse in value";

// Delete Firebase user using firebase-admin SDK
// @param string $uid: the uid of user you want to delete
function deleteUser($uid){
    $factory = (new Factory)->withServiceAccount(realpath("/credentials.json"));
    $auth = $factory->createAuth();

    try {
        $auth->deleteUser($uid);
    }catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        echo $e->getMessage();
        return false;

    } catch (\Kreait\Firebase\Exception\AuthException $e) {
        echo 'Deleting';
        return false;

    }

    return true;
}


// Change user's phone numbers using firebase-admin SDK
// @param string $uid: the uid of user you want to modify
// @param string $uid: the new phone number (need to be in +614XXXXXXXX format)
function changePhoneNumber($uid, $newPhoneNumber){
    $factory = (new Factory)->withServiceAccount(realpath("/credentials.json"));
    $auth = $factory->createAuth();

    try {
        $properties = [
            'phoneNumber' => $newPhoneNumber
        ];
        $updatedUser = $auth->updateUser($uid, $properties);
    } catch (\Kreait\Firebase\Exception\AuthException $e) {
        echo 'Deleting';
        return false;
    }
//    Guide in the document but not using
//    $request = \Kreait\Auth\Request\UpdateUser::new() ->withPhoneNumber($newPhoneNumber);
//    $updatedUser = $auth->updateUser($uid, $request);

    return true;
}