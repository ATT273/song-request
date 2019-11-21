<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Songs;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // public function getLink(){
    // 	$song = Songs::all()->last();
    // 	$id = explode("=",$song->link);
    // 	$song->delete();
    // 	return view('index',['id'=>$id[1]]);

    // }

    public function getLink2(){
    	$song = Songs::where('played',0)->first();
    	$id = $song->link;
        $song->played = 1;
        $song->save();
    	echo $id;
    }
    public function setPlayed($id){
        $song = Songs::find($id);
        $song->played = 1;
        $song->save();
        $status = '200';
        return $status;
    }
    public function getRequestPage(){
        $songs = Songs::where('played',0)->take(5)->get();
    	return view('requestPage',['songs' => $songs]);
    }

    public function reloadList(){
        $songs = Songs::where('played',0)->take(5)->get();
        echo'<div class="q_list" id="q_list">
                <h4> Queue List</h4>
                <table>
                    <thead>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                    </thead>
                    <tbody>';
                        foreach($songs as $song){
                            echo '<tr>
                                    <td>'.$song->link.'</td>
                                </tr>';
                        }
        echo        '</tbody>
                </table>
            </div>';
    }
    public function postAddSong(Request $request){
    	$str = $request->link;
    	$word1 = "youtube.com";
    	$word2 = "youtu.be";
    	if(strpos($str, $word1)){
    		$split_str = explode("=",$str);
    		$ID = new Songs;
    		$ID->link = $split_str[1];
    		$ID->save();
	    	return redirect('request')->with('thongbao','Your Song has been added to the list');
		}elseif(strpos($str, $word2)){
		    $split_str = explode("be/",$str);
    		$ID = new Songs;
    		$ID->link = $split_str[1];
    		$ID->save();
            return redirect('request')->with('thongbao','Your Song has been added to the list');
		}else{
            return redirect('request')->with('loi','You need to input Youtube link');
        }
    }
}
