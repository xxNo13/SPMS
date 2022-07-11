<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funct;
use App\Models\Output;
use App\Models\Suboutput;
use App\Models\Target;
use App\Models\User;
use App\Models\Rating;
use App\Models\Standard;
use App\Models\Approval;

class IpcrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $functs  = Funct::all();
        $users = User::all();
        $approvals = Approval::all();

        return view('IPCR.index',[
            'functs' => $functs,
            'users' => $users,
            'approvals' => $approvals
        ]);
    }

    public function standard()
    {
        $functs  = Funct::all();
        $users = User::all();

        return view('IPCR.standard',[
            'functs' => $functs,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        $type = '';
        switch($request->submit){
            case 'ipcr':
                $type = 'IPCR';
                break;
            case 'standard':
                $type = 'standard';
                break;
        }

        $approval = Approval::create([
            'user_id' => $request->input('user_id'),
            'headoffice_id' => $request->input('headoffice_id'),
            'hdu_id' => $request->input('hdu_id'),
            'type' => $type
        ]);

        return redirect('IPCR');
    }

    public function responsed(Request $request)
    {
        switch ($request->type){
            case 'headoffice':
                $approval = Approval::where('id', $request->id)->update([
                    'headoffice_status' => $request->input('headoffice_status')
                ]);
                break;
            case 'hdu' :
                $approval = Approval::where('id', $request->id)->update([
                    'hdu_status' => $request->input('hdu_status')
                ]);
                break;
        }

        return redirect('forapproval');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch($request->insert){
            case 'output':
                $output = Output::create([
                    'code' => $request->input('code'),
                    'output' => $request->input('output'),
                    'funct_id' => $request->input('funct_id'),
                    'user_id' => $request->input('user_id')
                ]);
                break;
            case 'suboutput':
                $suboutput = Suboutput::create([
                    'suboutput' => $request->input('suboutput'),
                    'output_id' => $request->input('output_id'),
                    'user_id' => $request->input('user_id')
                ]);
                break;
            case 'target':
                if($request->input('output_id')){
                    $target = Target::create([
                        'target' => $request->input('target'),
                        'output_id' => $request->input('output_id'),
                        'user_id' => $request->input('user_id')
                    ]);
                }elseif($request->input('suboutput_id')){
                    $target = Target::create([
                        'target' => $request->input('target'),
                        'suboutput_id' => $request->input('suboutput_id'),
                        'user_id' => $request->input('user_id')
                    ]);
                }
                break;
            case 'rating':
                $average = ($request->input('efficiency') + $request->input('quality') + $request->input('timeliness')) / 3;

                $rating = Rating::create([
                    'accomplishment' => $request->input('accomplishment'),
                    'efficiency' => $request->input('efficiency'),
                    'quality' => $request->input('quality'),
                    'timeliness' => $request->input('timeliness'),
                    'average' => $average,
                    'target_id' => $request->input('target_id'),
                    'user_id' => $request->input('user_id'),
                ]);
                break;
            case 'standard':
                $standard = Standard::create([
                    'eff_five' => $request->input('eff_five'),
                    'eff_four' => $request->input('eff_four'),
                    'eff_three' => $request->input('eff_three'),
                    'eff_two' => $request->input('eff_two'),
                    'eff_one' => $request->input('eff_three'),
                    'qua_five' => $request->input('qua_five'),
                    'qua_four' => $request->input('qua_four'),
                    'qua_three' => $request->input('qua_three'),
                    'qua_two' => $request->input('qua_two'),
                    'qua_one' => $request->input('qua_one'),
                    'time_five' => $request->input('time_five'),
                    'time_four' => $request->input('time_four'),
                    'time_three' => $request->input('time_three'),
                    'time_two' => $request->input('time_two'),
                    'time_one' => $request->input('time_three'),
                    'target_id' => $request->input('target_id'),
                    'user_id' => $request->input('user_id')
                ]);
                break;
        }

        if ($request->insert == 'standard'){
            return redirect('standard');
        } else{
            return redirect('IPCR');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        switch($request->update){
            case 'output':
                Output::where('id', $request->input('output_id'))->update([
                    'code' => $request->input('code'),
                    'output' => $request->input('output')
                ]);
                break;
            case 'suboutput':
                Suboutput::where('id', $request->input('suboutput_id'))->update([
                    'suboutput' => $request->input('suboutput')
                ]);
                break;
            case 'target':
                Target::where('id', $request->input('target_id'))->update([
                    'target' => $request->input('target')
                ]);
                break;
            case 'rating':
                $average = (($request->input('efficiency') + $request->input('quality') + $request->input('timeliness')) / 3);

                Rating::where('id', $request->input('rating_id'))->update([
                    'accomplishment' => $request->input('accomplishment'),
                    'efficiency' => $request->input('efficiency'),
                    'quality' => $request->input('quality'),
                    'timeliness' => $request->input('timeliness'),
                    'average' => $average
                ]);
                break;
            case 'standard':
                Standard::where('id', $request->input('standard_id'))->update([
                    'eff_five' => $request->input('eff_five'),
                    'eff_four' => $request->input('eff_four'),
                    'eff_three' => $request->input('eff_three'),
                    'eff_two' => $request->input('eff_two'),
                    'eff_one' => $request->input('eff_three'),
                    'qua_five' => $request->input('qua_five'),
                    'qua_four' => $request->input('qua_four'),
                    'qua_three' => $request->input('qua_three'),
                    'qua_two' => $request->input('qua_two'),
                    'qua_one' => $request->input('qua_one'),
                    'time_five' => $request->input('time_five'),
                    'time_four' => $request->input('time_four'),
                    'time_three' => $request->input('time_three'),
                    'time_two' => $request->input('time_two'),
                    'time_one' => $request->input('time_three')
                ]);
                break;
        }

        if ($request->update == 'standard'){
            return redirect('standard');
        } else{
            return redirect('IPCR');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        switch ($request->delete){
            case 'output':
                Output::where('id', $id)->delete();
                break;
            case 'suboutput':
                Suboutput::where('id', $id)->delete();
                break;
            case 'target':
                Target::where('id', $id)->delete();
                break;
            case 'rating':
                Rating::where('id', $id)->delete();
                break;
            case 'standard':
                Standard::where('id', $id)->delete();
                break;
        }

        if ($request->delete == 'standard'){
            return redirect('standard');
        } else{
            return redirect('IPCR');
        }
    }
}
