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
