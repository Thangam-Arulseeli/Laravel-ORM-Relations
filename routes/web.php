<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use App\Models\Vote;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Lets create a user
// Route::get('/', function( ){
//     User::factory()->create();
//     return User::first();
// });

// 1. Long method - Explicit foreign key settings
// Route::get('/', function(){
// // To save the (post)-child table record, parent table (user) record must be created
// // $user = User::factory()->create();   // Creates fake record in parent using factory()->create() 
// $user = User::find(2); // Take the user record with id 2
// $post=new Post([
//     'title' => 'Congratualtion',
//     'body' => 'Hearty congratulations for your achivement',
//     'user_id' => $user->id
// ]);
// //dd($post);  // Display for checking

// $post->save();
// dump($user);   // Print the parent-user record
// dd($post); // Print child record-post record
// });

//  2. Short method - Implicit foreign key settings using ORM
// Route::get('/', function(){
//     // To save the (post)-child table record, parent table (user) record must be created
//    // $user = User::factory()->create();   // Creates fake record in parent using factory()->create() 
//     $user = User::find(3); // Take the user record with id 3
//     $user->posts()->create([
//         'title' => 'Birthday Wishes',
//         'body' => 'Wish you a happy Birth day!!!',
//     ]);  
//    //  dump($user);   // Print the parent-user record
//     dd($user->posts); // Print child record-post record
//     });


// // Edit operation 1 - Newly added record is updated
// Route::get('/', function(){
//    // $user = User::factory()->create();   // Creates fake record in parent using factory()->create() 
//    $user = User::find(3); // Take the user record with id 3 
//    $user->posts()->create([
//         'title' => 'New Title 3',
//         'body' => 'New Message body 3',
//     ]);
   
//     $user->posts->first()->title = "Title updated 3";
//     $user->posts->first()->body = "Body updated 3";
//     $user->push();
    
//     return $user->posts;
//     });

// Edit operation 2 - To update existing record
    // Route::get('/', function(){
    // $user = User::find(3);   // Finds the user record with id 3 
    // $user->posts->first()->title = 'Existing Updated - title';
    // $user->posts->first()->body = 'Existing Updated - body';
    // $user->push();
    // return $user->posts;
    // });


// Attach each roles with user table record
// Route::get('/', function(){
//    // $user = User::first();
//     $user = User::find(3);
//     $roles = Role::all();
//     $user->roles()->attach($roles);
//     dd($user->roles);
// });

// Attach each roles to user table record
// Route::get('/', function(){
//     $user = User::first();
//     $roles = Role::all();
//     $user->roles()->attach($roles);
//     dd($user->roles);
// });

// Detach roles from user table record
// Route::get('/', function(){
//     $user = User::first();
//     $roles = Role::first();
//     $user->roles()->detach($roles);
//     dd($user->roles);
// });

// Attach selected roles to user [Roles might duplicate to user]
// Route::get('/', function(){
//     $user = User::first();
//     $user->roles()->attach([1,3,5]);
//     dd($user->roles);
// });

// Attach selected roles to user [Attach new roles by deleting existing ones]
// Route::get('/', function(){
//     $user = User::first();
//     $user->roles()->sync([1, 3, 5]); // Detetes existing roles from user and attach new roles 
//     dd($user->roles);
// });

// Attach selected roles to user [Attach new roles without duplicates by with existing ones]
//  Route::get('/', function(){
//      $user = User::first();
//      $user->roles()->syncWithoutDetaching([4, 3]); // attach new roles without duplicates 
//      dd($user->roles);
//  });


// Attach users 2,3 to the role 3 [Opposite to the above cases] 
// Route::get('/', function(){
//     $role = Role::find(3);
//     $role->users()->sync([2,3]);
//     dd($role->users);
// });

// --------------------------------------

// Attach selected roles to user -- PIVOT Table(Many to Many)
// Route::get('/',function(){
// $user = User::first();
// $user->roles()->sync([1,2]);
// dd($user->roles);
// });

// Attach selected roles to user with role provider's name -- PIVOT Table(Many to Many)
// Route::get('/',function(){
// $user = User::first();
// $user->roles()->sync([
//     1 => ['name' => 'Ganga'],
//     2 => ['name' => 'Rohith']
//     ]);
// dd($user->roles);
// });


// To get the roles details -- PIVOT Table(Many to Many)
//  Route::get('/',function(){
//  $user = User::first();

//  // dd($user->roles);  // To get user roles details
//   // dump($user->roles->first());  // first record from user & role tables with pivot relation
//  // dump($user->roles->first()->pivot); // To get all the pivot table details - Without extra data
//   dump($user->roles->first()->pivot->name); // To get the extra details from pivot table
//  });

// ----------------------------
// One-to-One relation -- Save record in child table
Route::get('/', function(){
$user = User::find(2);
$vote = new Vote();
$vote->voting ="Jeyam";
$user->vote()->save($vote);
dd($user->vote);
});
