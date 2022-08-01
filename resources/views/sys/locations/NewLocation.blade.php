<form method="POST" action="{{ route('AddLocation') }}" class="row g-3 needs-validation">
    @csrf
    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Location</label>
        <input name="Locations" type="text" class="form-control" id="validationCustom01" required>

    </div>
    <div class="col-md-12">
        <label for="validationCustom02" class="form-label">
            Location Description
        </label>
        {!! Form::textarea($name = 'desc', $value = null, [
    'id' => 'NewLocDesc',
]) !!}

    </div>
    <div class="col-12">
        <div class="float-end">
            <button class="btn btn-dark btn-smshadow-lg" type="submit">
                <i class="fas fa-check" aria-hidden="true"></i> Save
            </button>

            <button class="btn btn-danger btn-smshadow-lg" type="button" data-bs-dismiss="modal">
                <i class="fas fa-times" aria-hidden="true"></i> Cancel
            </button>
        </div>

    </div>
</form>
