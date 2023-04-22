@extends('FontEnd.header')
@section('title', 'Account')
@section('containt')
    <div class="container my-5">
        <table>
            <thead>
                <tr>
                    <th>User name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img style="width: 100px" src="{{ url('avatars/' . $user->avatar, []) }}" alt="">
                        {{ $user['name'] }}
                    </td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['phone'] }}</td>
                </tr>

            </tbody>
        </table>

    </div>
@endsection
