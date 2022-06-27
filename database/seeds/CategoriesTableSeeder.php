 <?php

use Illuminate\Database\Seeder;
use illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorieslist = ['primi piatti','secondi piatti','Contori','Antipasti','Dolci'];
        forEach($categorieslist as $category){
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->slug = Str::of( $newCategory->name)->slug('-');
            
            $newCategory->save();


        }
    }
}
