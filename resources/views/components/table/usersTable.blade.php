@aware(['users'])

<table class="usersTable mt-4 table table-striped display nowrap" style="width: 100%">
    <thead class="table-dark">
    <tr>
        <th class="noSort" scope="col">Typ</th>
        <th scope="col">ID</th>
        <th scope="col">Meno</th>
        <th scope="col">Email</th>
        <th class="noSort" scope="col">Detail</th>
    </tr>
    </thead>

    <tbody>

    @php
        // In some cases only single element can be passed, if so
        // element is wrapped to Collection
        if ($users instanceof App\Models\User)
        {
            $users = collect([$users]);
        }
    @endphp

    @foreach ($users as $user)
        <tr>
            <td>
                <svg class="ms-1 bi bi-person" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg>
            </td>
            <td>{{$user->id_user}}</td>
            <td>{{$user->first_name . ' ' . $user->last_name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="/admin/user/show/{{$user->id_user}}">
                    <svg class="ms-1 bi bi-info-circle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
