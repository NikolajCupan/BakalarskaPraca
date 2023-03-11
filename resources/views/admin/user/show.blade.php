@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">

    <x-navbar.navbarAdmin homePath="/admin/user"/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminUser/>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="d-sm-flex justify-content-between">
                    <h3 class="title">Informacie o pouzivatelovi</h3>

                    @if ($user->id_user != $loggedUser->id_user)
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modifyRolesModal">
                            Editovat role
                        </button>
                    @endif
                </div>


                <ul class="userDetailList">
                    <li><strong>Meno:</strong> {{$user->first_name}}</li>
                    <li><strong>Priezvisko:</strong> {{$user->last_name}}</li>
                    <li><strong>Email:</strong> {{$user->email}}</li>
                    <li><strong>Telefonne cislo:</strong><span class="{{is_null($user->phone_number) ? "text-danger" : ""}}"> {{$user->phone_number ?? "nezadane"}}</span></li>
                </ul>

                <h3 class="mt-5 title">Role</h3>
                <p class="mb-0 mt-0"><strong>Pouzivatel ma nasledujuce role:</strong></p>
                <ul class="userDetailList">
                @foreach ($userRoles as $userRole)
                    <li>- {{$userRole->getWebRole()->getSlovakRoleName()}}</li>
                @endforeach
                </ul>

                <h3 class="mt-5 title">Adresa</h3>
                <ul class="userDetailList">
                    <li><strong>Mesto:</strong><span class="{{is_null($user->getAddress()->getCity()) ? "text-danger" : ""}}"> {{is_null($user->getAddress()->getCity()) ? "nezadane" : $user->getAddress()->getCity()->city}}</span></li>
                    <li><strong>PSC:</strong><span class="{{is_null($user->getAddress()->getCity()) ? "text-danger" : ""}}"> {{is_null($user->getAddress()->getCity()) ? "nezadane" : substr_replace($user->getAddress()->getCity()->postal_code, " ", 3, 0)}}</span></li>
                    <li><strong>Ulica:</strong><span class="{{is_null($user->getAddress()->street) ? "text-danger" : ""}}"> {{$user->getAddress()->street ?? "nezadane"}}</span></li>
                    <li><strong>Cislo domu:</strong><span class="{{is_null($user->getAddress()->house_number) ? "text-danger" : ""}}"> {{$user->getAddress()->house_number ?? "nezadane"}}</span></li>
                </ul>

                <h3 class="mt-5 title">Objednavky</h3>
                <x-table.user.userPurchasesTable :purchases="$userPurchases"/>
            </div>
        </div>
    </div>

    <!-- Modify roles modal -->
    <div class="modal fade" id="modifyRolesModal" tabindex="-1" aria-labelledby="modifyRolesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modifyRolesModalLabel">Editovat role</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="/admin/user/modifyUserRoles">
                    <input type="hidden" name="userId" value="{{$user->id_user}}">

                    <div class="modal-body">
                        @csrf
                        @foreach ($webRoles as $webRole)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$webRole->name}}" id="{{$webRole->name}}" name="{{$webRole->name}}"
                                    {{$user->hasRole([$webRole->name]) ? "checked" : ""}}
                                    {{$webRole->name == "customer" ? "disabled" : ""}}>
                                <label class="form-check-label" for="{{$webRole->name}}">
                                    {{$webRole->getSlovakRoleName()}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrusit</button>
                        <button type="submit" class="btn btn-dark">Potvrdit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
