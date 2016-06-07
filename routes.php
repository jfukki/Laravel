<?php

use App\Post;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
// */
//
// Route::get('/', function () {
//     return view('welcome');
// });
//
//
// Route::get('/about', function () {
//     return "This is about page";
// });
//
//
// Route::get('/contact', function () {
//     return "This is contact view";
// });
//
// Route::get('/post/{id}/{name}',function($id,$name){
//
//     return "The post number is ".$id." ".$name;
// });
//
// Route::get('/admin/posts/example',array('as'=>'admin.example',function(){
//     $url = route('admin.example');
//     return "This is the complete URL ".$url;
//
// }));

// Route::get('/post/{name}/{id}','PostsController@index');

// Route::resource('posts','PostsController');


/*   SQL QUERIES   INSERT DLETE UPDATE SELECT*/
Route::get('/',function(){
  return view ('welcome');
});

Route::get('/insert',function(){
    DB::insert('insert into posts (title,content) values(?,?)',['Title 2L','This is the 2nd Content and im loving itLaravel is the best thing that happened to php community']);
});


Route::get('/read',function(){

  $result = DB::select('select * from posts where id = ?', [1]);
  // return dump($result);
  // return "<br>";
  foreach ($result as $post) {
    return "<h1>This is the content<br></h1>".$post -> content."<br>"."<h2>This is the title<br></h2>".$post -> title;

  }
});

Route::get('/only',function(){
  $result = DB::select('select title from posts where id = ?',[1]);
  foreach ($result as $post) {
    return "Title of the first record is: ".$post -> title;

  }

});




Route::get('/update',function(){
  $updated = DB:: update('update posts set title = ? where id = ?', ['Updated Title of the record one','1']);
  return $updated;
});

Route::get('/del',function(){
$deleted = DB:: delete('delete from posts where id = ?', [2]);
  return "IF It says 1 , It means dat the record is deleted.... and yes it is ->  ".$deleted;
});

/////////////////////* ELOQUENT  *//////////////////////////////

ROUTE::get('/find',function(){

    $post = Post::find(1);
    return "Title: ".$post->title ."<br>Content: ".$post->content;


});


Route::get('/findwhere',function(){
  $posts = Post::where('id',3)->orderBy('id','desc')->take(1)->get();
  return $posts;
});


/////////////////////* ELOQUENT  *//////////////////////////////

Route::get('/contact','PostsController@contact');

Route::get('/post/{id}/{name}/{password}','PostsController@show_post');
