<div class="card mb-5 mb-xl-8 bg-white text-dark">
    <div class="card-header border-0 pt-3">
        <h5 class="card-title">Form Product</h5>
    </div>
    <div class="card-body py-3">
        @if ($errors->any())
        <div class="alert alert-danger mb-5">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success mb-5">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form action="{{ url('/admin') }}" method="post" autocomplete="off" id="form-menu" enctype="multipart/form-data">
            @csrf
            <div class="mb-8">
                <label class="required form-label">Nama</label>
                <input type="hidden" class="form-control id" name="id" />
                <input type="text" class="form-control nama" name="names" />
                <div class="form-text text-danger"></div>
            </div>
            <div class="mb-8">
                <label class="required form-label">Harga</label>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Rp</span>
                    <input type="text" name="prices" class="form-control prices"/>
                </div>
            </div>
            <div class="mb-8">
                <label for="required form-label">Deskripsi</label><br>
                <textarea name="desc" class="form-control desc"></textarea>
            </div>
            <div class="mb-8">
                <label class="required form-label">Status</label>
                <div class="d-flex justify-content-center align-items-center">
                    <label class="me-5 ">
                        <input type="radio" class="is_active_Y" name="is_active" value="1" /> Yes
                    </label>
                    <label class="me-5">
                        <input type="radio" class="is_active_N" name="is_active" value="0" /> No
                    </label>
                </div>
                <div class="form-text text-danger"></div>
            </div>
            <div class="text-end mt-20 mb-10">
                <button class="py-2 px-4 btn btn-clear" type="reset">Clear</button>
                <button class="py-2 px-4 btn btn-danger" type="submit">Save changes</button>
            </div>
        </form>
    </div>
</div>