<?php
namespace App\Services\Notification;

use App\Models\Notification;
use App\Models\NotificationDescription;
use Illuminate\Support\Facades\Config;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
class NotificationService
{
    public function sendNotification($status,$user_id,$title_ar,$title_en,$desc_ar,$desc_en,$id=null,$date=null,$end_date=null)
    {
        Self::sendNotificationDB($status,$user_id,$title_ar,$title_en,$desc_ar,$desc_en,$id);
        return true;
    }

    public function sendNotificationDB($status,$user_id,$title_ar,$title_en,$desc_ar,$desc_en,$id=null)
    {
        $notification =  Notification::create([
            'target_id'=>$id,
            'status'=>$status,
            'user_id'=>$user_id,
        ]);

        $data=[
            'notification_id'=> $notification->id,
            'language_id'=> '1',
            'name'=> $title_ar,
            'description'=> $desc_ar

        ];
        NotificationDescription::create($data);

        $data=[
            'notification_id'=> $notification->id,
            'language_id'=> '2',
            'name'=> $title_en,
            'description'=> $desc_en

        ];
        NotificationDescription::create($data);

        return true;
    }
    public function sendNotificationToUser(User $user, $title, $description)
    {

        $unreadNotifications = Notification::where(['user_id' => $user->id])->count();

        $data = [
            'registration_ids' => [$user->device_token],
            'notification' => [
                'title' => $title,
                'body' => $description,
                'notification_count' => $unreadNotifications,
                'avater' => asset('public/storage/logo icon (1).png'),
                'sound' => 'default',
            ],
            'data'=>[
                'notification_count' => $unreadNotifications,
            ],

        ];

        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . Config::get('app.fcm_server_key'),                                 
            'Content-Type: application/json',
        ];
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
            return curl_exec($ch);
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
    public function sendPushNotification( $title, $description)
    {
        $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/../../config/firebase_credentials.json');
 
        $messaging = $firebase->createMessaging();
 
        $message = CloudMessage::fromArray([
            'notification' => [
                'title' => $title,
                'body' => $description
            ],
            'topic' => 'global'
        ]);
 
        $messaging->send($message);
 
        return response()->json(['message' => 'Push notification sent successfully']);
    }
}