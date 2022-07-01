<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "post_id" => Post::inRandomOrder()->first()->id,
            "name" =>$this->faker->randomElement(['https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dwd5e284f0/images/hi-res/2022-L3-SL1-61790013-1-07-2.jpg?sw=580&sh=774','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dweded72f6/images/hi-res/2021-L6-CK1-61720072-B8-3.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw746383c6/images/hi-res/2021-L6-CK6-10701130-50-3.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw3300e246/images/hi-res/2018-L2-CK3-71280306-13-2.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw7d360b92/images/hi-res/2022-L3-CK6-70770558-01-2.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dwdc3735d6/images/hi-res/2022-L3-CK6-70770558-01-1.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dwc0d7717d/images/hi-res/2022-L3-CK6-70770558-01-7.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw918de9ac/images/hi-res/2020-L3-CK9-71700088-08-2.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dwc0d4abbf/images/hi-res/2020-L3-CK9-71700088-08-4.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dwb6277b4c/images/hi-res/2022-L3-CK5-32120328-57-3.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dwb8c2fb9e/images/hi-res/2022-L3-CK5-32120328-57-7.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dwe83c9ade/images/hi-res/2022-L3-CK5-42120322-30-1.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw25761b59/images/hi-res/2022-L3-CK5-42120322-30-5.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dwd93b3b1a/images/hi-res/2022-L2-CK5-11470087-57-4.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw698cd2e4/images/hi-res/2022-L3-CK6-50770546-13-2.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dw43541f09/images/hi-res/2022-L3-CK6-50770546-13-7.jpg?sw=1152&sh=1536','https://www.charleskeith.com/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-ck-products/default/dwa3f4e81e/images/hi-res/2022-L3-CK6-50770546-13-5.jpg?sw=1152&sh=1536']),
        ];
    }
}
