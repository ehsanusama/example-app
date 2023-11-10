<x-admin-layout>
    <div class="w-full py-12">
        <div class="flex flex-wrap">
            <div class="w-full p-4">
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <h1 class="mb-4 text-2xl font-semibold">Create New Transaction</h1>

                    <form action="{{ $url }}" method="POST">
                        @csrf
                        <div class="mb-4 flex items-center">
                            <!-- Date Input -->
                            <div class="mr-4 flex-grow">
                                <label for="date" class="block text-gray-600">Date:</label>
                                <input type="date" name="date" id="date" class="form-input w-full"
                                    value="">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Title Input -->
                            <div class="mr-4 flex-grow">
                                <label for="title" class="block text-gray-600">Title:</label>
                                <input type="text" name="title" id="title" class="form-input w-full"
                                    value="">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Description Input -->
                            <div class="mr-4 flex-grow">
                                <label for="description" class="block text-gray-600">Description:</label>
                                <textarea name="description" id="description" class="form-textarea w-full" rows="1"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Amount Input -->
                            <div class="mr-4 flex-grow">
                                <label for="amount" class="block text-gray-600">Amount:</label>
                                <input type="number" name="amount" id="amount" class="form-input w-full"
                                    value="">
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Type Select Option -->
                            <div class="flex-grow">
                                <label for="type" class="block text-gray-600">Type:</label>
                                <select name="type" id="type" class="form-select w-full">
                                    <option value="income">Income</option>
                                    <option value="expense">Expense</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
                                type="submit">
                                <i class="fa fa-save" aria-hidden="true"></i> {{ $btn }}</button>
                        </div>
                    </form>
                </div>




            </div>
            <div class="w-full p-4">
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <h1 class="mb-4 text-2xl font-semibold">Roles List</h1>

                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="text-left">Date</th>
                                <th class="text-left">Title</th>
                                <th class="text-left">Description</th>
                                <th class="text-left">Amount</th>
                                <th class="text-left">Type</th>
                                <th class="text-left">Balance</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalIncome = 0;
                                $totalExpense = 0;
                            @endphp
                            @foreach ($expense as $item)
                                @if ($item->type === 'income')
                                    @php
                                        $totalIncome += $item->amount;
                                    @endphp
                                @else
                                    @php
                                        $totalExpense += $item->amount;
                                    @endphp
                                @endif
                                <tr class="capitalize">
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $totalIncome - $totalExpense }}</td>
                                    <td></td>
                                    <td class="text-right">
                                        <a href="{{ url('admin/expense/edit/' . $item->id) }}">
                                            <button
                                                class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                                                Edit</button>
                                        </a>
                                        <a href="{{ url('admin/expense/delete/' . $item->id) }}">
                                            <button
                                                class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700">
                                                Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Total Amount and Balance Row -->
                            <tr>
                                <td colspan="3"></td>
                                <td>Total Income: {{ $totalIncome }}</td>
                                <td>Total Expense: {{ $totalExpense }}</td>
                                <td>Balance: {{ $totalIncome - $totalExpense }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
