<?php

namespace App\Http\Transformers;


use App\Models\Announcement;
use App\Models\User;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected array $availableIncludes = ['image', 'documents'];

    public function transform(User $user): array
    {
        $data = [
            'id' => $user->id,
            'name' => $user->name,
            'institution' => $user->institution,
            'role_id' => $user->role_id, 
            'role' => $user->role->toArray(),
            'email' => $user->email,
            'tel' => $user->tel,
        ];
        return $data;
    }



}
