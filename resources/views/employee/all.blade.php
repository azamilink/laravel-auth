<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-5 px-5">
                <!-- component -->
                <h1>Daftar Karyawan</h1>

                <div class="mt-5">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No.
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Phone
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Salary
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Department
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $emp)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $emp->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $emp->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $emp->phone }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $emp->salary }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $emp->department }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-2">
                    {{ $employees->links() }}
                </div>
                <!-- component end -->
            </div>
        </div>
    </div>
</x-app-layout>
