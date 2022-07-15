<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\post;
use App\Models\User;
use App\Models\follow;
use Crypt;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\mailing;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Pagination\Paginator;

class BlogController extends Controller
{
    function Usersfn(){
        $id=Auth::user()->id;
        $users=User::all()->where('id','!=',$id);
        return view('home',compact('users','users'));
    }
    function edit_image($id){
        $user = User::find($id);
        return view('edit', compact('user'));
    }

    function editblog($id){
        $blog = post::find($id);
        return view('editblog', compact('blog'));
    }
    public function updateblog(Request $request, $id)
    {
        $post =post::find($id);
        if($request->hasFile('Upload_image')){
            $file= $request->file('Upload_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/blog'), $filename);
            $post['image']= $filename;
        }
        
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect('myblog/')->with('status','data Updated Successfully');
    }

    public function update_image(Request $request, $id)
    {
        $user =User::find($id);
        if($request->hasFile('Upload_image')){
            $file= $request->file('Upload_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/user'), $filename);
            $user['image']= $filename;
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('user/'.Auth::user()->id)->with('status','data Updated Successfully');
    }

    // function addblog(Request $request){
    //     $request->validate([
    //         'title'=>'required|string|max:75',
    //         'content'=>'required|string|max:200'
    //     ]);

    //     $blogdata=post::create([
    //         'title'=>$request->title,
    //         'content'=>$request->content,
    //         'user_id'=>Auth::user()->id,
    //        // Mail::to($request->user())->send(new newMail()),
    //     ]);
    //     if($blogdata){
    //         return redirect('myblog')->with('success','Data inserted !');
    //     }
    // }

    function addblog(Request $request){
        
        $req = new post;
        $req->title=$request->input('title');
        $req->content=$request->input('content');
        $req->user_id=Auth::user()->id;
        if($request->image)
        {
            $file = $request->image;
            $extenstion = $request->image->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $request->image->move('images/blog/', $filename);
        }
        $req->image = $filename;
        $req->save();
        //Mail::to(Auth::user()->email)->send(new mailing());
        return redirect('myblog')->with('status','New blog Added');
    }

    function MyBlog(){
        $id=Auth::user()->id;
        $Blog=post::all()->where('user_id','=',$id);

        return view('myblog',compact('Blog'));
    }

    // function Usersfn(){
    //     $id=Auth::user()->id;
    //     $users=User::all()->where('id','!=',$id);
    //     return view('home',compact('users'));
    // }

    function DeleteMyBlog($id){
        $delete=post::find($id)->delete();
        if($delete){
            return redirect('myblog')->with('delete','data deleted !');
        }
    }

    function myprofiles(){
        $id=Auth::user()->id;
        $profile=User::all()->where('id',$id);
        return view('profilepicture',compact('profile'));
    }

    public function UserBlogfn($id){
        $dd=Crypt::decryptString($id);
        $blog=User::find($dd)->getContent;
        $counts=collect($blog)->count();
        return view('UserBlog',compact('blog','counts'));
        
    }

    // function edit_blogfn($id){
    //     $blog=post::find($id);
    //     return view('editblog',compact('blog'));
    // }

    public function postList()
    {
        $posts = post::all();

        return view('posts.post-list',compact('posts'));
    }
    public function likePost($id)
    {
        $post = post::find($id);
        if($post->liked()){
            $post->unlike();
            $post->save();

            $like_icon="<i class='fa fa-heart'></i>";
        }
        else{
            $post->like();
            $post->save();
            $Unlike_icon="<i class='fa fa-heart bg-danger'></i>";
        }
        return redirect()->back()->with('message','Post Like successfully!');
    }

    public function unlikePost($id)
    {
        $post = Post::find($id);
        $post->unlike();
        $post->save();
        
        return redirect()->back()->with('message','Post Like undo successfully!');
    }

    public function following($id){
        $data=follow::create([
            'follow'=>1,
            'user'=>Auth::user()->id,
            'following'=>$id,
        ]);
        return redirect()->back();
    }

    function unfollowing($id){
        $user_id=Auth::user()->id;
        $delete=follow::where('following',$id)->where('user',$user_id)->where('follow',1)->delete();
        if($delete){
            return redirect()->back();
        }
    }
    function DeleteMyAccount($id){
        $delete=user::find($id)->delete();
        if($delete){
            return redirect('login');
        }
    }

}
