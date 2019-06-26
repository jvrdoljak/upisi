<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
   // public function basic_email() {
   //    $data = array('name'=>"Upisi");
   
   //    Mail::send(['text'=>'mail'], $data, function($message) {
   //       $message->to('bebyvrd5@gmail.com', 'Josip Vrdoljak')->subject
   //          ('Laravel Basic Testing Mail');
   //       $message->from('no-reply@upisi.xyz','upisi.xyz');
   //    });
   //    echo "Basic Email Sent. Check your inbox.";
   // }
   
   public function html_email() {
      try{
      $data = array('name'=>"Upisi");
      
      Mail::send('emails.orders.email', $data, function($message) {
         $message->to('bebyvrd5@gmail.com', 'Josip Vrdoljak')->subject
            ('Laravel HTML Testing Mail');
         $message->from('no-reply@upisi.xyz','upisi.xyz');
      });
      }catch(\Swift_TransportException $e){
         echo "Mail ne moze biti poslan.";
      }
   }

   // public function attachment_email() {
   //    $data = array('name'=>"Upisi");
   //    Mail::send('mail', $data, function($message) {
   //       $message->to('bebyvrd5@gmail.com', 'Josip Vrdoljak')->subject
   //          ('Laravel Testing Mail with Attachment');
   //       $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
   //       $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
   //       $message->from('no-reply@upisi.xyz','upisi.xyz');
   //    });
   //    echo "Email Sent with attachment. Check your inbox.";
   // }
}