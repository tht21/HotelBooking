<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Customers;
use App\Models\Floor;
use App\Models\Room;
use App\Models\Room_image;
use App\Models\RoomBooking;
use App\Models\RoomType;
use App\Models\User;
use App\Models\UserGroup;
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
        $this->importRoles();
        $this->importUserGroups();
        $this->importUserGroupRoles();
        $this->importUser();

        $this->importRoomType();
        $this->importCustomer();
        $this->importFloor();
        $this->importRoom();
        $this->importRoomImage();
        $this->importBooking();
        $this->importRoomBooking();
    }

    public function importBooking()
    {
        $booking = new Booking();
        $booking->id = 1;
        $booking->from_date = '2022-07-07';
        $booking->to_date = '2022-07-08';
        $booking->limit_people = 3;
        $booking->note = '123';
        $booking->total_room = 1;
        $booking->customer_id = 1;
        $booking->user_id = 1;
        $booking->save();

    }

    public function importRoomBooking()
    {
        $roomBooking = new RoomBooking();
        $roomBooking->id = 1;
        $roomBooking->room_id = 1;
        $roomBooking->booking_id = 1;
        $roomBooking->save();

    }

    public function importUserGroups()
    {
        $userGroup = new UserGroup();
        $userGroup->name = 'Supper Admin';
        $userGroup->save();

        $userGroup = new UserGroup();
        $userGroup->name = 'Quản Lý';
        $userGroup->save();

        $userGroup = new UserGroup();
        $userGroup->name = 'Giám Đốc';
        $userGroup->save();


        $userGroup = new UserGroup();
        $userGroup->name = 'Nhân Viên';
        $userGroup->save();
    }

    public function importUser()
    {

        $user = new User();
        $user->name = 'Huỳnh Văn Toàn';
        $user->email = 'toan1@gmail.com';
        $user->password = Hash::make('123456');
        $user->birth_day = '2002/09/24';
        $user->address = 'Quảng Trị';
        $user->avatar = 'upload/avatar_admin.jpg';
        $user->phone = '0935779035';
        $user->gender = 'Nam';
        $user->user_group_id = '2';
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
        $user->user_group_id = '3';
        $user->save();

        $user = new User();
        $user->name = 'Mai Chiếm An';
        $user->email = 'an@gmail.com';
        $user->password = Hash::make('123456');
        $user->birth_day = '2003/06/27';
        $user->phone = '0916663237';
        $user->address = 'Quảng Trị';
        $user->user_group_id = '3';
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
        $user->user_group_id = '4';
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
        $user->user_group_id = '1';
        $user->gender = 'Nam';
        $user->avatar = 'upload/avatar_admin.jpg';
        $user->save();
    }


    public function importRoles()
    {
        $groups = ['Rooms', 'User', 'UserGroup','Customers','Bookings','RoomType'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete'];
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
        for ($i = 1; $i <= 42; $i++) {
            DB::table('user_group_roles')->insert([
                'user_groups_id' => 1,
                'role_id' => $i,
            ]);
        }

    }

    public function importRoom()
    {
        $room = new Room();
        $room->id = 1;
        $room->name = '101';
        $room->price = 10;
        $room->convenient = 'wifi dieu hoa';
        $room->image_path = 'upload/avatar_admin.jpg';
        $room->description = 'Cen Hotel cung cấp chỗ nghỉ với quầy bar, chỗ đỗ xe riêng miễn phí';
        $room->status = '1';
        $room->room_types_id = 1;
        $room->floor_id = 1;
        $room->save();

        $room = new Room();
        $room->id = 2;
        $room->name = '102';
        $room->price = 10;
        $room->convenient = 'wifi dieu hoa';
        $room->image_path = 'upload/avatar_admin.jpg';
        $room->description = 'Cen Hotel cung cấp chỗ nghỉ với quầy bar, chỗ đỗ xe riêng miễn phí';
        $room->status = '0';
        $room->room_types_id = 1;
        $room->floor_id = 1;
        $room->save();

        $room = new Room();
        $room->id = 3;
        $room->name = '103';
        $room->price = 10;
        $room->convenient = 'wifi dieu hoa';
        $room->image_path = 'upload/avatar_admin.jpg';
        $room->description = 'Cen Hotel cung cấp chỗ nghỉ với quầy bar, chỗ đỗ xe riêng miễn phí';
        $room->status = '0';
        $room->room_types_id = 1;
        $room->floor_id = 1;
        $room->save();

        $room = new Room();
        $room->id = 4;
        $room->name = '104';
        $room->price = 10;
        $room->convenient = 'wifi dieu hoa';
        $room->image_path = 'upload/avatar_admin.jpg';
        $room->description = 'Cen Hotel cung cấp chỗ nghỉ với quầy bar, chỗ đỗ xe riêng miễn phí';
        $room->status = '0';
        $room->room_types_id = 1;
        $room->floor_id = 1;
        $room->save();

    }

    public function importRoomType()
    {
        $roomType = new RoomType();
        $roomType->id = 1;
        $roomType->name = 'VIP';
        $roomType->limit_people = 4;
        $roomType->save();

        $roomType = new RoomType();
        $roomType->id = 2;
        $roomType->name = 'Phòng Đôi';
        $roomType->limit_people = 2;
        $roomType->save();

        $roomType = new RoomType();
        $roomType->id = 3;
        $roomType->name = 'Phòng Đơn';
        $roomType->limit_people = 1;
        $roomType->save();

    }

    public function importFloor()
    {
        $floor = new Floor();
        $floor->id = 1;
        $floor->name = 1;
        $floor->save();

    }

    public function importRoomImage()
    {
        $room_image = new Room_image();
        $room_image->id = 1;
        $room_image->name = 'upload/avatar_admin.jpg';
        $room_image->room_id = 1;
        $room_image->save();
    }

    public function importCustomer()
    {
        $customers = new Customers();
        $customers->name = 'Linh';
        $customers->email = 'Linh@gmail.com';
        $customers->phone = 12345;
        $customers->address = 'Gio Linh';
        $customers->cmnd = 34567465342;
        $customers->save();

        $customers = new Customers();
        $customers->name = 'vinh';
        $customers->email = 'Vinh@gmail.com';
        $customers->phone = 12345;
        $customers->address = 'Gio Linh';
        $customers->cmnd = 34567465342;
        $customers->save();
    }


}
