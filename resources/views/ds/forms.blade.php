<div class="form-group">
    <label for="logo_big">Logo Big</label>
    <input type="file" name="logo_big" id="logo_big" class="form-control">
    @error('logo_big')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="logo_small">Logo Small</label>
    <input type="file" name="logo_small" id="logo_small" class="form-control">
    @error('logo_small')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="ds_pic1">Driving School Pic 1</label>
    <input type="file" name="ds_pic1" id="ds_pic1" class="form-control">
    @error('ds_pic1')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>


<div class="col-5">
    <div class="card mb-4">
        <h5 class="card-header">Logo</h5>
        <div class="card-body">
            <form action="/upload" class="dropzone needsclick" id="dropzone-basic">
                <div class="dz-message needsclick">
                    Drop files here or click to upload
                </div>
                <div class="fallback">
                    <input name="file" type="file" name="logo_big" id="logo_big" />
                </div>
            </form>
        </div>
    </div>
</div>
