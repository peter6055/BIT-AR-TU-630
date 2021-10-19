<?php
// Delete Firebase user using firebase-admin SDK
// @param string $uid: the uid of user you want to delete

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


if (isset($data["uid"])) {

    $uid = $data["uid"];

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

    echo "Successfully";
} else {
    echo "Error, missing attributes.";
}


