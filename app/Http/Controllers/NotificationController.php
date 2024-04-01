<?php

namespace App\Http\Controllers;

use App\Jobs\SendFCMNotificationJob;
use App\Models\ShortLink;
use App\Models\User;
use App\Models\UserData;
use App\Notifications\AdminMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
// use Torann\GeoIP\GeoIP;
use GuzzleHttp\Client;
use Stevebauman\Location\Facades\Location;

class NotificationController extends Controller
{
    public function shortenLinkRedirect($code)
    {
        $find = ShortLink::where('code', $code)->first();

        if ($find) {
            return redirect($find->long_url);
        }

        return abort(404);
    }
    public function qrCodeStatic(Request $request)
    {
        // return $request->ip();
        if ($request->ip() == "127.0.0.1") {
            $ip = "197.59.34.150";
        } else {
            $ip = $request->ip();
        }
        // $request->ip();
        $date_time = now();
        $client = new Client();
        $response = $client->request('GET', "https://ipinfo.io/{$ip}?token=43cb24ce98142a");
        $data = json_decode($response->getBody()->getContents(), true);
        $response = Location::get($ip);
        // return $response->countryName;
        $userData = new UserData();
        $userData->name = "xc";
        $userData->city = $data['city'];
        $userData->region = $data['region'];
        $userData->country = $response->countryName;
        $userData->ip = $data['ip'];
        $userData->timezone = $data['timezone'];
        $userData->save();
        // return response()->json(["xp" => $data]);
        return view('qr-code-static');
    }
    public function qrCodeCreate(Request $request)
    {
        $bol = true;
        if ($request->url) {
            $qrQode = QrCode::size(150)->generate($request->url);
            $bol = true;
        } else {
            $qrQode = QrCode::size(150)->generate("s");
            $bol = false;
        }

        return view('qr-code', ["qrQode" => $qrQode, "isQr" => $bol]);
    }
    public function playOrder(Request $request)
    {

        $input['long_url'] = "https://wealthest22.com/quiz_app_taha/public/play/order?data=" . ($request->data); // The long URL from your form or API call
        $input['code'] = str::random(6); // Generate a random string for the short code

        $shortLink = ShortLink::create($input);

        $x = $request->data;
        $dataarray = json_decode($x, true);
        $qrQode = QrCode::size(150)->generate("https://wealthest22.com/quiz_app_taha/public/s/" . $shortLink->code);
        return view('index', ["data" => $dataarray, "qrQode" => $qrQode]);
    }

    public function sendNotificationToAll(Request $request)
    {
        $messageFromAdmin = $request->message;
        $titleFromAdmin = $request->title;

        $users = User::all();  // or any filtered list of users

        // Sending Notification via Database
        Notification::send($users, new AdminMessage($messageFromAdmin, $titleFromAdmin));

        // Dispatch Job for Each User with FCM Token
        foreach ($users as $user) {
            if ($user->fcm) {
                SendFCMNotificationJob::dispatch($user->fcm, $titleFromAdmin, $messageFromAdmin);
            }
        }

        session()->flash('Add', 'تم ارسال الاشعار لجميع المستخدمين بنجاج');
        return back();
    }




    public function sendNotificationToUser(Request $request)
    {
        $messageFromAdmin = $request->message;
        $titleFromAdmin = $request->title;
        $userId = $request->user_id;

        $user = User::find($userId);
        if (!$user) {
            session()->flash('Error', 'User not found');
            return back();
        }

        // Sending Notification via Database
        Notification::send([$user], new AdminMessage($messageFromAdmin, $titleFromAdmin));

        // Dispatch Job for FCM Notification
        if ($user->fcm) {
            SendFCMNotificationJob::dispatch($user->fcm, $titleFromAdmin, $messageFromAdmin);
            session()->flash('Add', 'تم ارسال الاشعار لهذ المستخدم بنجاج');
        } else {
            session()->flash('Add', 'تم ارسال الاشعار لهذ المستخدم بنجاج ولكن العضو ليس لديه رمز FCM');
        }

        return back();
    }
}

        // $response = Location::get($ip);
        // $user_info = [
        //     'ip' => $ip,
        //     'user_agent' => $user_agent,
        //     'date_time' => $date_time, 'date_time' => $date_time,
        //     // يمكنك إضافة المزيد من المعلومات هنا حسب الحاجة
        // ];