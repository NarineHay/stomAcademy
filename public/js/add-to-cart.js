// document.querySelectorAll('.add-to-cart').forEach(el => {
//     el.addEventListener('submit', addToCart);
// });

// let clickCount = 0
// function addToCart(e) {

//     e.preventDefault();
//     clickCount++
//     console.log(clickCount)
//     let form = $(this)[0]; // Get the form element
//     let formData = new FormData(form);

//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//     showLoader()
//     // if (clickCount == 1) {
//         fetch(form.getAttribute("action"), {
//             method: 'POST',
//             headers: {
//                 'X-CSRF-TOKEN': csrfToken
//             },
//             body: formData
//         })
//             .then(response => {

//                 cartSuccessModal.show();
//                 clickCount = 0

//             })
//             .catch(error => {
//                 console.log(222)
//                 clickCount = 0

//                 // let error_obj = error.toJSON();
//                 // if(error_obj.status == 401){
//                 //     location.href = "/login";
//                 // }
//             })
//             .finally(() => {
//                 // Hide the loader in both success and error scenarios
//                 hideLoader();
//                 clickCount = 0
//             });
//     // }

// }




// function showLoader() {
//     document.getElementById('cart-loader').style.display = 'flex';
// }

// // Function to hide the loader
// function hideLoader() {
//     document.getElementById('cart-loader').style.display = 'none';
// }
