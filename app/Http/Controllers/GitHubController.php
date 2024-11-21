<?php

namespace App\Http\Controllers;

use App\Models\Github;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GitHubController extends Controller
{
    public function redirectToGitHub()
    {
        return Socialite::driver('github')->scopes(['repo', 'user'])->redirect();
    }

    public function handleGitHubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();
            // dd($githubUser);
            // Save GitHub data to the 'github' table
            Github::updateOrCreate(
                ['user_id' => 1], // Static User ID
                [
                    'github_id' => $githubUser->id,
                    'github_username' => $githubUser->nickname,
                    'avatar_url' => $githubUser->avatar,
                    'github_token' => $githubUser->token,
                    'github_refresh_token' => $githubUser->refreshToken,
                ]
            );

            return redirect()->route('github.dashboard')->with('success', 'GitHub account connected successfully!');
        } catch (\Exception $e) {
            return redirect()->route('github.connect')->with('error', 'Failed to connect GitHub account.');
        }
    }
    public function dashboard()
    {
        // Retrieve the GitHub data for the logged-in user (or use user_id = 1 for testing)
        $githubData = Github::where('user_id', 1)->first();

        if (!$githubData) {
            return redirect()->route('github.connect')->with('error', 'Please connect your GitHub account first.');
        }

        try {
            // Set up the Guzzle HTTP client
            $client = new \GuzzleHttp\Client();

            // Make a GET request to GitHub API to fetch user repositories
            $response = $client->get('https://api.github.com/user/repos', [
                'headers' => [
                    'Authorization' => 'token ' . $githubData->github_token, // Use the stored GitHub token
                    'Accept' => 'application/vnd.github.v3+json',
                ],
            ]);

            // Decode the response to get repositories
            $repositories = json_decode($response->getBody(), true);

            // Return the dashboard view with GitHub data and repositories
            return view('owm.github.dashboard', compact('githubData', 'repositories'));
        } catch (\Exception $e) {
            // Handle the error (e.g., failed API call)
            return redirect()->route('github.dashboard')->with('error', 'Failed to fetch repositories. Please try again later.');
        }
    }

    public function createRepositoryForm()
    {
        return view('owm.github.create-repository');
    }

    public function listRepositories()
    {
        $githubData = Github::where('user_id', 1)->first();

        if (!$githubData) {
            return redirect()->route('github.connect')->with('error', 'You need to connect your GitHub account first.');
        }

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->get('https://api.github.com/user/repos', [
                'headers' => [
                    'Authorization' => 'token ' . $githubData->github_token,
                ],
            ]);

            $repositories = json_decode($response->getBody(), true);

            return view('owm.github.repositories', compact('repositories'));
        } catch (\Exception $e) {
            return redirect()->route('github.dashboard')->with('error', 'Failed to fetch repositories.');
        }
    }

    public function createRepository(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'private' => 'nullable|boolean',
        ]);

        $githubData = Github::where('user_id', 1)->first();

        if (!$githubData) {
            return redirect()->route('github.connect')->with('error', 'You need to connect your GitHub account first.');
        }

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->post('https://api.github.com/user/repos', [
                'headers' => [
                    'Authorization' => 'token ' . $githubData->github_token,
                ],
                'json' => [
                    'name' => $request->name,
                    'description' => $request->description,
                    'private' => $request->private ? true : false,
                ],
            ]);

            if ($response->getStatusCode() == 201) {
                return redirect()->route('github.dashboard')->with('success', 'Repository created successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->route('github.dashboard')->with('error', 'Failed to create repository.');
        }

        return redirect()->route('github.dashboard')->with('error', 'Unexpected error occurred.');
    }

    public function disconnectForm()
    {
        return view('owm.github.disconnect');
    }

    public function disconnect()
    {
        $githubData = Github::where('user_id', 1)->first();

        if ($githubData) {
            $githubData->delete();
        }

        return redirect()->route('github.dashboard')->with('success', 'GitHub account disconnected successfully.');
    }
}
