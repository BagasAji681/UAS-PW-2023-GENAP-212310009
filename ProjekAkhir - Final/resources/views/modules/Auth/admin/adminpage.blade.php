@extends('templates.adminlay')
@section('fill')


<div class="row mt-5 p-4">
    <div class="col-lg-8 col-xxl-8">
        <div class="card border-0">
            <div class="card-header bg-white border-0 px-3 py-3">
                <div class="card-title">
                    <h5 class="fw-bolder text-dark m-0">List of product</h5>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle ">
                        <thead class="fs-6 fw-bold bg-light">
                            <tr class="fs-7">
                                <th>No</th>
                                <th width="30%">Menu</th>
                                <th width="15%">Harga</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="fw-6 text-secondary">
                            @if (count($products) > 0)
                            @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->names }}</td>
                                <td>
                                    <div style="height: 30px; overflow: hidden;">
                                        Rp. {{ $product->prices }}
                                    </div>
                                </td>
                                <td>
                                    <div style="height: 30px; overflow:hidden;">
                                        {{ $product->desc}}
                                    </div>
                                </td>
                                <td>{{ ($product->is_active) ? "Aktif":"Nonaktif" }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm text-dark" title="Remove" type="button" onclick="RemoveItem({{ $product->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                            </svg>
                                        </button>

                                        <button title="Edit" class="btn btn-sm text-dark" type="button" onclick="EditItem({{ $product->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6">No record found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xxl-4">
        @include('modules.Auth.admin.adm')
    </div>
</div>

<script>
    const RemoveItem = (id) => {
        if (confirm("Apakah anda yakin untuk menghapus menu ini?")) {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                var data = JSON.parse(this.response);
                alert(data.message);
                window.location.href = "{{ route('m_menu') }}";
            }
            xmlhttp.open("GET", "{{ url('') }}/admin/remove/" + id);
            xmlhttp.send();
        }
    }

    const EditItem = (id) => {
        var targetDiv = document.getElementById("form-menu");
        let id_ = targetDiv.getElementsByClassName("id")[0];
        let names = targetDiv.getElementsByClassName("names")[0];
        let prices = targetDiv.getElementsByClassName("prices")[0];
        let desc = targetDiv.getElementsByClassName("desc")[0];
        let is_active_Y = targetDiv.getElementsByClassName("is_active_Y")[0];
        let is_active_N = targetDiv.getElementsByClassName("is_active_N")[0];

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            var data = JSON.parse(this.response);
            id_.value = data.id;
            names.value = data.names;
            prices.value = data.prices;
            desc.value = data.desc;

            if (data.is_active_Y === 1) {
                is_active_Y.checked = true;
            } else {
                is_active_N.checked = true;
            }
        }
        xmlhttp.open("GET", "{{ url('') }}/admin/edit/" + id);
        xmlhttp.send();
    }
</script>


@endsection