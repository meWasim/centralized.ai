<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatbotAnswer;
use GuzzleHttp\Client;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function chat(Request $request)
    {
        $question = $request->input('question');

        // Check if the answer is already in the database
        $answer = ChatbotAnswer::where('question', $question)->first();

        if ($answer) {
            return response()->json(['answer' => $answer->answer]);
        } else {
            // If not found, send the query to ChatGPT
            $chatgptResponse = $this->getChatGPTResponse($question);

            // Save the new question and answer to the database
            ChatbotAnswer::create([
                'question' => $question,
                'answer' => $chatgptResponse
            ]);

            return response()->json(['answer' => $chatgptResponse]);
        }
    }

    private function getChatGPTResponse($userQuery)
    {
        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'json' => [
                'model' => 'gpt-3.5-turbo', // You can change it to gpt-4 if you have access
                'messages' => [
                    ['role' => 'user', 'content' => $userQuery->input('userInput')]
                ]
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);

        return response()->json(['reply' => $data['choices'][0]['message']['content']]);

    }
}

