@extends('admin.layout')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-extrabold tracking-tight text-slate-900">Create category</h2>
                        <p class="mt-1 text-sm text-slate-600">Add a new category for events.</p>
                    </div>
                    <a href="{{ route('category.index') }}" class="btn btn-soft">Back</a>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger mt-6" role="alert">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('category.store') }}" class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2" method="POST">
                    @csrf
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-900">Category name</label>
                        <input type="text" name="category" placeholder="Category name" class="mt-2 input" value="{{ old('category') }}">
                    </div>
                    <div class="md:col-span-2 flex items-center justify-end gap-3 pt-2">
                        <button type="submit" class="btn btn-primary">Create category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection