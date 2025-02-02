// declare all needed variables and call it if needed 
let chooseBtn = document.querySelectorAll(".choosebtn");
let orders = document.querySelectorAll(".order");
let addBtn = document.querySelectorAll(".addBtn");
let sideBar = document.querySelector(".sidebar");
let sizes = document.querySelector("#sizes");
let descreaments = document.querySelectorAll(".descrease");
let increaments = document.querySelectorAll(".increase");
let input_quantity = document.querySelectorAll(".input_value");
let productsTitle = document.querySelectorAll("h4")
let productsprice = document.querySelectorAll("h5 + p")
let showSideBar = document.querySelector(".toggle")
let removeSideBar = document.querySelector(".xmark")
let secondSideBar = document.querySelector(".secondBar")
let menuUl = document.querySelector(".menu ul")
let imageProducts = document.querySelectorAll(".image")
let conformBtn = document.querySelector(".conform")
let totalPrice = document.querySelector(".totalPrice")


// initialize the lenght of orders in pocket from 1
let cardSizes = 1;
let quantity = 1;
let priceArray = []




// this function show second sidebar
function showSecondBar() {
    secondSideBar.classList.add("active")
    menuUl.classList.add("activeUl")
}
function removeSecondBar() {
    secondSideBar.classList.remove("active")
    menuUl.classList.remove("activeUl")
}
showSideBar.addEventListener("click", showSecondBar)
removeSideBar.addEventListener("click", removeSecondBar)



// this function is about add className for inputs
function addClassName() {
    input_quantity.forEach((inputelement, index) => {
        inputelement.classList.add(`input${index}`)
    })
    increaments.forEach((button, index) => {
        button.classList.add(`button${index}`)
    })
    productsTitle.forEach((productTitle, index) => {
        productTitle.classList.add(`productTitle${index + 1}`)
    })
    productsprice.forEach((productprice, index) => {
        productprice.classList.add(`productprice${index}`)
    })
    imageProducts.forEach((imageProduct, index) => {
        imageProduct.classList.add(`imageProduct${index}`)
    })
} addClassName()


// this to nvigate betwwen pages
chooseBtn.forEach((button, index) => {
    button.addEventListener("click", () => {
        removeActiveClass()
        button.classList.add("active")
        orders[index].classList.add("display")
    })
})

function removeActiveClass() {
    chooseBtn.forEach((button) => {
        button.classList.remove("active");
    })
    orders.forEach((order) => {
        order.classList.remove("display");
    })
}


// increase or decrease a quantity function
function inBetween() {
    increaments.forEach((increamentbutton, index) => {
        increamentbutton.addEventListener("click", function () {
            //for updating values of input field
            function increamentValueOfInput(inputSelector) {
                let inputField = document.querySelector(inputSelector)
                let quantity = Number(inputField.value)
                quantity++
                inputField.value = quantity
            }
            increamentValueOfInput(`.input${index}`)
        })
    })

    descreaments.forEach((descreamentbutton, index) => {
        descreamentbutton.addEventListener("click", function () {
            //for updating values of input field
            function descreamentValueOfInput(inputSelector) {
                let inputField = document.querySelector(inputSelector)
                let quantity = Number(inputField.value)
                if (quantity > 1) {
                    quantity--
                }
                inputField.value = quantity
            }
            descreamentValueOfInput(`.input${index}`)
        })
    })
} inBetween()




// add to card funtion
function addTocard() {
    // totalPrice.textContent = 0.00;
    addBtn.forEach((button, index) => {
        button.addEventListener("click", () => {
            let title = `.productTitle${index + 1}`;
            let price = `.productprice${index}`;
            let value = `.input${index}`;
            let image = `.imageProduct${index}`;
            let deleteClass = `buttonDelete${index}`;
            sizes.innerText = cardSizes++

            // create the containers of selected order
            let order_form = document.createElement("div");
            let imgContainer = document.createElement("img");
            let titleContainer = document.createElement("h3");
            let priceContainer = document.createElement("p");
            let quatityContainer = document.createElement("p");
            let sumPriceContainer = document.createElement("p");
            let deleteContainer = document.createElement("button");
            deleteContainer.classList.add(deleteClass)

            // assigment items
            let TitleElement = document.querySelector(title)
            let PriceElement = document.querySelector(price)
            let InputElement = document.querySelector(value)
            let imageElement = document.querySelector(image)

            let sumPrice = parseFloat(PriceElement.textContent) * parseFloat(InputElement.value)
            imgContainer.src = imageElement.src;
            titleContainer.textContent = TitleElement.textContent;
            quatityContainer.textContent = InputElement.value;
            priceContainer.textContent = PriceElement.textContent;
            sumPriceContainer.textContent = sumPrice.toFixed(2);
            deleteContainer.innerHTML = `<i class="fa-regular fa-trash-can"></i>`;
            priceArray.push(sumPrice)
            let sum = priceArray.reduce((firstValue, secondValue) => (firstValue + secondValue))
            totalPrice.innerText = sum.toFixed(2);

            // this function for delete order from add to card
            deleteContainer.addEventListener("click", () => {
                order_form.remove();
                let total = parseFloat(totalPrice.textContent)
                let prodpic = sumPrice
                let result = total - prodpic
                totalPrice.innerText = result.toFixed(2);
                sizes.innerText = sizes.textContent - 1
                resetFactor()
            })
            function resetFactor() {
                if (sideBar.childElementCount <= 2) {
                    priceArray = []
                }
            }
            // append all elements to sidebar 
            order_form.setAttribute("class", "order_form");
            imgContainer.setAttribute("class", "imageHandler");
            order_form.appendChild(imgContainer);
            order_form.appendChild(titleContainer);
            order_form.appendChild(priceContainer);
            order_form.appendChild(quatityContainer);
            order_form.appendChild(sumPriceContainer);
            order_form.appendChild(deleteContainer);
            sideBar.appendChild(order_form);
        })
    }
    );
} addTocard()





function alertInfo() {
    let searchParams = new URLSearchParams(window.location.search);
    let status = searchParams.get("status")
    window.addEventListener("load", function () {
        switch (status) {
            case "success":
                var notyf = new Notyf();
                notyf.success({
                    message: 'The product has been added successfully',
                    duration: 9000,
                })
                break;
            case "deleted":
                var notyf = new Notyf();
                notyf.success({
                    message: 'The product has been successfully deleted',
                    duration: 9000,
                })
                break;
            case "size_exceeded":
                var notyf = new Notyf();
                notyf.error({
                    message: 'The picture is too big to upload',
                    duration: 9000,
                })
                break;
            case "query_error":
                var notyf = new Notyf();
                notyf.error({
                    message: 'Error to add product in Database correctly',
                    duration: 9000,
                })
                break;
            case "upload_error":
                var notyf = new Notyf();
                notyf.error({
                    message: 'Not uploaded seccessfully',
                    duration: 9000,
                })
                break;
            default:
                break;
        }
    })
} alertInfo()