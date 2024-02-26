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
        <h3 class="mt-3 font-bold text-sm"> + ADD INVOICE ITEM</h3>
        <div class="flex flex-col gap-1">
            <label for="keterangan">Keterangan</label>
            <textarea class="outline-none border-blue-500 border-2 p-2 rounded-md" placeholder="Text here..." name="keterangan" id="keterangan"></textarea>
        </div>
        <div class="mt-3 flex gap-3">
            <div class="flex flex-col gap-1 w-8/12">
                <label for="harga" class="text-base text-gray-600">Harga :</label>
                <input name="harga" id="harga" class="border-blue-500 border-2 outline-none p-2 rounded-md" type="number" min="0" placeholder="0">
            </div>
            <div class="flex flex-col gap-1 w-2/12">
                <label for="jumlah" class="text-base text-gray-600">Jumlah :</label>
                <input name="jumlah" min="1" value="1" id="jumlah" class="border-blue-500 border-2 outline-none p-2 rounded-md" type="number" placeholder="0">
            </div>
        </div>
        <button type="button" id="tambah_item" class="mt-4 bg-blue-500 py-1 px-3 rounded text-white font-bold hover:bg-blue-400 transition-all duration-200">Tambah</button>
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
            <table id="table_preview" class="w-full text-justify mt-3 text-xs">
                <tr class="border-b-2 pb-2 mb-2 bg-gray-900 text-slate-100">
                    <th class="ps-2 w-7/12 text-left">KETERANGAN</th>
                    <th class="w-2/12">HARGA</th>
                    <th class="w-1/12 ">JML</th>
                    <th class="w-2/12 text-center">TOTAL</th>
                    <th class="w-2/12 text-center pe-2">ACT</th>
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
    const btnTambahItem = document.getElementById('tambah_item');
    const keterangan = document.getElementById('keterangan');
    const harga = document.getElementById('harga');
    const jumlah = document.getElementById('jumlah');
    const tablePreview = document.getElementById('table_preview')

    const invoiceItems = [];

    billTo.addEventListener('input', function() {
        document.getElementById('preview_bill_to').innerText = billTo.value;
    });

    billFrom.addEventListener('input', function() {
        document.getElementById('preview_bill_from').innerText = billFrom.value;
    });

    function deleteRow(button) {
        var row = button.parentNode.parentNode; // Dapatkan baris (tr) yang berisi tombol yang diklik
        row.parentNode.removeChild(row); // Hapus baris dari tabel
    }

    btnTambahItem.addEventListener('click', function() {
        const item = {
            keterangan: keterangan.value
            , harga: parseInt(harga.value)
            , jumlah: parseInt(jumlah.value)
            , total: parseInt(harga.value) * parseInt(jumlah.value)
        }
        invoiceItems.push(item)

        while (tablePreview.rows.length > 1) {
            tablePreview.deleteRow(1);
        }

        invoiceItems.forEach((item) => {
            const row = document.createElement('tr');
            row.classList.add('border-b-2', 'pb-2', 'mb-2', 'bg-gray-100', 'text-sm');

            const cell1 = document.createElement('td');
            cell1.classList.add('ps-3', 'text-left');
            cell1.textContent = item.keterangan;
            row.appendChild(cell1);

            const cell2 = document.createElement('td');
            cell2.textContent = item.harga;
            row.appendChild(cell2);

            const cell3 = document.createElement('td');
            cell3.classList.add('text-center');
            cell3.textContent = item.jumlah;
            row.appendChild(cell3);

            const cell4 = document.createElement('td');
            cell4.classList.add('me-2', 'text-center');
            cell4.textContent = item.total;
            row.appendChild(cell4);

            const cell5 = document.createElement('td');
            cell5.classList.add('text-red-500', 'font-bold');
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'X';
            deleteButton.onclick = function() {
                deleteRow(this); // Panggil fungsi deleteRow saat tombol diklik
            };
            cell5.appendChild(deleteButton);
            row.appendChild(cell5);


            tablePreview.appendChild(row);
        });

    });

</script>
@endsection
