<x-admin-layout>
    <div class="w-full py-12">
        <div class="flex flex-wrap">
            <div class="w-full p-4 md:w-1/2">
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <h1 class="mb-4 text-2xl font-semibold">Create New Role</h1>

                    <form action="{{ route('admin.permission.update', 1) }}" method="{{ $method }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-600">Role Name:</label>
                            <input type="text" name="name" id="name" class="form-input w-full"
                                value="{{ @$permissions->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="guard_name" class="block text-gray-600">Guard Name:</label>
                            <textarea name="guard_name" id="guard_name" class="form-textarea w-full" rows="1">{{ @$permissions->guard_name }}</textarea>
                            @error('guard_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
                                type="submit">
                                <i class="fa fa-save" aria-hidden="true"></i> {{ $btn }}</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="w-full p-4 md:w-1/2">
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <h1 class="mb-4 text-2xl font-semibold">Roles List</h1>

                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="text-left">Name</th>
                                <th class="text-left">Guard Name</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permission as $item)
                                <tr class="capitalize">
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->guard_name }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.permission.edit', $item->id) }}">
                                            <button
                                                class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                                                Edit</button>
                                        </a>
                                        <a href="{{ url('admin/role/delete/' . $item->id) }}">
                                            <button
                                                class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700">
                                                Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
