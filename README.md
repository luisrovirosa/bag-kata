# My Goals
- Enjoy while coding

# My rules
- Strict TDD outside-in classical style

# Classes
- [BagKata](src/BagKata.php): Add items and knows how to organize them.
- [Bag](src/Bag.php): Logic that stores, retrieves and knows if is the best bag to put an item.
- [Category](src/Category.php): Relation between items and categories.

# Kata
[Bags Kata](https://github.com/pepperrone/katas/blob/master/katas/bags.md) by [Giulio Perrone](https://github.com/pepperrone)

## Requirements
Create an application that helps Durance organize the items in his bags. Each bag can have either a category or not, the backpack has no category.

Items are always added to the backpack, if it happens to be full, the item is added to the next available bag.

After organizing the items, each bag should have the items belonging to its category, sorted alphabetically. If the bag happens to be full, the rest of the items are stored in the backpack or successive bags, following the previous sort.

## Rules
- Durance has 1 backpack and 4 possible extra bags
- Each bag has a capacity of 4 items, the backpack has a capacity of 8 items
- Each bag can have a category, the backpack doesn't have one
- Items are sorted alphabetically after organizing the bags

## Items
|Name|Category|
|----|:------:|
|Leather|Clothes|
|Linen|Clothes|
|Silk|Clothes|
|Wool|Clothes|
|Copper|Metals|
|Gold|Metals|
|Iron|Metals|
|Silver|Metals|
|Axe|Weapons|
|Dagger|Weapons|
|Mace|Weapons|
|Sword|Weapons|
|Cherry Blossom|Herbs|
|Marigold|Herbs|
|Rose|Herbs|
|Seaweed|Herbs|

## Examples
Let's say that Durance has 8 items in his backpack and 1 empty extra bag, which has a category for *Metals*:

``
backpack = ['Leather', 'Iron', 'Copper', 'Marigold', 'Wool', 'Gold', 'Silk', 'Copper']
bag_with_metals_category = []
``

he finds 2 new items, which are stored in the next available bag, since the backpack is already full:

```
backpack = ['Leather', 'Iron', 'Copper', 'Marigold', 'Wool', 'Gold', 'Silk', 'Copper']
bag_with_metals_category = ['Copper', 'Cherry Blossom']
```

he now casts the organizing spell:

```
backpack = ['Cherry Blossom', 'Iron', 'Leather', 'Marigold', 'Silk', 'Wool']
bag_with_metals_category = ['Copper', 'Copper', 'Copper', 'Gold']
```

# Author
Luis Rovirosa [@luisrovirosa](https://www.twitter.com/luisrovirosa)
