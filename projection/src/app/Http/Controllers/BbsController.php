<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Bbs;


   class BbsController extends Controller
   {
       // Index�y�[�W�̕\��
       public function index() {

           $bbs = Bbs::all(); // �S�f�[�^�̎��o��
           return view('bbs.index', ["bbs" => $bbs]); // bbs.index�Ƀf�[�^��n��
       }

       // ���e���ꂽ���e��\������y�[�W
       public function create(Request $request) {

           // �o���f�[�V�����`�F�b�N
           $request->validate([
               'name' => 'required|max:10',
               'comment' => 'required|min:5|max:140',
           ]);

           // ���e���e�̎󂯎���ĕϐ��ɓ����
           $name = $request->input('name');
           $comment = $request->input('comment');

           Bbs::insert(["name" => $name, "comment" => $comment]); // �f�[�^�x�[�X�e�[�u��bbs�ɓ��e���e������

           $bbs = Bbs::all(); // �S�f�[�^�̎��o��
           return view('bbs.index', ["bbs" => $bbs]); // bbs.index�Ƀf�[�^��n��
	   
       }
   }