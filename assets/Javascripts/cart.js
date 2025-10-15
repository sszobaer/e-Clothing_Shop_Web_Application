document.addEventListener('DOMContentLoaded', () => {
  const cartSidebar = document.getElementById('cartSidebar');
  const closeCart = document.getElementById('closeCart');
  const headerCartBtn = document.getElementById('cartButton'); 


  // ✅ Toggle sidebar from header button
  if (headerCartBtn) {
    headerCartBtn.addEventListener('click', () => {
      cartSidebar.classList.toggle('active');
    });
  }

  // Close button
  if (closeCart) closeCart.addEventListener('click', () => cartSidebar.classList.remove('active'));

  // Prevent double-add issue using debounce
  let isAdding = false;

  // Handle Add to Cart buttons
  document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', async () => {
      if (isAdding) return;
      isAdding = true;

      const product = {
        id: button.dataset.id,
        name: button.dataset.name,
        price: button.dataset.price,
        image: button.dataset.image
      };

      if (button.classList.contains('added')) {
        button.innerText = '✅ Already in Cart';
        isAdding = false;
        return;
      }

      try {
        const res = await fetch('/e-Clothing_Shop_Web_Application/controller/cartController.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'add', product })
        });

        const data = await res.json();

        if (data.cart) {
          updateCartSidebar(data.cart);
          cartSidebar.classList.add('active');
          button.innerText = '✅ Already in Cart';
          button.classList.add('added');
        }
      } catch (err) {
        console.error('❌ Cart update failed:', err);
      }

      setTimeout(() => (isAdding = false), 500);
    });
  });
});

async function updateCartSidebar(cart) {
  const cartContent = document.getElementById('cartContent');
  if (!cartContent) return;

  if (cart.length === 0) {
    cartContent.innerHTML = `<p class="text-center text-muted mt-3">Your cart is empty.</p>`;
    return;
  }

  let total = 0;
  cartContent.innerHTML = cart.map(item => {
    const subtotal = item.price * item.quantity;
    total += subtotal;
    return `
      <div class="cart-item d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <img src="${item.image}" alt="${item.name}">
          <div>
            <p class="mb-0 fw-semibold">${item.name}</p>
            <small>৳${item.price} × ${item.quantity}</small>
          </div>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button class="btn btn-sm btn-outline-secondary qty-btn" data-id="${item.id}" data-action="decrease">−</button>
          <span class="fw-bold">${item.quantity}</span>
          <button class="btn btn-sm btn-outline-secondary qty-btn" data-id="${item.id}" data-action="increase">+</button>
          <span class="fw-bold">৳${subtotal}</span>
        </div>
      </div>`;
  }).join('') + `<hr><p class="fw-bold text-end">Total: ৳${total}</p>`;

  document.querySelectorAll('.qty-btn').forEach(btn => {
    btn.addEventListener('click', async () => {
      const id = btn.dataset.id;
      const action = btn.dataset.action;

      const res = await fetch('/e-Clothing_Shop_Web_Application/controller/cartController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: action, id })
      });

      const data = await res.json();
      if (data.cart) updateCartSidebar(data.cart);
    });
  });
}