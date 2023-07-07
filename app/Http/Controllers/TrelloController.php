<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TrelloController extends Controller
{
    public function dash()
    {
        return view('welcome');
    }
    public function getReport()
    {
        $apiKey = env('TRELLO_API_KEY');
        $token = env('TRELLO_TOKEN');
        $workspaceId = env('TRELLO_WORKSPACE_ID');

        $workspaceUrl = "https://api.trello.com/1/organizations/{$workspaceId}?key={$apiKey}&token={$token}";
        $client = new Client();
        $workspaceResponse = $client->get($workspaceUrl);

        if ($workspaceResponse->getStatusCode() == 200) {
            $workspace = json_decode($workspaceResponse->getBody(), true);
            $workspaceName = $workspace['displayName'];
        } else {
            echo 'Error retrieving workspace details: ' . $workspaceResponse->getBody();
        }


        $url = "https://api.trello.com/1/organizations/{$workspaceId}/members?key={$apiKey}&token={$token}";
        $client = new Client();
        $response = $client->get($url);

        if ($response->getStatusCode() == 200) {
            $members = json_decode($response->getBody(), true);
            // dd($members);
                foreach ($members as $member) {
                    $userId = $member['id'];
                    $userName = $member['fullName'];

                    // $url = "https://api.trello.com/1/members/{$userId}?key={$apiKey}&token={$token}";
                    // $client = new Client();
                    // $userData = json_decode($response->getBody(), true);
                    // if (isset($userData['avatarUrl'])) {
                    //     $profileIconUrl = $userData['avatarUrl'];
                    //     echo "<img src=\"{$profileIconUrl}\" alt=\"Profile Icon\">";
                    // } else {
                    //     echo 'No avatar URL found for the user.';
                    // }
                    
                    


                $details[] = [
                    'id' => $member['id'],
                    'name' => $member['fullName'],
                    'taskcount' => 0,
                    'workspaceName' => $workspaceName,
                    // 'profileIconUrl' => $userData['avatarUrl']
                 ];
                $tasksUrl = "https://api.trello.com/1/members/{$userId}/cards?key={$apiKey}&token={$token}";
                $tasksResponse = $client->get($tasksUrl);

                if ($tasksResponse->getStatusCode() == 200) {
                    $tasks = json_decode($tasksResponse->getBody(), true);

                    $taskCount = count($tasks);
                    $details[count($details) - 1]['taskCount'] = $taskCount;
                    $taskNames = array_column($tasks, 'name');
                } else {
                    echo "Error retrieving tasks for {$userName}: " . $tasksResponse->getBody() . "\n";
                }
            }
        } else {
            echo 'Error retrieving workspace members: ' . $response->getBody();
        }
    
        // dd($details,$taskNames);

        return view('count', ['details' => $details, 'taskNames' => $taskNames]);
    }
    public function due()
    {
        $apiKey = env('TRELLO_API_KEY');
        $token = env('TRELLO_TOKEN');
        $workspaceId = env('TRELLO_WORKSPACE_ID');

        $url = "https://api.trello.com/1/organizations/{$workspaceId}/members?key={$apiKey}&token={$token}";

        $client = new Client();
        $response = $client->get($url);
        $members = json_decode($response->getBody(), true);

        foreach ($members as $member) {
            $userId = $member['id'];
            $userName = $member['fullName'];
            $overdueCards = [];

            $tasksUrl = "https://api.trello.com/1/members/{$userId}/cards?key={$apiKey}&token={$token}";
            $tasksResponse = $client->get($tasksUrl);

            if ($tasksResponse->getStatusCode() == 200) {
                $tasks = json_decode($tasksResponse->getBody(), true);
                foreach ($tasks as $task) {
                    if ($task['due'] !== null) {
                        $dueDate = strtotime($task['due']);
                        $currentDate = time();
                        if ($dueDate < $currentDate) {
                            $overdueCards[] = [
                                'name' => $task['name'],
                                'due' => $task['due'],
                                'member' => $userName
                            ];
                        }
                    }
                }
            } else {
                echo "Error retrieving tasks for {$userName}: " . $tasksResponse->getBody() . "\n";
            }
        }
        // dd($overdueCards);

        return view('due', ['taskNames' => $overdueCards]);
    }
    public function workspacelist()
    {
        $apiKey = env('TRELLO_API_KEY');
        $token = env('TRELLO_TOKEN');
        $workspaceId = env('TRELLO_WORKSPACE_ID');

        $url = "https://api.trello.com/1/organizations/{$workspaceId}/members?key={$apiKey}&token={$token}";

        $client = new Client();
        $response = $client->get($url);

        $members = json_decode($response->getBody(), true);
        if ($response->getStatusCode() == 200) {
            $members = json_decode($response->getBody(), true);
            foreach ($members as $member) {
                $userId = $member['id'];
            }
        } else {
            echo 'Error retrieving workspace members: ' . $response->getBody();
        }

        $url = "https://api.trello.com/1/members/{$userId}/boards?key={$apiKey}&token={$token}";

        $client = new Client();
        $response = $client->get($url);

        if ($response->getStatusCode() == 200) {
            $boards = json_decode($response->getBody(), true);
            $workspaces = [];
            // dd($boards);
            foreach ($boards as $board) {
                $workspace = [
                    'id' => $board['idOrganization'],
                    'name' => $board['name']

                ];
            }
        } else {
            echo 'Error retrieving user boards: ' . $response->getBody();
        }
        // dd($workspace);
        return view('workspace', ['workspaces' => $workspace]);
    }
}
