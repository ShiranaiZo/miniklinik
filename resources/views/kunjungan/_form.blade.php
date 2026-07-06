<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Pasien <span class="text-danger">*</span></label>
        <select name="pasien_id" class="form-select @error('pasien_id') is-invalid @enderror">
            <option value="">-- Pilih --</option>
            @foreach ($pasiens as $pasien)
                <option value="{{ $pasien->id }}" {{ old('pasien_id', $kunjungan->pasien_id ?? '') == $pasien->id ? 'selected' : '' }}>{{ $pasien->nama }}</option>
            @endforeach
        </select>
        @error('pasien_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Dokter <span class="text-danger">*</span></label>
        <select name="dokter_id" class="form-select @error('dokter_id') is-invalid @enderror">
            <option value="">-- Pilih --</option>
            @foreach ($dokters as $dokter)
                <option value="{{ $dokter->id }}" {{ old('dokter_id', $kunjungan->dokter_id ?? '') == $dokter->id ? 'selected' : '' }}>{{ $dokter->nama }}</option>
            @endforeach
        </select>
        @error('dokter_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
               value="{{ old('tanggal', $kunjungan->tanggal ?? '') }}">
        @error('tanggal')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
        <input type="text" name="status" class="form-control @error('status') is-invalid @enderror"
            value="{{ old('status', $kunjungan->status ?? '') }}" placeholder="Status">
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Diagnosis <span class="text-danger">*</span></label>
        <input type="text" name="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror"
            value="{{ old('diagnosis', $kunjungan->diagnosis ?? '') }}" placeholder="Diagnosis">
        @error('diagnosis')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Biaya <span class="text-danger">*</span></label>
        <input type="decimal" name="biaya" class="form-control @error('biaya') is-invalid @enderror"
            value="{{ old('biaya', $kunjungan->biaya ?? '') }}" placeholder="Biaya">
        @error('biaya')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Keluhan <span class="text-danger">*</span></label>
    <textarea name="keluhan" class="form-control @error('keluhan') is-invalid @enderror" rows="2" placeholder="Keluhan">{{ old('keluhan', $pasien->keluhan ?? '') }}</textarea>
    @error('keluhan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
