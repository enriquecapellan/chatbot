<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class WelcomeConversation extends Conversation
{
     /**
     * First question
     */
    public function askQuestion()
    {
        $question = Question::create("¿Elige la marca de Smart TV que deseas consultar?")
            ->fallback('Lo siento, no sé como responderte')
            ->callbackId('ask_about_option')
            ->addButtons([
                Button::create('Samsung')->value('samsung'),
                Button::create('Sony')->value('sony'),
            ]);

        return $this->ask($question, function ( Answer $answer ) {
            switch ($answer->getValue()) {
                case 'samsung':
                    $this->bot->startConversation( new SamsungConversation() );
                    break;
                case 'sony':
                    $this->bot->startConversation( new SonyConversation() );
                    break;            
                default:
                    $this->askQuestion();
                    break;
            }
        });
    }

    /**
     * Start the conversation
     */

     
    public function run()
    {
        $this->askQuestion();
    }
}
