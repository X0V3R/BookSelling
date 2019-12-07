<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\books;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $data = books::all();
        return view('home', $data);
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'cost' => 'required',
            'image' => 'required|image|max:2048',
            'category' => 'required',
            'author' => 'required'
        ]);

        //Get the values
        $name = $request->get('name');
        $detail = $request->get('detail');
        $cost = $request->get('cost');
        // $image = $request->get('image');
        // $image_path = $request()->file('image')->store('public/image');
        $fileNameExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        $fileExt = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'.'.$fileExt;
        $pathToStore = $request->file('image')->storeAs('img',$fileNameToStore );
        $category = $request->get('category');
        $author = $request->get('author');

        //Insert into database
        $data = DB::insert('insert into books (name, detail,cost, image, id_category, id_au) values (?, ?, ?, ?, ?, ?)', [$name, $detail, $cost, $pathToStore   , $category, $author]);

        //Checking the response
        if ($data) {
            $redir = redirect('home')->with('success','Data has been added');
        }else {
            $redir = redirect('book.create')->with('danger','Input date failed. Please try again');
        }
        return $redir;


        // $data = $request()->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        //     'cost' => 'required',
        //     'image' => ['required','image'],
        //     'category' => 'required',
        //     'author' => 'required',
        // ]);
        // books::create($data);
        // dd($request()->all());
    }

    public function showAll()
    {
        $data = books::all();
        return view('home', compact('data'));
    }

    //Post modified data back to database
    //FIXME:Sửa lỗi validate
    public function update(Request $request, $id)
    {
        //Get the values
        $name = $request->get('name');
        $detail = $request->get('detail');
        $cost = $request->get('cost');
        $fileNameExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        $fileExt = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'.'.$fileExt;
        $pathToStore = $request->file('image')->storeAs('img',$fileNameToStore );
        $category = $request->get('category');
        $author = $request->get('author');   

        //Update database
        $data = DB::update('update books set name = ?, detail = ?, cost = ?, image = ?, id_category = ?, id_au = ? where id = ?', 
                    [$name,$detail,$cost,$pathToStore,$category,$author,$id]);

       //Checking the response
        if ($data) {
            $redir = redirect('home')->with('success','Data has been added');
        }else {
            $redir = redirect('book.edit/'.$id)->with('danger','Input date failed. Please try again');
        }
        return $redir;
    }

    //Return the book when user clicking
    public function edit($id)
    {
        $data = DB::select('select * from books where id = ?', [$id]);
        return view('book.edit',['data' => $data]);
    }

    public function search(Request $request)
    {
       /**
        * TODO: Thử xóa paginate
        */
    
       
        $search = $request->get('search');
        $data = DB::table('books')->where('name','like','%'.$search.'%')->paginate(5);
        return view('home',$data);
    }

    public function destroy($id)
    {
        $data = DB::delete('delete books where id = ?', [$id]);
        $redir = redirect('home');
        return $redir;
    }
}
