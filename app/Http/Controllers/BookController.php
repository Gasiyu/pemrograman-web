<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
        $datas = DB::select('select * from books');
        return view('main', compact('datas'));
    }
    public function insert(){
        $query = DB::insert("insert into books (gambar, judul, penulis, penerbit, tahun_terbit, created_at, updated_at) values
            ('laskar_pelangi.jpg', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005, now(), now()),
            ('rentang_kisah.jpg', 'Rentang Kisah', 'Gita Savitri Devi', 'Gagas Media', 2017, now(), now()),
            ('a_cup.jpg', 'A Cup of Tea', 'Gita Savitri Devi', 'Gagas Media', 2020, now(), now()),
            ('atomic.jpg', 'Atomic Habits', 'James Clear', 'Gramedia', 2018, now(), now()),
            ('sapiens.jpg', 'Sapiens', 'Yuval Noah Harari', 'Harper', 2011, now(), now())
        ");
        $datas = DB::select('select * from books');
        $alert = array('class' => 'success', 'keterangan'=>'Data Berhasil Ditambahkan');
        return view('main', compact('datas', 'alert'));
    }
    public function delete(){
        $query = DB::table('books')->truncate();
        $datas = DB::select('select * from books');
        $alert = array('class' => 'warning', 'keterangan'=>'Data Berhasil Dihapus');
        return view('main', compact('datas', 'alert'));
    }
    public function search(Request $request){
        $keyword = $request->input('keyword');
        $datas = DB::select("select * from books where judul like '%$keyword%'");
        return view('main', compact('datas'));
    }
    public function sort($column){
        $datas = DB::select("select * from books order by $column");
        return view('main', compact('datas'));
    }
}
