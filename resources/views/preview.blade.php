<!DOCTYPE html>
<html>
<head>
    <title>Email Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="mb-3">Email Preview</h4>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <pre class="bg-light p-3 border rounded">{{ $preview }}</pre>

                    <form method="POST" action="{{ route('email.send') }}">
                        @csrf
                        <input type="hidden" name="email_body" value="{{ $preview }}">
                        <input type="hidden" name="candidate_email" value="{{ $data['candidate_email'] }}">

                        <button type="submit" class="btn btn-success">
                            Send Email
                        </button>

                        <a href="{{ url('/') }}" class="btn btn-secondary ms-2">
                            Go Back
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
