<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stand;

class StandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stands = [
            [
                "no" => 218,
                "location" => "Jalan Bromo No.25, Wonosobo",
                "price" => 7000000,
                "area" => 16,
                "type" => "B2",
                "description" => "Stand ini cocok untuk Anda yang ingin membuka usaha makanan, tempat yang strategis dekat dengan perkantoran dan pusat kota menjadikan stand ini cocok untuk dijadikan tempat usaha Anda.",
                "facilities" => "Listrik, Air, Kitchen Bar, Wifi, dapur ada kompor dan kulkas.",
                "image" => "uploads/stands/1.jpg"
            ],[
                "no" => 430,
                "location" => "Jalan Elang No.50, Semarang",
                "price" => 8500000,
                "area" => 15,
                "type" => "A5",
                "description" => "Stand ini cocok untuk Anda yang memiliki usaha untuk outlet minuman kekinian. Tempat yang nyaman dan estetik untuk nongkrong anak millineals.",
                "facilities" => "Listrik, Air, Kitchen Bar, Wifi, Kulkas. Garden.",
                "image" => "uploads/stands/2.jpg"
            ],[
                "no" => 781,
                "location" => "Jalan Badak No.34, Purbalingga",
                "price" => 5000000,
                "area" => 12,
                "type" => "F8",
                "description" => "Stand ini memiliki tipe yang cukup luas untuk digunakan sebagai tempat usaha perabotan, seperti meja kursi dan lainnya. Letaknya mudah dijangkau dengan kualitas tempat yang mumpuni.",
                "facilities" => "Listrik, Air, Wifi, CCTV Keamanan, ",
                "image" => "uploads/stands/3.jpg"
            ],[
                "no" => 920,
                "location" => "Jalan Raya Timur No.215, Jakarta Utara",
                "price" => 9000000,
                "area" => 20,
                "type" => "H4",
                "description" => "Stand dengan desain ornamen yang instagramable ini cocok untuk dijadikan sebagai tempat usaha pakaian Anda. Dengan desain kekinian dan memudahkan untuk menarik pengunjung terutama para kaum hawa si fashionable.",
                "facilities" => "Listrik, Air, Wifi, Ac Portable, CCTV Keamanan.",
                "image" => "uploads/stands/4.jpg"
            ],[
                "no" => 799,
                "location" => "Jalan Bakung No.82,Cilacap  Selatan",
                "price" => 7500000,
                "area" => 35,
                "type" => "Z5",
                "description" => "Stand ini cocok untuk bisnis kuliner Anda, tempat strategis dan luas yang disajikan pemandangan pantai yang cukup menawan.",
                "facilities" => "Listrik, Air, Wifi, AC, Meja , kursi baru, CCTV Keamanan.",
                "image" => "uploads/stands/5.jpg"
            ],[
                "no" => 193,
                "location" => "Jalan Candi No.12,Margahayu, Bandung , Jawa Barat ",
                "price" => 10000000,
                "area" => 50,
                "type" => "G0",
                "description" => "Stand ini cocok dengan usaha Anda. Fleksibilitas untuk dipakai segala jenis usaha, perabotann cukup lengkap.",
                "facilities" => "Listrik, Air, Wifi, AC, Kitchen Bar, Halaman Parkir Luas, Kompor dan Kulkas.",
                "image" => "uploads/stands/6.jpg"
            ]
        ];
        foreach ($stands as $stand) {
            Stand::create($stand);
        }
    }
}
