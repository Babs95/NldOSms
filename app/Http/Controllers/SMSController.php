<?php

namespace App\Http\Controllers;

use \Osms\Osms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SMSController extends Controller
{
    public function sendSMSOrange(Request $request) {
        $config = array(
            'clientId' => Config::get('orange-sms.myClientId'),
            'clientSecret' => Config::get('orange-sms.myClientSecret')
        );

        $osms = new Osms($config);
        // retrieve an access token
        $response = $osms->getTokenFromConsumerKey();

        //echo"request".$request->get('tel');
        //echo"request".$request->get('message');

        if (!empty($response['access_token'])) {
            $senderAddress = 'tel:+221771440292';
            $receiverAddress = 'tel:+221'.$request->get('tel');
            $message = $request->get('message');
            $senderName = 'SNUMARKET';

            $osms->sendSMS($senderAddress, $receiverAddress, $message, $senderName);

            return response('Sms send successfully', 200);
        } else {
            return response('Sms send failed', 422);
        }
    }

    // public function send(){
    //     //Send SMS
    //     $credentials = [
    //         'client_id' => 'UBBqLQPhYHxUm8PWActauCAdTXJnjAjn',
    //         'client_secret' => '0cfg1FtD5HAGKkT2'
    //     ];

    //     /*
    //     You can use directly authorization header instead of client_id and client_secret
    //     $credentials = [
    //         'authorization_header' => 'Basic xxx...',
    //     ];
    //     */
    //     $version = 'v3'; //per default

    //     $sms = new OrangeSDK($credentials);
    //     $data = $sms->message('Hello World!', $version)
    //         ->from(221771440292)       // Sender phone's number
    //         ->as('Senschool')      // Sender's name (optional)
    //         ->to(221771440291)      // Recipiant phone's number 773022150 778538538
    //         ->send();
    //         return response()->json($data, '200');
    // }
}
