let name1 = {
  name: 'Oleg'
}
let name2 = {
  name: 'Vitalii'
}
let name3 = {
  name: 'Alex'
}
let name4 = {
  name: 'Pavel'
}
let name5 = {
  name: 'Egor'
}

let guestList = new Map();
guestList.set(name1, "invited").set(name2, "invited").set(name3, "invited").set(name4, "invited").set(name5, "invited");
console.log(guestList.has(name1));
console.log(guestList.length);
console.log(guestList.delete(name4));


let menu = new Set();
let dish1 = { 
  name: "pizza", 
  price: 130 
};
let dish2 = { 
  name: "lasagna", 
  price: 120 
};
let dish3 = { 
  name: "panacotta", 
  price: 80 
};
let dish4 = { 
  name: "Focaccia Bread.", 
  price: 40 
};
let dish5 = { 
  name: "Mushroom Risotto", 
  price: 110 
};

menu.add(dish1).add(dish2).add(dish1).add(dish2).add(dish3).add(dish4).add(dish5);

console.log(menu.size);
menu.forEach((dish) => {
  console.log(dish.name + " - " + dish.price + " UAH");
});

let vault1 = { 
  id: 1
};
let vault2 = { 
  id: 2 
};
let vault3 = { 
  id: 3 
};
let vault4 = { 
  id: 4 
};
let vault5 = { 
  id: 5 
};

let bankVault = new WeakMap([[vault1, { owner: "Oleg" }],[vault2, { owner: "Vitalii" }],[vault3, { owner: "Alex" }],[vault4, { owner: "Pavel" }],[vault5, { owner: "Egor" }]]);
console.log(bankVault.get(vault1));
console.log(bankVault.get(vault2));
console.log(bankVault.get(vault3));
console.log(bankVault.get(vault4));
console.log(bankVault.get(vault5));

let coin1 = { value: "UAH" };
let coin2 = { value: 2 };
let coin3 = { value: 3 };
let coin4 = { value: "bitcoin" };
let coin5 = { value: "$" };

let coinCollection = new WeakSet();
coinCollection.add(coin1).add(coin2).add(coin3).add(coin3).add(coin5).add(coin4);
console.log(coinCollection);
