<?php

namespace App\Conversations;

use App\User;
use App\Interfaces\CurrencyInterface;
use App\Interfaces\AccountInterface;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class SonyConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */


    


    public function askProblem($buttons)
    {
        $question = Question::create("¿Cuáles de estos problemas presenta tu Smart TV? ")
        ->fallback('Lo siento, no sé como responderte')
        ->callbackId('ask_about_currency')
        ->addButtons($buttons);

        return $this->ask($question, function ( Answer $answer ) {
            if ( $answer->isInteractiveMessageReply() ) {
                    switch ($answer->getValue()) {
                        case 0:
                            $this->say('<p>Sigue los pasos que se indican a continuaci&oacute;n.</p>
                            <ol>
                            <li>Pulsa el bot&oacute;n&nbsp;HOME&nbsp;del mando a distancia.</li>
                            <li>Selecciona Settings (Ajustes).</li>
                            <li>Selecciona Network (Red).</li>
                            <li>Selecciona Network setup (Configuraci&oacute;n de red).</li>
                            <li>Selecciona Set up network connection (Configurar conexi&oacute;n de red) o Wireless Setup (Configuraci&oacute;n inal&aacute;mbrica).</li>
                            <li>Selecciona el m&eacute;todo de conexi&oacute;n.
                            <ul>
                            <li>Al conectar autom&aacute;ticamente con el bot&oacute;n WPS en tu router (o punto de acceso) inal&aacute;mbrico<br />Selecciona Easy, Auto o WPS (pulsador de bot&oacute;n).</li>
                            <li>Al conectar manualmente tras seleccionar una red en la lista de redes inal&aacute;mbricas examinadas<br />Selecciona Expert (Experto), Custom (Persomal.) o Scan (Explorar).</li>
                            </ul>
                            </li>
                            <li>Sigue las instrucciones que aparezcan en la pantalla para completar la configuraci&oacute;n.</li>');
                            break;
                        case 1: 
                            $this->say('<p>Netflix es un servicio de streaming multiplataforma al que se puede acceder desde diferentes dispositivos, incluidos los televisores inteligentes. Existen tres formas diferentes de configurar Netflix en el televisor Sony.</p>
                            <ul>
                            <li>Usando el control remoto de Sony</li>
                            <li>A trav&eacute;s de la opci&oacute;n de video</li>
                            <li>Control remoto de teclado inal&aacute;mbrico</li>
                            </ul>');
                            break;
                        default:
                            # code...
                            break;
                    }
                    $this->say('Para realizar otra consulta ingrese la palabra <b>opciones</b> en el chat');

            } else {
                $this->run();
            }
        });

    }


    public function run()
    {
        $options = [
            ['Cómo realizar la configuración de red inalámbrica', 0],
            ['No me puedo conectar a Netflix', 1],
            ['Otro problema', 2]
        ];

        
        foreach($options as $option)
        {
            $buttons[] = Button::create($option[0])
                ->value($option[1]);
        }

        $this->askProblem($buttons);
    }
}