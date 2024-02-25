@extends('layout.main')
@include('layout.navbar')
@section('content')
<div class="w-8/12 mx-auto mt-5 flex gap-3">
    {{-- form --}}
    <form id="form_create" action="invoice.create" method="post" class="w-6/12">
        <h2 class="font-bold">Form Buat invoice</h2>
        <div class="mt-3 flex gap-3">
            <div class="flex flex-col gap-1">
                <label for="bill_from" class="text-base text-gray-600">Tagihan Dari :</label>
                <input name="bill_from" id="bill_from" class="border-blue-500 border-2 outline-none p-2 rounded-md" type="text" placeholder="Jhon Doe">
            </div>
            <div class="flex flex-col gap-1">
                <label for="bill_to" class="text-base text-gray-600">Tagihan Untuk :</label>
                <input name="bill_to" id="bill_to" class="border-blue-500 border-2 outline-none p-2 rounded-md" type="text" placeholder="Jhon Doe">
            </div>
        </div>
        <div class="flex flex-col gap-1 mt-2">
            <label for="keterangan">Keterangan</label>
            <textarea class="outline-none border-blue-500 border-2 p-2 rounded-md" placeholder="Text here..." name="keterangan" id="keterangan"></textarea>
        </div>
        <div class="mt-3 flex gap-3">
            <div class="flex flex-col gap-1 w-8/12">
                <label for="harga" class="text-base text-gray-600">Harga :</label>
                <input name="harga" id="harga" class="border-blue-500 border-2 outline-none p-2 rounded-md" type="number" placeholder="20000">
            </div>
            <div class="flex flex-col gap-1 w-2/12">
                <label for="jumlah" class="text-base text-gray-600">Jumlah :</label>
                <input name="jumlah" id="jumlah" class="border-blue-500 border-2 outline-none p-2 rounded-md" type="number" placeholder="2">
            </div>
        </div>
    </form>
    {{-- tampilan langsung --}}
    <div class="w-6/12 border-l-2 border-gray-800 ps-5 pt-1">
        <h2 class="font-bold">Preview </h2>
        <div class="border-2 border-gray-500 p-5 mt-5">
            <h1 class="font-extrabold text-xl pb-2 border-b-2 border-gray-700">INVOICE</h1>
            <div class="mt-3 flex justify-between">
                <div>
                    <h3 class="text-xs font-bold">Dari :</h3>
                    <p class="text-sm" id="preview_bill_from">-</p>
                    <h3 class="text-xs font-bold mt-2">Kepada :</h3>
                    <p class="text-sm" id="preview_bill_to">-</p>
                </div>
                <div>
                    <h3 class="text-xs font-bold">Tanggal :</h3>
                    <p class="text-sm" id="">12/12/2024</p>
                    <h3 class="text-xs font-bold mt-2">No Invoice :</h3>
                    <p class="text-sm" id="">12/12/2024</p>
                </div>
            </div>
            <table class="w-full text-left mt-3 text-xs">
                <tr class="border-b-2 pb-2">
                    <th>KETERANGAN</th>
                    <th>HARGA</th>
                    <th>JML</th>
                    <th>TOTAL</th>
                </tr>
                <tr>
                    <td>Pulpen</td>
                    <td>5000</td>
                    <td>3</td>
                    <td>15000</td>
                </tr>
                <tr>
                    <td>Buku</td>
                    <td>20000</td>
                    <td>2</td>
                    <td>40000</td>
                </tr>
            </table>

        </div>
    </div>
</div>

{{-- script --}}
<script>
    const billFrom = document.getElementById('bill_from');
    const billTo = document.getElementById('bill_to');
    const formCreate = document.getElementById('form_create');

    formCreate.addEventListener('input', function() {
        document.getElementById('preview_bill_from').innerText = billFrom.value;
        document.getElementById('preview_bill_to').innerText = billTo.value;

    });

</script>
@endsection
