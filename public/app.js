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
    const input_province = document.getElementById("input_province");
    const postal_code = document.getElementById("postal_code");

    select_nextElement.innerHTML = "";

    let index = select.selectedIndex;
    let value = select.options[index].value;
    let first_child = document.createElement("option");

    first_child.label = `Mohon Tunggu Sebentar`;
    first_child.selected;
    first_child.disabled;

    select_nextElement.disabled = true;
    select_nextElement.appendChild(first_child);

    try {
        fetch(`/api/rajaongkir/cities/${value}/province`)
            .then((res) => res.json())
            .then((data) => {
                for (let i = 0; i < select.children.length; i++) {
                    if (select.children[i].value == value) {
                        input_province.value = select.children[i].label;
                    }
                }

                first_child.label = `Pilih ${label}`;
                select_nextElement.disabled = false;

                data.rajaongkir.results.forEach((data) => {
                    let option_element = document.createElement("option");

                    postal_code.value = data.postal_code;

                    option_element.value = data.city_name;
                    option_element.label = data.city_name;

                    select_nextElement.appendChild(option_element);
                });
            });
    } catch (err) {
        console.log(err);
    }
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

function buttonHideAlertError(index) {
    const alert = document.getElementById(`alert-error-${index}`);

    if (!alert) return;

    alert.classList.remove("slide-in");
    alert.classList.add("slide-out");
}

function hideAlertError() {
    setInterval(() => {
        const alerts = document.querySelectorAll(".alert-error");

        if (!alerts) return;

        alerts.forEach((alert) => {
            const alertDocs = document.getElementById(alert.id);

            alertDocs.classList.remove("slide-in");
            alertDocs.classList.add("slide-out");
        });
    }, 5000);
}

addEventListener("DOMContentLoaded", async () => {
    hideAlertSuccess();
    hideAlertError();
});
