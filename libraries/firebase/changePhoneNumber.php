<?php
// Change user's phone numbers using firebase-admin SDK
// @param string $uid: the uid of user you want to modify
// @param string $uid: the new phone number (need to be in +614XXXXXXXX format)

ini_set( "display_errors", 1 );
error_reporting( E_ALL );

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

$data = json_decode(file_get_contents('php://input'), true);
//print_r($data);


if (isset($data["uid"]) && isset($data["newPhoneNumber"])) {

    $uid = $data["uid"];
    $newPhoneNumber = $data["newPhoneNumber"];


    $factory = (new Factory)->withServiceAccount(realpath("/credentials.json"));
    $auth = $factory->createAuth();

    try {
        $properties = [
            'phoneNumber' => $newPhoneNumber
        ];
        $updatedUser = $auth->updateUser($uid, $properties);
    } catch (\Kreait\Firebase\Exception\AuthException $e) {
        echo 'Error, there are no match uid founded.';
        return false;
    }
//    Guide in the document but not using
//    $request = \Kreait\Auth\Request\UpdateUser::new() ->withPhoneNumber($newPhoneNumber);
//    $updatedUser = $auth->updateUser($uid, $request);

    echo "Successfully";
} else {

    echo "Error, missing attributes.";
}


