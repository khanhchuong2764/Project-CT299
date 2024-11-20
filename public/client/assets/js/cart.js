
const inputquatity = document.querySelectorAll("input[name='quantity']");

if (inputquatity.length > 0) {
    inputquatity.forEach(input => {
        input.addEventListener("change", (e) => {
            const productId = input.getAttribute('product-id');
            const quantity = input.value;
            window.location.href=`/cart/update/${productId}/${quantity}`;
        })
    });
}