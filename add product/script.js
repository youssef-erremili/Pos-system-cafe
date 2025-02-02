// handle error form
let uploadButton = document.querySelector("#upload_file")
let formlContainer = document.querySelector("#formlContainer")
let prodFile = document.querySelector("#picfile")
let boxWithBor = document.querySelector(".boxWithBor")
let input_form = document.querySelectorAll(".input_form")
let previewImg = document.createElement("img")
previewImg.setAttribute("id", "preview")



function validateForm() {
    let b_name = input_form[1].value.trim()
    let c_price = input_form[2].value.trim()
    let d_desc = input_form[3].value.trim()
    let isValid = true;
    let e_category = document.getElementById("category").value
    if (b_name === "" || c_price === "" || d_desc === "" || e_category === "--select category--") {
        let notyf = new Notyf();
        notyf.error({
            message: 'Please, make sure you fill all input',
            duration: 9000,
        })
        for (let i = 0; i < input_form.length; i++) {
            input_form[i].classList.add("error");
        }
        return isValid = false;
    }
    return isValid;
}

// add class green when use choose a picture
prodFile.addEventListener("change", () => {
    boxWithBor.classList.add("activeForm");
    const reader = new FileReader();
    reader.onload = function (e) {
        previewImg.src = e.target.result;
    }
    reader.readAsDataURL(prodFile.files[0]);
    boxWithBor.appendChild(previewImg)

})

// insert data into inputs
function updateProduct() {
    let parms = window.location.search
    let dataLink = new URLSearchParams(parms);
    if (dataLink) {
        let name_product = dataLink.get("name")
        let price_product = dataLink.get("price")
        let desc_product = dataLink.get("desc")
        let image_product = dataLink.get("image")

        let b_name = input_form[1]
        let c_price = input_form[2]
        let d_desc = input_form[3]

        b_name.value = name_product
        c_price.value = price_product
        d_desc.value = desc_product
        previewImg.setAttribute("src", image_product)
    }
}
updateProduct()