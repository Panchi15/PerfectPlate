document.addEventListener("DOMContentLoaded", function () {
    const dietaryFilter = document.getElementById("dietaryFilter");
    const searchInput = document.getElementById("search");
    const messageContainer = document.getElementById("message");

    dietaryFilter.addEventListener("change", filterItems);
    searchInput.addEventListener("input", filterItems);

    function filterItems() {
        const filterValue = dietaryFilter.value.toLowerCase();
        const searchValue = searchInput.value.toLowerCase();
        const filteredItems = foodItems.filter(item => {
            const matchesDietary = filterValue === "all" || item.dietary.toLowerCase() === filterValue;
            const matchesSearch = item.name.toLowerCase().includes(searchValue);
            return matchesDietary && matchesSearch;
        });

        if (filteredItems.length === 0) {
            messageContainer.textContent = "Sorry, could not find the item.";
        } else {
            messageContainer.textContent = "";
        }

        displayItems(filteredItems);
    }

    function displayItems(items) {
        const menuContent = document.querySelector(".menu-content");
        menuContent.innerHTML = "";

        items.forEach(item => {
            const itemElement = document.createElement("div");
            itemElement.className = "menu-item";
            itemElement.textContent = `${item.name} - ${item.price}`;
            if (item.stock === 0) {
                itemElement.classList.add("out-of-stock");
                itemElement.textContent += " (Out of Stock)";
            }
            menuContent.appendChild(itemElement);
        });
    }

    // Example food items data
    const foodItems = [
        { name: "Vegetable Salad", dietary: "vegetarian", price: 5.99, stock: 10 },
        { name: "Chicken Sandwich", dietary: "nonVegetarian", price: 7.99, stock: 0 },
        // Add more food items here
    ];

    // Display all items initially
    displayItems(foodItems);
});
