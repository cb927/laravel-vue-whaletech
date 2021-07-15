<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Service;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use stdClass;
use App\Mail\ContactMail;
use App\Mail\RecruitMail;
use App\Mail\ContactMailUser;
use App\Mail\RecruitMailUser;

class HomeController extends Controller
{
    //
    public function index()
    {
        $works = Work::where('status', '公開')->orderBy('postDateTime', 'desc')->offset(0)->limit(10)->get();
        $services = Service::where('status', '公開')->orderBy('postDateTime', 'desc')->offset(0)->limit(3)->get();
        $blogs = Blog::where('status', '公開')->orderBy('postDateTime', 'desc')->offset(0)->limit(3)->get();

        return view('welcome', compact('services', 'works', 'blogs'));
    }

    public function recruit()
    {
        return view('user.recruit');
    }

    public function recruit_post(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $fileName = 'entry_' . time() . '.' . $request->file->extension();
        $request->file->move(public_path('upload/entry'), $fileName);
        $fileLink = '/upload/entry/' . $fileName;

        $entry = new stdClass();
        $entry->name = $request->name;
        $entry->phone = $request->phone;
        $entry->email = $request->email;
        $entry->message = $request->message;
        $entry->fileLink = $fileLink;
        $entry->fileName = $fileName;

        Mail::to(config('app.entry_mail_to'))->send(new RecruitMail($entry));
        Mail::to($entry->email)->send(new RecruitMailUser($entry));

        return back();
    }

    public function company()
    {
        return view('user.company');
    }
    public function contact()
    {
        return view('user.contact');
    }

    public function contact_post(Request $request)
    {
        $contact = new stdClass();
        $contact->com_name = $request->com_name;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;

        Mail::to(config('app.contact_mail_to'))->send(new ContactMail($contact));
        Mail::to($contact->email)->send(new ContactMailUser($contact));

        return back();
    }

    public function sitemap()
    {
        $works = Work::where('status', '公開')->get();
        $services = Service::where('status', '公開')->get();
        $blogs = Blog::where('status', '公開')->get();

        return view('user.sitemap', compact('works', 'services', 'blogs'));
    }

    public function blogs(Request $request)
    {
        $all_blogs = Blog::where('status', '公開')->get();
        if (!isset($request->tag)) {
            $active = 'all';
            $blogs = Blog::where('status', '公開')->orderBy('postDateTime', 'desc')->paginate(9);
        } else {
            $blogs = Blog::where('status', '公開')->orderBy('postDateTime', 'desc')
                ->where('tags', 'LIKE', '%' . ',' . $request->tag)
                ->orWhere('tags', 'LIKE', $request->tag . ',' . '%')
                ->orWhere('tags', 'LIKE', '%' . ',' . $request->tag . ',' . '%')
                ->orWhere('tags', $request->tag)
                ->paginate(9);
            $active = $request->tag;
        }

        $tags = [];
        foreach ($all_blogs as $item) {
            $blog_tags = explode(',', $item->tags);
            foreach ($blog_tags as $tag) {
                if (!in_array($tag, $tags)) {
                    array_push($tags, $tag);
                }
            }
        }

        return view('user.blog.index', compact('blogs', 'tags', 'active'));
    }

    public function blog_single($id)
    {
        $blog = Blog::find($id);
        $tags = explode(',', $blog->tags);
        $next_id = Blog::where('postDateTime', '>', $blog->postDateTime)->min('postDateTime');
        $prev_id = Blog::where('postDateTime', '<', $blog->postDateTime)->max('postDateTime');
        $next = Blog::where('postDateTime', $next_id)->first();
        $prev = Blog::where('postDateTime', $prev_id)->first();

        return view('user.blog.single', compact('blog', 'tags', 'next', 'prev'));
    }

    public function works(Request $request)
    {
        $all_works = Work::where('status', '公開')->get();
        if (!isset($request->tag)) {
            $active = 'all';
            $works = Work::where('status', '公開')->orderBy('postDateTime', 'desc')->paginate(8);
        } else {
            $works = Work::where('status', '公開')->orderBy('postDateTime', 'desc')->where('tags', 'LIKE', '%' . $request->tag . '%')->paginate(8);
            $active = $request->tag;
        }

        $tags = [];
        foreach ($all_works as $item) {
            $work_tags = explode(',', $item->tags);
            foreach ($work_tags as $tag) {
                if (!in_array($tag, $tags)) {
                    array_push($tags, $tag);
                }
            }
        }

        return view('user.work.index', compact('works', 'tags', 'active'));
    }
    public function work_single($id)
    {
        $work = Work::find($id);
        $intro = $work->introduction;
        return view('user.work.single', compact('work'));
    }

    public function services()
    {
        $services = Service::where('status', '公開')->orderBy('postDateTime', 'desc')->paginate(5);
        return view('user.service.index', compact('services'));
    }

    public function service_single($id)
    {
        $service = Service::find($id);

        return view('user.service.single', compact('service'));
    }
}
