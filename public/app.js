const formatter = new Intl.NumberFormat("en-ID", {
    style: "currency",
    currency: "IDR",
    currencyDisplay: "code",
});

let price = 0;

function formatterClear(price) {
    return price
        .replace(/IDR|Indonesian rupiah/gi, "")
        .trim()
        .replace(".00", "");
}

function setPrice(price_params) {
    price = price_params;
}

function decrease(id) {
    const quantity = document.getElementById(`quantity-${id}`);

    quantity.innerHTML =
        parseInt(quantity.textContent) - 1 != 0
            ? parseInt(quantity.textContent) - 1
            : 1;

    const currency = document.getElementById(`currency-${id}`);

    currency.innerHTML = formatterClear(
        formatter.format(parseInt(price) * quantity.innerHTML)
    );
}

function increase(id) {
    const quantity = document.getElementById(`quantity-${id}`);

    quantity.innerHTML = parseInt(quantity.textContent) + 1;

    const currency = document.getElementById(`currency-${id}`);

    currency.innerHTML = formatterClear(
        formatter.format(parseInt(price) * quantity.innerHTML)
    );
}

function formSubmit(id) {
    const form = document.getElementById(`form-${id}`);
    const input = document.getElementById(`form-stock-${id}`);
    const quantity = document.getElementById(`quantity-${id}`);

    input.value = quantity.textContent;
    form.submit();
}

function chooseImage(id) {
    const file = document.getElementById(id);
    file.click();
}

function select(elementId, nextElement, label) {
    const select = document.getElementById(elementId);
    const select_nextElement = document.getElementById(nextElement);
    select_nextElement.innerHTML = "";
    let index = select.selectedIndex;
    let value = select.options[index].value;
    let first_child = document.createElement("option");
    first_child.label = `Pilih ${label}`;
    first_child.selected;
    first_child.disabled;
    select_nextElement.appendChild(first_child);
    fetch(`/api/${elementId}/${value}/${nextElement}`)
        .then((res) => res.json())
        .then((data) => {
            data.data.forEach((data) => {
                let option_element = document.createElement("option");
                option_element.value = data.id;
                option_element.label = data.name;

                select_nextElement.appendChild(option_element);
            });
        });
}

function submit(id) {
    const form = document.getElementById(id);
    form.submit();
}

function buttonHideAlertSuccess() {
    const alert = document.getElementById("alert-success");

    if (!alert) return;

    alert.classList.remove("slide-in");
    alert.classList.add("slide-out");
}

function hideAlertSuccess() {
    setTimeout(() => {
        buttonHideAlertSuccess();
    }, 5000);
}

addEventListener("DOMContentLoaded", () => {
    hideAlertSuccess();
});
