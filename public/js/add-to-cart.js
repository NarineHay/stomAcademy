document.querySelectorAll('.dublicat_form').forEach(el => {
    el.addEventListener('submit', addToCart);
  });
       function addToCart(e) {
            console.log(1111)

            e.preventDefault();

            let form = $(this)[0]; // Get the form element
            let formData = new FormData(form);

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

console.log(form,444)
for (const [key, value] of formData.entries()) {
    console.log(`${key}: ${value}`);
}
            showLoader()
            // axios.post(form.getAttribute("action"), formData)
            fetch(form.getAttribute("action"), {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            })
                .then(response => {
                    // console.log(response.data);
                    cartSuccessModal.show();
                    hideLoader();

                })
                .catch(error => {
                    // hideLoader();
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
