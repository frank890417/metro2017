<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use View;
use Storage;
use Mail;
use App;
use App\Register;
use App\Station;
use App\Creator;


class RegistController extends Controller
{
    //

    public function index(){
    	$stations = Station::all();
    	return view('registwork')
    			->with('stations',$stations);
    }

    public function create(Request $request){

        return "很遺憾您的作品已經超過徵件時間<br>還是非常感謝您參與「台北聲音地景計畫-站體環境音樂」徵件活動<br>徵選結果將於5/25公佈於官方網站<br><br><br>Thank you so much for your participation in the MRT Station Ambient Music competition. 
The official event and activities has come to an end. 
The Final results will be posted on our website on 5/25. Please stay tuned with us and thank you again for a great round of participation with the MRT Station Ambient Music Competition.";

    	$regist = new Register;
    	$input = Input::all();
        $station = Station::find($input['station']);
    	// Register::create(Input::all());

        //先做一個新的註冊
    	$regist->uuid = str_random(32);
    	$regist->creator_count = $input['creator_count'];
    	$regist->station = $input['station'];
		$regist->workname = $input['workname'];
    	$regist->description = $input['description'];
    	$regist->work_file= "";

        //儲存以確定uuid跟id
    	$regist->save();

        //設定上傳資料夾
        $folder=$station->name_cht ."/ID".$regist->id.'作品-'.$input['creator1_name'];


    	//儲存所有創作者
    	for($i=1;$i<=($regist->creator_count);$i++){
    		$creator = new Creator;
    		$creator->register_id=$regist->id;
    		$creator->rank=$i;
    		$creator->name=$input['creator'.$i.'_name'];
            $creator->phone=$input['creator'.$i.'_phone'];
            $creator->is_eighteen=$input['creator'.$i.'_is_eighteen'];
    		$creator->country=$input['creator'.$i.'_country'];
    		$creator->mail=$input['creator'.$i.'_mail'];

    		// $creator->address=$input['creator'.$i.'_address'];
 
            //上傳一般同意書
            $agreement_filename='ID'.$regist->id.'-'.$creator->name.'-同意書.'.Input::file('agreement_file'.$i)->getClientOriginalExtension();
            Storage::disk('public')->putFileAs($folder,Input::file('agreement_file'.$i),$agreement_filename);

            $creator->agreement_file= $folder."/".$agreement_filename;

            // 如果沒有滿18歲
            if (intval($creator->is_eighteen)==0){
                //上傳法定同意書
                $agreement_filename='ID'.$regist->id.'-'.$creator->name.'-法定代理人同意書.'.Input::file('agreement18_file'.$i)->getClientOriginalExtension();
                Storage::disk('public')->putFileAs($folder,Input::file('agreement18_file'.$i),$agreement_filename);

                $creator->under_eighteen_file= $folder."/".$agreement_filename;

            }

    		$creator->save();
    		if ($i==1) $first_creator=$creator;
    	}

        // dd(Input::file('work_file'));
        //儲存作品檔案
    	$work_filename='ID'.$regist->id.'-'.$input['creator1_name'].'-作品-'.$regist->workname.'.'.Input::file('work_file')->getClientOriginalExtension();
    	Storage::disk('public')->putFileAs($folder,Input::file('work_file'),$work_filename);


    	// $regist->agreement_file= "ID".$regist->id.'作品-'.$first_creator->name."/".$agreement_filename;
    	$regist->work_file= $folder."/".$work_filename;
    	$regist->save();

        //寄送通知信件
        Mail::send('emails.testemail', ['user' => $first_creator->name], function ($m) use ($first_creator) {
            $m->from('service@taipeisoundscape.com', '台北聲音地景計畫');
            $m->to([$first_creator->mail,"sd.lin@harvestmusician.com","hsinjulee@harvestmusician.com","info@taipeisoundscape.com"], $first_creator->name)->subject('「台北聲音地景計畫-站體環境音樂」徵件報名成功通知信');
        });

    	// return $regist;
    	// return Redirect::to('/registwork/manage');
        return Redirect::to('/regist_success');
    }

    public function success(){
        return "感謝您參與「台北聲音地景計畫-站體環境音樂」徵件活動<br>已成功收到您的音樂作品<br>徵選結果將於5/25公佈<br>敬請靜候佳音<br><br>Thank you for application. You’ve already upload your work to Taipei Soundscape<br>Program “MRT Station Ambient Music Competition”. Award announcement will be post on the website of the competition on May 25, 2017 at 12 P.M.<br><br><a href='http://taipeisoundscape.com'>返回官網</a>";
    }

    public function registlist(){
    	$registers = DB::table('registers')
    				->join('creators','registers.id','=','creators.register_id')
    				->join('stations','registers.station','=','stations.id')
    				->select('registers.*','creators.name','stations.name_cht as station_name')
    				->where('creators.rank','=','1')
                    ->orderBy('id','asc')
    				->get();
    	// Register::all();

    	return view('regist_manage')
    			->with('registers',$registers);
    }

    public function getfile($stationname,$dirname,$filename){
    	$files = storage_path('app/public/'.$stationname.'/'.$dirname.'/'.$filename);
    	return response()->file($files);
    }

    public function registview($id){
        $regist=Register::find($id);
        $creators=Creator::where('register_id','=',$id)->get();
        $station=Station::find($regist->station);

        return view('registview')
                ->with('regist',$regist)
                ->with('creators',$creators)
                ->with('station',$station);
    }

    public function sendmail(){
        $user="吳哲宇";
        Mail::send('emails.testemail', ['user' => $user], function ($m) {
            $m->from('mailgun@taipeisoundscape.com', '台北聲音地景計畫');

            $m->to(["frank890417@gmail.com","sd.lin@harvestmusician.com","hsinjulee@harvestmusician.com","info@taipeisoundscape.com"], "吳哲宇")->subject('「台北聲音地景計畫-站體環境音樂」徵件報名成功通知信-測試群組寄信');
        });
    }

    public function test(){
        return Lang::get("footer");
        return  App::getLocale().__('website.page_index_title');
    }
}
