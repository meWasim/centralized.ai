<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotAnswer extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name follows Laravel's convention)
    protected $table = 'chatbot_answers';

    // Specify which attributes are mass assignable
    protected $fillable = ['question', 'answer'];
}
