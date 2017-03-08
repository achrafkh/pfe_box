<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repo\IFacebookRepository;

class TestController extends Controller
{
    protected $app_secret;
    protected $app_id;

    public function __construct(IFacebookRepository $facebook)
    {
        $this->app_secret = env('APP_SECRET');
        $this->app_id = env('APP_ID');
        $this->facebook = $facebook;
    }

    public function index(Request $request)
    {
        $pageid = '1450916951844506';

        

        $formid='887963111346537';


        $short_access= $request->access;

        
        $access_token = $this->facebook->getToken($short_access);

        //dd($this->facebook->getForms($pageid, $access_token));

        dd($this->facebook->getLeads($access_token, $formid));
    }


    public function test(Request $request)
    {
        session_start();
        $fb = new \Facebook\Facebook();

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email', 'user_likes']; // optional
        $loginUrl = $helper->getLoginUrl('http://700338b2.ngrok.io/fb2', $permissions);

        echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
    }

    public function test2(Request $request)
    {
        session_start();
        $fb = new \Facebook\Facebook();

        $helper = $fb->getRedirectLoginHelper();
        $_SESSION['FBRLH_state']=$request->state;
        try {
            $accessToken = $helper->getAccessToken();
            dd($accessToken);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {
            // Logged in!
            $_SESSION['facebook_access_token'] = (string) $accessToken;

            dd($accessToken);
        }
    }
}
