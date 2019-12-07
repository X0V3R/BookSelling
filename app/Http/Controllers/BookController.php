<?php

namespace App\Http\Controllers;

use App\books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('books')->paginate(5);
        return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $redir = redirect('/')->with('success','Data has been added');
        }else {
            $redir = redirect('book.create')->with('danger','Input date failed. Please try again');
        }
        return $redir;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::select('select * from books where id = ?', [$id]);
        return view('book.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::select('select * from books where id = ?', [$id]);
        return view('book.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     * FIXME:Sửa lỗi validate
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Get the values
         $name = $request->get('name');
         $detail = $request->get('detail');
         $cost = $request->get('cost');
         $category = $request->get('category');
         $author = $request->get('author');   
         //FIXME: SỬA LẠI PHẦN IMAGE
         //  $fileNameExt = $request->file('hidden_image')->getClientOriginalName();
         //  $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
         //  $fileExt = $request->file('hidden_image')->getClientOriginalExtension();
         //  $fileNameToStore = $fileName.'.'.$fileExt;
         //  $pathToStore = $request->file('hidden_image')->storeAs('img',$fileNameToStore );
         $image_name = $request->hidden_image;
         $image = $request->file('image');
         if ($image != '') {
            $request->validate([
                'name' => 'required',
                'detail' => 'required',
                'cost' => 'required',
                'image' => 'required|image|max:2048',
                'category' => 'required',
                'author' => 'required',
                'name' => 'required',
            ]);
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('img'), $image_name);
         }
         else {
            $request->validate([
                'name' => 'required',
                'detail' => 'required',
                'cost' => 'required',
                'category' => 'required',
                'author' => 'required',
                'name' => 'required',
            ]);
         }


 
         //Update database
        //  $data = DB::update('update books set name = ?, detail = ?, cost = ?, image = ?, id_category = ?, id_au = ? where id = ?', 
        //              [$name,$detail,$cost,$pathToStore,$category,$author,$id]);
        $form_data = array(
            'name' => $request->name,
            'detail' => $request->detail,
            'cost' => $request->cost,
            'image' => 'img/'.$image_name,
            'id_category' => $request->category,
            'id_au' => $request->author,
        );
        DB::table('books')->where('id',$id)->update($form_data);
 
        //Checking the response
         if ($form_data) {
             $redir = redirect('/')->with('success','Data has been added');
         }else {
             $redir = redirect('book.edit/'.$id)->with('danger','Input data failed. Please try again');
         }
         return $redir;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::delete('delete from books where id = ?', [$id]);
        $redir = redirect('/');
        return $redir;
    }


    public function search(Request $request)
    {
       /**
        * TODO: Thử xóa paginate
        */
    
       
        $search = $request->get('search');
        $data = DB::table('books')->where('name','like','%'.$search.'%')->paginate(5);
        return view('home',compact('data'));
    }
}
