@extends ('layouts.app', ['title' => 'Team toevoegen'])

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Teams</h1>
            <div class="page-subtitle">Team aanmaken</div>

            <div class="page-options d-flex">
                <a href="{{ route('teams.index') }}" class="btn btn-secondary">
                    <i class="fe fe-list mr-2"></i> Overzicht
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <form method="POST" action="{{ route('teams.store') }}" class="card card-body border-0 shadow-sm">
            @csrf {{-- Form field protection --}}
            <h6 class="border-bottom border-gray pb-1 mb-3">Team van vrijwilligers toevoegen.</h6>
        </form>
    </div>
@endsection
