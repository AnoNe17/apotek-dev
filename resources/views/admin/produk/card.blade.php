@include('admin.card.select2')

<div class="col-12 mt-3">
    <label for="" class="form-label">Fungsional</label>
    <select name="fungsional_id" class="form-control select2_card" data-placeholder="--- Pilih Fungsional Produk ---">
        <option></option>
        @foreach ($fungsional as $f)
            <option value="{{ $f->id }}">{{ $f->nama }}</option>
        @endforeach
    </select>
</div>