<?php
namespace App\Http\Controllers;
use App\Http\Requests\InsertBook;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index(Request $request){
        if(isset($request->sort)){
            $data = Book::orderBy($request->sort)->paginate(5);
        } elseif(isset($request->keyword)){
            $data = Book::where('judul', 'like', '%'.$request->keyword.'%')->paginate(5);
        } else {
            $data = Book::paginate(5);
        }
        return view('books.index', ['datas'=>$data]);
    }

    public function create(){
        return view('books.create');
    }

    public function store(InsertBook $request){
        $validateData = $request->validated();

        $book = new Book();
        $book->cover = $validateData['cover_image']->store('covers', 'public');
        $book->judul = $validateData['judul'];
        $book->penulis = $validateData['penulis'];
        $book->penerbit = $validateData['penerbit'];
        $book->tahun_terbit = $validateData['tahun_terbit'];

        if($book->save()){
            $alert = array('class' => 'success', 'keterangan'=>'Data Buku Berhasil Ditambahkan');
        } else {
            $alert = array('class' => 'danger', 'keterangan'=>'Data Buku Gagal Ditambahkan');
        }
        return redirect()->route('books.index')->with('alert', $alert);
    }

    public function destroy(){
        if(Book::truncate() || File::deleteDirectory('storage/covers/')){
            $alert = array('class' => 'danger', 'keterangan'=>'Data Buku Berhasil Dihapus');
        } else {
            $alert = array('class' => 'info', 'keterangan'=>'Data Buku Gagal Dihapus');
        }
        return redirect()->route('books.index')->with('alert', $alert);
    }
}
