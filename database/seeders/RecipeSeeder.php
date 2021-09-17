<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        Recipe::factory()->create([
            'title' => 'French-style Lemon Tart',
            'thumbnail' => 'https://source.unsplash.com/random?tart',
            'content' => 'Pre-heat the oven to 350°F (180°C).
                Prepare the lemon curd by whisking the egg yolks, whole eggs, sugar, lemon juice and lemon zest over a bain marie (a large bowl placed over a pan of simmering hot water).
                Once combined, mix in the butter and whisk the mixture for about 10 minutes, until thick.
                Pour into a pre-baked tart shell.
                Bake for 6 minutes.
                Whilst the tart is baking, prepare the raspberry chantilly by whipping the raspberries, sugar, vanilla extract and cream together.
                Leave the tart to cool before dusting with icing sugar.
                Serve with the raspberry chantilly, fresh raspberries and mint for garnish.
                Enjoy!'
        ]);

        Recipe::factory()->create([
            'title' => 'Passion Fruit Flan',
            'thumbnail' => 'https://source.unsplash.com/random?flan',
            'content' => 'Pour a cup of sugar (200g) and ⅓ cups (80ml) of passion fruit juice into a saucepan over a medium heat. Let the sugar melt and form a golden color. Don not over stir. Take off the heat.
                Spoon the caramel into each ramekin, and swirl it around so the bottom is covered. Set aside to cool.
                In another saucepan, heat heavy cream, whole milk, vanilla extract, and two tablespoons of passion fruit juice. Stir until well mixed and hot.
                In a large bowl, mix egg yolks, eggs, and gradually pour in the hot passion fruit cream mixture until fully incorporated. Pour the mixture through a sieve to make the mixture smooth.
                Place the ramekins into a large roasting pan. Pour hot water into the pan to come roughly halfway up the sides of the ramekins. Pour the mixture into the ramekins and bake at 350˚F (180˚C) for 45 minutes.
                Let the flan cool outside the oven, and then refrigerate it for at least two hours.
                When you are ready to serve the flan, run a knife around the edges to loosen, place a dish over the top of the ramekin and quickly invert it.
                Enjoy!'
        ]);

        Recipe::factory()->create([
            'title' => 'High-Protein Chia Seed Jam',
            'thumbnail' => 'https://source.unsplash.com/random?jelly',
            'content' => 'Combine the berries and water in a small saucepan over medium-low heat. Cook for 15-20 minutes, stirring frequently, until the fruit is broken down and the mixture is saucy.
                Remove the pot from the heat and stir in the chia seeds, lemon juice, honey (start with a small amount and add more as needed, depending on how sweet the fruit is), and salt.
                Let sit for 10 minutes to allow the chia seeds to hydrate and thicken the jam.
                Then transfer to a resealable jar. The jam will keep in the refrigerator for up to 1 month.
                Enjoy!',
        ]);

        Recipe::factory()->create([
            'title' => 'Banana Peanut Butter French Toast Roll-up',
            'thumbnail' => 'https://source.unsplash.com/random?bread',
            'content' => 'Roll each slice of bread flat with a rolling pin. Carefully cut off the crusts.
                Spread desired amount of peanut butter and bananas along the edge of the bread, and roll up.
                In a bowl, combine eggs, milk, cinnamon, and vanilla.
                Dip each roll-up in egg mixture, and pan-fry in a buttered skillet until all sides are golden brown.
                Enjoy!',
        ]);

        Recipe::factory()->create([
            'title' => 'Caramel Apple Bake',
            'thumbnail' => 'https://source.unsplash.com/random?caramel',
            'content' => 'Preheat oven to 350ºF (180ºC).
                Core apples and cut into ¼-inch (6 mm) slices, then cut those slices in half width-wise.
                In a large bowl, combine apples and all filling ingredients. Stir well and transfer to a 13x9 inch (23x33 cm) baking dish.
                For the topping - in a separate bowl, combine all topping ingredients and mash together with a fork until it forms into small and medium-sized clumps.
                Sprinkle the topping evenly over the apples.
                Bake for 40-45 minutes or until the liquid has thickened and the apples are tender.
                Cool for 10 minutes and serve with a scoop of vanilla ice cream.
                Enjoy!',
        ]);

        Recipe::factory()->create([
            'title' => 'Chocolate Hazelnut Mug Cakes',
            'thumbnail' => 'https://source.unsplash.com/random?nutella',
            'content' => 'In a medium mixing bowl, whisk together ¾ cup (225 g) chocolate hazelnut spread and the eggs.
                Fold in the flour.
                Evenly distribute into two mugs.
                Microwave each mug for 2 minutes.
                Cool for 5 minutes.
                Frost with remaining chocolate hazelnut spread and serve warm.
                Enjoy!',
        ]);

        Recipe::factory()->create([
            'title' => 'Chocolate Chip Cookies',
            'thumbnail' => 'https://source.unsplash.com/random?cookies',
            'content' => 'Preheat oven to 375°F (190°C).
                In a large bowl, whisk together the brown sugar, granulated sugar, and melted butter, until evenly combined and light in color.
                Add in the eggs and vanilla, mixing until smooth.
                Add the flour and baking powder, folding the mixture until it forms a smooth dough.
                Fold in the chocolate chips until evenly combined.
                Using an ice cream scoop, scoop 6 balls of dough onto a baking tray lined with parchment paper.
                Bake for 12 minutes, then serve!
                To save cookie dough for later use, scoop the dough into balls and place them side-by-side on a baking tray lined with parchment paper.
                Wrap the tray with cling wrap, then freeze for up to one month.
                To bake the frozen dough balls, remove desired number from the tray and bake in a preheated oven for 15 minutes at 375°F (190°C).
                Enjoy!',
        ]);

        Recipe::factory()->create([
            'title' => 'Cloud Bread',
            'thumbnail' => 'https://source.unsplash.com/random?toasts',
            'content' => 'Preheat oven to 300°F (150°C).
                Separate the eggs into two bowls.
                Add the cream of tartar to the egg whites and whip into stiff peaks.
                Add the cream cheese or yogurt into the yolks and mix until combined.
                Fold half of the egg whites into the yolks until just combined. Add the rest and fold again until incorporated.
                Line a baking sheet with parchment paper and place six dollops of the mixture on the tray.
                Spread out the circles with a spatula to about ½ inch (1 cm) thick.
                Bake for 30 minutes or until golden.
                Allow to cool for at least 1 hour.
                Enjoy!',
        ]);

        Recipe::factory()->create([
            'title' => 'Oreo-stuffed Doughnut Holes',
            'thumbnail' => 'https://source.unsplash.com/random?toasts',
            'content' => 'Quarter the flaky biscuit dough.
                Take one quarter and flatten with your finger. Place a mini Oreo in the center and close the biscuit dough around it. Make sure to seal the seam as much as possible. Repeat with the rest of the biscuit dough.
                Fry the doughnut holes until golden brown. Set aside to cool down.
                Combine powder sugar and whole milk to form the glaze. Dip the fried doughnut holes in the glaze. Sprinkle crushed Oreo cookies over the top while the glaze is still wet.
                Enjoy!',
        ]);

        Recipe::factory()->create([
            'title' => 'Raspberry Jam Puff Pastry Hearts',
            'thumbnail' => 'https://source.unsplash.com/random?toasts',
            'content' => 'Preheat oven to 400˚F (200˚C).
                Cut the puff pastry into 9 equal squares.
                Taking one of the squares, place 1 teaspoon of raspberry jam in the center.
                Brush egg wash on each side of the square.
                Take each corner and bring them together the seal the jam inside the dough
                Flip so the pinched side is on the underside. Flatten with the palm of your hand until the patty is about 1-inch thick.
                Make 8 even cuts around the circle making sure the cuts do not touch in the center.
                Take 2 of the cut sections and turn them inward to create the heart shape. Repeat with the other 6 sections.
                Repeat with the remaining pastry squares.
                Bake for 15–20 minutes until pastry is golden brown and puffed.
                Serve with a sprinkle of powdered sugar.
                Enjoy!',
        ]);

        Recipe::factory()->create([
            'title' => 'Mini Vanilla Apple Strudels',
            'thumbnail' => 'https://source.unsplash.com/random?cake',
            'content' => 'Peel and dice apples and put them in a large bowl. Set apple peel aside for decoration, if desired.
                Add lemon juice, sugar, and almonds, and mix.
                Roll out half of the puff pastry until thin, and cut into three even, long slices. Coat the slices with cream.
                Spread half the apple mixture on all three slices, covering three quarters and leaving about an inch (2 ½ cm) empty at the sides.
                Brush all the edges except the bottom one with water.
                Roll the dough over the apple mixture from bottom to top, until you have even rolls. Pinch the sides of the rolls to seal them with dough.
                Cut rolls in the middle and transfer with the closed side down into a greased muffin pan. Repeat with second half of puff pastry and apple mixture until you have 12 strudels.
                Mix vanilla powder with half of the milk described in package, usually 1 ½ cups (355 ml).
                Pour 2-3 tablespoons into each strudel.
                Spread egg wash over strudels.
                Bake at 400˚F(200˚C) for 25-30 minutes, until golden brown.
                Take strudels out of the pan and dust with powdered sugar. The leftover apple peel can be rolled into “roses” for decoration.
                Enjoy!',
        ]);

        $user = User::query()->where('email', 'user@mail.com')->first();

        Recipe::factory()->create([
            'author_id' => $user->id,
            'title' => $title = 'Banana Pudding',
            'slug' => Str::of($title)->slug()->__toString(),
            'thumbnail' => 'https://source.unsplash.com/random?pudding',
            'content' => 'Place the bananas, egg yolks, sugar, cornstarch, vanilla and milk into a blender and blitz until smooth.
                Transfer mixture to a saucepan and cook over medium heat until thick stir constantly for about 8-10 minutes.
                Pour mixture into a heat safe bowl, cover and chill for at least 4 hours
                To serve, scoop a few spoonfuls of pudding into a serving glass. Add one layer of vanilla wafers, then whipped cream. Repeat.
                Serve or allow to sit in the fridge for up to 4 hours.
                Enjoy!',
        ]);

        Recipe::factory()->create([
            'author_id' => $user->id,
            'title' => $title = 'Chocolate Mousse',
            'slug' => Str::of($title)->slug()->__toString(),
            'thumbnail' => 'https://source.unsplash.com/random?mousse',
            'content' => 'In a large bowl, combine the heavy cream and the sugar, beating with an electric mixer until soft peaks form when lifted from the bowl. Set aside two large spoonfuls of the whipped cream to garnish with at the end.
                Whisk the chocolate and hot cream in a separate bowl until smooth, then fold in the mixture into the cream with a spatula until no streaks remain.
                Split the chocolate cream mixture evenly between two martini glasses or your serving dish of choice, then chill for at least 1 hour.
                Garnish with a spoonful of whipped cream, raspberries, mint, and the chocolate cookie.
                Enjoy!',
        ]);

        Recipe::factory()->create([
            'author_id' => $user->id,
            'title' => $title = 'Strawberry Banana Smoothie Meal Prep',
            'slug' => Str::of($title)->slug()->__toString(),
            'thumbnail' => 'https://source.unsplash.com/random?strawberries',
            'content' => 'Put fruit in a freezer bag. Seal and store in freezer for up to 8 - 12 months.
                When ready to use, put milk, Greek yogurt, and frozen fruit into a blender and mix until consistency is smooth.
                Enjoy!',
        ]);
    }
}
