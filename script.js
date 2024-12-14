document.addEventListener("DOMContentLoaded", () => {
    // Preloader logic
    const preloader = document.getElementById("preloader");
    const mainContent = document.getElementById("main-content");
    setTimeout(() => {
        preloader.style.display = "none";
        mainContent.style.display = "block";
    }, 2000);

    // Google Maps initialization
    function initMap() {
        const bangladesh = { lat: 23.685, lng: 90.3563 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 6,
            center: bangladesh,
        });
        new google.maps.Marker({
            position: { lat: 23.8103, lng: 90.4125 },
            map: map,
            title: "Main Shop (Dhaka)",
        });
        new google.maps.Marker({
            position: { lat: 22.3475, lng: 91.8123 },
            map: map,
            title: "Branch (Chittagong)",
        });
    }
    window.initMap = initMap;

    // Carousel functionality
    document.addEventListener("DOMContentLoaded", () => {
        const carousel = document.querySelector('.product-carousel');
        const slides = carousel.querySelectorAll('.carousel-slide');
        let currentIndex = 0;
    
        // Initialize the first slide
        slides[currentIndex].classList.add('active');
    
        function nextSlide() {
            // Remove the 'active' class from the current slide
            slides[currentIndex].classList.remove('active');
    
            // Update to the next slide
            currentIndex = (currentIndex + 1) % slides.length;
    
            // Add the 'active' class to the next slide
            slides[currentIndex].classList.add('active');
        }
    
        // Automatically move to the next slide every 5 seconds
        setInterval(nextSlide, 5000);
    });
  
       
    // Authentication logic (simulated with session storage)
    const authButton = document.querySelector(".auth-button");
    const authContainer = document.querySelector(".auth-container");
    const paymentForm = document.querySelector(".payment-form");

    const user = sessionStorage.getItem("user");
    if (user) {
        authContainer.innerHTML = `<p>Welcome, ${user}</p>`;
    }

    authButton.addEventListener("click", () => {
        const username = prompt("Enter Username:");
        if (username) {
            sessionStorage.setItem("user", username);
            authContainer.innerHTML = `<p>Welcome, ${username}</p>`;
        }
    });

    // Payment logic
    paymentForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const cartTotal = parseFloat(document.getElementById("total-price").textContent) || 0; // Get total from cart
        const amount = parseFloat(document.getElementById("amount").value);
        if (amount < cartTotal) {
            alert(`Please pay more. Amount due: $${(cartTotal - amount).toFixed(2)}`);
        } else if (amount === cartTotal) {
            alert("Thanks for the purchase!");
        } else {
            alert(`Thanks for the purchase! Your change of $${(amount - cartTotal).toFixed(2)} is sent back to your bKash.`);
        }
    });

    let cart = [];

    // Show category products based on the selected category
    function showCategory(category) {
        const categories = document.querySelectorAll('.category-products');
        categories.forEach(cat => {
            cat.style.display = 'none'; // Hide all categories
        });

        const selectedCategory = document.getElementById(category);
        selectedCategory.style.display = 'block'; // Show the selected category
    }

    // Add item to cart
    function addToCart(itemName, price, quantity) {
        // Parse the quantity as an integer
        quantity = parseInt(quantity, 10);
    
        // Check if the item is already in the cart
        const itemIndex = cart.findIndex(item => item.name === itemName);
    
        if (itemIndex === -1) {
            // If the item is not in the cart, add it
            cart.push({ name: itemName, price: price, quantity: quantity });
        } else {
            // If the item is already in the cart, update the quantity
            cart[itemIndex].quantity += quantity;
        }
    
        // Update the cart display
        updateCart();
    }
    

    // Update the cart display
    function updateCart() {
        let cartItems = '';
        let totalPrice = 0;

        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            totalPrice += itemTotal;
            cartItems += `<div>${item.name} - Quantity: ${item.quantity} - Price: $${itemTotal.toFixed(2)}</div>`;
        });

        document.getElementById('cart-items').innerHTML = cartItems;
        document.getElementById('total-price').textContent = totalPrice.toFixed(2);
    }

    // Checkout logic
    function checkout() {
        alert("Proceeding to checkout. Total: $" + document.getElementById('total-price').textContent);
    }

    // Attach the functions to the relevant buttons in your HTML
    window.showCategory = showCategory;
    window.addToCart = addToCart;
    window.checkout = checkout;

});
