<?php

namespace App\Policies;

use App\Conversation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

/*    public function before(User $user)    // logic moved to AuthServiceProvider@boot as Gate::before closure
    {
        if ($user->id == 3) {  // admin id = 3  ->isAdmin() ->roles())
            return true;
        }
//        return $user->id == 3;
    }*/

    public function after(User $user)
    {

    }

    /**
     * Determine whether the user can update the conversation.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function update(User $user, Conversation $conversation)
//    public function create(User $user, Conversation $conversation)  // name changed to match a mapping convention between the controller action and the associated Policy name
    {   // admin_id = 3
//        ddd('hello');
        return $conversation->user->is($user)/* || $user->id == 3*/;    // homework: consider the example where the administrator may also update the thread
    }

    public function view(User $user, Conversation $conversation)
    {
        return $conversation->user->is($user);
    }
 }
