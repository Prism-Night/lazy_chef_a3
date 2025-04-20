
INSERT INTO users (name, email, password) VALUES
('Alice Johnson', 'alice@example.com', '$2y$10$hashedpassword1'),
('Bob Smith', 'bob@example.com', '$2y$10$hashedpassword2'),
('Charlie Brown', 'charlie@example.com', '$2y$10$hashedpassword3');


-- Insert Tags
INSERT INTO tags (name) VALUES
('Pasta'),
('Quick'),
('Italian'),
('Salad'),
('Healthy'),
('Vegetarian'),
('Seafood'),
('Grilled'),
('High-Protein'),
('Breakfast'),
('Sweet'),
('Comfort Food'),
('Soup'),
('Sandwich'),
('Luxury'),
('Stuffed'),
('Savory'),
('Vegan'),
('Gluten-Free'),
('Low-Carb'),
('Spicy'),
('Top Rated'),
('Popular');

-- Insert Recipes
INSERT INTO recipes (id, title, description, image_url, category, rating, views, average_rating) VALUES
(1, 'Sassy Spaghetti Aglio e Olio', 'A quick and easy Italian classic with garlic and olive oil.', 'recipe-a1.jpg', 'Pasta', 5, 200, 4.8),
(2, 'Caesar Salad', 'A refreshing salad with romaine lettuce, croutons, and Caesar dressing.', 'salad-1.jpg', 'Salads', 4, 150, 4.5),
(3, 'Grilled Salmon', 'Perfectly grilled salmon with herbs and lemon.', 'salmon-1.jpg', 'Seafood', 5, 250, 4.9),
(4, 'French Toast', 'A sweet and satisfying breakfast option.', 'french-toast-1.jpg', 'Breakfast', 4, 180, 4.6),
(5, 'Scrambled Eggs', 'Fluffy scrambled eggs with cheese.', 'eggs-1.jpg', 'Breakfast', 4, 170, 4.4),
(6, 'Chicken Alfredo', 'Creamy Alfredo sauce with tender chicken and pasta.', 'alfredo-1.jpg', 'Pasta', 5, 300, 4.7),
(7, 'Greek Salad', 'A healthy mix of cucumbers, tomatoes, olives, and feta cheese.', 'salad-2.jpg', 'Salads', 4, 220, 4.5),
(8, 'Shrimp Tacos', 'Tasty shrimp tacos with avocado and lime.', 'tacos-1.jpg', 'Seafood', 5, 240, 4.8),
(9, 'Pancakes', 'Classic pancakes with maple syrup.', 'pancakes-1.jpg', 'Breakfast', 4, 210, 4.6),
(10, 'Omelette', 'A fluffy omelette with vegetables and cheese.', 'omelette-1.jpg', 'Breakfast', 4, 190, 4.5),
(11, 'Lasagna', 'Layers of pasta, meat, and cheese baked to perfection.', 'lasagna-1.jpg', 'Pasta', 5, 320, 4.9),
(12, 'Caprese Salad', 'Fresh mozzarella, tomatoes, and basil drizzled with olive oil.', 'salad-3.jpg', 'Salads', 4, 230, 4.6),
(13, 'Fish Tacos', 'Crispy fish tacos with cabbage slaw and chipotle sauce.', 'tacos-2.jpg', 'Seafood', 5, 260, 4.9),
(14, 'Waffles', 'Golden waffles with berries and whipped cream.', 'waffles-1.jpg', 'Breakfast', 4, 200, 4.5),
(15, 'Frittata', 'An Italian-style omelette with potatoes and spinach.', 'frittata-1.jpg', 'Breakfast', 4, 180, 4.4),
(16, 'Carbonara', 'Classic Italian pasta dish with eggs, cheese, and pancetta.', 'carbonara-1.jpg', 'Pasta', 5, 310, 4.7),
(17, 'Kale Salad', 'Nutritious kale salad with quinoa and nuts.', 'salad-4.jpg', 'Salads', 4, 240, 4.5),
(18, 'Lobster Roll', 'Buttery lobster roll with fresh herbs.', 'lobster-roll-1.jpg', 'Seafood', 5, 270, 4.9),
(19, 'Bagel and Cream Cheese', 'A classic bagel with cream cheese and smoked salmon.', 'bagel-1.jpg', 'Breakfast', 4, 220, 4.6),
(20, 'Quiche', 'Savory quiche with ham and cheese.', 'quiche-1.jpg', 'Breakfast', 4, 210, 4.5),
(21, 'Bolognese', 'Rich meat sauce served over spaghetti.', 'bolognese-1.jpg', 'Pasta', 5, 330, 4.8),
(22, 'Avocado Salad', 'Simple avocado salad with lime and cilantro.', 'salad-5.jpg', 'Salads', 4, 250, 4.5),
(23, 'Clam Chowder', 'Creamy New England clam chowder.', 'clam-chowder-1.jpg', 'Seafood', 5, 280, 4.9),
(24, 'Croissant', 'Flaky buttery croissant for breakfast.', 'croissant-1.jpg', 'Breakfast', 4, 230, 4.6),
(25, 'Breakfast Burrito', 'Hearty burrito filled with eggs, beans, and cheese.', 'burrito-1.jpg', 'Breakfast', 4, 220, 4.5),
(26, 'Ravioli', 'Stuffed pasta with ricotta and spinach in marinara sauce.', 'ravioli-1.jpg', 'Pasta', 5, 340, 4.8),
(27, 'Spinach Salad', 'Healthy spinach salad with strawberries and almonds.', 'salad-6.jpg', 'Salads', 4, 260, 4.5),
(28, 'Grilled Shrimp', 'Juicy shrimp marinated in garlic and herbs.', 'shrimp-1.jpg', 'Seafood', 5, 290, 4.9),
(29, 'Granola Parfait', 'Yogurt parfait with granola and fresh fruit.', 'parfait-1.jpg', 'Breakfast', 4, 240, 4.6);



-- Insert Ingredients for 29 Recipes
INSERT INTO ingredients (recipe_id, name, quantity) VALUES
-- Recipe 1: Sassy Spaghetti Aglio e Olio
(1, 'Spaghetti', '200g'),
(1, 'Garlic', '4 cloves'),
(1, 'Olive Oil', '3 tbsp'),
(1, 'Red Pepper Flakes', '1 tsp'),
(1, 'Parsley', '1 tbsp (chopped)'),
(1, 'Salt', 'to taste'),
(1, 'Black Pepper', 'to taste'),

-- Recipe 2: Caesar Salad
(2, 'Romaine Lettuce', '1 head'),
(2, 'Croutons', '1 cup'),
(2, 'Caesar Dressing', '½ cup'),
(2, 'Parmesan Cheese', '¼ cup (grated)'),
(2, 'Lemon Juice', '1 tbsp'),

-- Recipe 3: Grilled Salmon
(3, 'Salmon Fillet', '2 pieces'),
(3, 'Lemon', '1 (sliced)'),
(3, 'Fresh Herbs (dill, parsley)', '1 tbsp'),
(3, 'Salt', 'to taste'),
(3, 'Black Pepper', 'to taste'),
(3, 'Olive Oil', '2 tbsp'),

-- Recipe 4: French Toast
(4, 'Bread Slices', '4'),
(4, 'Eggs', '2'),
(4, 'Milk', '¼ cup'),
(4, 'Vanilla Extract', '1 tsp'),
(4, 'Cinnamon', '½ tsp'),
(4, 'Butter', '1 tbsp (for cooking)'),
(4, 'Maple Syrup', 'for serving'),

-- Recipe 5: Scrambled Eggs
(5, 'Eggs', '3'),
(5, 'Cheese', '½ cup (shredded)'),
(5, 'Butter', '1 tbsp'),
(5, 'Salt', 'to taste'),
(5, 'Black Pepper', 'to taste'),

-- Recipe 6: Chicken Alfredo
(6, 'Fettuccine Pasta', '200g'),
(6, 'Chicken Breast', '2 pieces'),
(6, 'Heavy Cream', '1 cup'),
(6, 'Parmesan Cheese', '½ cup (grated)'),
(6, 'Garlic', '2 cloves'),
(6, 'Butter', '2 tbsp'),
(6, 'Salt', 'to taste'),
(6, 'Black Pepper', 'to taste'),

-- Recipe 7: Greek Salad
(7, 'Cucumbers', '2'),
(7, 'Tomatoes', '3'),
(7, 'Kalamata Olives', '½ cup'),
(7, 'Feta Cheese', '½ cup (crumbled)'),
(7, 'Olive Oil', '2 tbsp'),
(7, 'Lemon Juice', '1 tbsp'),
(7, 'Oregano', '1 tsp'),

-- Recipe 8: Shrimp Tacos
(8, 'Shrimp', '200g'),
(8, 'Corn Tortillas', '6'),
(8, 'Avocado', '2'),
(8, 'Lime', '1'),
(8, 'Chipotle Sauce', '¼ cup'),
(8, 'Cabbage Slaw', '1 cup'),
(8, 'Cilantro', 'for garnish'),

-- Recipe 9: Pancakes
(9, 'All-Purpose Flour', '1 cup'),
(9, 'Milk', '¾ cup'),
(9, 'Eggs', '1'),
(9, 'Sugar', '2 tbsp'),
(9, 'Baking Powder', '1 tbsp'),
(9, 'Butter', 'for cooking'),
(9, 'Maple Syrup', 'for serving'),

-- Recipe 10: Omelette
(10, 'Eggs', '3'),
(10, 'Bell Peppers', '½ cup (chopped)'),
(10, 'Onions', '¼ cup (chopped)'),
(10, 'Cheese', '¼ cup (shredded)'),
(10, 'Salt', 'to taste'),
(10, 'Black Pepper', 'to taste'),
(10, 'Butter', '1 tbsp'),

-- Recipe 11: Lasagna
(11, 'Lasagna Sheets', '250g'),
(11, 'Ground Beef', '500g'),
(11, 'Tomato Sauce', '2 cups'),
(11, 'Ricotta Cheese', '1 cup'),
(11, 'Mozzarella Cheese', '1 cup (shredded)'),
(11, 'Parmesan Cheese', '½ cup (grated)'),
(11, 'Garlic', '2 cloves'),
(11, 'Olive Oil', '2 tbsp'),

-- Recipe 12: Caprese Salad
(12, 'Mozzarella Cheese', '200g'),
(12, 'Tomatoes', '3'),
(12, 'Fresh Basil Leaves', '10'),
(12, 'Olive Oil', '2 tbsp'),
(12, 'Balsamic Vinegar', '1 tbsp'),
(12, 'Salt', 'to taste'),
(12, 'Black Pepper', 'to taste'),

-- Recipe 13: Fish Tacos
(13, 'White Fish Fillets', '2 pieces'),
(13, 'Corn Tortillas', '6'),
(13, 'Cabbage Slaw', '1 cup'),
(13, 'Chipotle Sauce', '¼ cup'),
(13, 'Lime', '1'),
(13, 'Cilantro', 'for garnish'),
(13, 'Salt', 'to taste'),
(13, 'Black Pepper', 'to taste'),

-- Recipe 14: Waffles
(14, 'All-Purpose Flour', '1 cup'),
(14, 'Milk', '¾ cup'),
(14, 'Eggs', '1'),
(14, 'Sugar', '2 tbsp'),
(14, 'Baking Powder', '1 tbsp'),
(14, 'Butter', 'for cooking'),
(14, 'Whipped Cream', 'for serving'),
(14, 'Berries', 'for serving'),

-- Recipe 15: Frittata
(15, 'Eggs', '6'),
(15, 'Potatoes', '2 (thinly sliced)'),
(15, 'Spinach', '1 cup'),
(15, 'Onion', '½ (chopped)'),
(15, 'Cheese', '½ cup (shredded)'),
(15, 'Salt', 'to taste'),
(15, 'Black Pepper', 'to taste'),
(15, 'Olive Oil', '2 tbsp'),

-- Recipe 16: Carbonara
(16, 'Spaghetti', '200g'),
(16, 'Eggs', '2'),
(16, 'Pecorino Romano Cheese', '½ cup (grated)'),
(16, 'Pancetta', '100g'),
(16, 'Garlic', '2 cloves'),
(16, 'Black Pepper', 'to taste'),
(16, 'Salt', 'to taste'),

-- Recipe 17: Kale Salad
(17, 'Kale Leaves', '4 cups'),
(17, 'Quinoa', '½ cup'),
(17, 'Cherry Tomatoes', '1 cup (halved)'),
(17, 'Walnuts', '¼ cup'),
(17, 'Olive Oil', '2 tbsp'),
(17, 'Lemon Juice', '1 tbsp'),
(17, 'Salt', 'to taste'),
(17, 'Black Pepper', 'to taste'),

-- Recipe 18: Lobster Roll
(18, 'Lobster Meat', '200g'),
(18, 'Hot Dog Buns', '4'),
(18, 'Mayonnaise', '2 tbsp'),
(18, 'Lemon Juice', '1 tbsp'),
(18, 'Butter', '2 tbsp'),
(18, 'Chives', '1 tbsp (chopped)'),
(18, 'Salt', 'to taste'),
(18, 'Black Pepper', 'to taste'),

-- Recipe 19: Bagel and Cream Cheese
(19, 'Bagels', '2'),
(19, 'Cream Cheese', '½ cup'),
(19, 'Smoked Salmon', '100g'),
(19, 'Red Onion', '2 slices'),
(19, 'Capers', '1 tbsp'),
(19, 'Dill', 'for garnish'),

-- Recipe 20: Quiche
(20, 'Pie Crust', '1 (store-bought or homemade)'),
(20, 'Eggs', '4'),
(20, 'Heavy Cream', '1 cup'),
(20, 'Ham', '100g (diced)'),
(20, 'Cheese', '½ cup (shredded)'),
(20, 'Salt', 'to taste'),
(20, 'Black Pepper', 'to taste'),

-- Recipe 21: Bolognese
(21, 'Spaghetti', '200g'),
(21, 'Ground Beef', '500g'),
(21, 'Tomato Sauce', '2 cups'),
(21, 'Onion', '1 (chopped)'),
(21, 'Garlic', '2 cloves'),
(21, 'Olive Oil', '2 tbsp'),
(21, 'Salt', 'to taste'),
(21, 'Black Pepper', 'to taste'),

-- Recipe 22: Avocado Salad
(22, 'Avocados', '2'),
(22, 'Lime', '1'),
(22, 'Cilantro', '2 tbsp (chopped)'),
(22, 'Salt', 'to taste'),
(22, 'Black Pepper', 'to taste'),
(22, 'Cherry Tomatoes', '1 cup (halved)'),

-- Recipe 23: Clam Chowder
(23, 'Clams', '200g'),
(23, 'Potatoes', '2 (diced)'),
(23, 'Onion', '½ (chopped)'),
(23, 'Celery', '2 stalks (chopped)'),
(23, 'Heavy Cream', '1 cup'),
(23, 'Butter', '2 tbsp'),
(23, 'Salt', 'to taste'),
(23, 'Black Pepper', 'to taste'),

-- Recipe 24: Croissant
(24, 'Croissants', '2'),
(24, 'Butter', 'for serving'),
(24, 'Jam', 'for serving'),
(24, 'Honey', 'for serving'),

-- Recipe 25: Breakfast Burrito
(25, 'Tortillas', '4'),
(25, 'Eggs', '4'),
(25, 'Black Beans', '½ cup'),
(25, 'Cheese', '½ cup (shredded)'),
(25, 'Avocado', '1 (sliced)'),
(25, 'Salsa', '¼ cup'),
(25, 'Salt', 'to taste'),
(25, 'Black Pepper', 'to taste'),

-- Recipe 26: Ravioli
(26, 'Ravioli', '250g'),
(26, 'Marinara Sauce', '2 cups'),
(26, 'Ricotta Cheese', '½ cup'),
(26, 'Spinach', '1 cup'),
(26, 'Parmesan Cheese', '¼ cup (grated)'),
(26, 'Olive Oil', '2 tbsp'),
(26, 'Salt', 'to taste'),
(26, 'Black Pepper', 'to taste'),

-- Recipe 27: Spinach Salad
(27, 'Spinach Leaves', '4 cups'),
(27, 'Strawberries', '1 cup (sliced)'),
(27, 'Almonds', '¼ cup (toasted)'),
(27, 'Feta Cheese', '¼ cup (crumbled)'),
(27, 'Olive Oil', '2 tbsp'),
(27, 'Balsamic Vinegar', '1 tbsp'),
(27, 'Salt', 'to taste'),
(27, 'Black Pepper', 'to taste'),

-- Recipe 28: Grilled Shrimp
(28, 'Shrimp', '200g'),
(28, 'Garlic', '3 cloves (minced)'),
(28, 'Olive Oil', '2 tbsp'),
(28, 'Lemon Juice', '1 tbsp'),
(28, 'Parsley', '1 tbsp (chopped)'),
(28, 'Salt', 'to taste'),
(28, 'Black Pepper', 'to taste'),

-- Recipe 29: Granola Parfait
(29, 'Greek Yogurt', '2 cups'),
(29, 'Granola', '1 cup'),
(29, 'Mixed Berries', '1 cup'),
(29, 'Honey', '2 tbsp'),
(29, 'Chia Seeds', '1 tbsp (optional)');


-- Steps for Each Recipe
INSERT INTO steps (recipe_id, step_order, description) VALUES
-- Recipe 1: Sassy Spaghetti Aglio e Olio
(1, 1, 'Cook spaghetti according to package instructions until al dente.'),
(1, 2, 'Heat olive oil in a large pan over medium heat.'),
(1, 3, 'Add minced garlic and red pepper flakes; sauté until fragrant.'),
(1, 4, 'Toss cooked spaghetti into the pan with garlic oil; mix well.'),
(1, 5, 'Sprinkle with chopped parsley, salt, and black pepper. Serve hot.'),

-- Recipe 2: Caesar Salad
(2, 1, 'Wash and chop romaine lettuce into bite-sized pieces.'),
(2, 2, 'Toast croutons in the oven until golden brown.'),
(2, 3, 'Toss lettuce with Caesar dressing and grated Parmesan cheese.'),
(2, 4, 'Top with croutons and additional Parmesan before serving.'),

-- Recipe 3: Grilled Salmon
(3, 1, 'Preheat grill to medium-high heat.'),
(3, 2, 'Season salmon fillets with salt, pepper, and fresh herbs.'),
(3, 3, 'Place salmon on the grill, skin-side down, and cook for 6-8 minutes.'),
(3, 4, 'Flip and cook for another 2-3 minutes until fully cooked.'),
(3, 5, 'Squeeze lemon juice over the salmon before serving.'),

-- Recipe 4: French Toast
(4, 1, 'Whisk eggs, milk, vanilla extract, and cinnamon in a shallow bowl.'),
(4, 2, 'Dip bread slices into the egg mixture, coating both sides evenly.'),
(4, 3, 'Heat butter in a skillet over medium heat.'),
(4, 4, 'Cook bread slices for 2-3 minutes per side until golden brown.'),
(4, 5, 'Serve warm with maple syrup.'),

-- Recipe 5: Scrambled Eggs
(5, 1, 'Crack eggs into a bowl and whisk until smooth.'),
(5, 2, 'Heat butter in a nonstick skillet over low heat.'),
(5, 3, 'Pour eggs into the skillet and stir gently as they cook.'),
(5, 4, 'When eggs are almost set, add shredded cheese and fold in.'),
(5, 5, 'Season with salt and pepper. Serve immediately.'),

-- Recipe 6: Chicken Alfredo
(6, 1, 'Cook fettuccine pasta according to package instructions.'),
(6, 2, 'Season chicken breasts with salt and pepper; cook in a skillet until done.'),
(6, 3, 'In a saucepan, melt butter and add minced garlic; sauté briefly.'),
(6, 4, 'Stir in heavy cream and bring to a simmer.'),
(6, 5, 'Add grated Parmesan cheese and stir until melted and creamy.'),
(6, 6, 'Combine pasta, chicken, and Alfredo sauce; serve hot.'),

-- Recipe 7: Greek Salad
(7, 1, 'Chop cucumbers, tomatoes, and red onions into bite-sized pieces.'),
(7, 2, 'Add Kalamata olives and crumbled feta cheese to the vegetables.'),
(7, 3, 'Drizzle with olive oil and lemon juice; sprinkle with oregano.'),
(7, 4, 'Toss everything together and season with salt and pepper.'),

-- Recipe 8: Shrimp Tacos
(8, 1, 'Marinate shrimp in lime juice, garlic, and spices for 10 minutes.'),
(8, 2, 'Cook shrimp in a skillet over medium heat until pink and opaque.'),
(8, 3, 'Warm corn tortillas on a dry skillet or microwave.'),
(8, 4, 'Assemble tacos with shrimp, sliced avocado, cabbage slaw, and chipotle sauce.'),
(8, 5, 'Garnish with fresh cilantro and serve with lime wedges.'),

-- Recipe 9: Pancakes
(9, 1, 'Whisk flour, sugar, baking powder, and salt in a bowl.'),
(9, 2, 'In a separate bowl, mix milk, egg, and melted butter.'),
(9, 3, 'Combine wet and dry ingredients until just mixed.'),
(9, 4, 'Heat a skillet over medium heat and lightly grease with butter.'),
(9, 5, 'Pour batter onto the skillet and cook until bubbles form on top.'),
(9, 6, 'Flip and cook for another minute. Serve with syrup and berries.'),

-- Recipe 10: Omelette
(10, 1, 'Whisk eggs in a bowl and season with salt and pepper.'),
(10, 2, 'Heat butter in a nonstick skillet over medium heat.'),
(10, 3, 'Pour eggs into the skillet and let them set slightly.'),
(10, 4, 'Add diced bell peppers, onions, and shredded cheese to one half.'),
(10, 5, 'Fold the other half over the filling and cook until cheese melts.'),

-- Recipe 11: Lasagna
(11, 1, 'Cook lasagna sheets according to package instructions.'),
(11, 2, 'Brown ground beef in a skillet; drain excess fat.'),
(11, 3, 'Mix tomato sauce with the cooked beef and simmer for 10 minutes.'),
(11, 4, 'Layer lasagna sheets, meat sauce, ricotta cheese, and mozzarella in a baking dish.'),
(11, 5, 'Repeat layers and top with Parmesan cheese.'),
(11, 6, 'Bake at 375°F for 30-35 minutes until bubbly and golden.'),

-- Recipe 12: Caprese Salad
(12, 1, 'Slice mozzarella cheese and tomatoes evenly.'),
(12, 2, 'Arrange alternating slices of mozzarella and tomatoes on a plate.'),
(12, 3, 'Tuck fresh basil leaves between the slices.'),
(12, 4, 'Drizzle with olive oil and balsamic vinegar.'),
(12, 5, 'Season with salt and pepper to taste.'),

-- Recipe 13: Fish Tacos
(13, 1, 'Season white fish fillets with salt, pepper, and spices.'),
(13, 2, 'Pan-fry or bake fish until flaky and cooked through.'),
(13, 3, 'Warm corn tortillas on a skillet or microwave.'),
(13, 4, 'Assemble tacos with fish, cabbage slaw, and chipotle sauce.'),
(13, 5, 'Garnish with fresh cilantro and serve with lime wedges.'),

-- Recipe 14: Waffles
(14, 1, 'Whisk flour, sugar, baking powder, and salt in a bowl.'),
(14, 2, 'In a separate bowl, mix milk, egg, and melted butter.'),
(14, 3, 'Combine wet and dry ingredients until smooth.'),
(14, 4, 'Preheat waffle iron and lightly grease with butter.'),
(14, 5, 'Pour batter onto the waffle iron and cook until golden brown.'),
(14, 6, 'Serve with whipped cream and fresh berries.'),

-- Recipe 15: Frittata
(15, 1, 'Preheat oven to 375°F.'),
(15, 2, 'Sauté thinly sliced potatoes and spinach in olive oil until tender.'),
(15, 3, 'Whisk eggs in a bowl and season with salt and pepper.'),
(15, 4, 'Pour eggs over the cooked vegetables in an oven-safe skillet.'),
(15, 5, 'Sprinkle shredded cheese on top.'),
(15, 6, 'Transfer skillet to the oven and bake for 15-20 minutes.'),

-- Recipe 16: Carbonara
(16, 1, 'Cook spaghetti according to package instructions.'),
(16, 2, 'Sauté pancetta in a skillet until crispy.'),
(16, 3, 'In a bowl, whisk eggs and grated Pecorino Romano cheese.'),
(16, 4, 'Toss cooked spaghetti with pancetta and egg mixture off the heat.'),
(16, 5, 'Season with black pepper and serve immediately.'),

-- Recipe 17: Kale Salad
(17, 1, 'Remove stems from kale leaves and chop finely.'),
(17, 2, 'Massage kale with olive oil and lemon juice to soften.'),
(17, 3, 'Add cooked quinoa, cherry tomatoes, and walnuts to the kale.'),
(17, 4, 'Toss everything together and season with salt and pepper.'),

-- Recipe 18: Lobster Roll
(18, 1, 'Chop cooked lobster meat into bite-sized pieces.'),
(18, 2, 'Mix lobster with mayonnaise, lemon juice, and chopped chives.'),
(18, 3, 'Butter the inside of hot dog buns and toast on a skillet.'),
(18, 4, 'Fill toasted buns with lobster mixture.'),
(18, 5, 'Serve with extra lemon wedges on the side.'),

-- Recipe 19: Bagel and Cream Cheese
(19, 1, 'Slice bagels in half and toast until golden brown.'),
(19, 2, 'Spread cream cheese generously on the bagel halves.'),
(19, 3, 'Top with smoked salmon, red onion slices, and capers.'),
(19, 4, 'Garnish with fresh dill and serve.'),

-- Recipe 20: Quiche
(20, 1, 'Preheat oven to 375°F.'),
(20, 2, 'Roll out pie crust and press into a quiche pan.'),
(20, 3, 'Whisk eggs, heavy cream, salt, and pepper in a bowl.'),
(20, 4, 'Stir in diced ham and shredded cheese.'),
(20, 5, 'Pour egg mixture into the pie crust.'),
(20, 6, 'Bake for 30-35 minutes until set and golden.'),

-- Recipe 21: Bolognese
(21, 1, 'Cook spaghetti according to package instructions.'),
(21, 2, 'Brown ground beef in a skillet; drain excess fat.'),
(21, 3, 'Sauté onions, garlic, and celery in olive oil until soft.'),
(21, 4, 'Add tomato sauce and simmer for 20-30 minutes.'),
(21, 5, 'Toss cooked spaghetti with Bolognese sauce and serve hot.'),

-- Recipe 22: Avocado Salad
(22, 1, 'Cut avocados in half, remove pits, and scoop flesh into a bowl.'),
(22, 2, 'Mash avocado with lime juice, salt, and pepper.'),
(22, 3, 'Fold in halved cherry tomatoes and chopped cilantro.'),
(22, 4, 'Adjust seasoning and serve chilled.'),

-- Recipe 23: Clam Chowder
(23, 1, 'Sauté diced onions, celery, and potatoes in butter until soft.'),
(23, 2, 'Add clams and their juice to the pot; stir well.'),
(23, 3, 'Pour in heavy cream and bring to a simmer.'),
(23, 4, 'Season with salt and pepper to taste.'),
(23, 5, 'Serve hot with oyster crackers.'),

-- Recipe 24: Croissant
(24, 1, 'Warm croissants in the oven for 5-7 minutes until flaky.'),
(24, 2, 'Serve with butter, jam, or honey on the side.'),

-- Recipe 25: Breakfast Burrito
(25, 1, 'Scramble eggs in a skillet and season with salt and pepper.'),
(25, 2, 'Warm tortillas on a skillet or microwave.'),
(25, 3, 'Layer scrambled eggs, black beans, shredded cheese, and sliced avocado on tortillas.'),
(25, 4, 'Roll up burritos tightly and serve with salsa.'),

-- Recipe 26: Ravioli
(26, 1, 'Cook ravioli according to package instructions.'),
(26, 2, 'Heat marinara sauce in a saucepan.'),
(26, 3, 'Toss cooked ravioli with marinara sauce.'),
(26, 4, 'Top with grated Parmesan cheese and fresh parsley.'),

-- Recipe 27: Spinach Salad
(27, 1, 'Wash and dry spinach leaves thoroughly.'),
(27, 2, 'Add sliced strawberries, toasted almonds, and crumbled feta cheese.'),
(27, 3, 'Drizzle with olive oil and balsamic vinegar.'),
(27, 4, 'Toss everything together and season with salt and pepper.'),

-- Recipe 28: Grilled Shrimp
(28, 1, 'Marinate shrimp in olive oil, minced garlic, lemon juice, and parsley for 15 minutes.'),
(28, 2, 'Thread shrimp onto skewers for easy grilling.'),
(28, 3, 'Grill shrimp over medium heat for 2-3 minutes per side.'),
(28, 4, 'Season with salt and pepper before serving.'),

-- Recipe 29: Granola Parfait
(29, 1, 'Layer Greek yogurt, granola, and mixed berries in a glass.'),
(29, 2, 'Drizzle with honey and sprinkle chia seeds on top.'),
(29, 3, 'Serve chilled as a refreshing breakfast or snack.');


INSERT INTO ratings (user_id, recipe_id, rating) VALUES
-- Recipe 1: Sassy Spaghetti Aglio e Olio
(1, 1, 5), -- User 1 rates Recipe 1 as 5 stars
(2, 1, 4), -- User 2 rates Recipe 1 as 4 stars
(3, 1, 5), -- User 3 rates Recipe 1 as 5 stars

-- Recipe 2: Caesar Salad
(1, 2, 4), -- User 1 rates Recipe 2 as 4 stars
(2, 2, 3), -- User 2 rates Recipe 2 as 3 stars
(3, 2, 4), -- User 3 rates Recipe 2 as 4 stars

-- Recipe 3: Grilled Salmon
(1, 3, 5), -- User 1 rates Recipe 3 as 5 stars
(2, 3, 4), -- User 2 rates Recipe 3 as 4 stars
(3, 3, 5), -- User 3 rates Recipe 3 as 5 stars

-- Recipe 4: French Toast
(1, 4, 3), -- User 1 rates Recipe 4 as 3 stars
(2, 4, 4), -- User 2 rates Recipe 4 as 4 stars
(3, 4, 3), -- User 3 rates Recipe 4 as 3 stars

-- Recipe 5: Scrambled Eggs
(1, 5, 4), -- User 1 rates Recipe 5 as 4 stars
(2, 5, 3), -- User 2 rates Recipe 5 as 3 stars
(3, 5, 4), -- User 3 rates Recipe 5 as 4 stars

-- Recipe 5:
(1, 6, 5), (2, 6, 4), (3, 6, 5),
-- Recipe 5:
(1, 7, 4), (2, 7, 3), (3, 7, 4),
-- Recipe 5:
(1, 8, 5), (2, 8, 4), (3, 8, 5),
-- Recipe 5:
(1, 9, 3), (2, 9, 4), (3, 9, 3),
-- Recipe 5:
(1, 10, 4), (2, 10, 3), (3, 10, 4),
-- Recipe 5:-- Recipe 5:
(1, 11, 5), (2, 11, 4), (3, 11, 5),
-- Recipe 5:
(1, 12, 4), (2, 12, 3), (3, 12, 4),
-- Recipe 5:
(1, 13, 5), (2, 13, 4), (3, 13, 5),
-- Recipe 5:
(1, 14, 3), (2, 14, 4), (3, 14, 3),
-- Recipe 5:
(1, 15, 4), (2, 15, 3), (3, 15, 4),
-- Recipe 5:
(1, 16, 5), (2, 16, 4), (3, 16, 5),
-- Recipe 5:
(1, 17, 4), (2, 17, 3), (3, 17, 4),
-- Recipe 5:
(1, 18, 5), (2, 18, 4), (3, 18, 5),
-- Recipe 5:
(1, 19, 3), (2, 19, 4), (3, 19, 3),
-- Recipe 5:
(1, 20, 4), (2, 20, 3), (3, 20, 4),
-- Recipe 5:
(1, 21, 5), (2, 21, 4), (3, 21, 5),
-- Recipe 5:
(1, 22, 4), (2, 22, 3), (3, 22, 4),
-- Recipe 5:
(1, 23, 5), (2, 23, 4), (3, 23, 5),
-- Recipe 5:
(1, 24, 3), (2, 24, 4), (3, 24, 3),
-- Recipe 5:
(1, 25, 4), (2, 25, 3), (3, 25, 4),
-- Recipe 5:
(1, 26, 5), (2, 26, 4), (3, 26, 5),
-- Recipe 5:
(1, 27, 4), (2, 27, 3), (3, 27, 4),
-- Recipe 5:
(1, 28, 5), (2, 28, 4), (3, 28, 5),
-- Recipe 5:
(1, 29, 3), (2, 29, 4), (3, 29, 3);

INSERT INTO comments (user_id, recipe_id, comment) VALUES
-- Recipe 1: Sassy Spaghetti Aglio e Olio
(1, 1, 'This spaghetti dish was absolutely delicious!'),
(2, 1, 'I loved the garlic flavor in this recipe.'),
(3, 1, 'A classic Italian dish done right!'),

-- Recipe 2: Caesar Salad
(1, 2, 'The Caesar Salad was fresh and easy to make.'),
(2, 2, 'Perfect for a light lunch.'),
(3, 2, 'I added extra Parmesan cheese—yum!'),

-- Recipe 3: Grilled Salmon
(1, 3, 'The grilled salmon turned out perfectly!'),
(2, 3, 'So flavorful and healthy.'),
(3, 3, 'I used lemon and herbs for extra zest.'),

-- Recipe 4: French Toast
(1, 4, 'French toast is always a hit at breakfast.'),
(2, 4, 'I added maple syrup and berries.'),
(3, 4, 'Fluffy and sweet—just how I like it.'),

-- Recipe 5: Scrambled Eggs
(1, 5, 'Scrambled eggs are quick and satisfying.'),
(2, 5, 'I added cheese and chives.'),
(3, 5, 'Great way to start the day.'),

-- Repeat for Recipes 6 through 29...
(1, 6, 'Chicken Alfredo is my go-to comfort food.'),
(2, 6, 'Creamy and rich—loved it!'),
(3, 6, 'Added extra chicken for protein.'),
(1, 7, 'Greek Salad is healthy and refreshing.'),
(2, 7, 'Perfect summer dish.'),
(3, 7, 'I added feta cheese and olives.'),
(1, 8, 'Shrimp tacos were amazing with the chipotle sauce.'),
(2, 8, 'Light and flavorful.'),
(3, 8, 'Will definitely make again.'),
(1, 9, 'Pancakes came out fluffy and sweet.'),
(2, 9, 'Topped with syrup and butter.'),
(3, 9, 'Breakfast perfection.'),
(1, 10, 'Omelette is a great way to start the day.'),
(2, 10, 'Filled with cheese and veggies.'),
(3, 10, 'Quick and easy.'),
(1, 11, 'Lasagna takes time but is worth the effort.'),
(2, 11, 'Layers of goodness!'),
(3, 11, 'Family favorite.'),
(1, 12, 'Caprese salad is simple yet elegant.'),
(2, 12, 'Fresh mozzarella makes all the difference.'),
(3, 12, 'Perfect appetizer.'),
(1, 13, 'Fish tacos are light and flavorful.'),
(2, 13, 'Loved the spicy kick.'),
(3, 13, 'Will make again soon.'),
(1, 14, 'Waffles are perfect for Sunday brunch.'),
(2, 14, 'Topped with whipped cream and fruit.'),
(3, 14, 'Delicious and easy.'),
(1, 15, 'Frittata is a versatile breakfast option.'),
(2, 15, 'Filled with spinach and mushrooms.'),
(3, 15, 'Great for meal prep.'),
(1, 16, 'Carbonara is rich and satisfying.'),
(2, 16, 'Classic Italian dish.'),
(3, 16, 'Added extra bacon.'),
(1, 17, 'Kale salad is packed with nutrients.'),
(2, 17, 'Healthy and filling.'),
(3, 17, 'I added nuts and seeds.'),
(1, 18, 'Lobster roll felt like a luxury meal.'),
(2, 18, 'Buttery and delicious.'),
(3, 18, 'Perfect for special occasions.'),
(1, 19, 'Bagel with cream cheese is classic.'),
(2, 19, 'Added smoked salmon.'),
(3, 19, 'Breakfast staple.'),
(1, 20, 'Quiche is a savory breakfast option.'),
(2, 20, 'Filled with ham and cheese.'),
(3, 20, 'Great for brunch.'),
(1, 21, 'Bolognese is hearty and comforting.'),
(2, 21, 'Perfect for pasta night.'),
(3, 21, 'Added extra meat.'),
(1, 22, 'Avocado salad is nutritious and tasty.'),
(2, 22, 'Healthy and refreshing.'),
(3, 22, 'I added tomatoes and cucumbers.'),
(1, 23, 'Clam chowder is creamy and comforting.'),
(2, 23, 'Perfect for cold days.'),
(3, 23, 'Added extra clams.'),
(1, 24, 'Croissant is flaky and buttery.'),
(2, 24, 'Perfect with coffee.'),
(3, 24, 'Breakfast treat.'),
(1, 25, 'Breakfast burrito is filling and satisfying.'),
(2, 25, 'Added salsa and guac.'),
(3, 25, 'Quick and easy.'),
(1, 26, 'Ravioli is stuffed and flavorful.'),
(2, 26, 'Loved the cheese filling.'),
(3, 26, 'Added marinara sauce.'),
(1, 27, 'Spinach salad is healthy and satisfying.'),
(2, 27, 'Added cranberries and almonds.'),
(3, 27, 'Perfect for lunch.'),
(1, 28, 'Grilled shrimp is quick and tasty.'),
(2, 28, 'Added garlic butter.'),
(3, 28, 'Great for dinner.'),
(1, 29, 'Granola parfait is healthy and sweet.'),
(2, 29, 'Added yogurt and honey.'),
(3, 29, 'Perfect breakfast.');


INSERT INTO favorites (user_id, recipe_id) VALUES
-- User 1 Favorites
(1, 1), (1, 3), (1, 5), (1, 7), (1, 9), (1, 11), (1, 13), (1, 15), (1, 17), (1, 19), (1, 21), (1, 23), (1, 25), (1, 27), (1, 29),

-- User 2 Favorites
(2, 2), (2, 4), (2, 6), (2, 8), (2, 10), (2, 12), (2, 14), (2, 16), (2, 18), (2, 20), (2, 22), (2, 24), (2, 26), (2, 28),

-- User 3 Favorites
(3, 1), (3, 4), (3, 7), (3, 10), (3, 13), (3, 16), (3, 19), (3, 22), (3, 25), (3, 28);


INSERT INTO posts (user_id, title, content) VALUES
-- User 1 Posts
(1, 'My Favorite Italian Recipes', 'I love cooking Italian dishes like Spaghetti Aglio e Olio and Carbonara.'),
(1, 'Healthy Breakfast Ideas', 'French toast and pancakes are my go-to breakfast options.'),

-- User 2 Posts
(2, 'Seafood Adventures', 'Shrimp tacos and grilled salmon are easy to prepare and delicious.'),
(2, 'Comfort Food Classics', 'Nothing beats lasagna and chicken Alfredo on a cold day.'),

-- User 3 Posts
(3, 'Quick Meals for Busy Days', 'Omelettes and scrambled eggs are lifesavers when you’re short on time.'),
(3, 'Luxury Meals at Home', 'Lobster rolls and Caprese salads feel fancy but are surprisingly simple.');



INSERT INTO likes (user_id, recipe_id, status) VALUES
-- User 1 Likes/Dislikes
(1, 1, 'like'), (1, 2, 'dislike'), (1, 3, 'like'), (1, 4, 'like'), (1, 5, 'like'),
(1, 6, 'dislike'), (1, 7, 'like'), (1, 8, 'like'), (1, 9, 'like'), (1, 10, 'dislike'),

-- User 2 Likes/Dislikes
(2, 1, 'like'), (2, 2, 'like'), (2, 3, 'like'), (2, 4, 'dislike'), (2, 5, 'like'),
(2, 6, 'like'), (2, 7, 'dislike'), (2, 8, 'like'), (2, 9, 'like'), (2, 10, 'like'),

-- User 3 Likes/Dislikes
(3, 1, 'like'), (3, 2, 'dislike'), (3, 3, 'like'), (3, 4, 'like'), (3, 5, 'dislike'),
(3, 6, 'like'), (3, 7, 'like'), (3, 8, 'dislike'), (3, 9, 'like'), (3, 10, 'like');



-- Recipe 1: Sassy Spaghetti Aglio e Olio
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(1, 1), -- Pasta
(1, 2), -- Quick
(1, 3); -- Italian

-- Recipe 2: Caesar Salad
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(2, 4), -- Salad
(2, 5), -- Healthy
(2, 6); -- Vegetarian

-- Recipe 3: Grilled Salmon
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(3, 7), -- Seafood
(3, 8), -- Grilled
(3, 9); -- High-Protein

-- Recipe 4: French Toast
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(4, 10), -- Breakfast
(4, 11), -- Sweet
(4, 2); -- Quick

-- Recipe 5: Scrambled Eggs
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(5, 10), -- Breakfast
(5, 2), -- Quick
(5, 9); -- High-Protein

-- Recipe 6: Chicken Alfredo
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(6, 1), -- Pasta
(6, 12), -- Comfort Food
(6, 9); -- High-Protein

-- Recipe 7: Greek Salad
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(7, 4), -- Salad
(7, 5), -- Healthy
(7, 6); -- Vegetarian

-- Recipe 8: Shrimp Tacos
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(8, 7), -- Seafood
(8, 14), -- Sandwich
(8, 21); -- Spicy

-- Recipe 9: Pancakes
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(9, 10), -- Breakfast
(9, 11), -- Sweet
(9, 2); -- Quick

-- Recipe 10: Omelette
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(10, 10), -- Breakfast
(10, 2), -- Quick
(10, 9); -- High-Protein

-- Recipe 11: Lasagna
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(11, 1), -- Pasta
(11, 3), -- Italian
(11, 12); -- Comfort Food

-- Recipe 12: Caprese Salad
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(12, 4), -- Salad
(12, 6), -- Vegetarian
(12, 3); -- Italian

-- Recipe 13: Fish Tacos
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(13, 7), -- Seafood
(13, 14), -- Sandwich
(13, 21); -- Spicy

-- Recipe 14: Waffles
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(14, 10), -- Breakfast
(14, 11), -- Sweet
(14, 2); -- Quick

-- Recipe 15: Frittata
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(15, 10), -- Breakfast
(15, 2), -- Quick
(15, 9); -- High-Protein

-- Recipe 16: Carbonara
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(16, 1), -- Pasta
(16, 3), -- Italian
(16, 2); -- Quick

-- Recipe 17: Kale Salad
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(17, 4), -- Salad
(17, 5), -- Healthy
(17, 6); -- Vegetarian

-- Recipe 18: Lobster Roll
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(18, 7), -- Seafood
(18, 14), -- Sandwich
(18, 15); -- Luxury

-- Recipe 19: Bagel and Cream Cheese
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(19, 10), -- Breakfast
(19, 2), -- Quick
(19, 6); -- Vegetarian

-- Recipe 20: Quiche
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(20, 10), -- Breakfast
(20, 17), -- Savory
(20, 9); -- High-Protein

-- Recipe 21: Bolognese
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(21, 1), -- Pasta
(21, 3), -- Italian
(21, 12); -- Comfort Food

-- Recipe 22: Avocado Salad
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(22, 4), -- Salad
(22, 5), -- Healthy
(22, 6); -- Vegetarian

-- Recipe 23: Clam Chowder
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(23, 13), -- Soup
(23, 7), -- Seafood
(23, 12); -- Comfort Food

-- Recipe 24: Croissant
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(24, 10), -- Breakfast
(24, 11), -- Sweet
(24, 2); -- Quick

-- Recipe 25: Breakfast Burrito
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(25, 10), -- Breakfast
(25, 2), -- Quick
(25, 9); -- High-Protein

-- Recipe 26: Ravioli
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(26, 1), -- Pasta
(26, 3), -- Italian
(26, 16); -- Stuffed

-- Recipe 27: Spinach Salad
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(27, 4), -- Salad
(27, 5), -- Healthy
(27, 6); -- Vegetarian

-- Recipe 28: Grilled Shrimp
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(28, 7), -- Seafood
(28, 8), -- Grilled
(28, 2); -- Quick

-- Recipe 29: Granola Parfait
INSERT INTO recipe_tags (recipe_id, tag_id) VALUES
(29, 10), -- Breakfast
(29, 5), -- Healthy
(29, 6); -- Vegetarian

SELECT r.*, AVG(rt.rating) AS avg_rating
FROM recipes r
LEFT JOIN ratings rt ON r.id = rt.recipe_id
WHERE r.deleted_at IS NULL
GROUP BY r.id