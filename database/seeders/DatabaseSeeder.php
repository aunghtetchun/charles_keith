<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Game;
use App\Models\User;
use Faker\ORM\CakePHP\Populator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(10)->create();
        //Category::factory()->count(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//        $games =  [
//            (Object) [
//                "title" => "PUPG",
//                "cover" => "https://img.smile.one/media/catalog/product/a/wc/awcsk3xmtc1rt6w1645176090.jpg",
//                "profile" => "https://img.smile.one/media/catalog/product/b/la/blav2rpw3ct79n21611824364.png",
//                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolore ea esse harum hic laborum, praesentium quia. Accusantium consequuntur ducimus eaque esse explicabo, laudantium non nostrum pariatur praesentium quas ut. ",
//                "currencies" => [
//                    (Object) [
//                        "name" => "56 uc",
//                        "game_id" => 1,
//                        "bonus" => 10,
//                        "rate" => 20,
//                        "icon" => "https://img.smile.one/media/catalog/product/n/an/nan0ugwrgqjkjmi1611217417.png"
//                    ],
//                    (Object) [
//                        "name" => "98 uc",
//                        "game_id" => 1,
//                        "bonus" => 20,
//                        "rate" => 40,
//                        "icon" => "https://img.smile.one/media/catalog/product/n/an/nan0ugwrgqjkjmi1611217417.png"
//                    ],
//                ]
//            ],
//            (Object) [
//                "title" => "Mobile Legends: Bang Bang",
//                "cover" => "https://img.smile.one/media/catalog/product/0/58/0583fyha3ih5ol21654073344.jpg",
//                "profile" => "https://img.smile.one/media/catalog/product/t/r2/tr2a33y0o7ywber1621152550.png",
//                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolore ea esse harum hic laborum, praesentium quia. Accusantium consequuntur ducimus eaque esse explicabo, laudantium non nostrum pariatur praesentium quas ut. ",
//                "currencies" => [
//                    (Object) [
//                        "name" => "260 diamond",
//                        "game_id" => 2,
//                        "bonus" => 78,
//                        "rate" => 50,
//                        "icon" => "https://img.smile.one/media/catalog/product/a/8p/a8pzo9kq8mclzee1569483424.png"
//                    ],
//                    (Object) [
//                        "name" => "Starlight Member Plus",
//                        "game_id" => 2,
//                        "bonus" => null,
//                        "rate" => 400,
//                        "icon" => "https://img.smile.one/media/catalog/product/n/mh/nmho19ru5n7wcc01635325466.png"
//                    ],
//                ]
//            ],
//            (Object) [
//                "title" => "Free Fire",
//                "cover" => "https://img.smile.one/media/catalog/product/w/qy/wqyu36lz00n2q9d1645510257.jpg",
//                "profile" => "https://img.smile.one/media/catalog/product/p/2d/p2ds73tgspayqoi1650336328.jpg",
//                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolore ea esse harum hic laborum, praesentium quia. Accusantium consequuntur ducimus eaque esse explicabo, laudantium non nostrum pariatur praesentium quas ut. ",
//                "currencies" => [
//                    (Object) [
//                        "name" => "120 diamantes",
//                        "game_id" => 3,
//                        "bonus" => 85,
//                        "rate" => 30,
//                        "icon" => "https://img.smile.one/media/catalog/product/x/q7/xq7qju4kqkx4s661645599055.png"
//                    ],
//                    (Object) [
//                        "name" => "210 diamantes",
//                        "game_id" => 3,
//                        "bonus" => 85,
//                        "rate" => 60,
//                        "icon" => "https://img.smile.one/media/catalog/product/x/q7/xq7qju4kqkx4s661645599055.png"
//                    ],
//                ]
//            ]
//        ];
//
//        foreach ($games as $game){
//            Game::factory()->create([
//               "title" => $game->title,
//               "slug" => Str::slug($game->title) ,
//                "cover" => $game->cover,
//                "profile" => $game->profile,
//                "description" => $game->description
//            ]);
//            foreach ($game->currencies as $currency){
//                Currency::factory()->create([
//                    "name" => $currency->name,
//                    "game_id" => $currency->game_id,
//                    "bonus" => $currency->bonus,
//                    "rate" => $currency->rate,
//                    "icon" => $currency->icon
//                ]);
//            }
//        }

        $this->call([
//            UserSeeder::class,
//            CategorySeeder::class,
//            PostSeeder::class,
//        PhotoSeeder::class,
        StockSeeder::class,
        ]);

        $files = Storage::allFiles("public");
        array_shift($files);
        Storage::delete($files);
        echo "Storage/Public is cleaned \n";
    }
}
