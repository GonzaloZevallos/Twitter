<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TweetApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tweet::all();
    }

    public function getFeed() {
        $authId = 1;

        $tweets = Tweet::whereNull('parent_id')->whereIn('author_id', function($query) use($authId) {

            $query->select('followed_id')
                ->from('follows')
                ->where('follower_id', $authId);

        })->orWhere('author_id', $authId)->whereNull('parent_id')->latest()->with('author')->with('likers')->with('responses')->paginate(10);

        return [
            'tweets' => $tweets,
            'tweetsExists' => $tweets->count() > 0
        ];
    }

    public function getLast() {
        return [
            'tweet' => Tweet::where('author_id', 1)->latest()->with('author')->with('likers')->with('responses')->first()
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'content' => 'required|max:160',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'meta' => [
                    'errors' => true,
                    'status' => 'failed'
                ],
                'data' => [
                    'errors' => $validator->errors()
                ]
            ], 404);
        }


        // Create tweet
        $tweet = Tweet::create([
            'content' => $request->get('content'),
            'author_id' => $request->get('author_id'),
            'parent_id' => $request->has('parent_id') ? $request->get('parent_id') : null
        ]);

        $tweet['author'] = $tweet->author;

        return response()->json([
            'meta' => [
                'errors' => false,
                'status' => 'created'
            ],
            'data' => [
                'tweet' => $tweet
            ]
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
