<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HR Email Response Tool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                <h4 class="mb-4 text-center">HR Email Tool</h4>
                @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                <form action="{{ route('email.preview') }}" method="POST">
                    @csrf
                    <div class="form-check form-check-inline">
                        <input {{ old('selection_status') === 'selected' ? 'checked' : '' }} required class="form-check-input" type="radio" name="selection_status" id="selected" value="selected">
                        <label class="form-check-label" for="selected">Selected</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input {{ old('selection_status') === 'rejected' ? 'checked' : '' }} class="form-check-input" type="radio" name="selection_status" id="rejected" value="rejected">
                        <label class="form-check-label" for="rejected">Rejected</label>
                    </div>
                    <div class="my-3">
                        <label for="candidate_name" class="form-label">Candidate's Name</label>
                        <input name="candidate_name" type="text" class="form-control" id="candidate_name" value="{{ old('candidate_name') }}" placeholder="enter candidate's name">
                    </div>
                    @error('candidate_name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="candidate_email" class="form-label">Candidate's Email</label>
                        <input name="candidate_email" type="email" class="form-control" id="candidate_email" value="{{ old('candidate_email') }}" placeholder="enter candidate's email address">
                    </div>
                    @error('candidate_email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                    <div class="my-3">
                        <label for="position_applied" class="form-label">Position Applied</label>
                        <input name="position_applied" type="text" class="form-control" id="position_applied" placeholder="enter position applied for" value="{{ old('position_applied') }}">
                    </div>
                    @error('position_applied')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Preview Email</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
