<?php

namespace App\Actions\Dashboard;

use App\Models\Announcement;
use App\Models\Article;
use App\Models\user;
use DOMDocument;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SaveUserAction
{
    protected User $user;

    public function execute(User $user, array $data)
    {
        $this->user = $user;
        $this->user->name = $data['name'];
        $this->user->institution = $data['institution'];
        $this->user->email = $data['email'];
        $this->user->tel = $data['tel'];
        $this->user->role_id = $data['role_id'];
        if (isset($data['password']) && !empty($data['password'])) {     //ถ้ามีการส่งรหัสผ่านมาและไม่ว่าง แต่หากมีจึงอัปเดตรหัสผ่าน แต่ถ้าไม่มีและไม่เปลี่ยนใช้รหัสผ่านเดิม
            $this->updateUserPassword($data['password']);
        }       
        $this->user->save();
        $this->user = $this->user->fresh(); 
        return $this->user;
    }

    private function updateUserPassword($password)
    {
        $this->user->password = Hash::make($password);
    }

    
}
