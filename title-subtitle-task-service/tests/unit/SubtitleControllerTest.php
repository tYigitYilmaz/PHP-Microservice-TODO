<?php

namespace Tests\Unit;


use App\Controller\ReminderController;

class SubtitleControllerTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateSubtitle()
    {
        $url_invoke = getenv('HOST').'/todo/title-subtitle-task-service/web/subtitle/createSubtitle';
        $title = [
            'subtitle_name'  => 'dummy-subtitle',
            'title_id'=> 1
        ];

        $headers = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($title)));

        $ch = curl_init($url_invoke);

        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($title));
        curl_setopt( $ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $response = json_decode($response);

        curl_close($ch);

        $this->assertEquals(201, $response->statusCode);
        $this->assertEquals(true, $response->success);
        $this->assertEquals(addslashes('Subtitle was included..'), addslashes($response->messages[0]));
        $this->assertArrayHasKey('subtitle_name', json_decode(json_encode($response->data), true));
        $this->assertArrayHasKey('title_id', json_decode(json_encode($response->data), true));
        $this->assertArrayHasKey('created_at', json_decode(json_encode($response->data), true));
    }

       public function testSelectSubtitle()
       {
           $url_invoke = getenv('HOST').'/todo/title-subtitle-task-service/web/subtitle/selectSubtitle/1';

           $ch = curl_init($url_invoke);

           curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET');
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           curl_setopt( $ch, CURLINFO_HEADER_OUT, true);

           $response = curl_exec($ch);
           $response = json_decode($response);

           curl_close($ch);

           $this->assertEquals(200, $response->statusCode);
           $this->assertEquals(true, $response->success);
           $this->assertArrayHasKey('subtitle_id', json_decode(json_encode($response->data), true));
           $this->assertArrayHasKey('subtitle_name', json_decode(json_encode($response->data), true));
       }

           public function testListAllSubtitles()
           {
               $url_invoke = getenv('HOST').'/todo/title-subtitle-task-service/web/subtitle/listAllSubtitles';

               $ch = curl_init($url_invoke);

               curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET');
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               curl_setopt( $ch, CURLINFO_HEADER_OUT, true);

               $response = curl_exec($ch);
               $response = json_decode($response);

               curl_close($ch);

               $this->assertEquals(200, $response->statusCode);
               $this->assertEquals(true, $response->success);
           }

               public function testDeleteTitle()
               {
                   $url_invoke = getenv('HOST').'/todo/title-subtitle-task-service/web/subtitle/deleteSubtitle';
                   $title = [
                       'subtitle_id'  => 1,
                   ];

                   $headers = array(
                       'Content-Type: application/json',
                       'Content-Length: ' . strlen(json_encode($title)));

                   $ch = curl_init($url_invoke);

                   curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                   curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($title));
                   curl_setopt( $ch, CURLINFO_HEADER_OUT, true);
                   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                   $response = curl_exec($ch);
                   $response = json_decode($response);

                   curl_close($ch);

                   $this->assertEquals(202, $response->statusCode);
                   $this->assertEquals(true, $response->success);
                   $this->assertEquals(addslashes('Subtitle was deleted'), addslashes($response->messages[0]));
               }
}