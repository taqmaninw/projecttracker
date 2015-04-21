<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Notification,Auth,Mail;
abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
    	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
	}
public function notification($type,$subject,$reciver_id,$body = null){
 					$notification = new Notification;
                    $notification->sender_id = Auth::user()->id;
                    $notification->type = $type;
                    $notification->body = $body;
                    $notification->subject = $subject;
                    $notification->reciver_id = $reciver_id;
                    $notification->save();
return $notification;
//                       Mail::queue('emails.confirm', $data, function($message)
// 					    {
// 					        $message->to('taqmaninw@gmail.com', 'John Smith')->subject('Welcome!');
// 					    });
}
       				
}
