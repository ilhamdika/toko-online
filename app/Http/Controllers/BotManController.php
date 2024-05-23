<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;

class BotManController extends Controller
{
    public function handle()
    {
         DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

         $botman = app('botman');
 
         $botman->hears('hi', function (BotMan $bot) {
             $bot->reply('Hello!');
         });
 
         $botman->hears('how are you', function (BotMan $bot) {
             $bot->reply('I am doing great! How about you?');
         });
 
         $botman->hears('tell me a joke', function (BotMan $bot) {
             $bot->reply('Why don’t scientists trust atoms? Because they make up everything!');
         });
 
         $botman->hears('bye', function (BotMan $bot) {
             $bot->reply('Goodbye! Have a nice day!');
         });
 
         $botman->listen();
    }
}
