@extends('layouts.app')
@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Users') }}
    </h2>

    <div class="py-12">
        <div class="max-w-2xl sm:px-6 lg:px-2 d-flex d-grid gap-5">
            <form action="{{ route('editUsers.editUsers') }}" method="POST" class=" d-grid gap-3">
                @csrf
                <input type="hidden" name="id" value="{{ $users->id }}">

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}"
                        required />
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}"
                        aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm Password" required />
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="{{ old('status', $users->status) }}">Active</option>
                        <option value="Active">Active</option>
                        <option value="Non Active">Non Active</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary text-dark">Submit</button>
            </form>
        </div>
    </div>
@endsection
