<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Device;
use App\Models\Trend;

class HomeController extends Controller
{
	protected $trendModel;

	public function __construct()
	{
    	$this->trendModel = new Trend();
	}

	public function index()
    {
		$data = Device::all();
    	return view('pages.home', compact('data'));
    }

    public function device()
    {
    	$data = Device::orderBy('id', 'DESC')->get();
    	return view('pages.device', compact('data'));
    }

    public function create(Request $request)
    {
    	$data = new Device;

    	$data->code = $request->code;
    	$data->name = $request->name;
    	$data->status = $request->status;
    	$data->save();
    	return redirect('/device')->with('pesan', 'Data has been added!');
    }

    public function update(Request $request, $id)
    {
    	$data = Device::find($id);

    	$data->code = $request->code;
    	$data->name = $request->name;
    	$data->status = $request->status;
    	$data->save();
    	return redirect('/device')->with('pesan', 'Data has been changed!');
    }

    public function delete($id)
    {
    	Device::destroy($id);
    	return redirect('/device')->with('pesan', 'Data has been deleted!');
    }

	public function trend(){

	// $date = $this->trendModel->getDate();
	// $value2 = $this->trendModel->value2();
	$get = Trend::all();
	// dd(json_encode($value2));
	// $begin = $this->trendModel->endDate();
	$dates = [];
	foreach($get as $d){
		$dates[] = $d->datetime;
	}
	$val1 = [];
	foreach($get as $v1){
		$val1[] = $v1->value_1;
	}
	$val2 = [];
	foreach($get as $v2){
		$val2[] = $v2->value_2;
	}
	$data = [
		'date' => $dates,
		'val1' => $val1,
		'val2' => $val2,
		// 'value2' => $this->trendModel->value2(),
		// 'date' => $this->trendModel->getDate(),
		// 'trend_begin' => date('Y-m-d', strtotime($begin)),
		];
		// dd($val2);

	return view('pages.trend', $data);
	}
}
