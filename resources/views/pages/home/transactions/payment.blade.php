@extends('layouts.default')

@section('content')
    <div>
        <x-modal.index title="Larisco" id="payment">
            <div>
                <img src="{{ $response->actions[0]->url }}" alt="">
            </div>
            <div class="font-bold bg-slate-200 rounded-lg shadow p-3">
                Rp. {{ number_format($response->gross_amount) }}
            </div>
        </x-modal.index>
    </div>
    <script>
        addEventListener('DOMContentLoaded', () => {
            document.getElementById('payment').showModal();
                const time = setInterval(() => {
                    fetch(`/api/midtrans/order/{{ $response->order_id }}/check`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.transaction_status == 'settlement') {
                                window.location.href = '/transactions/success'
                                clearInterval(time)
                            }
                            console.clear()
                        }).catch(err => console.log(err));
                }, 1000);
        })
    </script>
@endsection
