<?php

namespace Database\Seeders;

use App\Models\Floor;
use App\Models\Room;
use App\Models\Room_image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->importRoomImage();
        $this->importFloor();
        $this->importRoom();
    }

    public function importRoom()
    {
        $room = new Room();
        $room->id = 1;
        $room->name = '101';
        $room->price = 1010;
        $room->convenient = 'wifi dieu hoa';
        $room->image_path = 'https://t-cf.bstatic.com/xdata/images/hotel/max1024x768/242673394.jpg?k=e1fdb81382403d0379cea2961d2b7dd56910615cac951e8c5b9dd77818c3e8a7&o=&hp=1';
        $room->description = 'Chỗ nghỉ này cách bãi biển 6 phút đi bộ. Tọa lạc tại thành phố Vũng Tàu, cách Bãi Sau 500 m, Cen Hotel cung cấp chỗ nghỉ với quầy bar, chỗ đỗ xe riêng miễn phí, sảnh khách chung và sân hiên. Mỗi chỗ nghỉ tại khách sạn 2 sao này đều có tầm nhìn ra quang cảnh thành phố và WiFi miễn phí. Chỗ nghỉ cung cấp dịch vụ lễ tân 24 giờ, dịch vụ phòng và dịch vụ thu đổi ngoại tệ cho khách.';
        $room->status = 'còn phong';
        $room->room_type_id = 1;
        $room->floor_id = 1;
        $room->save();

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
        $room_image->name = 'https://www.booking.com/hotel/vn/cen.vi.html?aid=336510&label=vung-tau-ebvRZrxrYrZticXkFlIA3gS154361308794%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atikwd-59440018417%3Alp9040348%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YXL5GV3cgz10NyjSyBn12N8&sid=1c9f19e0cc2e5eb8fa6319ce53df932b&dest_id=-3733750;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;hpos=1;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;srepoch=1658244715;srpvid=21946d354f160484;type=total;ucfs=1&#';
        $room_image->room_id = 1;
        $room_image->save();
    }

}
