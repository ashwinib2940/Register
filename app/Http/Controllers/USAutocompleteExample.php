<?php
namespace App\Http\Controllers;

require_once('C:\xampp\htdocs\register\vendor\smartystreets-php-sdk-master\src\StaticCredentials.php');
require_once('C:\xampp\htdocs\register\vendor\smartystreets-php-sdk-master\src\ClientBuilder.php');
require_once('C:\xampp\htdocs\register\vendor\smartystreets-php-sdk-master\src\US_Autocomplete\Lookup.php');
require_once('C:\xampp\htdocs\register\vendor\smartystreets-php-sdk-master\src\US_Autocomplete\Client.php');
use SmartyStreets\PhpSdk\StaticCredentials;
use SmartyStreets\PhpSdk\ClientBuilder;
use SmartyStreets\PhpSdk\US_Autocomplete\Lookup;

// $lookupExample = new USAutocompleteExample();
// $lookupExample->run();

class USAutocompleteExample extends Controller{

    public function run() {
        $authId = '3e6b381e-144a-bef9-9d95-c6b9b251f219';
        $authToken = 'yTGXWJbbwQ77KUHWIzq8';

        // We recommend storing your secret keys in environment variables instead---it's safer!
//        $authId = getenv('SMARTY_AUTH_ID');
//        $authToken = getenv('SMARTY_AUTH_TOKEN');

        $staticCredentials = new StaticCredentials($authId, $authToken);
        $client = (new ClientBuilder($staticCredentials))->buildUSAutocompleteApiClient();

        // Documentation for input fields can be found at:
        // https://smartystreets.com/docs/cloud/us-autocomplete-api

        $lookup = new Lookup("4770 Lincoln Ave O");
          
        $client->sendLookup($lookup);

        echo("*** Result with no filter ***");
        echo("\n");
        foreach ($lookup->getResult() as $suggestion)
            echo($suggestion->getText() . "\n");

        $lookup->addCityFilter("Ogden");
        $lookup->addStateFilter("IL");
        $lookup->addPrefer("Ogden, IL");
        $lookup->setPreferRatio(0.333333);
        $lookup->setMaxSuggestions(5);

        $client->sendLookup($lookup);

        echo("\n");
        echo("*** Result with some filters ***\n");
        foreach($lookup->getResult() as $suggestion)
            echo($suggestion->getText() . "\n");
    }
}