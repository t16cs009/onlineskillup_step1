<?php
namespace App\Http\Controllers;
use App\User;
class UserController extends Controller
{
    public function index()
    {
        // �f�[�^�̒ǉ� email�̒l�̓����_���ȕ�������g�p�B�u.�v�ŕ�����̘A��
        $email = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 8) . '@yyyy.com';
        User::insert(['name' => 'yamada taro', 'email' => $email, 'password' => 'xxxxxxxx']);
        // �S�f�[�^�̎��o��
        $users = User::all();
        return view('user', ['users' => $users]);    
    }
}