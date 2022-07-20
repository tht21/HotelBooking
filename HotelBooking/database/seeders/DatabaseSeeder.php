<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User_groups;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->importUserGroups();
        $this->importUser();
        $this->importRoles();
        $this->importUserGroupRoles();
    }
    public function importUserGroups()
    {
        $userGroup = new User_groups();
        $userGroup->name = 'Supper Admin';
        $userGroup->save();

        $userGroup = new User_groups();
        $userGroup->name = 'Quản Lý';
        $userGroup->save();

        $userGroup = new User_groups();
        $userGroup->name = 'Giám Đốc';
        $userGroup->save();


        $userGroup = new User_groups();
        $userGroup->name = 'Nhân Viên';
        $userGroup->save();
    }

    public function importUser()
    {

        $user = new User();
        $user->name = 'Huỳnh Văn Toàn';
        $user->email = 'toan@gmail.com';
        $user->password = Hash::make('123456');
        $user->birth_day = '2002/09/24';
        $user->address = 'Quảng Trị';
        $user->avatar = 'upload/avatar_admin.jpg';
        $user->phone = '0935779035';
        $user->gender = 'Nam';
        $user->user_group_id  = '1';
        $user->save();

        $user = new User();
        $user->name = 'Võ Văn Tuấn';
        $user->email = 'tuan@gmail.com';
        $user->password = Hash::make('123456');
        $user->birth_day = '2002/04/24';
        $user->address = 'Quảng Trị';
        $user->avatar = 'upload/avatar_admin.jpg';
        $user->phone = '0777333274';
        $user->gender = 'Nam';
        $user->user_group_id  = '3';
        $user->save();

        $user = new User();
        $user->name = 'Mai Chiếm An';
        $user->email = 'an@gmail.com';
        $user->password = Hash::make('123456');
        $user->birth_day = '2003/06/27';
        $user->phone = '0916663237';
        $user->address = 'Quảng Trị';
        $user->user_group_id  = '1';
        $user->gender = 'Nam';
        $user->avatar = 'upload/avatar_admin.jpg';
        $user->save();

        $user = new User();
        $user->name = 'Nguyễn Văn Quốc Việt';
        $user->email = 'viet@gmail.com';
        $user->password = Hash::make('123456');
        $user->birth_day = '2001/03/21';
        $user->phone = '0123456789';
        $user->address = 'Quảng Trị';
        $user->user_group_id  = '4';
        $user->gender = 'Nam';
        $user->avatar = 'upload/avatar_admin.jpg';
        $user->save();

        $user = new User();
        $user->name = 'Trần Ngọc Linh';
        $user->email = 'Linh@gmail.com';
        $user->password = Hash::make('123456');
        $user->birth_day = '2003/11/11';
        $user->phone = '0123456788';
        $user->address = 'Quảng Trị';
        $user->user_group_id  = '4';
        $user->gender = 'Nam';
        $user->avatar = 'upload/avatar_admin.jpg';
        $user->save();
    }


    public function importRoles()
    {
        $groups     = ['Rooms', 'User', 'UserGroup'];
        $actions    = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }


    public function importUserGroupRoles()
    {
        for ($i = 1; $i <= 21; $i++) {
            DB::table('user_group_roles')->insert([
                'user_groups_id' => 1,
                'role_id' => $i,
            ]);
        }
    }
}
