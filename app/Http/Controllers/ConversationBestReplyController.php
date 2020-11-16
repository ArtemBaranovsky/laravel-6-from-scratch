<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ConversationBestReplyController extends Controller
{
    public function store(Reply $reply)
    {
        // authorize that the current user has permission to set the best reply for the conversation
/*        if (Gate::denies('update-conversation', $reply->conversation)) {  // or Gate::allows() - the same as $this->authorize()
            die('handle it this way');      // stick with the authorize() method unless you need special control over it
        }*/

//        $this->authorize('update-conversation', $reply->conversation);
        $this->authorize('update', $reply->conversation);   // action renamed as at the policy
//        $this->authorize($reply->conversation);   // if delete ability param, laravel will try to figure out which policy method it should call

        // then set it
//        $reply->conversation->best_reply_id = $reply->id;
//        $reply->conversation->save();
        $reply->conversation->setBestReply($reply);
        // redirect back to the conversation page
        return back();
    }
}
