<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Flow;
use App\Models\Introduction;
use App\Models\Scene;
use App\Models\Service;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::all();
        $services = Service::all();
        $works = Work::all();

        return view('admin.dashboard', compact('blogs', 'services', 'works'));
    }

    //Blog CRUD
    public function blogs()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    public function blog_single($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.single', compact('blog'));
    }

    public function blog_add()
    {
        return view('admin.blog.add');
    }

    public function blog_store(Request $request)
    {
        $blog = Blog::create([
            'status' => $request->status,
            'title' => $request->title,
            'detail' => $request->content
        ]);

        if (isset($request->image)) {
            $imageName = 'blog_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/blog'), $imageName);
            $blog->img = $imageName;
            $blog->save();
        }

        if (isset($request->postDateTime)) {
            $blog->postDateTime = $request->postDateTime;
            $blog->save();
        } else {
            $blog->postDateTime = $blog->created_at;
            $blog->save();
        }

        if (isset($request->tags)) {
            $blog->tags = $request->tags;
            $blog->save();
        }

        if (isset($request->metaTitle)) {
            $blog->metaTitle = $request->metaTitle;
            $blog->save();
        }

        if (isset($request->metaDescription)) {
            $blog->metaDescription = $request->metaDescription;
            $blog->save();
        }
        $blog->save();

        return redirect(route('admin.blogs'));
    }

    public function blog_edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function blog_update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->detail = $request->content;
        $blog->tags = $request->tags;
        $blog->status = $request->status;
        $blog->postDateTime = $request->postDateTime;
        $blog->metaTitle = $request->metaTitle;
        $blog->metaDescription = $request->metaDescription;
        $blog->save();

        if (isset($request->image)) {
            $imageName = 'blog_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/blog'), $imageName);
            $blog->img = $imageName;
            $blog->save();
        }

        return redirect(route('admin.blog.single', $id));
    }

    public function blog_delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect(route('admin.blogs'));
    }


    //Word CRUD
    public function works()
    {
        $works = Work::all();

        return view('admin.work.index', compact('works'));
    }

    public function work_single($id)
    {
        $work = Work::find($id);
        return view('admin.work.single', compact('work'));
    }

    public function work_add()
    {
        return view('admin.work.add');
    }

    public function work_store(Request $request)
    {
        //Add basic data
        $title = $request->title;
        $release_date = $request->release_date;
        $item_type = $request->item_type;
        $type = $request->type;
        $language = $request->language;
        $overview = $request->overview;

        $work = Work::create([
            'status' => $request->status,
            'metaTitle' => $request->metaTitle,
            'metaDescription' => $request->metaDescription,
            'title' => $title,
            'release_date' => $release_date,
            'item_type' => $item_type,
            'language' => $language,
            'type' => $type,
            'overview' => $overview
        ]);

        if (isset($request->postDateTime)) {
            $work->postDateTime = $request->postDateTime;
            $work->save();
        } else {
            $work->postDateTime = $work->created_at;
            $work->save();
        }

        //Add work image
        if (isset($request->image)) {
            $imageName = 'work_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/work'), $imageName);
            $work->img = $imageName;
            $work->save();
        }

        //Add tags
        if (isset($request->tags)) {
            $work->tags = $request->tags;
            $work->save();
        }

        //Add introduction
        $introduction = Introduction::create([
            'text1' => $request->intro_text1,
            'text2' => $request->intro_text2,
            'text3' => $request->intro_text3,
            'text4' => $request->intro_text4,
            'text5' => $request->intro_text5,
        ]);

        $intro_imgs = [];
        if ($request->file('intro_img1')) $intro_imgs[] = $request->file('intro_img1');
        if ($request->file('intro_img2')) $intro_imgs[] = $request->file('intro_img2');
        if ($request->file('intro_img3')) $intro_imgs[] = $request->file('intro_img3');
        if ($request->file('intro_img4')) $intro_imgs[] = $request->file('intro_img4');
        if ($request->file('intro_img5')) $intro_imgs[] = $request->file('intro_img5');

        foreach ($intro_imgs as $index => $img) {
            $i = $index + 1;
            $imageName = 'intro_' . $i . '_' . time() . '.' . $img->extension();
            $img->move(public_path('upload/work/intro'), $imageName);
            $introduction['img' . $i] = $imageName;

            $introduction->save();
        }

        $work->introduction_id = $introduction->id;
        $work->save();

        return redirect(route('admin.works'));
    }

    public function work_edit($id)
    {
        $work = Work::find($id);
        return view('admin.work.edit', compact('work'));
    }

    public function work_update(Request $request, $id)
    {
        $work = Work::find($id);
        $work->title = $request->title;
        $work->tags = $request->tags;
        $work->item_type = $request->item_type;
        $work->language = $request->language;
        $work->type = $request->type;
        $work->overview = $request->overview;
        $work->status = $request->status;
        $work->postDateTime = $request->postDateTime;
        $work->metaTitle = $request->metaTitle;
        $work->metaDescription = $request->metaDescription;

        //Add work image
        if (isset($request->image)) {
            $imageName = 'work_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/work'), $imageName);
            $work->img = $imageName;
        }
        $work->save();
        $introduction = Introduction::find($work->introduction_id);
        $introduction->text1 = $request->intro_text1;
        $introduction->text2 = $request->intro_text2;
        $introduction->text3 = $request->intro_text3;
        $introduction->text4 = $request->intro_text4;
        $introduction->text5 = $request->intro_text5;
        $introduction->save();
        //multi image upload
        $intro_imgs = [];
        if ($request->file('intro_img1')) $intro_imgs[] = $request->file('intro_img1');
        if ($request->file('intro_img2')) $intro_imgs[] = $request->file('intro_img2');
        if ($request->file('intro_img3')) $intro_imgs[] = $request->file('intro_img3');
        if ($request->file('intro_img4')) $intro_imgs[] = $request->file('intro_img4');
        if ($request->file('intro_img5')) $intro_imgs[] = $request->file('intro_img5');

        // dd($intro_imgs);
        foreach ($intro_imgs as $index => $img) {
            $i = $index + 1;
            $imageName = 'intro_' . $i . '_' . time() . '.' . $img->extension();
            $img->move(public_path('upload/work/intro'), $imageName);
            $introduction['img' . $i] = $imageName;

            $introduction->save();
        }

        $work->save();
        return view('admin.work.single', compact('work'));
    }

    public function work_delete($id)
    {
        $work = Work::find($id);
        $work->delete();
        return redirect(route('admin.works'));
    }

    //Service CRUD
    public function services()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function service_single($id)
    {
        $service = Service::find($id);
        return view('admin.service.single', compact('service'));
    }

    public function service_add()
    {
        return view('admin.service.add');
    }

    public function service_store(Request $request)
    {
        //basic data
        $title =  $request->title;
        $top = $request->top_content;
        $main = $request->main_content;

        $service = Service::create([
            'status' => $request->status,
            'metaTitle' => $request->metaTitle,
            'metaDescription' => $request->metaDescription,
            'title' => $title,
            'top' => $top,
            'main' => $main,
            'customizable' => $request->custom
        ]);

        if (isset($request->postDateTime)) {
            $service->postDateTime = $request->postDateTime;
            $service->save();
        } else {
            $service->postDateTime = $service->created_at;
            $service->save();
        }

        //Add service image
        if (isset($request->image)) {
            $imageName = 'service_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/service'), $imageName);
            $service->img = $imageName;
            $service->save();
        }
        //Create Flows
        $text1 = $request->flow_text1;
        $text2 = $request->flow_text2;
        $text3 = $request->flow_text3;
        $text4 = $request->flow_text4;
        $text5 = $request->flow_text5;

        $flow = Flow::create([
            'text1' => $text1,
            'text2' => $text2,
            'text3' => $text3,
            'text4' => $text4,
            'text5' => $text5
        ]);

        $service->flow_id = $flow->id;
        $service->save();

        if ($request->file('flow_img1_1')) {
            $image = $request->file('flow_img1_1');
            $imageName = 'flow_1_1' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img1_1 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img1_2')) {
            $image = $request->file('flow_img1_2');
            $imageName = 'flow_1_2' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img1_2 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img1_3')) {
            $image = $request->file('flow_img1_3');
            $imageName = 'flow_1_3' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img1_3 = $imageName;
            $flow->save();
        }

        if ($request->file('flow_img2_1')) {
            $image = $request->file('flow_img2_1');
            $imageName = 'flow_2_1' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img2_1 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img2_2')) {
            $image = $request->file('flow_img2_2');
            $imageName = 'flow_2_2' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img2_2 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img2_3')) {
            $image = $request->file('flow_img2_3');
            $imageName = 'flow_2_3' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img2_3 = $imageName;
            $flow->save();
        }

        if ($request->file('flow_img3_1')) {
            $image = $request->file('flow_img3_1');
            $imageName = 'flow_3_1' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img3_1 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img3_2')) {
            $image = $request->file('flow_img3_2');
            $imageName = 'flow_3_2' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img3_2 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img3_3')) {
            $image = $request->file('flow_img3_3');
            $imageName = 'flow_3_3' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img3_3 = $imageName;
            $flow->save();
        }

        if ($request->file('flow_img4_1')) {
            $image = $request->file('flow_img4_1');
            $imageName = 'flow_4_1' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img4_1 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img4_2')) {
            $image = $request->file('flow_img4_2');
            $imageName = 'flow_4_2' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img4_2 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img4_3')) {
            $image = $request->file('flow_img4_3');
            $imageName = 'flow_4_3' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img4_3 = $imageName;
            $flow->save();
        }

        if ($request->file('flow_img5_1')) {
            $image = $request->file('flow_img5_1');
            $imageName = 'flow_5_1' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img5_1 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img5_2')) {
            $image = $request->file('flow_img5_2');
            $imageName = 'flow_5_2' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img5_2 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img5_3')) {
            $image = $request->file('flow_img5_3');
            $imageName = 'flow_5_3' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img5_3 = $imageName;
            $flow->save();
        }

        //Create scene
        $scene_title1 = $request->scene_title1;
        $scene_title2 = $request->scene_title2;
        $scene_title3 = $request->scene_title3;
        $scene_title4 = $request->scene_title4;
        $scene_title5 = $request->scene_title5;

        $scene_text1 = $request->scene_content1;
        $scene_text2 = $request->scene_content2;
        $scene_text3 = $request->scene_content3;
        $scene_text4 = $request->scene_content4;
        $scene_text5 = $request->scene_content5;

        $scene = Scene::create([
            'title1' => $scene_title1,
            'title2' => $scene_title2,
            'title3' => $scene_title3,
            'title4' => $scene_title4,
            'title5' => $scene_title5,
            'text1' => $scene_text1,
            'text2' => $scene_text2,
            'text3' => $scene_text3,
            'text4' => $scene_text4,
            'text5' => $scene_text5
        ]);

        $service->scene_id = $scene->id;
        $service->save();

        return redirect(route('admin.services'));
    }

    public function service_edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }

    public function service_update(Request $request, $id)
    {
        $service = Service::find($id);

        $service->status = $request->status;
        $service->title =  $request->title;
        $service->top = $request->top_content;
        $service->main = $request->main_content;
        $service->status = $request->status;
        $service->postDateTime = $request->postDateTime;
        $service->metaTitle = $request->metaTitle;
        $service->metaDescription = $request->metaDescription;
        $service->customizable = $request->custom;
        if (isset($request->image)) {
            $imageName = 'service_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/service'), $imageName);
            $service->img = $imageName;
            $service->save();
        }

        if (isset($service->flow_id)) {
            $flow = Flow::find($service->flow_id);
            $flow->text1 = $request->flow_text1;
            $flow->text2 = $request->flow_text2;
            $flow->text3 = $request->flow_text3;
            $flow->text4 = $request->flow_text4;
            $flow->text5 = $request->flow_text5;
            $flow->save();
        } else {
            $flow = Flow::create([
                'text1' => $request->flow_text1,
                'text2' => $request->flow_text2,
                'text3' => $request->flow_text3,
                'text4' => $request->flow_text4,
                'text5' => $request->flow_text5
            ]);
            $service->flow_id = $flow->id;
            $service->save();
        }

        if ($request->file('flow_img1_1')) {
            $image = $request->file('flow_img1_1');
            $imageName = 'flow_1_1' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img1_1 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img1_2')) {
            $image = $request->file('flow_img1_2');
            $imageName = 'flow_1_2' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img1_2 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img1_3')) {
            $image = $request->file('flow_img1_3');
            $imageName = 'flow_1_3' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img1_3 = $imageName;
            $flow->save();
        }

        if ($request->file('flow_img2_1')) {
            $image = $request->file('flow_img2_1');
            $imageName = 'flow_2_1' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img2_1 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img2_2')) {
            $image = $request->file('flow_img2_2');
            $imageName = 'flow_2_2' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img2_2 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img2_3')) {
            $image = $request->file('flow_img2_3');
            $imageName = 'flow_2_3' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img2_3 = $imageName;
            $flow->save();
        }

        if ($request->file('flow_img3_1')) {
            $image = $request->file('flow_img3_1');
            $imageName = 'flow_3_1' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img3_1 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img3_2')) {
            $image = $request->file('flow_img3_2');
            $imageName = 'flow_3_2' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img3_2 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img3_3')) {
            $image = $request->file('flow_img3_3');
            $imageName = 'flow_3_3' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img3_3 = $imageName;
            $flow->save();
        }

        if ($request->file('flow_img4_1')) {
            $image = $request->file('flow_img4_1');
            $imageName = 'flow_4_1' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img4_1 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img4_2')) {
            $image = $request->file('flow_img4_2');
            $imageName = 'flow_4_2' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img4_2 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img4_3')) {
            $image = $request->file('flow_img4_3');
            $imageName = 'flow_4_3' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img4_3 = $imageName;
            $flow->save();
        }

        if ($request->file('flow_img5_1')) {
            $image = $request->file('flow_img5_1');
            $imageName = 'flow_5_1' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img5_1 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img5_2')) {
            $image = $request->file('flow_img5_2');
            $imageName = 'flow_5_2' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img5_2 = $imageName;
            $flow->save();
        }
        if ($request->file('flow_img5_3')) {
            $image = $request->file('flow_img5_3');
            $imageName = 'flow_5_3' . time() . '.' . $image->extension();
            $image->move(public_path('upload/service/flow'), $imageName);
            $flow->img5_3 = $imageName;
            $flow->save();
        }

        if (isset($service->scene_id)) {
            $scene = Scene::find($service->scene_id);
            $scene->title1 = $request->scene_title1;
            $scene->title2 = $request->scene_title2;
            $scene->title3 = $request->scene_title3;
            $scene->title4 = $request->scene_title4;
            $scene->title5 = $request->scene_title5;

            $scene->text1 = $request->scene_content1;
            $scene->text2 = $request->scene_content2;
            $scene->text3 = $request->scene_content3;
            $scene->text4 = $request->scene_content4;
            $scene->text5 = $request->scene_content5;
            $scene->save();
        } else {
            $scene = Scene::create([
                'title1' => $request->scene_title1,
                'title2' => $request->scene_title2,
                'title3' => $request->scene_title3,
                'title4' => $request->scene_title4,
                'title5' => $request->scene_title5,
                'text1' => $request->scene_content1,
                'text2' => $request->scene_content2,
                'text3' => $request->scene_content3,
                'text4' => $request->scene_content4,
                'text5' => $request->scene_content5
            ]);
            $service->scene_id = $scene->id;
        }
        $service->save();
        return view('admin.service.single', compact('service'));
    }

    public function service_delete($id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect(route('admin.services'));
    }

    public function ckeditor_upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $ck_img = $request->file('upload');
            $ck_imgName = 'ckImg_' . time() . '.' . $ck_img->extension();
            $ck_img->move(public_path('upload/ck_editor'), $ck_imgName);
            $url = asset('upload/ck_editor/' . $ck_imgName);
        }

        return response()->json(['url' => $url]);
    }

    //user CRUD
    public function users()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function user_add()
    {
        return view('admin.user.add');
    }

    public function user_store(Request $request)
    {
        User::create([
            'role_id' => 2,
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        return redirect(route('admin.users'));
    }

    public function user_edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function user_update(Request $request, $id)
    {
        $user = User::find($id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('admin.user.single', $user->id));
    }

    public function user_single($id)
    {
        $user = User::find($id);
        return view('admin.user.single', compact('user'));
    }

    public function user_delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('admin.users'));
    }
}
