@extends('layouts.app', ['title' => 'Teams'])

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Teams</h1>
            <div class="page-subtitle">Overzicht</div>

            <div class="d-flex page-options">
                <a href="{{ route('teams.create') }}" class="btn btn-secondary">
                    <i class="fe fe-plus mr-2"></i> Nieuw team
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="card card-body border-0 shadow-sm">
            <table class="table table-sm mb-o">
                <thead>
                    <tr>
                        <th class="border-top-0" scope="col">Naam</th>
                        <th class="border-top-0" scope="col">Status</th>
                        <th class="border-top-0" scope="col">Verantwoordelijke</th>
                        <th class="border-top-0" scope="col">Leden</th>
                        <th class="border-top-0" scope="col">&nbsp;</th> {{-- Column dedicated for the functions --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td>{{$team->name}}</td>
                            <td>
                                @if($currentUser->isOwnerOfTeam($team))
                                            <span class="badge badge-success">Owner</span>
                                        @else
                                            <span class="badge badge-primary">Member</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($currentUser->currentTeam === null || $currentUser->currentTeam->getKey() !== $team->getKey())
                                            <a href="{{route('teams.switch', $team)}}" class="btn btn-sm btn-secondary">
                                                <i class="fa fa-sign-in"></i> Switch
                                            </a>
                                        @else
                                            <span class="badge badge-secondary">Current team</span>
                                        @endif

                                        <a href="{{route('teams.members.show', $team)}}" class="btn btn-sm btn-dark">
                                            <i class="fa fa-users"></i> Members
                                        </a>

                                        @if(auth()->user()->isOwnerOfTeam($team))

                                            <a href="{{route('teams.edit', $team)}}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil"></i> Edit
                                            </a>

                                            <form style="display: inline-block;"
                                                  action="{{route('teams.destroy', $team)}}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
@endsection
