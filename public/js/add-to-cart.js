document.querySelectorAll('.add-to-cart').forEach(el => {
    el.addEventListener('submit', addToCart);
  });

function addToCart(e) {

    e.preventDefault();

    let form = $(this)[0]; // Get the form element
    let formData = new FormData(form);

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    showLoader()

    fetch(form.getAttribute("action"), {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        body: formData
    })
        .then(response => {

            cartSuccessModal.show();
        })
        .catch(error => {
            console.log(222)
            // let error_obj = error.toJSON();
            // if(error_obj.status == 401){
            //     location.href = "/login";
            // }
        })
        .finally(() => {
            // Hide the loader in both success and error scenarios
            hideLoader();
        });

}




function showLoader() {
    document.getElementById('cart-loader').style.display = 'flex';
}

// Function to hide the loader
function hideLoader() {
    document.getElementById('cart-loader').style.display = 'none';
}
