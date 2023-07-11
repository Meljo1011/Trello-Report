<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function list(){
    $apiKey = env('TRELLO_API_KEY');
    $token = env('TRELLO_TOKEN');
    $workspaceId = env('TRELLO_WORKSPACE_ID');

    $url = "https://api.trello.com/1/organizations/{$workspaceId}/members?key={$apiKey}&token={$token}";
    $client = new Client();
    $response = $client->get($url);

    if ($response->getStatusCode() == 200) {
        $members = json_decode($response->getBody(), true);

            foreach ($members as $member) {
                $userId = $member['id'];
                $userName = $member['fullName'];
                $avatarText = substr($userName, 0, 2);                 

            $details[] = [
                'id' => $member['id'],
                'name' => $member['fullName'],
                'profileText' =>$avatarText
             ];
        }
    } else {
        echo 'Error retrieving workspace members: ' . $response->getBody();
    }
    // dd($details);
    return view('user', ['details' => $details]);

  }
}
