<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blog_id' => 'required|exists:blogs,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'يرجى ملء جميع الحقول المطلوبة بشكل صحيح',
                'errors' => $validator->errors()
            ], 422);
        }

        $blog = Blog::findOrFail($request->blog_id);

        // Check if comments are allowed for this blog
        if (!$blog->allow_comments) {
            return response()->json([
                'success' => false,
                'message' => 'التعليقات غير مسموحة على هذا المقال'
            ], 403);
        }

        $comment = Comment::create([
            'blog_id' => $request->blog_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'is_approved' => false, // Comments need approval by default
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم إرسال تعليقك بنجاح! سيتم مراجعته قبل النشر.',
            'comment' => $comment
        ]);
    }

    public function getComments($blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $comments = $blog->approvedComments()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'comments' => $comments
        ]);
    }
}