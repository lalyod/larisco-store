@foreach ($user->addresses as $address)
    <label class="bg-green text-white font-bold shadow p-3 rounded-lg flex justify-between items-center"
        onclick="handleClick()">
        <div class="flex flex-col">
            <span>{{ $address->province }}</span>
            <span>{{ $address->city }}</span>
            <span>{{ $address->postal_code }}</span>
        </div>
        <input type="radio" name="address_id" value="{{ $address->id }}" class="radio">
    </label>
@endforeach

<script>
    function handleClick() {
        const shippingCost = document.getElementById('shipping-cost');
        if (!shippingCost) return;
        try {
            fetch('http://127.0.0.1:8000/api/rajaongkir/cost', {
                method: "POST",
                body: JSON.stringify({
                    origin: 121,
                    destination: 23,
                    weight: 100,
                    courier: 'jne'
                })
            }).then(res => {
                res.json();
                console.log(res)
            }).then(data => {
                console.log(data);
            })
        } catch (err) {
            console.log(err)
        }
        shippingCost.innerHTML = 100;
    }
</script>
