$(document).ready(function() {
        $('.dublicat_form').on('submit', function (e) {

            e.preventDefault();
            
            let form = $(this)[0]; // Get the form element
            let formData = new FormData(form);

            showLoader()
            // axios.post(form.getAttribute("action"), formData)
            //     .then(response => {
            //         // console.log(response.data);
            //         hideLoader();
            //         cartSuccessModal.show();
            //     })
            //     .catch(error => {
            //         hideLoader();
            //         let error_obj = error.toJSON();
            //         if(error_obj.status == 401){
            //             location.href = "/login";
            //         }
            //     })
            //     .finally(() => {
            //         // Hide the loader in both success and error scenarios
            //         hideLoader();
            //     });

        })

    function showLoader() {
        document.getElementById('loader').style.display = 'block';
    }

    // Function to hide the loader
    function hideLoader() {
        document.getElementById('loader').style.display = 'none';
    }
})




