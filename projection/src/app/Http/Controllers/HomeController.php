<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    /**
     * �t�@�C���A�b�v���[�h����
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // �K�{
                'required',
                // �A�b�v���[�h���ꂽ�t�@�C���ł��邱��
                'file',
                // �摜�t�@�C���ł��邱��
                'image',
                // MIME�^�C�v���w��
                'mimes:jpeg,png',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            $image = base64_encode(file_get_contents($request->file->getRealPath()));
return view('home')->with('image', $image);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}